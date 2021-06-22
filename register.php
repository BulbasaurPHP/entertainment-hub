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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="request form">
        <title>PHP Content</title>
    </head>
    <body>
        <main>
            <form method="post" action="index.php" id="register-form">
                <div class="container">
                    <div id="sem">
                        <label for="category">Category</label>
                        <select name="category">
                            <option value="Select category">select category</option>
                            <?php

                            // PHP Array for dropdown
                            $category=['Jeans','Shoes','Accessories'];
                            for ($i=0; $i<count($category);$i++)
                            {
                                echo "<option value='$category[$i]'> $category[$i] </option>";
                            }
                            ?>
                        </select>
                    </div>
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
                        <label for="role">Role</label>
                        <input type="radio" name="role" value="admin">
                        <label for="admin">Admin</label>
                        <input type="radio" name="role" value="user">
                        <label for="user">User</label>
                    </div>
                </div>
                <input id='buy' type="submit" value="Buy">
            </form>
        </main>
    </body>
</html>
