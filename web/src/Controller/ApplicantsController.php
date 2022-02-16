<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

class ApplicantsController extends AppController {

    public function index() {
        $connection = ConnectionManager::get('default');
        if (isset($_POST['applicants_num']) && isset($_POST['winner_cap'])) {
            $applicants_num = $_POST['applicants_num'];
            $winner_cap = $_POST['winner_cap'];
            switch (true) {
                case $applicants_num == 3:
                  $data = $this->Applicants->find('random', ['winner_cap' => $winner_cap]);
                  break;
                case $applicants_num == 5:
                    //応募者テーブルの中からランダムに会場のフルキャパの人数分抽出
                    //応募者の人数よりも会場キャパの人数が多いなら全員当選
                    //ただし、重複応募、ブラックリスト排除
                    if ($winner_cap < 50000) {
                        $rands = [];
                        $min = 2;
                        $max = 50001;
                        $count = 0;
                        while ($count <= $winner_cap) {
                            $tmp = mt_rand($min, $max);
                            if(!in_array($tmp, $rands)){
                                $rands[] = $tmp;
                                $count++;
                            }
                        }
                        $random = join(",", $rands);
                        $connection = ConnectionManager::get('default');
                        $sql = "SELECT * FROM lotteryapp.five_applicants WHERE id IN ({$random})";
                        $data = $connection->execute($sql)->fetchAll('assoc');

                    } else {
                        $connection = ConnectionManager::get('default');
                        $sql = "SELECT * FROM lotteryapp.five_applicants";
                        $data = $connection->execute($sql)->fetchAll('assoc');
                    }
                    break;
                case $applicants_num == 10;
                   //応募者テーブルの中からランダムに会場のフルキャパの人数分抽出
                   //応募者の人数よりも会場キャパの人数が多いなら全員当選
                   //ただし、重複応募、ブラックリスト排除
                   if ($winner_cap < 1000000) {
                        $rands = [];
                        $min = 3;
                        $max = 100002;
                        $count = 0;
                        while ($count <= $winner_cap) {
                            $tmp = mt_rand($min, $max);
                            if(!in_array($tmp, $rands)){
                                $rands[] = $tmp;
                                $count++;
                            }
                        }
                        $random = join(",", $rands);
                        $connection = ConnectionManager::get('default');
                        $sql = "SELECT * FROM lotteryapp.ten_applicants WHERE id IN ({$random})";
                        $data = $connection->execute($sql)->fetchAll('assoc');

                    } else {
                        $connection = ConnectionManager::get('default');
                        $sql = "SELECT * FROM lotteryapp.ten_applicants";
                        $data = $connection->execute($sql)->fetchAll('assoc');
                    }
                    break;
            }
        } else {
            return $this->redirect(
                ['controller' => 'Lotteryapp', 'action' => 'index']
            );
        }
        $this->set('header', ['subtitle' => 'LIVE模擬抽選アプリ']);
        $this->set('footer', ['copyright' => 'yu-yu']);
        $this->set('data', $data);
        $this->viewBuilder()->setLayout('lotteryapp');
    }

    public function new() {
        /*新規データ追加 応募者テーブル数が多いため自動で追加*/
        $this->autoRender = false;
        $this->loadModel('Ten_applicants');
        $data = [];
        for ($i = 3; $i < 100001; $i++) {
            $user = ['name' => 'test' . $i];
            $data[] = $user;
        }
        // 実行クエリ
        $query = $this->Ten_applicants->query();
        $query->insert(['name']);
        // dataの数だけvalues追加
        foreach ($data as $d) {
            $query->values($d);
        }
        // 実行
        $query->execute();
        echo "A";
    }

    public function addPerson() {
        /*同行者追加*/
        $this->autoRender = false;
        $this->loadModel('Applicants');
        $data = [];
        $data_2 = [];
        for ($i = 15; $i < 30001; $i + 15) {
            $user = ['accompanying_person_name' => 'test' . $i];
            $data[] = $user;
            $id = ['id' => $i - 15];
            $data_2[] = $id;
        }
        var_dump($data);
        exit;
        // 実行クエリ
        $query = $this->Applicants->query();
        $query->update();
        // $query->set(['accompanying_person_name' => 'test3'])->where(['id' => 1]);
        // dataの数だけvalues追加
        foreach ($data as $k => $v) {
            $query->set($v)->where($data_2[$k]);
        }
        // 実行
        $query->execute();
        echo "A";
    }

    //リンクが有効かチェック
    //環境を作るのが面倒だったためすでに作成済みのここに追加...
    public function search() {
        $this->autoRender = false;
        $data = [
        ];

        foreach ($data as $v) {
            $url = "https://pigment.tokyo/ja/feature/detail?id=";
            $url_2 = $url . $v;
            $conn = curl_init(); // cURLセッションの初期化
            curl_setopt($conn, CURLOPT_URL, $url_2); //　取得するURLを指定
            curl_setopt($conn, CURLOPT_HTTPHEADER, array());
            curl_setopt($conn, CURLOPT_HEADER, 1);
            curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
            $res =  curl_exec($conn);
            $info = curl_getinfo ($conn);
            $http_code = $info['http_code'];
            curl_close($conn); //セッションの終了
            if ($http_code != '200') {
                echo $v . "\n";
                exit;
            }
        }

        echo "DD";
        exit;
    }
}
