<?php
namespace Model;


use PDO;

class leagues
{
    public function listleagues($db)
    {
        $sql = "SELECT * FROM leagues";
        $pdostm = $db->prepare($sql);
        $pdostm->execute();

        return $pdostm->fetchall(PDO::FETCH_OBJ);
    }
    public function leaguedetails($db,$id)
    {
        $sql = "SELECT * FROM leagues WHERE id = :id";
        $pdostm = $db->prepare($sql);
        $pdostm->BindParam(':id',$id);
        $pdostm->execute();

        return $pdostm->fetch(PDO::FETCH_OBJ);
    }
    public function deleteleague($db,$id)
    {
        $sql = "DELETE FROM leagues WHERE id = :id";

        $pst = $db->prepare($sql);
        $pst->bindParam(':id',$id);
        return $pst->execute();
    }
    public function updateleague($db,$name,$prize,$winner,$id)
    {
        $sql = "UPDATE leagues
        SET name = :name,
            total_prize = :prize,
            total_winners = :winner
            WHERE id = :id";

        $pst = $db->prepare($sql);

        $pst->bindParam(':name',$name);
        $pst->bindParam(':prize',$prize);
        $pst->bindParam(':winner',$winner);
        $pst->bindParam(':id',$id);

        return $pst->execute();
    }
    public function createleague($dbcon,$name,$prize,$winner)
    {
        $sql = "INSERT into leagues (name,total_prize,total_winners)
            VALUES (:name,:prize,:winner)";

        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':name' , $name);
        $pst->bindParam(':prize' , $prize);
        $pst->bindParam(':winner' , $winner);

        return $pst->execute();
    }

    public function addparticipant($db,$name,$email,$contest,$rank,$prize)
    {
        $sql = "INSERT into participants(name,email,p_rank,prize,contest)
            VALUES(:name,:email,:rank,:prize,:contest)";

        $pst = $db->prepare($sql);
        $pst->bindParam(':name',$name);
        $pst->bindParam(':p_rank',$rank);
        $pst->bindParam(':email',$email);
        $pst->bindParam(':prize',$prize);
        $pst->bindParam(':contest',$contest);

        return $pst->execute();
    }

    public function adduser($db,$name,$email,$addr,$pass,$role){
        $sql = "INSERT into user(name,email,address,role,passwordhash)
            VALUES(:name,:email,:addr,:pass,:role)";

        $pst = $db->prepare($sql);
        $pst->bindParam(':name',$name);
        $pst->bindParam(':email',$email);
        $pst->bindParam(':addr',$addr);
        $pst->bindParam(':pass',$pass);
        $pst->bindParam(':role',$role);

        return $pst->execute();

    }

    public function listmovies($db){
        $sql = "SELECT * FROM movies";
        $pdostm = $db->prepare($sql);
        $pdostm->execute();

        return $pdostm->fetchall(PDO::FETCH_OBJ);
    }
}