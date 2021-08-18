<?php

namespace models;

use models\Database;

require_once 'vendor/autoload.php';

class MovieDB
{

    public function addMovie($movie)
    {
        $db = Database::getDB();

        $mname = $movie->getMovieName();
        $director = $movie->getDirector();
        $actors = $movie->getActors();
        $releaseYear = $movie->getReleaseYear();
        $genreID = $movie->getGenreID();
        $releaseDate = $movie->getReleaseDate();
        $posterIMG = $movie->getPosterIMG();

        $query = 'INSERT INTO movies
                     (name, director, actors, release_year, genre_id, release_date, poster_img)
                  VALUES
                     (:movieName, :director, :actors, :release_year, :genre_id, :release_date, :poster_img)';
        $statement = $db->prepare($query);
        $statement->bindValue(':movieName', $mname);
        $statement->bindValue(':director', $director);
        $statement->bindValue(':actors', $actors);
        $statement->bindValue(':release_year', $releaseYear);
        $statement->bindValue(':genre_id', 1);
        $statement->bindValue(':release_date', $releaseDate);
        $statement->bindValue(':poster_img', $posterIMG);
        $statement->execute();
        $statement->closeCursor();
    }

    public function getAllMovies()
    {
        $sql = "select * from movies";
        $db = Database::getDB();
        $statement = $db->prepare($sql);
        $statement->execute();

        // assign to a variable as an object
        $movies = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $movies;
    }

    public function deleteMovie($id)
    {
        $db = Database::getDB();
        $sql = "delete FROM movies WHERE id = :id";
        $statement = $db->prepare($sql);
        $statement->bindParam(':id', $id);
        $count = $statement->execute();
        return $count;
    }
}
