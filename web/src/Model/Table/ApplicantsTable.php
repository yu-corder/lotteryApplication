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

    //応募者テーブルの中からランダムに3万人抽出
    public function findRandom(Query $query, array $options) {
        $rands = [];
        $min = 1;
        $max = 9;
        for($i = $min; $i <= $max; $i++){
            while(true){
                /** 一時的な乱数を作成 */
                $tmp = mt_rand($min, $max);

                /*
                * 乱数配列に含まれているならwhile続行、
                * 含まれてないなら配列に代入してbreak
                */
                if(!in_array($tmp, $rands) ){
                    $rands[] = $tmp;
                    break;
                }
            }
        }
        $random = join(",", $rands);
        $connection = ConnectionManager::get('default');
        $sql = "SELECT * FROM lotteryapp.applicants WHERE id IN ({$random})";
        $rc = $connection->execute($sql)->fetchAll('assoc');
        return $rc;
    }

    public function findSelectId(Query $query, array $options)
    {
        return $query->select(['id']);
    }
}
