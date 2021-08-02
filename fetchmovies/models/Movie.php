<?php
namespace models;

class Movie{
    private $movieName, $director, $actors, $releaseYear, $genreID;

    public function __construct($movieName, $director, $actors, $releaseYear, $genreID)
    {
        $this->movieName = $movieName;
        $this->director = $director;
        $this->actors = $actors;
        $this->releaseYear = $releaseYear;
        $this->genreID = $genreID;
    }

    public function getMovieName(){
        return $this->movieName;
    }
    public function getDirector(){
        return $this->director;
    }
    public function getActors(){
        return $this->actors;
    }
    public function getReleaseYear(){
        return $this->releaseYear;
    }
    public function getGenreID(){
        return $this->genreID;
    }
}