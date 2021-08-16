<?php

use models\Database;
use models\Movie;
use models\MovieDB;

require 'vendor/autoload.php';

// fetch the posted serialized json and process it
$movieID = json_decode($_POST['serialValue']);
$movieDB = new MovieDB();
$flag = $movieDB->deleteMovie($movieID);
// echo "Something";
echo $flag;
