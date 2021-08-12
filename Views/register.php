<?php
use Model\leagues;
use Model\Database;
require_once '../vendor/autoload.php';
if(isset($_POST['create'])){
    $email=$_POST['email'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $pass = md5($_POST['password']);
    $confirm = md5($_POST['confirm']);
    $role = $_POST['role'];
    $db = Database::getdb();

    $l = new leagues();
    if ($email == ""){
        $emailerror="Please enter your email";
    }
    elseif (!filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL))
    {
        $emailerror="Please enter valid email";
    }
    elseif(isset($name)){
        if (empty($phone)){
            $phnerror = "Provide phone number";
        }
        elseif($pass == $confirm) {
            if (isset($role)){
                if ($role = "admin" || "user") {
                    var_dump($role);
                    session_start();
                    $email = $_SESSION['email'];
                    $password = md5($_SESSION['password']);
                    $participant = $l->adduser($db,$name,$email,$phone,$pass,$role);
                    header("Location: ../Views/login.php");
                }
                else {
                    $rolerror = "please choose a role";
                    }
            }
            else {
                $passerror = "Passwords do not match";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../styles/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="../styles/style.css" />
        <title>PHP Content</title>
    </head>
    <body>
    <?php require_once 'header.php' ?>
        <main>
            <form method="post" action="" class="container col">
                <div class="col-sm-2 form-group">
                    <label for="name" class="form-label" >Name</label>
                    <input name="name" type="text" class="form-control" id="name">
                </div>
                <div class="col-sm-2 form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control"  id="email">
                    <?= isset($emailerror) ? $emailerror : "" ?>
                </div>
                <div>
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone">
                    <?= isset($phnerror) ? $phnerror : ""?>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                    <?= isset($passerror) ? $passerror : ""?>
                </div>
                <div>
                    <label for="confirm">Confirm Password</label>
                    <input type="text" name="confirm" id="confirm">
                    <?= isset($conerror) ? $conerror : ""?>
                </div>
                <div>
                    <label for="role">Role:</label>
                    <label for="admin">Admin</label>
                    <input type="radio" name="role" id="admin" value="admin">
                    <label for="user">User</label>
                    <input type="radio" name="role" id="user" value="user">
                </div>
                <input id='create' name="create" class="btn btn-primary" type="submit" value="Create">
            </form>
            <div class="m-4 text-center">
                <a href="login.php" class="m-2">Already have an account? Click here to login</a>
            </div>
        </main>
    <?php include_once 'footer.php' ?>
    </body>
</html>
