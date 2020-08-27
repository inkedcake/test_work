<?php
/**
 * Created by PhpStorm.
 * User: InkedCake
 * Date: 19.08.2020
 * Time: 0:15
 */


class Login extends Controller {
    public function __construct() {
        parent::__construct();
    }
   public function index() {
        $this->view->render('login/index');
    }
    public function run() {
        $this->model->run();
    }
}
