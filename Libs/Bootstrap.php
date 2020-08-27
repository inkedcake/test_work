<?php
class Bootstrap
{
    public function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;

        $url = rtrim($url, '/');
        $url = explode('/', $url);

        if(empty($url[0])) {
            require 'Controllers/indexController.php';
            $controller = new Index();
            $controller->index();

            return false;
        }
        $file = 'Controllers/'.$url[0].'Controller.php';
        if(file_exists($file)) {
            require $file;
        } else {
            require 'Controllers/errorsController.php';
            $controller = new Errors;
            return false;
        }
        $class_name = ucfirst($url[0]);
        $controller = new $class_name;
        $controller->loadModel($url[0]);
        if(isset($url[2])) {
            if(method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                echo 'Error!';
            }
        } else {
            if(isset($url[1])) {
                $controller->{$url[1]}();
            } else {
                $controller->index();
            }
        }
//        if(isset($url[2])) {
//            $url1=ucfirst($url[1]);
//            $controller->$url1($url[2]);
//        } else {
//            if(isset($url[1])) {
//                $url1=ucfirst($url[1]);
//                $controller->$url1();
//            }
//        }
    }
}