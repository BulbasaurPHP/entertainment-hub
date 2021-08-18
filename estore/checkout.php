<?php 
session_start();
require_once 'class/db3.class.php';
use DB\Database as Database;

require_once 'models/cart.php';

if(isset($_POST['makePurchase'])) {

    $details=$_POST['details'];
    $finaltotal=$_POST['finaltotal'];


    $db = Database::getDb();
    $c = new Cart();
    $count = $c->makePurchase($details, $finaltotal, $db);


    echo "<script>alert('Thank you for your purchase!')</script>";
    
    echo "<h4>Purchase Confirmed. <a href='?emptycart'>Click here </a> to head back to the estore.</h4>";


    //echo $finaltotal;
}

//empty cart button

if(isset($_GET['emptycart'])) {
    session_unset();

    header('Location:index.php');
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">

    <title>Checkout</title>
</head>
<body>

<?php include 'header.php'; ?>
<div id="estore-display">
    <h1>Checkout:</h1>
    <div id="emptycart">
            <a href="index.php?emptycart"><button>Empty Cart</button></a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <?php 
        $total=0;
        foreach($_SESSION["shopping_cart"] as $keys => $values) {
            $subtotal = $values['item_quantity'] * $values['item_price'];
            $total += $subtotal;
            echo "<tr><td>". $values["item_name"]."</td><td>$".number_format($values["item_price"],2)."</td><td>".$values["item_quantity"]."</td><td>$". number_format($subtotal,2)."</td></tr>";
        }
            $total = $total * 1.13;  // COVERING TAXES
            echo "<tr><td><b>TOTAL COST: </td><td></td><td></td><td><b>$". number_format($total,2). "</b></td></tr>";
        ?>
    </table>
    <?php
    //break down shopping cart array as a string so it can be stored in the database

    $cartTotal = $_SESSION["shopping_cart"];
    $orderDetails = "Order Placed: ";

    //var_dump($orderDetails);

        //MESSAGE RECEIVED IN THE DATABASE
    for ($i = 1; $i <= count($cartTotal); $i++) {
        $orderDetails .= "[item #$i: Item name: ".$cartTotal[$i-1]['item_name'] . " / Item price: " . $cartTotal[$i-1]['item_price'] . " / Item Quantity: " . $cartTotal[$i-1]['item_quantity'] . "] | ";
    }

    //echo count($orderDetails) . ' done.'


    ?>
    <form method="POST">
        <input type="hidden" name="finaltotal" value="<?php echo $total ?>">
        <input type="hidden" name="details" value="<?php echo $orderDetails?>">
        <input type="submit" name="makePurchase" value="Purchase">
    </form>
    
</div>    

</body>
</html>