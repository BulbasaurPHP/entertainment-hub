<?php
use Model\{ Database, NewMovie};

require_once 'vendor/autoload.php';

//require_once 'Models/Database.php';
//require_once 'Models/NewMovie.php';

$dbcon = Database::getDb();
$n = new NewMovie();
$newmovies = $n->getAllNewMovies(Database::getDb());

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
        <main>
            <div class="container">
                <h1>New Movies</h1>
            </div>

            <!-- displaying data from table -->
            <div class="container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="display:none">movie_id</th>
                            <th class="col-6 text-muted">Title</th>
                            <th class="col-6 text-muted">Release Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($newmovies as $newmovie) { ?>
                        <tr>
                            <td style="display:none"><?= $newmovie->movie_id; ?></td>
                            <td><?= $newmovie->title; ?></td>
                            <td><?= $newmovie->release_date; ?></td>
                            <td>
                                <form action="update-newmovies.php" method="post">
                                    <input type="hidden" name="movie_id" value=" <?= $newmovie->movie_id; ?>" />
                                    <input type="submit" class="button btn btn-primary" name="updateNewMovie" value="Update" />
                                </form>
                            </td>
                            <td>
                                <form action="delete-newmovies.php" method="post">
                                    <input type="hidden" name="movie_id" value=" <?= $newmovie->movie_id; ?>" />
                                    <input type="submit" class="button btn btn-danger" name="deleteNewMovie" value="Delete" />
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="add-newmovies.php" class="btn btn-success btn-lg float-right">Add a New Movie</a>
            </div>
        </main>

        <footer>
            <?php include '../footer.php'; ?>
        </footer>
    </body>
</html>