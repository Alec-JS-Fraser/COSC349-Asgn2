<!-- database connection php -->
<?php
$db_host   = 'asgn2db-1.cbnbfhtjyoem.us-east-1.rds.amazonaws.com';
$db_name   = 'asgndb';
$db_user   = 'admin';
$db_passwd = 'password';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
?>