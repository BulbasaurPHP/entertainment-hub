<?php
$user = 'masterAdmin';
$password = 'bulbasaurAdmin';
$dbname = 'bulbasaur-db.ckohzdqyvmzm.ca-central-1.rds.amazona';
$dsn = 'mysql:host=localhost;dbname=' . $dbname;

$dbcon = new PDO($dsn, $user, $password);

$sql = "SELECT * FROM nomination_events";
$pdostm = $dbcon->prepare($sql);
$pdostm->execute();

$nominations = $pdostm->fetchAll(PDO::FETCH_ASSOC);


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
    <?php require_once 'header.php'; ?>
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
            <?php foreach ($nominations as $nomination) { ?>
                <tr>
                    <td style="display:none"><?= $nomination->nomination_id; ?></td>
                    <td><?= $nomination->name; ?></td>
                    <td><?= $nomination->bio; ?></td>
                    <td><?= $nomination->releasedate; ?></td>
                    <td><?= $nomination->nominationdate; ?></td>
                    <td>
                        <form action="update-nominationevents.php" method="post">
                            <input type="hidden" name="movie_id" value=" <?= $nomination->nomination_id; ?>" />
                            <input type="submit" class="button btn btn-primary" name="updateNominationEvents" value="Update" />
                        </form>
                    </td>
                    <td>
                        <form action="delete-nominationevents.php" method="post">
                            <input type="hidden" name="movie_id" value=" <?= $nomination->nomination_id; ?>" />
                            <input type="submit" class="button btn btn-danger" name="deleteNominationEvents" value="Delete" />
                        </form>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<footers>
    <?php require_once 'footer.php'; ?>
</footers>
</body>
</html>
