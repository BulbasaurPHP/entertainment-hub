<?php

use Model\leagues ;
use Model\Database ;

require_once '../vendor/autoload.php';


if(isset($_POST['createleague'])) {
    $name = $_POST["name"] ;
    $prize = $_POST["prize"] ;
    $winners = $_POST["winners"] ;

    $dbcon = Database::getdb();
    $l = new leagues();
    $count = $l->createleague($dbcon,$name,$prize,$winners);

    if($count){
        header("Location: ../Nominationleagues/Nominate.php");
    }
    else
    {
        echo "Problem" ;
    }
}
include_once '../Views/header.php'?>
<main>
    <form action="/createleague.php" method="post">
        <div class="col-md-6">
            <label for="name">League Name</label><br />
            <input type="text" name="name" id="name">
        </div>
        <div class="col-md-6">
            <label for="prize">Total Prize</label><br />
            <input type="text" name="prize" id="prize">
        </div>
        <div class="col-md-6">
            <label for="winners">No. of Winners</label><br />
            <input type="text" name="winners" id="winners">
        </div>
        <button type="submit" name="createleague"
                class="btn btn-success m-3" id="btn-submit">Create League</button>
    </form>
</main>
<?php include_once '../Views/footer.php'?>
