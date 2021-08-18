<?php

use models\Database;
use models\Movie;
use models\MovieDB;

require 'vendor/autoload.php';

// fetch the movies from db and send it as a json
$movieDB = new MovieDB();

echo json_encode($movieDB->getAllMovies());
