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
use Cake\Filesystem\Folder;
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
class ToolController extends AppController
{
    public function index()
    {
        $intCountDaily = $this->Daily->find()->where(['id' => self::$m_aryUser['id']])->count();
        $intCountUser = $this->Users->find()->count();
        $this->set('intCountDaily', $intCountDaily);
        $this->set('intCountUser', $intCountUser);


        $aryField = [
            'date_y_m' => 'date_y_m',
            'amount' => 'SUM(amount)'
        ];
        $aryDaily = $this->Daily->find('list', [
            'keyField' => 'date_y_m',
            'valueField' => 'amount',
            'order' => ['date_y_m' => 'DESC']])
            ->group(['date_y_m'])
            ->select($aryField)
            ->where(['user_id' => self::$m_aryUser['id']])
            ->toArray();
        $aryDailyPercent = [];
        $intAmountTotal = 0;
        if($aryDaily) {
            $intAmountTotal = array_sum($aryDaily);
            $intI = 0;
            foreach($aryDaily as $aryDailyKey => $aryDailyItem) {
                $aryDailyPercent[$intI]['label'] = $aryDailyKey;
                $aryDailyPercent[$intI]['data']  = ($aryDailyItem/$intAmountTotal)*100;
                $intI++;
            }
        }

        $this->set('aryDailyPercent', $aryDailyPercent);
        $this->set('intAmountTotal', $intAmountTotal);


    }

    public function clearTemp()
    {
        $folderPersistent = new Folder(TMP . 'cache' .DS . 'persistent', true, 777);
        $folderModels = new Folder(TMP . 'cache' .DS . 'models', true, 777);
        $folderPersistent->delete();
        $folderModels->delete();

        $folderCache = new Folder(TMP . 'cache' .DS . 'persistent', true, 777);
        if ($folderCache->delete()) {
            $this->successFlash(__('Successfully cache cleared'));
        } else {
            $this->errorFlash(__('Cache can not cleared'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
