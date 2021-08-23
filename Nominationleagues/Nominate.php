<?php
session_start();
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
    <h2 class="text-center p-4">Entertainment Hub Featured Events </h2>
<table class="container text-center table table-bordered table-striped m-auto mt-4 mb-4">
    <thead>
        <tr>
            <th>Name</th>
            <th>Total Prize</th>
            <th>Total Winners</th>
            <th>Participate</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($leagues as $league){ ?>
        <tr>
            <td><?php echo $league->name ?> </td>
            <td><?php echo $league->total_prize ?> </td>
            <td><?php echo $league->total_winners ?> </td>
            <td>
                <form action="/leaguedetails.php?id=<?=$league->id?>" method="post">
                    <input type="hidden" name="pid" value=<?= $league->id ?>/>
                    <input type="submit" value="View Details" class="btn btn-primary" name="details">
                </form>
            </td>
            <td>
                <form action="/updateleague.php" method="post">
                    <input type="hidden" name="uid" value=<?= $league->id; ?>/>
                    <input type="submit" class="button btn btn-primary" name="updateleague" value="Update"/>
                </form>
            </td>
            <td>
                <form action="/deleteleague.php" method="post">
                    <input type="hidden" name="did" value="<?= $league->id; ?>"/>
                    <input type="submit" class="button btn btn-danger" name="deleteleague" value="Delete"/>
                </form>
            </td>
        </tr>
   <?php } ?>
    </tbody>
</table>
    <div class="col-sm-12">
        <a class="col-sm-1 btn btn-primary m-4 float-right" href="createleague.php">Add League</a>
        <a class="col-sm-1 btn btn-outline-dark m-4 float-right" href="../Views/index.php">Home</a>
    </div>
</main>
<?php include_once '../Views/footer.php' ?>
</body>