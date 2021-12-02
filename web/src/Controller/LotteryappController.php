<?php
namespace App\Controller;

use App\Controller\AppController;

class LotteryappController extends AppController {

    public function index() {
        $this->set('header', ['subtitle' => 'LIVE模擬抽選アプリ']);
        $this->set('footer', ['copyright' => 'yu-yu']);
        $this->viewBuilder()->setLayout('lotteryapp');
    }

    public function form() {
        $this->viewBuilder()->autoLayout(false);
        $name = $this->request->data['name'];
        $mail = $this->request->data['mail'];
        $age = $this->request->data['age'];
        $res = 'こんにちは' . $name . '(' . $age . ')さん.メールアドレスは' . $mail . 'ですね？';
        $values = [
            'title' => 'Result',
            'message' => $res
        ];
        $this->set('values', $values);
    }
}
