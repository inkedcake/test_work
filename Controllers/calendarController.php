<?php
/**
 * Created by PhpStorm.
 * User: InkedCake
 * Date: 19.08.2020
 * Time: 0:15
 */


class Calendar extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $notes = $this->model->getNotes();
        $clients = $this->model->getClients();
        $this->view->clients = $clients;
        $this->view->notes = $notes;

        $this->view->render('calendar/index');
    }


    public function addNote()
    {
        $this->model->addNote();
    }

    public function deleteNote()
    {
        $this->model->deleteNote($_GET['id']);
        header('Location: ../calendar');

    }
}
