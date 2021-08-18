<?php
namespace Models;


use PDO;

class Nominations
{
    public function listEvents($dbcon)
    {
        $sql = "SELECT * FROM nomination_event";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        $events = $pdostm->fetchall(PDO::FETCH_OBJ);
        return $events;
    }

    public function listEventById($id, $db)
    {
        $sql = "SELECT * FROM nomination_event WHERE nomination_id = :id";
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();
        return $pdostm->fetch(\PDO::FETCH_OBJ);
    }


    public function deleteEvent($db, $id)
    {
        $sql = "DELETE FROM nomination_event WHERE nomination_id = :id";
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $count = $pdostm->execute();
        return $count;
    }

    public function updateEvents($id, $name, $bio, $release, $nomination, $db)
    {
        $sql = "UPDATE nomination_event
        SET name = :name,
            bio = :bio,
            release_date = :release,
            nomination_date = :nomination
            WHERE nomination_id = :id";

        $pst = $db->prepare($sql);

        $pst->bindParam(':name', $name);
        $pst->bindParam(':bio', $bio);
        $pst->bindParam(':release', $release);
        $pst->bindParam(':nomination', $nomination);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }

    public function addEvents($db, $name, $bio, $release, $nomination)
    {
        $sql = "INSERT INTO nomination_event (name, bio, release_date,nomination_date) 
              VALUES (:name, :bio, :release_date, :nomination_date) ";

        $pst = $db->prepare($sql);
        $pst->bindParam(':name', $name);
        $pst->bindParam(':bio', $bio);
        $pst->bindParam(':release_date', $release);
        $pst->bindParam(':nomination_date', $nomination);

        $count = $pst->execute();
        return $count;

    }

    public function addtrailer($db, $nomination_id, $name, $location)
    {
        $sql = "INSERT INTO trailer(nomination_id,name,location) 
              VALUES (:nomination_id, :name, :location) ";

        $pst = $db->prepare($sql);
        $pst->bindParam(':nomination_id', $nomination_id);
        $pst->bindParam(':name', $name);
        $pst->bindParam(':location', $location);

        $count = $pst->execute();
        return $count;
    }

    public function listtrailer($dbcon)
    {
        $sql = "SELECT * FROM trailer";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        $trailers = $pdostm->fetchall(PDO::FETCH_OBJ);
        return $trailers;
    }
}