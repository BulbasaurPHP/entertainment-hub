<?php

use Model\Database;
use Model\Playlist;

require_once '../vendor/autoload.php';

if(isset($_POST['did'])) {

    $id = $_POST['did'] ;
    $dbcon = Database::getdb();
    $c = new Playlist();
    $count = $c->deleteplaylist($dbcon,$id);
    if($count){
        header("Location: ../playlist/playlisthome.php");
    }
    else
    {
        echo "Problem" ;
    }
}
