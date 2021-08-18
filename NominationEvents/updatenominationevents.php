<?php

$name = $bio = $release_date = $nomination_date = "";
use Models\{ Database, Nominations};

require_once 'vendor/autoload.php';

//require_once 'Models/Database.php';
//require_once 'Models/NewMovie.php';

$name = $bio = $release_date = $nomination_date = "";

// populate field form with values

if(isset($_GET['updateNominationEvents'])) {

    $id = $_POST['nomination_id'];
    $name = $_POST['name'];
    $bio = $_POST['bio'];
    $release_date = $_POST['release_date'];
    $nomination_date = $_POST['nomination_date'];

    $db = Database::getDb();

    $e = new Nominations();
    $events = $e->listEventById($id, $db);

    // fetch values into variables
    $id = $events->nomination_id;
    $name = $events->name;
    $bio = $events->bio;
    $release_date = $events->release_date;
    $nomination_date = $events->nomination_date;

}
if(isset($_POST['updEvents'])) {

    $id= $_POST['sid'];
    $name = $_POST['name'];
    $bio = $_POST['bio'];
    $release_date = $_POST['release_date'];
    $nomination_date = $_POST['nomination_date'];

    $db = Database::getDb();
    $e = new Nominations();
    $count = $e->updateEvents($id, $name, $bio,$release_date,$nomination_date, $db);

    if($count) {
        // redirect to the list
        header("Location: listnominationevents.php");
    } else {
        echo "error updating movie";
    }
}

?>

<html lang="en">

<head>
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
<header>
    <?php require_once '../header.php'; ?>
</header>

<divs>
    <!--    Form to Update  Student -->
    <form action="" method="post">
        <input type="hidden" name="sid" value="<?= $id; ?>" />
        <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= $name; ?>"
                   placeholder="Enter Event Name ">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="bio">Bio :</label>
            <input type="text" class="form-control" id="bio" name="bio"
                   value="<?= $bio ; ?>" placeholder="Enter a Bio for a Movie">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="releasedate">Release Date :</label>
            <input type="date" name="release_date" value="<?= $release_date; ?>" class="form-control"
                   id="releasedate" placeholder="Enter Release Date">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="nominationdate">Nomination Date :</label>
            <input type="date" name="nomination_date" value="<?= $nomination_date; ?>" class="form-control"
                   id="nominationdate" placeholder="Enter Nomination Date">
            <span style="color: red">

            </span>
        </div>
        <a href="listnominationevents.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="updEvents"
                class="btn btn-primary float-right" id="btn-submit">
            Update Nomination Events
        </button>
    </form>
</divs>


<?php
require_once '../footer.php';
?>


</body>
</html

