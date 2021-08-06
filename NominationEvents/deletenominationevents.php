<?php
if(isset($_POST['id'])){

    $user = 'masterAdmin';
    $password = 'bulbasaurAdmin';
    $dbname = 'bulbasaur-db.ckohzdqyvmzm.ca-central-1.rds.amazona';
    $dsn = 'mysql:host=localhost;dbname=' . $dbname;

    $dbcon = new PDO($dsn, $user, $password);

    $sql = "DELETE FROM nomination_events WHERE nomination_id = :nomination_id";

    $nomination_id = $_POST['nomination_id'];
    $pst = $dbcon->prepare($sql);
    $pst->bindParam(':id', $id);
    $count = $pst->execute();
    if($count){
        header("Location: list-nomination.php");
    }
    else {
        echo " problem deleting";
    }


}