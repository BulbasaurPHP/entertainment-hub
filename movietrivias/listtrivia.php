<?php

use Model\trivia ;
use Model\Database ;
require_once '../vendor/autoload.php';

$db = Database::getdb();
$t = new trivia();
$trivias = $t->listtrivias($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Entertainment Hub- Trivias</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
<header>
    <h1 class="h1 text-center" >Trivias</h1>
</header>
<div class="m-1">
    <table class="table table-bordered tbl text-center">
        <thead>
        <tr>
            <th scope="col">About</th>
            <th scope="col">Name</th>
            <th scope="col">Content</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($trivias as $trivia) { ?>
            <tr>
                <td><?= $trivia->about; ?></td>
                <td><?= $trivia->name; ?></td>
                <td><?= $trivia->content; ?></td>
                <td>
                    <form action="/updatetrivia.php" method="post">
                        <input type="hidden" name="uid" value=<?= $trivia->id; ?>/>
                        <input type="submit" class="button btn btn-primary" name="updatetrivia" value="Update"/>
                    </form>
                </td>
                <td>
                    <form action="/deletetrivia.php" method="post">
                        <input type="hidden" name="did" value="<?= $trivia->id; ?>"/>
                        <input type="submit" class="button btn btn-danger" name="deletetrivia" value="Delete"/>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a class="btn btn-primary m-3" href="/addtrivia.php">Add Trivia</a>
    <a class="btn btn-outline-info m-3" href="../Views/index.php">Home</a>
</div>
</body>
</html>
