<?php
class Login_Model extends Model
{
    public function __construct() {
        parent::__construct();
    }
    public function run() {
        $sth = $this->db->prepare("SELECT id FROM users WHERE login = :login AND password = MD5(:password)");
        $sth->execute(array(
            ':login' => $_POST['login'],
            ':password' => $_POST['password']
        ));

        $data = $sth->fetchAll();
        $count = $sth->rowCount();

        if($count > 0) {
            Session::init();
            Session::set('loggedIn', true);
            Session::set('manager_id', $data[0]['id']);
            header('Location:../task');
        } else {
            header('Location:../login');
        }
    }
}