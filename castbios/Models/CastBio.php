<?php
namespace Model;
class CastBio {
    public function getAllCastBios($dbcon) {
        $sql = "Select * FROM cast_bios";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        // assign to a variable as an object
        $castbios = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $castbios;
    }
    public function getCastBioById($id, $db) {
        $sql = "Select * FROM cast_bios WHERE bio_id = :id";
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();
        return $pdostm->fetch(\PDO::FETCH_OBJ);
    }

    public function deleteCastBio($id, $db) {
        $sql = "DELETE FROM cast_bios WHERE bio_id = :id";
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $count = $pdostm->execute();
        return $count;
    }
    public function addCastBio($name, $birthday, $birthplace, $bio, $trivia, $db) {
        $sql = "INSERT INTO cast_bios(name, birthday, birthplace, bio, trivia) values (:name, :birthday, :birthplace, :bio, :trivia)";
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':name', $name);
        $pdostm->bindParam(':birthday', $birthday);
        $pdostm->bindParam(':birthplace', $birthplace);
        $pdostm->bindParam(':bio', $bio);
        $pdostm->bindParam(':trivia', $trivia);
        $count = $pdostm->execute();
        return $count;
    }
    public function updateCastBio($id, $name, $birthday, $birthplace, $bio, $trivia, $db) {
        $sql = "UPDATE cast_bios
                SET name = :name,
                    birthday = :birthday,
                    birthplace = :birthplace,
                    bio = :bio,
                    trivia = :trivia
                WHERE bio_id = :id";
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->bindParam(':name', $name);
        $pdostm->bindParam(':birthday', $birthday);
        $pdostm->bindParam(':birthplace', $birthplace);
        $pdostm->bindParam(':bio', $bio);
        $pdostm->bindParam(':trivia', $trivia);
        $count = $pdostm->execute();
        return $count;
    }
}