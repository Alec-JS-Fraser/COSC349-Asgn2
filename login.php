<!-- PHP script for logging in and creating session -->
<?php
session_start();

include "conn.php"; 

$user = $_POST['name'];
$pass = $_POST['password'];

// creates session with logged in user to show corret wallet
try{
    $q=mysqli_query($con,"SELECT * FROM users WHERE userName = '$user'");
    $u = mysqli_fetch_assoc($q);
    
    $query = "SELECT * FROM users";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row["Name"] ;
    }
    if ($u==false){
        die('$u==false');
    }else{
        if ($pass==$u['password']){
            $_SESSION['user_id']=$u['userID'];
            $_SESSION['logged_in']=time();
            header('Location: index.php');
            exit;
        }else{
            die('Incorrect username or password');

        }
    }
} catch (mysqli_sql_exception $e) {
    throw $e;  
}
header('Location: site.php');
exit;
?>


