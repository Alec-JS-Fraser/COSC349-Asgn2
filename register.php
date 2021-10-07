<!-- php script for registerign a new user and addingf them to the users table -->
<?php
include 'conn.php';

$name = $_POST['regName'];
$password = $_POST['regPass'];
$confirm = $_POST['conPass'];


if ($password!=$confirm){
    die('Passwords do not match!');
}
try{
    $q = mysqli_query($con, "INSERT INTO users (userName, password) VALUES ('$name','$password')"); // query to add new user in table
    mysqli_stmt_bind_param(':username',$name);
    $q->bindValue(':password',$password);
    $result=$q->execute();

} catch (PDOException $e) {
    throw $e;  
}
header('Location: site.php');
exit;
?>
