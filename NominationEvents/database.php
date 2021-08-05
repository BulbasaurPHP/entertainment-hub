<?php
$user = 'masterAdmin';
$password = 'bulbasaurAdmin';
$dbname = 'bulbasaur-db.ckohzdqyvmzm.ca-central-1.rds.amazona';
$dsn = 'mysql:host=localhost;dbname=' . $dbname;

$dbconn = new PDO($dsn, $user, $password);

?>