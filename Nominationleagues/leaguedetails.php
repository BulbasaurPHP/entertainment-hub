<?php
session_start();
use Model\leagues;
use Model\Database ;
use Model\Participant;

require_once '../vendor/autoload.php';

$db = Database::getdb();
$id = $name = $prize = $winners = $movies = $participants = "" ;

if(isset($_POST["details"])) {
    $id=$_POST['pid'];
    if(isset($_POST['participate'])){
        if(isset($_SESSION['email'])) {
            echo "User logged in";
        }
        else{
            header("Location : ../Views/login.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Entertainment Hub-Nomination League</title
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../styles/style.css" />
    <script src="../scripts/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/b55d11ffa3.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include_once '../Views/header.php' ?>
    <main>
        <div class="container">
            <div class="col-sm-12 text-center">
                <h1 class="h3">League Details</h1>
            </div>
            <div class="row">
                <div class="col col-sm-6 m-auto text-start">
                    <div class="col-sm-6">
                        <p>League Name : <?php echo $name ?></p>
                    </div>
                    <div class="col-sm-6">
                        <p>Total Prize : <?php echo $prize ?> </p>
                    </div>
                    <div class="col-sm-6">
                        <p>Total Winners : <?php echo $winners ?> </p>
                    </div>
                </div>
                <div class="col-sm-6 text-start">
                    <form method="post" action="" class="form-group">
                        <div class="container p-4 m-4">
                            <label for="movie" id="movie" class="col-sm-12"> Select a movie to nominate for <?php echo $name ?> </label>
                            <select name="movie" id="movie">
                                <?php foreach ($movies as $movie){?>
                                    <option value="<?php echo $movie->name?>"><?php echo $movie->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <input type="submit" name="participate" value="Participate" class="btn btn-success float-end">
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center container">
            <h3>Leaderboard</h3>
            <table class="table table-bordered table-striped m-auto">
                <thead>
                <tr>
                    <td>Rank</td>
                    <td>Name</td>
                    <td>Win Amount</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($participants as $participant){ ?>
                    <tr>
                        <td><?= $participant->p_rank ?></td>
                        <td><?= $participant->name ?></td>
                        <td><?= $participant->prize ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="container">
            <a class="btn btn-primary m-3 float-end" href="Nominate.php">View Leagues</a>
            <a class="btn btn-outline-dark m-3 float-end" href="../Views/index.php">Home</a>
        </div>
    </main>
</body>
</html>

