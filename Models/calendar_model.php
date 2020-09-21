<?php
/**
 * Created by PhpStorm.
 * User: InkedCake
 * Date: 25.08.2020
 * Time: 23:19
 */

class Calendar_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getNotes()
    {
        $sth = $this->db->prepare("SELECT * FROM calendar WHERE user_id=:user_id");
        $sth->execute(array(
            ':user_id' => $_SESSION['manager_id']));

        $data = $sth->fetchAll();
        return $data;
    }

    public function deleteNote($id)
    {
        $task = $this->db->prepare("DELETE FROM calendar WHERE id=:id");
        $task->bindParam(":id", $id, PDO::PARAM_INT);
        $task->execute();
    }

    public function addNote()
    {
        $sth = $this->db->prepare(
            "INSERT INTO calendar (user_id,full_name,phone,remind_at)
                        VALUES (:user_id,:full_name,:phone,:remind_at); ");
        if ($sth->execute(array(
            ':user_id' => $_SESSION['manager_id'],
            ':full_name' => $_POST['full_name'],
            ':phone' => $_POST['phone'],
            ':remind_at' => $_POST['remind_at'],
        ))) {
            return true;
        }

        return false;
    }

    public function getClients()
    {
        $sth = $this->db->prepare("SELECT * FROM users WHERE position = 'customer'");
        $sth->execute();

        $data = $sth->fetchAll();
        return $data;
    }
}