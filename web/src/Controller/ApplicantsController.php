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
        }
        $this->set('header', ['subtitle' => 'LIVE模擬抽選アプリ']);
        $this->set('footer', ['copyright' => 'yu-yu']);
        $this->set('data', $data);
        $this->viewBuilder()->setLayout('lotteryapp');
    }

    public function new() {
        // 保存するデータ(２つ)
        $data = [];
        for ($i = 1; $i < 30001; $i++) {
            $data = [
                [
                    'name' => 'test' . $i
                ]
            ];
        }
        $data = [
            [
                'title' => 'First post',
                'published' => 1
            ],
            [
                'title' => 'Second post',
                'published' => 1
            ],
        ];
        // 実行クエリ
        $query = $this->Applicants->query();
        $query->insert(['name']);
        // dataの数だけvalues追加
        foreach ($data as $d) {
            $query->values($d);
        }
        // 実行
        $query->execute();
    }
}
