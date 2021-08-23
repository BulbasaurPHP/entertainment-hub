<?php


namespace Model;

use PDO;
class Playlist
{
    public function addplaylist($db){
        $sql = 'SELECT * FROM movies';
        $pdostm = $db->prepare($sql);
        $pdostm->execute();

        return $pdostm->fetchall(PDO::FETCH_OBJ);
    }

    public function listplaylist($db){
        $sql = 'SELECT DISTINCT(playlist.playlist) FROM playlist';
        $pdostm = $db->prepare($sql);
        $pdostm->execute();

        return $pdostm->fetchall(PDO::FETCH_OBJ);
    }

    public function playlistbyname($db,$name){
        $sql = 'SELECT * FROM playlist where playlist.playlist = :name';
        $pdostm = $db->prepare($sql);
        $pdostm = $db->BindParam(':name',$name);
        $pdostm->execute();

        return $pdostm->fetchall(PDO::FETCH_OBJ);
    }

    public function deleteplaylist($db,$name){
        $sql = 'DELETE FROM playlist where playlist.playlist = :name';
        $pdostm = $db->prepare($sql);
        $pdostm = $db->BindParam(':name',$name);
        $pdostm->execute();

        return $pdostm->fetchall(PDO::FETCH_OBJ);
    }

    public function addtoplaylist($db,$movie,$name){
        $sql = "INSERT into playlist values (:movie,:name) ";
        $pdostm = $db->prepare($sql);
        $pdostm = $db->BindParam(':movie',$movie);
        $pdostm = $db->BindParam(':name',$name);
        $pdostm->execute();
    }
}