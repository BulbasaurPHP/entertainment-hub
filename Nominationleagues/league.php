<?php
use Model\Database;
use Model\leagues ;
require_once '../vendor/autoload.php';

$db = Database::getdb();
$l = new leagues();
$leagues= $l->listleagues($db);
?>
<!DOCTYPE html>
<html lang="en">
<title>Entertainment Hub-Nomination League</title
<link rel="stylesheet" type="text/css" href="../styles/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="../styles/style.css" />
<script src="../scripts/bootstrap.bundle.js"></script>
<script src="https://kit.fontawesome.com/b55d11ffa3.js" crossorigin="anonymous"></script>
</html>
<body>
<?php include_once '../Views/header.php' ?>
<main>
    <h2 class="text-center p-4">Entertainment Hub Nomination League </h2>
    <table class="container text-center table table-bordered table-striped m-auto mt-4 mb-4">
        <thead>
        <tr>
            <th>Name</th>
            <th>Total Prize</th>
            <th>Total Winners</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($leagues as $league){ ?>
            <tr>
                <td><?php echo $league->name ?> </td>
                <td><?php echo $league->total_prize ?> </td>
                <td><?php echo $league->total_winners ?> </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a class="btn btn-primary m-3 align-items-start" href="createleague.php">Add League</a>
    <a class="btn btn-outline-dark m-3 align-items-end" href="../Views/index.php">Home</a>
</main>
<?php include_once '../Views/footer.php' ?>
</body>