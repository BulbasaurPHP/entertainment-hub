<?php
use Model\{ Database, CastBio};

require_once 'vendor/autoload.php';

//require_once 'Models/Database.php';
//require_once 'Models/CastBio.php';

$dbcon = Database::getDb();
$c = new CastBio();
$castbios = $c->getAllCastBios(Database::getDb());

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
    <?php include '../header.php'; ?>
</header>
<main>
    <div class="container">
        <h1>Cast Bios</h1>
    </div>
    <!-- displaying data from table -->
    <div class="container">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="display:none">bio_id</th>
                <th class="col-6 text-muted"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($castbios as $castbio) { ?>
                <tr>
                    <td style="display:none"><?= $castbio->bio_id; ?></td>
                    <td>
                        <h2><?= $castbio->name; ?></h2>
                        <p>Birthday: <?= $castbio->birthday; ?></p>
                        <p>Birthplace: <?= $castbio->birthplace; ?></p>
                        <h3>Mini Bio</h3>
                        <p><?= $castbio->bio; ?></p>
                        <h3>Trivia</h3>
                        <p><?= $castbio->trivia; ?></p>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <a href="list-castbios.php" class="btn btn-outline-primary btn-md float-right">Edit List</a>
    </div>
</main>

<footer>
    <?php include '../footer.php'; ?>
</footer>
</body>
</html>