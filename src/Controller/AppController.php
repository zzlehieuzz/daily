<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Libs\Constant;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    static public $m_strControllerName;
    static public $m_aryUser;

    public function initialize() {
        parent::initialize();
        $this->loadModel('Users');
        $this->loadModel('Category');
        $this->loadModel('Daily');

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'autoRedirect' => FALSE,
            'loginAction' => Constant::$C_ROUTE_LOGIN,
            'loginRedirect' => Constant::$C_ROUTE_LOGIN_REDIRECT,
            'logoutRedirect'=> Constant::$C_ROUTE_LOGOUT_REDIRECT,
            'unauthorizedRedirect' => Constant::$C_ROUTE_LOGIN,
            'authenticate'   => [
                'Form' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password',
                    ],
                    'passwordHasher' => [
                        'className' => 'Legacy',
                    ],
                    'userModel' => 'Users'
                ]
            ],
            'storage'        => 'Session',
            'authorize'      => ['Controller']
        ]);

        if ($this->Auth->user()
            && $this->request->params['controller'] == 'Auth'
            && $this->request->params['action'] == 'login') {
            return $this->redirect(Constant::$C_ROUTE_LOGIN_REDIRECT);
        }

        $this->response->disableCache();
    }

    /**
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event) {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', TRUE);
        }
    }

    /**
     * @param Event $event
     * @return \Cake\Network\Response|null|void
     */
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $aryUser = $this->Auth->user();
        $aryUser = $this->Users->find()->where(['id' => $aryUser['id']])->first();
        if(isset($this->request->params['controller']) === TRUE) {
            self::$m_strControllerName = $this->request->params['controller'];
        }
        if (is_null($aryUser) == FALSE) {
            self::$m_aryUser = $aryUser->toArray();
            $this->set('user', self::$m_aryUser);
        } else if($this->Auth->isAuthorized()) {
            return $this->redirect($this->Auth->logout());
        }

        if(in_array(self::$m_strControllerName, ['Pages'])) {
            $this->viewBuilder()->layout('user');
        }
    }

    /**
     * @param null $aryUser
     * @return bool
     * @throws NotFoundException
     */
    public function isAuthorized($aryUser = null) {
        if (self::$m_aryUser['role'] === Constant::C_USER_ROLE_ADMIN) {
            return true;
        }
        else {
            if(self::$m_strControllerName !== 'Users' && self::$m_strControllerName !== 'CommentTemplate') {
                return true;
            } else {
                throw new NotFoundException;
            }
        }

        return false;
    }

    /**
     * @param array || string $errors
     */
    public function errorFlash($error) {
        $this->Flash->error($error, ['key' => 'error']);
    }

    /**
     * @param array || string $errors
     */
    public function successFlash($success) {
        $this->Flash->success($success, ['key' => 'success']);
    }

    /**
     * @param array $aryData ：返るデータ
     * @param bool $state ：レスポンスのステータス
     * @param array $aryErrorMessage ：エラーメッセージ
     */
    public function jsonResponse($aryData = [], $state = TRUE, $aryErrorMessage = []) {
        $this->set('_serialize', $aryData);
        $aryResult = ['data' => $aryData];
        if ($aryErrorMessage) {
            $aryResult['msg'] = $aryErrorMessage;
        }
        if ($state === TRUE) {
            $aryResult['status'] = $state;
        }
        echo json_encode($aryResult);
    }
}
