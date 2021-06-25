<?php
if(isset($_POST['email'])){
    $email=$_POST['email'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $role=$_POST('role');
    if ($email==""){
        $emailerror="Please enter your email";
    }
    elseif (!filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){
        $emailerror="Please enter valid email";
    }
    else{
        $emailerror="valid email";
    }
    $pattern="/[0-9]{10}/";
    if (empty($phone)){
        $phoneerror="Please enter phone number";
    }
    elseif (!preg_match($pattern,$phone)){
        $phoneerror="Please enter 10 digits";
    }
    else{
        $phoneerror="valid phone number";
    }
    if($role=="admin"||"user"){
        $rolerror = "Valid role" ;
    }
    else{
        $rolerror="please choose the suitable options" ;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="styles/style.css" />
        <title>PHP Content</title>
    </head>
    <body>
    <?php
    require_once 'header.php';

    ?>
        <main>
            <form method="post" action="index.php" id="register-form">
                <div class="container">
                    <div id="customer">
                        <label for="name" >Name</label>
                        <input name="name" type="text" value=<?= isset($name)? $name:'';?>>
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="text" name="email" value=<?= isset($email) ? $email : "" ?>>
                        <?= isset($emailerror) ? $emailerror : "" ?>
                    </div>
                    <div>
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" value=<?= isset($phone) ? $phone : "" ?>>
                        <?= isset($phoneerror) ? $phoneerror : ""?>
                    </div>
                    <div>
                        <label for="role">Role:</label>
                        <label for="admin">Admin</label>
                        <input type="radio" name="role" value="admin">
                        <label for="user">User</label>
                        <input type="radio" name="role" value="user">
                    </div>
                </div>
                <input id='buy' type="submit" value="Create">
            </form>
            <div class="m-4 text-center">
                <a href="login.php" class="m-2">Already have an account? Click here to login</a>
            </div>
        </main>
    <?php
    include 'footer.php'
    ?>
    </body>
</html>
