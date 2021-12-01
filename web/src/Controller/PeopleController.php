<?php
namespace App\Controller;

use App\Controller\AppController;

class PeopleController extends AppController {

    public $paginate = [
        'finder' => 'byAge',
        'limit' => 5,
        'contain' => ['Messages'],
    ];

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function index() {
        $data = $this->paginate($this->People);
        $this->set('data', $data);
    }

    public function add() {
        $msg = "please type your personal data...";
        $entity = $this->People->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data['People'];
            $entity = $this->People->newEntity($data);
            if ($this->People->save($entity)) {
                return $this->redirect(['action' => 'index']);
            }
            $msg = 'Error was occured...';
        }
        $this->set('msg', $msg);
        $this->set('entity', $entity);
    }

    public function create() {
        if ($this->request->is('post')) {
            $data = $this->request->data['People'];
            $entity = $this->People->newEntity($data);
            $this->People->save($entity);
        }
        return $this->redirect(['action' => 'index']);
    }

    public function edit() {
        $id = $this->request->query['id'];
        $entity = $this->People->get($id);
        $this->set('entity', $entity);
    }

    public function update() {
        // var_dump($_POST);
        // exit;
        if ($this->request->is('post')) {
            $data = $this->request->data['People'];
            $entity = $this->People->get($data['id']);
            $this->People->patchEntity($entity, $data);
            $this->People->save($entity);
        }
        return $this->redirect(['action' => 'index']);
    }

    // public function delete() {
    //     $id = $this->request->query['id'];
    //     $entity = $this->People->get($id);
    //     $this->set('entity', $entity);
    // }

    public function destroy() {
        $this->response->type('json');
        if ($this->request->is('post')) {
            $entity = $this->People->get($_POST['id']);
            $this->People->delete($entity);
        } else {
            return $this->redirect(['action' => 'index']);
        }
        $response = [
            'status' => true
        ];
        $this->response->body(json_encode($response));
        return $this->response;


        // return $this->response;
        // return "A";
        // if ($this->request->is('post')) {
        //     echo "A";
        //     exit;
        //     // $data = $this->request->data['People'];
        //     // $entity = $this->People->get($data['id']);
        //     // $this->People->delete($entity);
        // }
        // return $this->redirect(['action' => 'index']);
    }
}
