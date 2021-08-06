<?php
namespace Model;


use PDO;

class Nominations
{
    public function listevents($db)
    {
        $sql = "SELECT * FROM nomination_events";
        $pdostm = $db->prepare($sql);
        $pdostm->execute();

        return $pdostm->fetchall(PDO::FETCH_OBJ);
    }
    public function eventdetails($db,$id)
    {
        $sql = "SELECT * FROM nomination_events WHERE nomination_id = :id";
        $pdostm = $db->prepare($sql);
        $pdostm->BindParam(':id',$id);
        $pdostm->execute();

        return $pdostm->fetch(PDO::FETCH_OBJ);
    }
    public function deletevent($db,$id)
    {
        $sql = "DELETE FROM nomination_events WHERE nomination_id = :id";

        $pst = $db->prepare($sql);
        $pst->bindParam(':id',$id);
        return $pst->execute();
    }
    public function updateleague($db,$name,$bio,$release,$nomination,$id)
    {
        $sql = "UPDATE nomination_events
        SET name = :name,
            bio = :bio,
            release_date = :release,
            nomination_date = :nomination
            WHERE nomination_id = :id";

        $pst = $db->prepare($sql);

        $pst->bindParam(':name',$name);
        $pst->bindParam(':bio',$bio);
        $pst->bindParam(':release',$release);
        $pst->bindParam(':nomination',$nomination);
        $pst->bindParam(':id',$id);

        return $pst->execute();
    }



    public function addevents($db,$name,$bio,$release,$nomination){
        $sql = "INSERT INTO nomination_events (name, bio, release_date,nomination_date) 
              VALUES (:name, :bio, :release_date, :nomination_date) ";

        $pst = $db->prepare($sql);
        $pst->bindParam(':name', $name);
        $pst->bindParam(':bio', $bio);
        $pst->bindParam(':release_date', $release);
        $pst->bindParam(':nomination_date', $nomination);

        $count = $pst->execute();
        return $count;

    }
}