<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PeopleTable extends Table {

    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('people');
        $this->setDisplayField('mail');
        $this->setPrimaryKey('id');
        $this->hasMany('Messages');
    }

    public function findMe(Query $query, array $options) {
        $me = $options['me'];
        return $query->where(['name like' => '%' . $me . '%'])
            ->orWhere(['mail like' => '%' . $me . '%'])
            ->order(['age' => 'asc']);
    }

    public function findByAge(Query $query, array $options) {
        return $query->order(['age' => 'asc'])->order(['name' => 'asc']);
    }

    public function validationDefault(Validator $validator) {
        $validator
            ->integer('id', 'IDは数値で入力ください。')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name', '名前は必須項目です。')
            ->requirePresence('name', 'create')
            ->notBlank('name')
            ->notEmpty('name', '名前は必須項目です。');

        $validator
            ->scalar('mail', 'テキストを入力ください。')
            ->allowEmpty('mail')
            ->email('mail', false, 'メールアドレスではありません。');

        $validator
            ->integer('age', '整数を入力ください。')
            ->requirePresence('age', 'create')
            ->notEmpty('age')
            ->greaterThanOrEqual('age', 0, '0以上の値を記入ください。');

        return $validator;
    }
}
