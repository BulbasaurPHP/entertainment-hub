<?php

use Model\trivia;
use Model\Database ;

require_once '../vendor/autoload.php';

$id = $name = $about = $content = "" ;
if(isset($_POST["updatetrivia"])){
    $id = $_POST['uid'] ;
    $db = Database::getdb();

    $t = new trivia();
    $trivia = $t->triviadetails($db,$id) ;

    $name = $trivia->name ;
    $about = $trivia->about ;
    $content = $trivia->content ;

    if(isset($_POST['updtrivia'])){
        $id = $_POST['tid'] ;
        $name = $_POST['name'] ;
        $about = $_POST['about'] ;
        $content = $_POST['content'] ;

        $dbcon = Database::getdb();
        $c = new trivia();
        $count = $c->updatetrivia($dbcon,$name,$about,$content,$id);

        if($count)
        {
            header("Location: ../movietrivias/listtrivia.php");
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
    <title>Entertainemnt Hub- Update Trivia</title>
    <meta charset="utf-8">
    <meta name="description" content="updatetrivia">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<?php include_once '../Views/header.php' ?>
<main>
    <form action="" method="post" class="container row">
        <div class="col-md-6">
            <input type="hidden" name="tid" value="<?= $id ?>" />
        </div>
        <div class="col-md-6">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?= $name ?>">
        </div>
        <div class="col-md-6">
            <label for="about">About</label>
            <input type="text" name="about" id="about" value="<?= $about ?>">
        </div>
        <div class="col-md-6">
            <label for="content">Content</label>
            <textarea name="content" id="content" rows="5" cols="60"  ></textarea>
        </div>
        <button type="submit" name="updtrivia"
                class="btn btn-success m-3 col-md-2" id="btn-submit">Update Trivia</button>
    </form>
</main>
</body>
</html>
