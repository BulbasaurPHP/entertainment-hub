<?php

use Model\trivia ;
use Model\Database ;

require_once '../vendor/autoload.php';

if(isset($_POST['addtrivia'])) {
    $name = $_POST["name"] ;
    $about = $_POST["about"] ;
    $content = $_POST["content"] ;

    $dbcon = Database::getdb();
    $c = new trivia();
    $count = $c->addtrivia($dbcon,$name,$about,$content);

    if($count){
        header("Location: ../triviapdo/listtrivia.php");
    }
    else
    {
        echo "Problem" ;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Entertainment Hub- Add Trivia</title>
    <meta charset="utf-8">
    <meta name="description" content="Addtrivia">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<?php include_once "../Views/header.php"; ?>
<main>
    <form action="../triviapdo/addtrivia.php" method="post">
        <div class="col-md-6">
            <label for="name">Name</label><br />
            <input type="text" name="name" id="name">
        </div>
        <div class="col-md-6">
            <label for="about">About</label><br />
            <input type="text" name="about" id="about">
        </div>
        <div class="col-md-6">
            <label for="content">Content</label><br />
            <textarea id="content" name="content" rows="5" cols="60"></textarea>
        </div>
        <button type="submit" name="addtrivia"
                class="btn btn-success m-3" id="btn-submit">Add Trivia</button>
        <a href="listtrivia.php" class="btn btn-outline-info">Cancel</a>
    </form>
</main>
<?php include_once "../Views/footer.php" ?>
</body>
</html>
