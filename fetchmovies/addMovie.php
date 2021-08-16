<?php

use models\Database;
use models\Movie;
use models\MovieDB;

require 'vendor/autoload.php';

// fetch the posted serialized json and process it
$movieArray = json_decode($_POST['serialValue']);
$movieDB = new MovieDB();

// loop thorugh all the movies posted and add it to DB
for ($i = 0; $i < Count($movieArray); $i++) {
    $movieObject = new Movie(
        $movieArray[$i]->movieTitle,
        $movieArray[$i]->director,
        $movieArray[$i]->actors,
        $movieArray[$i]->year,
        $movieArray[$i]->genre,
        $movieArray[$i]->date,
        $movieArray[$i]->poster,
    );
    $movieTemp = $movieDB->addMovie($movieObject);
}

echo true;
