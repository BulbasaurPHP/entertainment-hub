<?php


namespace Model;


use \PDO;

class Participant
{
    public function listparticipants($db){
        $sql = "SELECT * FROM participants";
        $pdostm = $db->prepare($sql);
        $pdostm->execute();

        return $pdostm->fetchall(\PDO::FETCH_OBJ);
    }

    public function  finduser($email , $db){
        $sql = "SELECT * FROM user WHERE email = :email";
        $pdostm = $db->prepare($sql);
        $pdostm->BindParam(':email',$email);
        $pdostm->execute();

        return $pdostm->fetch(PDO::FETCH_OBJ);
    }
}