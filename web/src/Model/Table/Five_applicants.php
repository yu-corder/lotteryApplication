<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class Five_applicantsTable extends Table {

    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('five_applicants');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }
}
