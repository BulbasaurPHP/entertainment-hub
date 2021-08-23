<?php


namespace Model;


use PDO;

class Movie
{
    public function listmovies($db){
        $sql = "SELECT distinct(movies.name) FROM movies";
        $pdostm = $db->prepare($sql);
        $pdostm->execute();

        return $pdostm->fetchall(\PDO::FETCH_OBJ);
    }
}