<?php
class Register_Model extends Model
{
    public function __construct() {
        parent::__construct();
    }
    public function run() {
        $sth = $this->db->prepare(
            "INSERT INTO users (full_name,login,password,position,phone) 
                        VALUES (:full_name,:login,:password,:position,:phone); ");
        if ($_POST['login'] != '' || $_POST['password'] == $_POST['password2']){
            if ($sth->execute(array(
                ':full_name' => $_POST['full_name']? $_POST['full_name']:null,
                ':login' => $_POST['login'],
                ':password' => MD5($_POST['password']),
                ':position' => 'manager',
                ':phone' => $_POST['phone']? $_POST['phone']:null,
            ))){
                header('Location:../index');
            }else{
                header('Location:../register');

            }
        }
    }
}