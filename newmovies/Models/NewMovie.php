<?php
namespace Model;
class NewMovie {
    public function getAllNewMovies($dbcon) {
        $sql = "Select * FROM newest_movies ORDER BY release_date DESC";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        // assign to a variable as an object
        $newmovies = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $newmovies;
    }
    public function getNewMovieById($id, $db) {
        $sql = "SELECT * FROM newest_movies WHERE movie_id = :id";
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();
        return $pdostm->fetch(\PDO::FETCH_OBJ);
    }

    public function deleteNewMovie($id, $db) {
        $sql = "DELETE FROM newest_movies WHERE movie_id = :id";
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $count = $pdostm->execute();
        return $count;
    }
    public function addNewMovie($title, $release_date, $db) {
        $sql = "INSERT INTO newest_movies(title, release_date) values (:title, :release_date)";
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':title', $title);
        $pdostm->bindParam(':release_date', $release_date);
        $count = $pdostm->execute();
        return $count;
    }
    public function updateNewMovie($id, $title, $release_date, $db) {
        $sql = "UPDATE newest_movies
                SET title = :title,
                    release_date = :release_date
                WHERE movie_id = :id";
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->bindParam('title', $title);
        $pdostm->bindParam(':release_date', $release_date);
        $count = $pdostm->execute();
        return $count;
    }
}