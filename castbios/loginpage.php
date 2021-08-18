
<?php
use Model\{ Database };

require_once 'vendor/autoload.php';



session_start();
if (isset($_POST['login'])) {
    // get values from form and assign to local variables
    $user = $_POST['username'];
    $pass = $_POST['userpass'];

    // connect to db and check if username and password matches
    $dbcon = Database::getDb();
    $sql = "SELECT * from user WHERE name = :name AND passwordhash = :pass";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->bindParam(':name', $user);
    $pdostm->bindParam(':pass', $pass);
    $pdostm->execute();
    $cred = $pdostm->fetch(\PDO::FETCH_OBJ);
    $dbuser = $cred->name;
    $dbpass = $cred->passwordhash;

    // create a session variable if credentials are valid
    if ($user == $dbuser && $pass == $dbpass) {
        $_SESSION['name'] = $user;
        $_SESSION['userid'] = 'admin';
        header('Location: list-castbios.php');
    } else {
        $error ="Invalid Credentials";
    }

    //validate
    if (empty($user)) {
        $usererr = "Please enter your username";
    }
    if (empty($pass)) {
        $passerr = "Please enter your password";
    }
}


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
    <title>New Movies</title>
</head>
<body>
<header>
    <?php include '../header.php'; ?>
</header>
<main>
    <div class="container">
        <h1>New Movies</h1>
    </div>
    <form method="post" action="loginpage.php">
        <div class="container">
            <div class="error">
                <?= isset($error) ? $error : ''; ?>
            </div>
            <div class="form-field">
                <div>
                    <?= isset($usererr) ? $usererr : ''; ?>
                </div>
                <label for="username">Username</label>
                <input type="text" name="username"/>
            </div>
            <div class="form-field">
                <div>
                    <?= isset($passerr) ? $passerr : ''; ?>
                </div>
                <label for="userpass">Password</label>
                <input type="password" name="userpass"/>
        </div>
        <input id="login" name="login" type="submit" value="Login"/>
    </form>
</main>

<footer>
    <?php include '../footer.php'; ?>
</footer>
</body>
</html>