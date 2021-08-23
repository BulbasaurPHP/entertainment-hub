<?php

use Model\trivia ;
use Model\Database ;
require_once '../vendor/autoload.php';

$db = Database::getdb();
$t = new trivia();
$trivias = $t->listtrivias($db);
include_once '../Views/header.php';
?>

<div class="m-1">
    <table class="table table-bordered tbl text-center">
        <thead>
        <tr>
            <th scope="col">About</th>
            <th scope="col">Name</th>
            <th scope="col">Content</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($trivias as $trivia) { ?>
            <tr>
                <td><?= $trivia->about; ?></td>
                <td><?= $trivia->name; ?></td>
                <td><?= $trivia->content; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a class="btn btn-outline-info m-3" href="../Views/index.php">Home</a>
</div>
<?php include_once '../Views/header.php';