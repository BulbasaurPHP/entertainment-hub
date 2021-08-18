<?php


use Models\{ Database, Nominations};

require_once 'vendor/autoload.php';


//require_once 'Models/Database.php';
//require_once 'Models/NewMovie.php';

$dbcon = Database::getDb();
$e = new Nominations();
$events = $e->listEvents(Database::getDb());


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../styles/style.css" />
    <script src="../scripts/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/b55d11ffa3.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Nomination Events</title>
</head>
<body>
<header>
    <?php require_once '../header.php'; ?>
</header>
<main>
    <div class="container">
        <h1>Nomination Events List</h1>
    </div>

    <!-- displaying data from table -->
    <div class="container">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Nomination_id</th>
                <th scope="col">Name</th>
                <th scope="col">Bio</th>
                <th scope="col">Release Date</th>
                <th scope="col">Nomination Date</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($events as $event) { ?>
                <tr>
                    <td><?= $event->nomination_id; ?></td>
                    <td><?= $event->name; ?></td>
                    <td><?= $event->bio; ?></td>
                    <td><?= $event->release_date; ?></td>
                    <td><?= $event->nomination_date; ?></td>
                    <td>
                        <form action="updatenominationevents.php" method="post">
                            <input type="hidden" name="nomination_id" value=" <?= $event->nomination_id; ?>" />
                            <input type="submit" class="button btn btn-primary" name="updateNominationEvents" value="Update" />
                        </form>
                    </td>
                    <td>
                        <form action="deletenominationevents.php" method="post">
                            <input type="hidden" name="nomination_id" value=" <?= $event->nomination_id; ?>" />
                            <input type="submit" class="button btn btn-danger" name="deleteNominationEvents" value="Delete" />
                        </form>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <a href="addnominationevents.php" class="btn btn-success btn-lg float-right">Add Event</a>
    </div>
</main>

<footers>
    <?php require_once '../footer.php'; ?>
</footers>
</body>
</html>
