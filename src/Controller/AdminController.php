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
use App\Libs\Utility;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class AdminController extends AppController
{

    public function home()
    {
        $intCountDaily = $this->Daily->find()->where(['id' => self::$m_aryUser['id']])->count();
        $this->set('intCountDaily', $intCountDaily);
    }

    public function profile()
    {
        $objUser = $this->Users->find()->where(['id' => self::$m_aryUser['id']])->first();
        if(!$objUser) {
            $this->errorFlash(__('User not found'));
            return $this->redirect(Constant::$C_ROUTE_LOGIN_REDIRECT);
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $aryData = $this->request->data;
            if ($aryData['password'] == '') {
                unset($aryData['password']);
            }

            $aryData['id'] = $objUser->id;
            $aryData['username'] = $objUser->username;
            $aryData['role'] = $objUser->role;

            $objEntityUser = $this->Users->newEntity($aryData, ['validate' => 'editUsers']);

            if ($objUser && count($objEntityUser->errors()) == 0) {
                $this->Users->save($objEntityUser);
                $this->successFlash(__('Successfully saved'));
                return $this->redirect(['action' => 'profile']);
            } else {
                $aryError[] = Utility::getErrors($objEntityUser->errors());

                if (count($aryError) > 0) {
                    $this->errorFlash($aryError);
                }
            }
            $objUser = $objEntityUser;
        } else {
            $this->request->data = $objUser;
            unset($this->request->data['password']);
        }

        $this->set('objEntity', $objUser);
    }
}
