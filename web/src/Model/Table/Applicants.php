<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ApplicantsTable extends Table {

    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('applicants');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }

    //応募者テーブルの中からランダムに3万人抽出
    // public function findRandom() {
    //     $random = [];
    //     for ($i = 1; $i < 10; $i++) {
    //         $random[] = $i;
    //     }
    //     random_int(0,9);
    // }
}
