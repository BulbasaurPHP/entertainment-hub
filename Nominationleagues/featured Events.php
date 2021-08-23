<?php
session_start();
use Model\Database;
use Model\leagues ;
require_once '../vendor/autoload.php';

$db = Database::getdb();
$l = new leagues();
$leagues= $l->listevents($db);
include_once '../Views/header.php'
?>
<main>
    <h2 class="text-center p-4">Entertainment Hub Featured Events </h2>
    <div class="container row mx-auto my-4 p-4">
        <?php foreach ($leagues as $league){ ?>
            <div class="card col-sm-4 m-4" style="width: 18rem;">
                <img class="card-img-top mx-auto m-4" src="data:image/jpg;charset=utf8;base64,<?= base64_encode($league->image)?>" alt="<?= $league->name ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $league->name ?></h5>
                    <a href="<?= $league->wikipedia ?>" class="btn btn-primary">View Details</a>
                </div>
            </div>
        <?php } ?>
    </div>
</main>
<?php include_once '../Views/footer.php' ?>
</body>