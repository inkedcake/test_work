<?php
/**
 * Created by PhpStorm.
 * User: InkedCake
 * Date: 19.08.2020
 * Time: 0:15
 */


class Dashboard extends Controller {
    public function __construct()
    {
        parent::__construct();

    }
    public function index() {
        $users = $this->model->getUsers();
        $managers = [];
        $clients = [];
        foreach ($users as $k=> $user){
            if ($user['position']=='manager'){
                $managers[$k] = $user;
            }elseif ($user['position'] == 'customer'){
                $clients[$k] = $user;
            }
        }
        $tasks = $this->model->getTasks();
        $this->view->clients = $clients;
        $this->view->managers = $managers;
        $this->view->tasks = $tasks;
        $this->view->render('dashboard/index');
    }
    public function clients() {
        $clients = $this->model->getClients();
        $this->view->clients = $clients;

        $this->view->render('dashboard/clients');
    }
    public function logout() {
        Session::destroy();
        header('Location: ../index');
        exit();
    }
    public function addTask(){
        $this->model->addTask();
    }
    public function addClients(){
        $this->model->addClients();
    }
    public function deleteTask(){
        $this->model->deleteTask($_GET['id']);
            header('Location: ../dashboard');

    }
}
