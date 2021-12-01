<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class MessagesTable extends Table {

    public function initialize(array $config) {
        parent::initialize($config);
        $this->setDisplayField('message');
        $this->belongsTo('People');
    }

    public function validationDefault(Validator $validator) {
        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->integer('person_id', 'person_idは整数で入力ください。')
            ->notEmpty('person_id', 'person_idは必ず記入ください');

        $validator
            ->scalar('message', 'テキストを入力ください。')
            ->requirePresence('message', 'create')
            ->notEmpty('message', 'メッセージは必ず記入してください');

        return $validator;
    }
}
