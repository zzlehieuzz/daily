<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Salary Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Daily get($primaryKey, $options = [])
 * @method \App\Model\Entity\Daily newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Daily[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Daily|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Daily patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Daily[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Daily findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SalaryTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('salary');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator) {
        $validator
            ->notEmpty('default_value', ['message' => 'Default salary is required'])
            ->add('default_value', 'naturalNumber', [
                'rule' => ['naturalNumber', true],
                'message' => 'Default salary has must be number'
            ])
            ->add('default_value', [
                'minLength'  => [
                    'rule'    => ['minLength', 1],
                    'last'    => TRUE,
                    'message' => 'Default salary within 1-11 characters'
                ],
                'maxLength'  => [
                    'rule'    => ['maxLength', 11],
                    'message' => 'Default salary within 1-11 characters'
                ]
            ]);

        $validator ->notEmpty('real_value', ['message' => 'Real salary is required'])
            ->add('real_value', 'naturalNumber', [
                'rule' => ['naturalNumber', true],
                'message' => 'Real salary has must be number'
            ])
            ->add('real_value', [
                'minLength'  => [
                    'rule'    => ['minLength', 1],
                    'last'    => TRUE,
                    'message' => 'Real salary within 1-11 characters'
                ],
                'maxLength'  => [
                    'rule'    => ['maxLength', 11],
                    'message' => 'Real salary within 1-11 characters'
                ]
            ]);

        return $validator;
    }
}
