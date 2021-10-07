<?php 
 
// Load the database configuration file 
include 'conn.php'; 
 
// Fetch records from database 
$query = $pdo->query("SELECT * FROM users"); 
 

    // Create a file pointer     
    $f = fopen("/var/www/html/Users.csv", "w");
     
    // Set column headers 
    fwrite($f,"\n".'userID'.",".'userName'.",".'userTotal'.",".'gain'.",".'password'); 
     
    
    while($row = $query->fetch()){ 
        fwrite($f, "\n".$row['userID'].",".$row['userName'].",".$row['userTotal'].",".$row['gain'].",".$row['password']); 
    } 
     
    fclose($f);

    
    shell_exec("python3 script.py");

    header('Location: site.php');
    exit;
?>