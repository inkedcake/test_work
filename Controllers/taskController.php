<?php
/**
 * Created by PhpStorm.
 * User: InkedCake
 * Date: 19.08.2020
 * Time: 0:15
 */


class Task extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $users = $this->model->getUsers();
        $managers = [];
        $clients = [];
        foreach ($users as $user) {
            if ($user['position'] == 'manager') {
                $managers[$user['id']] = $user;
            } elseif ($user['position'] == 'customer') {
                $clients[$user['id']] = $user;
            }
        }
        $userAssignedTasks = $this->model->getUserAssignedTasks();
        $userAppointedTasks = $this->model->getUserAppointedTasks();
        $this->view->clients = $clients;
        $this->view->managers = $managers;
        $this->view->userAssignedTasks = $userAssignedTasks;
        $this->view->userAppointedTasks = $userAppointedTasks;

        $this->view->render('task/index');
    }

    public function clients()
    {
        $clients = $this->model->getClients();
        $this->view->clients = $clients;

        $this->view->render('task/clients');
    }

    public function logout()
    {
        Session::destroy();
        header('Location: ../index');
        exit();
    }

    public function addTask()
    {
        $this->model->addTask();
    }

    public function addClients()
    {
        $this->model->addClients();
    }

    public function deleteTask()
    {
        $this->model->deleteTask($_GET['id']);
        header('Location: ../task');

    }
}
