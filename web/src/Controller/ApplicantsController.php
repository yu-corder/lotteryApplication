<?php
namespace App\Controller;

use App\Controller\AppController;

class ApplicantsController extends AppController {

    public function index() {
        $data = $this->Applicants->find('all');
        $this->set('header', ['subtitle' => 'LIVE模擬抽選アプリ']);
        $this->set('footer', ['copyright' => 'yu-yu']);
        $this->set('data', $data);
        $this->viewBuilder()->setLayout('lotteryapp');
    }
}
