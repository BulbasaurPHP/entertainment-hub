<?php

use Model\Movie ;
use Model\Database ;


require_once '../vendor/autoload.php';

$db = Database::getdb();
$m = new Movie();
$movies = $m->listmovies($db);

if(isset($_POST['addtoplaylist'])){
    $add = $m->addtoplaylist($db);
}
