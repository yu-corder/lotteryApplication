<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\I18n\Date;
use Cake\Datasource\ConnectionManager;

class ApplicantsTable extends Table {

    public function initialize(array $config) {
        parent::initialize($config);
        $this->setTable('applicants');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }

    //応募者テーブルの中からランダムに会場のフルキャパの人数分抽出
    //応募者の人数よりも会場キャパの人数が多いなら全員当選
    //ただし、重複応募、ブラックリスト排除
    public function findRandom(Query $query, array $options) {
        if ($options['winner_cap'] < 30000) {
            $connection = ConnectionManager::get('default');
            $sql = "SELECT id FROM lotteryapp.applicants WHERE  id NOT IN (SELECT id FROM lotteryapp.applicants WHERE name IN (SELECT accompanying_person_name FROM applicants WHERE accompanying_person_name <> '') or accompanying_person_name IN (SELECT name FROM applicants WHERE name IN (SELECT accompanying_person_name FROM applicants WHERE accompanying_person_name <> '')))";
            $rc = $connection->execute($sql)->fetchAll('assoc');
            $rc = count($rc);
            // $rands = [];
            // $min = 1;
            // $max = 30000;
            // $count = 0;
            // $winner_cap = $options['winner_cap'];
            // while ($count <= $winner_cap) {
            //     $tmp = mt_rand($min, $max);
            //     if(!in_array($tmp, $rands)){
            //         $rands[] = $tmp;
            //         $count++;
            //     }
            // }
            // $random = join(",", $rands);
            // $connection = ConnectionManager::get('default');
            // $sql = "SELECT id FROM lotteryapp.applicants WHERE  id NOT IN (SELECT id FROM lotteryapp.applicants WHERE name IN (SELECT accompanying_person_name FROM applicants WHERE accompanying_person_name <> '') or accompanying_person_name IN (SELECT name FROM applicants WHERE name IN (SELECT accompanying_person_name FROM applicants WHERE accompanying_person_name <> '')))";
            // $rc = $connection->execute($sql)->fetchAll('assoc');
            return $rc;
        } else {
            $connection = ConnectionManager::get('default');
            $sql = "SELECT * FROM lotteryapp.applicants WHERE id NOT IN (SELECT id FROM lotteryapp.applicants WHERE name IN (SELECT accompanying_person_name FROM applicants WHERE accompanying_person_name <> '') or accompanying_person_name IN (SELECT name FROM applicants WHERE name IN (SELECT accompanying_person_name FROM applicants WHERE accompanying_person_name <> '')))";
            $rc = $connection->execute($sql)->fetchAll('assoc');
            return $rc;
        }
    }
}
