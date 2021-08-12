<?php

use Model\Database;
use Model\trivia;

require_once '../vendor/autoload.php';

if(isset($_POST['did'])) {

    $id = $_POST['did'] ;
    $dbcon = Database::getdb();
    $c = new trivia();
    $count = $c->deletetrivia($dbcon,$id);
    if($count){
        header("Location: ../triviapdo/listtrivia.php");
    }
    else
    {
        echo "Problem" ;
    }
}
