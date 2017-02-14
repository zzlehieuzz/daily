<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Daily Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property string $date_process
 * @property string $date_y_m
 * @property int $amount
 * @property string $description
 * @property int $sort
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Daily extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true
    ];
}
