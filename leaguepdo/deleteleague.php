<?php

use Model\Database;
use Model\leagues;

require_once '../vendor/autoload.php';

if(isset($_POST['did'])) {

    $id = $_POST['did'] ;
    $dbcon = Database::getdb();
    $c = new leagues();
    $count = $c->deleteleague($dbcon,$id);
    if($count){
        header("Location: ../leaguepdo/Nominate.php");
    }
    else
    {
        echo "Problem" ;
    }
}
