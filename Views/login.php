<?php
if(isset($_POST['email'])){
    session_start();
    $email=$_SESSION['email'];
    $pass=$_POST['password'];
    if ($email==""){
        $emailerror="Please enter your email";
    }
    elseif (!filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){
        $emailerror="Please enter valid email";
    }
    else{
        $emailerror="valid email";
    }

    if (empty($pass)){
        $passworderr="Please enter password";
    }
    else{
        session_start();
        $email = $_SESSION['email'];
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
    }
}
?>
<html>

<head>
    <title>Entertainment Hub</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
</head>

<body>
    <?php
    require_once 'header.php';
    ?>
    <main id="login">
        <form method="post" action="login.php">
            <div class="container">
                <div class="form-field">
                    <label for="email">Email</label>
                    <input type="text" name="email" value=<?= isset($email) ? $email : "" ?>>
                    <?= isset($emailerror) ? $emailerror : "" ?>
                </div>
                <div class="form-field">
                    <label for="password">Password</label>
                    <input type="password" name="password" value=<?= isset($password) ? $password : "" ?>>
                    <?= isset($passworderr) ? $passworderr : "" ?>
                </div>
            </div>
            <input id='login' type="submit" name="login" value="Login">
        </form>
        <a class="text-center" href="register.php">Register here for an account</a>
    </main>
    <?php
    include 'footer.php';
    ?>
</body>
</html>