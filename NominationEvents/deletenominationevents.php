<?php

use Models\{ Database, Nominations};

require_once 'vendor/autoload.php';

if(isset($_POST['nomination_id'])){
    $id = $_POST['nomination_id'];

    $db = Database::getDb();

    $e = new Nominations();
    $count = $e->deleteEvent($db,$id);

    if($count) {
        // redirect to the list
        header("Location:listnominationevents.php");
    } else {
        echo "error deleting movie";
    }

}