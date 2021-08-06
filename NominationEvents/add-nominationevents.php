<?php
use Model\Database;
use Model\Nominations;

$db = Database::getdb();
require_once '../NominationEvents/vendor/autoload.php';
if(isset($_POST['addNewNomination'])) {
    //gather values from the form
    $name = $_POST['eventname'];
    $bio = $_POST ['bio'];
    $release = $_POST['releasedate'];
    $nomination = $_POST['nominationdate'];
    $n = new Nominations();
    $count = $n->addevents($db,$name,$bio,$release,$nomination);

    if($count){
        header("../listnominationevents.php");
    }

}
?>

<!DOCTYPE html>
<html lang="en">
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
    <title>Add Nomination Events</title>

</head>
<body>
    <?php require_once 'header.php'; ?>
<h2>Add Nomination Events </h2>
<form action="" method="POST">
    <div class="nominationform">
        <label for="title" >Name of the Event : </label>
        <input type="text" class="form-control" name="eventname" id="eventname" value="" placeholder="Please enter Event Name"/>
    </div>
    <div class="form-group">
        <label for="release_date">Please enter the bio of the movie:</label>
        <input type="text" class="form-control" name="bio" id="bio" value="" placeholder="Please enter Bio of the movie"/>
        <span style="color: red">

                </span>
    </div>
    <div class="form-group">
        <label for="release_date">Please enter the Release Date :</label>
        <input type="date" class="form-control" name="releasedate" id="releasedate" value="" placeholder="Please enter the Release Date"/>
        <span style="color: red">

                </span>
    </div>
    <div class="form-group">
        <label for="release_date">Please enter the Nomination Date :</label>
        <input type="date" class="form-control" name="nominationdate" id="nominationdate" value="" placeholder="Please enter the Nomination Date"/>
        <span style="color: red">

                </span>
    </div>
    <a href="./list-newmovies.php" class="btn btn-success float-left">Back</a>
    <button type="submit" name="addNewNomination" class="btn btn-primary float-right" id="btn-submit">Add Nomination Event</button>
</form>
<footer>
    <?php require_once 'footer.php'; ?>
</footer>
</body>
</html>