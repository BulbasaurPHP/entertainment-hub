<?php

$name = $bio = $release_date = $nomination_date = "";

if(isset($_POST['updateNominationEvents'])){
    $nomination_id= $_POST['nomination_id'];

    $user = 'root';
    $password = '';
    $dbname = 'phpdb';
    $dsn = 'mysql:host=localhost;dbname=' . $dbname;

    $dbcon = new PDO($dsn, $user, $password);

    $sql = "SELECT * FROM nomination_events where nomination_id = :nomination_id";
    $pst = $dbcon->prepare($sql);
    $pst->bindParam(':nomination_id', $nomination_id);
    $pst->execute();
    $nomination = $pst->fetch(PDO::FETCH_OBJ);

    $name =  $nomination->name;
    $bio = $nomination->bio;
    $release_date = $nomination->releasedate;
    $nomination_date =$nomination -> nomination_date;



}
if(isset($_POST['updEvents'])) {
    $name = $_POST['name'];
    $bio = $_POST['bio'];
    $release_date = $_POST['releasedate'];
    $nomination_date = $_POST['nominationdate'];


    $user = 'root';
    $password = '';
    $dbname = 'phpdb';
    $dsn = 'mysql:host=localhost;dbname=' . $dbname;

    $dbcon = new PDO($dsn, $user, $password);

    $sql = "Update nomination_events
                set name = :name,
                bio = :bio,
                release_date = :releasedate
                nomination_date = :nominationdate
                WHERE nomination_id = :nomination_id
        
        ";

    $pst =   $dbcon->prepare($sql);

    $pst->bindParam(':name', $name);
    $pst->bindParam(':bio', $bio);
    $pst->bindParam(':releasedate', $release_date);
    $pst->bindParam(':nominationdate', $nomination_date);
    $pst->bindParam(':nomination_id', $nomination_id);

    $count = $pst->execute();
    if($count){
        header("Location: list-students.php");
    } else {
        echo "problem updating a student";
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
        <input type="hidden" name="sid" value="<?= $nomination_id; ?>" />
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
            <input type="date" name="releasedate" value="<?= $release_date; ?>" class="form-control"
                   id="releasedate" placeholder="Enter Release Date">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="nominationdate">Nomination Date :</label>
            <input type="date" name="nominationdate" value="<?= $nomination_date; ?>" class="form-control"
                   id="nominationdate" placeholder="Enter Nomination Date">
            <span style="color: red">

            </span>
        </div>
        <a href="./list-nominationevents.php" id="btn_back" class="btn btn-success float-left">Back</a>
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

