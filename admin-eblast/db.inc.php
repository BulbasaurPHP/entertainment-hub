<?php

$dsn = 'mysql:host=bulbasaur-db.ckohzdqyvmzm.ca-central-1.rds.amazonaws.com;dbname=bulbasaur_db';

$user = 'masterAdmin';
$pass = 'bulbasaurAdmin';


/*connect to database*/
try {
    $db = new pdo($dsn, $user, $pass);
} catch(PDOException $e) {
    die('Connection Error:' . $e->getMessage());
}

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>