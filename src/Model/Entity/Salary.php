<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Salary Entity
 *
 * @property int $id
 * @property string $date_y_m
 * @property int $user_id
 * @property int $default_value
 * @property int $real_value
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Daily[] $daily
 */
class Salary extends Entity
{
    protected $_accessible = [
        '*' => true
    ];
}
