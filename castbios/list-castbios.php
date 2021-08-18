<?php
use Model\{ Database, CastBio};

require_once 'vendor/autoload.php';

//require_once 'Models/Database.php';
//require_once 'Models/CastBio.php';

$dbcon = Database::getDb();
$c = new CastBio();
$castbios = $c->getAllCastBios(Database::getDb());

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
    <?php include '../header.php'; ?>
</header>
<main>
    <div class="container">
        <h1>Cast Bios</h1>
    </div>
    <!-- displaying data from table -->
    <div class="container">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="add-castbios.php" class="btn btn-success me-md-2">Add Cast Bio</a>
            <a href="logoutpage.php" class="btn btn-outline-danger me-md-2">Log out</a>
        </div>
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
                        <div>
                            <form action="update-castbios.php" method="post">
                                <input type="hidden" name="bio_id" value=" <?= $castbio->bio_id; ?>" />
                                <input type="submit" class="button btn btn-primary" name="updateCastBio" value="Update" />
                            </form>
                            <form action="delete-castbios.php" method="post">
                                <input type="hidden" name="bio_id" value=" <?= $castbio->bio_id; ?>" />
                                <input type="submit" class="button btn btn-danger" name="deleteCastBio" value="Delete" />
                            </form>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<footer>
    <?php include '../footer.php'; ?>
</footer>
</body>
</html>