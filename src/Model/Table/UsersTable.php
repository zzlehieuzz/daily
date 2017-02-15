<?php
namespace App\Model\Table;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Daily
 * @property \Cake\ORM\Association\HasMany $Salary
 * @property \Cake\ORM\Association\HasOne $Config
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('Config', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('Daily', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('Salary', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username', ['message' => 'Username is required'])
            ->add('username', [
                'characters' => [
                    'rule'    => 'alphaNumeric',
                    'message' => 'Username is alphanumeric only'
                ],
                'minLength'  => [
                    'rule'    => ['minLength', 3],
                    'last'    => TRUE,
                    'message' => 'Please enter the username within 3-20 characters'
                ],
                'maxLength'  => [
                    'rule'    => ['maxLength', 20],
                    'message' => 'Please enter the username within 3-20 characters'
                ],
                'unique' => [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'It is already registered user name'
                ]
            ]);

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password', ['message' => 'PW is required'])
            ->add('password', [
                'characters' => [
                    'rule'    => 'alphaNumeric',
                    'message' => 'Username is alphanumeric only'
                ],
                'minLength'  => [
                    'rule'    => ['minLength', 3],
                    'last'    => TRUE,
                    'message' => 'Please enter the password within 3-20 characters'
                ],
                'maxLength'  => [
                    'rule'    => ['maxLength', 20],
                    'message' => 'Please enter the password within 3-20 characters'
                ]
            ]);

        $validator
            ->notEmpty('name', ['message' => 'Name is required'])
            ->add('name', [
                'maxLength' => [
                    'rule'    => ['maxLength', 50],
                    'message' => 'Please enter your name within 50 characters'
                ]
            ]);

        return $validator;
    }

    /**
     * @param Validator $validator
     * @return Validator
     */
    public function validationEditUsers(Validator $validator) {
        $validator
            ->add('password', [
                'minLength' => [
                    'rule'    => ['minLength', 3],
                    'last'    => TRUE,
                    'message' => 'Please enter the password within 3-20 characters'
                ],
                'maxLength' => [
                    'rule'    => ['maxLength', 20],
                    'message' => 'Please enter the password within 3-20 characters'
                ]
            ]);
        $validator
            ->notEmpty('name', ['message' => 'Name is required'])
            ->add('name', [
                'maxLength' => [
                    'rule'    => ['maxLength', 50],
                    'message' => 'Please enter your name within 50 characters'
                ]
            ]);

        return $validator;
    }

    public function beforeSave($event, $entity){
        $objHasher = new DefaultPasswordHasher();
        $entity->password = $objHasher->hash($entity->password);
    }
}
