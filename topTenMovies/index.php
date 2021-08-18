<?php
session_start();
require_once 'class/db3.class.php';
use DB\Database as Database;

require_once 'models/cart.php';

$c = new dbitems();
$dbItem = $c->getitems(Database::getDb());


//If sent this is what this equals

if(isset($_POST['voteTopTen'])) {
    
        
        $movieID = $_POST['topten'];
        $db = Database::getDb();
        $count = $c->voteTopTen($movieID, $db);
        //$_SESSION['voted'] = true;
        header('Location:leaderboard.php');
    
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
    <link rel="stylesheet" href="style.css">
    <script src="../scripts/bootstrap.bundle.js"></script>
    <title>Top Ten</title>
</head>
<body>
    <?php include '../header.php'?>
    <div class="text-center votecontainer">
        <h1>Top Ten Leaderboard</h1>

        <p>Select your favourite from the following movies. The top ten will be featured on our leaderboard! </p>
    
        <form action="" method="post">
            <select name="topten">
            <?php foreach ($dbItem as $topten) { 
                    echo "<option id='$topten->movieID' name='$topten->movieID' value='$topten->movieID'>$topten->movieName </option>";
                    } ?>
            </select>
            <div id="submitButton">
                <input type="submit" name="voteTopTen">
            </div>
            

        </form>
</div>

<!-- Nomination Feature
<h2>Didn't see anything you like? </h2>
<a href="newNomination.php"><button>Nominate a different movie</button></a>
-->
</body>
</html>
