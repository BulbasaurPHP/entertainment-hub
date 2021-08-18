<?php
use Model\{ Database, CastBio};

require_once 'vendor/autoload.php';

//require_once 'Models/Database.php';
//require_once 'Models/CastBio.php';

if(isset($_POST['bio_id'])){
    $id = $_POST['bio_id'];
    $db = Database::getDb();

    $c = new CastBio();
    $count = $c->deleteCastBio($id, $db);

    if($count) {
        // redirect to the list
        header("Location: list-castbios.php");
    } else {
        echo "error deleting movie";
    }

}

session_start();
if(!isset($_SESSION['name'])) {
    header('Location: loginpage.php');
}