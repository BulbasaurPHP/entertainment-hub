<?php
use Model\{ Database, CastBio};

require_once 'vendor/autoload.php';

//require_once 'Models/Database.php';
//require_once 'Models/CastBio.php';

if(isset($_POST['addCastBio'])) {
//gather values from the form
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$birthplace = $_POST['birthplace'];
$bio = $_POST['bio'];
$trivia = $_POST['trivia'];

$db = Database::getDb();
$c = new CastBio();
$count = $c->addCastBio($name, $birthday, $birthplace, $bio, $trivia, $db);

    if($count) {
        // redirect to the list
        header("Location: list-castbios.php");
    } else {
        echo "error adding cast bio";
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
        <?php include '../header.php'; ?>
    </header>
    <h2>Add a New Movie</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="name" >Name:</label>
            <input type="text" class="form-control" name="name" value="" placeholder="Please enter actor name"/>
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="birthday">Birthday:</label>
            <input type="text" class="form-control" name="birthday" value="" placeholder="Please enter birthday"/>
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="birthplace">Birthplace:</label>
            <input type="text" class="form-control" name="birthplace" value="" placeholder="Please enter birthplace"/>
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="bio">Mini Bio:</label>
            <input type="text" class="form-control" name="bio" value="" placeholder="Please enter bio"/>
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="trivia">Trivia:</label>
            <input type="text" class="form-control" name="trivia" value="" placeholder="Please enter trivia"/>
            <span style="color: red">

            </span>
        </div>
        <a href="./list-castbios.php" class="btn btn-success float-left">Back</a>
        <button type="submit" name="addCastBio" class="btn btn-primary float-right" id="btn-submit">Add Cast Bio</button>
    </form>
    <footer>
        <?php include '../footer.php'; ?>
    </footer>
</body>
</html>