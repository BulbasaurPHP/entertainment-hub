<?php
namespace models;
use models\Database;
require_once 'vendor/autoload.php';

class MovieDB{
    public function addMovie($movie){
        $db = Database::getDB();

        $mname = $movie->getMovieName();
        $director = $movie->getDirector();
        $actors = $movie->getActors();
        $releaseYear = $movie->getReleaseYear();
        $genreID = $movie->getGenreID();

        $query = 'INSERT INTO movies
                     (name, director, actors, release_year, genre_id)
                  VALUES
                     (:movieName, :director, :actors, :release_year, :genre_id)';
        $statement = $db->prepare($query);
        $statement->bindValue(':movieName', $mname);
        $statement->bindValue(':director', $director);
        $statement->bindValue(':actors', $actors);
        $statement->bindValue(':release_year', $releaseYear);
        $statement->bindValue(':genre_id', 1);
        $statement->execute();
        $statement->closeCursor();

    }
}