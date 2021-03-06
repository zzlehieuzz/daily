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
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\I18n\I18n;
use Cake\Network\Exception\NotFoundException;
use Psr\Log\LogLevel;

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
        $this->loadModel('Config');
        $this->loadModel('Category');
        $this->loadModel('Daily');
        $this->loadModel('Salary');

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

        $strLang = 'en_US';
        $strLang = 'ja_JP';
        if($strLang && isset(Constant::$localeMap[$strLang])) {
            I18n::locale(Constant::$localeMap[$strLang]);
        } else {
            I18n::locale(Configure::read('App.defaultLocale'));
        }

        if ($this->Auth->user()
            && strtolower($this->request->params['controller']) == 'auth'
            && strtolower($this->request->params['action']) == 'login') {
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

        //controller create self::$m_strControllerName
        if(isset($this->request->params['controller']) === TRUE) {
            self::$m_strControllerName = $this->request->params['controller'];
        }

        $aryAuthUser = $this->Auth->user();
        $aryUser = null;
        if($aryAuthUser) {
            $arySelectField = [
                'id' => 'Users.id'
                ,'username' => 'Users.username'
                ,'password' => 'Users.password'
                ,'name' => 'Users.name'
                ,'role' => 'Users.role'
                ,'login_date' => 'Users.login_date'
                ,'currency' => 'Config.currency_value'
            ];
            $aryUser = $this->Users->find()
                ->select($arySelectField)
                ->where(['Users.id' => $aryAuthUser['id']])
                ->contain(['Config'])->first();
        }

        if (!is_null($aryUser)) {
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
     * @return bool
     * @throws NotFoundException
     */
    public function isAuthorized() {
        if (self::$m_aryUser['role'] === Constant::C_USER_ROLE_SUPER) {
            return true;
        } else {
            if(!in_array(self::$m_strControllerName, ['Panel', 'Users'])) {
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

    function logDebug($message) {
        $this->log($message, LogLevel::DEBUG);
    }

    function logError($message) {
        $this->log($message, LogLevel::ERROR);
    }
}
