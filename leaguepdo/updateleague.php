<?php

use Model\leagues;
use Model\Database ;
require_once '../vendor/autoload.php';

$id = $name = $prize = $winners = "" ;
if(isset($_POST["updateleague"])){
    $id = $_POST['uid'];
    $db = Database::getdb();

    $l = new leagues();
    $league = $l->leaguedetails($db,$id) ;
    $name = $league->name ;
    $prize = $league->total_prize ;
    $winners = $league->total_winners ;

    if(isset($_POST['updleague'])){
        $id = $_POST['lid'] ;
        $name = $_POST['name'] ;
        $prize = $_POST['total_prize'] ;
        $winners = $_POST['total_winners'] ;

        $dbcon = Database::getdb();
        $c = new leagues();
        $count = $c->updateleague($dbcon,$name,$prize,$winners,$id);

        if($count)
        {
            header("Location: ../leaguepdo/Nominate.php");
        }
        else
        {
            "problem" ;
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Entertainment Hub- Nomination League - Update League</title>
    <meta charset="utf-8">
    <meta name="description" content="AddCats">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<?php include_once '../Views/header.php'?>
<main>
    <form action="" method="post">
        <div class="col-md-6">
            <input type="hidden" name="lid" value="<?= $id ?>" />
        </div>
        <div class="col-md-6">
            <label for="name">League Name</label><br />
            <input type="text" name="name" id="name" value="<?= $name ?>">
        </div>
        <div class="col-md-6">
            <label for="total_prize">Total Prize</label><br />
            <input type="text" name="total_prize" id="total_prize" value="<?= $prize ?>">
        </div>
        <div class="col-md-6">
            <label for="total_winners">Total Winners</label><br/>
            <input type="text" name="total_winners" id="total_winners" value="<?= $winners ?>">
        </div>
        <button type="submit" name="updleague"
                class="btn btn-success m-3" id="btn-submit">Update League</button>
    </form>
</main>
<?php include_once '../Views/footer.php'?>
</body>
</html>
