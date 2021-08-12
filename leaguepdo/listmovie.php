<?php
use Model\Database;
use Model\leagues ;
require_once '../vendor/autoload.php';

$db = Database::getdb();
$l = new leagues();
$leagues= $l->listmovies($db);
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
                    <form action="../leaguepdo/leaguedetails.php?id=<?=$league->id?>" method="post">
                        <input type="hidden" name="pid" value=<?= $league->id ?>/>
                        <input type="submit" value="View Details" class="btn btn-primary" name="details">
                    </form>
                </td>
                <td>
                    <form action="../leaguepdo/updateleague.php" method="post">
                        <input type="hidden" name="uid" value=<?= $league->id; ?>/>
                        <input type="submit" class="button btn btn-primary" name="updateleague" value="Update"/>
                    </form>
                </td>
                <td>
                    <form  action="../leaguepdo/deleteleague.php" method="post">
                        <input type="hidden" name="did" value="<?= $league->id; ?>"/>
                        <input type="submit" class="button btn btn-danger" name="deleteleague" value="Delete"/>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a class="btn btn-primary m-3 align-items-start" href="createleague.php">Add League</a>
    <a class="btn btn-outline-dark m-3 align-items-end" href="../Views/index.php">Home</a>
</main>
<?php include_once '../Views/footer.php' ?>
</body>