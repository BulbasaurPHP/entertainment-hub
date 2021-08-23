<?php
session_start();
use Model\Database;
use Model\Playlist;
require_once '../vendor/autoload.php';

$db = Database::getdb();
$m = new Playlist();
$playlists = $m->listplaylist($db);
include_once '../Views/header.php' ?>
<main>
    <h2 class="text-center p-4">Entertainment Hub Playlist </h2>
    <table class="container text-center table table-bordered table-striped m-auto mt-4 mb-4">
        <thead>
        <tr>
            <th>Name</th>
            <th>Details</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($playlists as $playlist){ ?>
            <tr>
                <td><?php echo $playlist->playlist ?> </td>
                <td>
                    <form action="../playlist/playlistdetails.php?id=<?= $playlist->playlist ?> " method="post">
                        <input type="hidden" name="name" value=<?= $playlist->playlist; ?>/>
                        <input type="submit" class="button btn btn-primary" name="details" value="View Playlist"/>
                    </form>
                </td>
                <td>
                    <form action="../playlist/updateplaylist.php" method="post">
                        <input type="hidden" name="uid" value=<?= $playlist->playlist; ?>/>
                        <input type="submit" class="button btn btn-primary" name="updateplaylist" value="Update"/>
                    </form>
                </td>
                <td>
                    <form  action="../playlist/deleteplaylist.php" method="post">
                        <input type="hidden" name="did" value="<?= $playlist->playlist; ?>"/>
                        <input type="submit" class="button btn btn-danger" name="deleteplaylist" value="Delete"/>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="col-sm-12">
        <a class="col-sm-1 btn btn-primary m-4 float-right" href="addplaylist.php">New Playlist</a>
        <a class="col-sm-1 btn btn-outline-dark m-4 float-right" href="../Views/index.php">Home</a>
    </div>
</main>
<?php include_once '../Views/footer.php' ?>