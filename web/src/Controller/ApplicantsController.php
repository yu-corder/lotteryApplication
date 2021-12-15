<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ApplicantsController extends AppController {

    public function index() {
        if (isset($_POST['applicants_num']) && isset($_POST['winner_cap'])) {
            $applicants_num = $_POST['applicants_num'];
            $winner_cap = $_POST['winner_cap'];
            switch (true) {
                case $applicants_num == 3:
                  $data = $this->Applicants->find('all');
                  break;
                case $applicants_num == 5:
                  $this->loadModel('Five_applicants');
                  $data = $this->Five_applicants->find('all');
                  break;
                case $applicants_num == 10;
                  $this->loadModel('Ten_applicants');
                  $data = $this->Ten_applicants->find('all');
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
        // 保存するデータ(２つ)
        $data = [];
        for ($i = 3; $i < 10; $i++) {
            $user = ['name' => 'test' . $i];
            $data[] = $user;
        }
        // 実行クエリ
        $query = $this->Applicants->query();
        $query->insert(['name']);
        // dataの数だけvalues追加
        foreach ($data as $d) {
            $query->values($d);
        }
        // 実行
        $query->execute();
        echo "A";
    }
}
