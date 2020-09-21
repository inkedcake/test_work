<?php
/**
 * Created by PhpStorm.
 * User: InkedCake
 * Date: 25.08.2020
 * Time: 23:19
 */

class Task_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsers()
    {
        $sth = $this->db->prepare("SELECT id,full_name,phone,position FROM users");
        $sth->execute();

        $data = $sth->fetchAll();
        return $data;
    }

    public function deleteTask($id)
    {
        $task = $this->db->prepare("DELETE FROM tasks WHERE id=:id");
        $task->bindParam(":id", $id, PDO::PARAM_INT);
        $task->execute();
    }

    public function getUserAppointedTasks()
    {
        $sth = $this->db->prepare("SELECT * FROM tasks LEFT JOIN users ON tasks.client_id = users.id WHERE tasks.created_by = :manager_id AND tasks.manager_id != :manager_id");
        $sth->execute([
            ':manager_id' => $_SESSION['manager_id']
        ]);

        $data = $sth->fetchAll();
        return $data;
    }

    public function getUserAssignedTasks()
    {
        $sth = $this->db->prepare("SELECT * FROM tasks LEFT JOIN users ON tasks.client_id = users.id WHERE tasks.manager_id = :manager_id");
        $sth->execute([
            ':manager_id' => $_SESSION['manager_id']
        ]);

        $data = $sth->fetchAll();
        return $data;
    }

    public function getClients()
    {
        $sth = $this->db->prepare("SELECT * FROM users WHERE position = 'customer'");
        $sth->execute();

        $data = $sth->fetchAll();
        return $data;
    }

    public function addTask()
    {
        $sth = $this->db->prepare(
            "INSERT INTO tasks (created_by,manager_id,client_id,text_task, date_time)
                        VALUES (:created_by,:manager_id,:client_id,:text_task,:date_time); ");
        if ($sth->execute(array(
            ':created_by' => $_SESSION['manager_id'],
            ':manager_id' => $_POST['manager_id'],
            ':client_id' => $_POST['client_id'],
            ':text_task' => $_POST['text_task'],
            ':date_time' => $_POST['date_time'],
        ))) {
            return true;
        }

        return false;
    }

    public function addClients()
    {
        $sth = $this->db->prepare(
            "INSERT INTO users (full_name,login,password,position,phone) 
                        VALUES (:full_name,:login,:password,:position,:phone); ");
        if ($sth->execute(array(
            ':full_name' => $_POST['full_name'],
            ':login' => $_POST['phone'],
            ':password' => MD5($_POST['phone']),
            ':position' => 'customer',
            ':phone' => $_POST['phone'],
        ))) {
            header('Location:../task/clients');
        }
    }
}