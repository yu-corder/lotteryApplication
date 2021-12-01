<?php
namespace App\Controller;

use App\Controller\AppController;

class HelloController extends AppController {

    public function index() {
        $this->set('header', ['subtitle' => 'from Controller with Love♡']);
        $this->set('footer', ['copyright' => '名無しの権平']);
        $this->viewBuilder()->setLayout('hello');
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
