<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class Ten_applicantsTable extends Table {

    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('ten_applicants');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }
}
