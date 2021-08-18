<?php
require_once '../header.php';
//require_once 'database.php';

use Models\{ Database, Nominations};

require_once 'vendor/autoload.php';



//require_once 'Models/Database.php';
//require_once 'Models/NewMovie.php';

$dbcon = Database::getDb();
$e = new Nominations();
$trailers = $e->listtrailer(Database::getDb());

$events = $e->listEvents(Database::getDb());


?>

<html>

<head>
    <title>Entertainment Hub</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../styles/style.css" />
    <script src="../scripts/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/b55d11ffa3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<main id="main">
    <div class="jumbotron text-center">
        <h1>NOMINATION 2021</h1>
    </div>


    <div class="container">
        <div class="row">
            <h2 class="nominationTitle">BEST MOVIE OF THE YEAR</h2>
            <?php foreach ($trailers as $trailer) { ?>
                    <div class="col-sm-3">
                        <video width="250" height="200" controls>
                            <source src="<?= $trailer -> location; ?>" type="video/mp4">
                        </video>
                    </div>
            <?php } ?>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <h2 class="nominationTitle">BEST ROLE IN LEAD ACTRESS</h2>
            <?php foreach ($trailers as $trailer) { ?>
                <div class="col-sm-3">
                    <video width="250" height="200" controls>
                        <source src="<?= $trailer -> location; ?>" type="video/mp4">
                    </video>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <h2 class="nominationTitle">BEST ROLE IN LEAD ACTOR</h2>
            <?php foreach ($trailers as $trailer) { ?>
                <div class="col-sm-3">
                    <video width="250" height="200" controls>
                        <source src="<?= $trailer -> location; ?>" type="video/mp4">
                    </video>
                </div>
            <?php } ?>
        </div>

    </div>

    <div class="container">
        <div class="row">
            <h2 class="nominationTitle">ANIMATED FEATURE FILM</h2>
            <?php foreach ($trailers as $trailer) { ?>
                <div class="col-sm-3">
                    <video width="250" height="200" controls>
                        <source src="<?= $trailer -> location; ?>" type="video/mp4">
                    </video>
                </div>

            <?php } ?>
        </div>
    </div>

</main>


<?php
require_once '../footer.php';
?>

</body>
</html>