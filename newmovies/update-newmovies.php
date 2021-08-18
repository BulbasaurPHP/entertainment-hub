<?php

use Model\{ Database, NewMovie};

require_once 'vendor/autoload.php';

//require_once 'Models/Database.php';
//require_once 'Models/NewMovie.php';

$title = $release_date = "";

// populate field form with values
if(isset($_POST['updateNewMovie'])) {
    $id = $_POST['movie_id'];
    $db = Database::getDb();

    $n = new NewMovie();
    $newmovie = $n->getNewMovieById($id, $db);

    // fetch values into variables
    $id = $newmovie->movie_id;
    $title = $newmovie->title;
    $release_date = $newmovie->release_date;

}

// update the database
if(isset($_POST['updNewMovie'])) {
    //gather values from the form
    $id = $_POST['sid'];
    $title = $_POST['title'];
    $release_date = $_POST['release_date'];

    $db = Database::getDb();
    $n = new NewMovie();
    $count = $n->updateNewMovie($id, $title, $release_date, $db);

    if($count) {
        // redirect to the list
        header("Location: list-newmovies.php");
    } else {
        echo "error updating movie";
    }
}

session_start();
if(!isset($_SESSION['name'])) {
    header('Location: loginpage.php');
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../styles/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="../styles/style.css" />
        <script src="../scripts/bootstrap.bundle.js"></script>
        <script src="https://kit.fontawesome.com/b55d11ffa3.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <title>New Movies</title>
    </head>
    <body>
    <header>
        <?php include 'header.php'; ?>
    </header>
        <form action="" method="POST">
            <input type="hidden" name="sid" value="<?= $id; ?>" />
            <div class="form-group">
                <label for="title" >Title:</label>
                <input type="text" class="form-control" name="title" id="title" value="<?= $title; ?>" placeholder="Please enter title"/>
                <span style="color: red">

                </span>
            </div>
            <div class="form-group">
                <label for="release_date">Release Date:</label>
                <input type="text" class="form-control" name="release_date" id="release_date" value="<?= $release_date; ?>" placeholder="Please enter release date"/>
                <span style="color: red">

                </span>
            </div>
            <a href="./list-newmovies.php" class="btn btn-success float-left">Back</a>
            <button type="submit" name="updNewMovie" class="btn btn-primary float-right" id="btn-submit">Update Movie</button>
        </form>
    <footer>
        <?php include '../footer.php'; ?>
    </footer>
    </body>
</html>