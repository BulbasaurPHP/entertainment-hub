<?php
session_start();

require_once 'class/db3.class.php';
use DB\Database as Database;

require_once 'models/cart.php';

$c = new dbitems();
$dbItem = $c->getitemsorder(Database::getDb());

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
    <title>Document</title>
</head>
<body>
   <?php include '../header.php' ?>
    <h1 class="text-center">Current Leaders</h1>

    <div id="topten-container">
        <div id="topten-display">
        <ol>
            <?php foreach ($dbItem as $movie) {
                echo "<li>$movie->movieName: $movie->votes votes</li>";
            }?>
        </ol>

    <div>
        <a href="index.php">Vote for your favourite movie!</a>
    </div>
        </div>
    </div>
    
    
<footer>
<?php include '../footer.php' ?>
</footer>
</body>
</html>