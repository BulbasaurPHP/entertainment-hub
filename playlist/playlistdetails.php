<?php
use Model\Database;
use Model\Playlist;
require_once '../vendor/autoload.php';
$db = Database::getdb();
$p = new Playlist();
if(isset($_POST['details'])){
$name=$_POST['name'];
$movies = $p->playlistbyname($db,$name);
}
?>

<main>
    <h1 class="text-center"><?= $movies->playlist?></h1>
    <table>
        <thead>
        <tr>
            <th>Movies</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($movies as $movie) ?>
            <tr>
                <td><?= $movie->name?></td>
                <td>
                    <form method="post" action="deletemovie.php">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</main>
