<!-- PHP script to add coins to a users wallet --> 
<?php
include 'conn.php';

session_start();
$user = $_SESSION['user_id'];

$coin = $_POST['coin'];
$price = $_POST['price'];
$amount = $_POST['amount'];

try {
    $sql = "INSERT INTO coin (coinName, coinValue) VALUES ('$coin', $price)"; // query to insert the coin
    mysqli_query($con,$sql);
    $q = mysqli_query($con, "SELECT coinID FROM coin WHERE coinName = '$coin'"); // query to select the coin ID
    $coinid = mysqli_fetch_assoc($q);
    $coinid2 = $coinid['coinID'];
    $sql1 = "INSERT INTO wallets (walletID, userID, coinID, amount) VALUES (NULL, $user, $coinid2, $amount)"; // query to insert link to the coin and user in the wallet
    mysqli_query($con, $sql1);
    

    $sql2 = "INSERT INTO transactions (userID, coinID, tranType) VALUES ($user, $coinid2, 'Added Coin')"; //query to insert record into transactions
    mysqli_query($con,$sql2);
}   catch (mysqli_sql_exception $e) {
    throw $e;  
}
header('Location: site.php');
exit;
?>