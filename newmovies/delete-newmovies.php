<?php
use Model\{ Database, NewMovie};

require_once 'vendor/autoload.php';

//require_once 'Models/Database.php';
//require_once 'Models/NewMovie.php';

if(isset($_POST['movie_id'])){
    $id = $_POST['movie_id'];
    $db = Database::getDb();

    $n = new NewMovie();
    $count = $n->deleteNewMovie($id, $db);

    if($count) {
        // redirect to the list
        header("Location: list-newmovies.php");
    } else {
        echo "error deleting movie";
    }

}