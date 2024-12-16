<?php
$server = "localhost";
$dp = "ems_db";
$user = "root";
$pass = "";
$charset = "utf8mb4";
$dsn = "mysql:host=$server;dbname=$dp;charset=$charset;";
$options = [

  pdo::ATTR_ERRMODE => pdo::ERRMODE_EXCEPTION,
  pdo::ATTR_DEFAULT_FETCH_MODE => pdo::FETCH_ASSOC,
  pdo::ATTR_EMULATE_PREPARES => false

];


try {

  $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOEXCEPTION $e) {
  echo "Connection Failed: " . $e->getMessage();
}

$DSN = 'mysql: host=localhost; dbname=myfirstdb';  // Data Source Name
$dbUsername = 'root';
$dbPassword = '';

// try {
//    $PDO = new PDO($DSN, $dbUsername, $dbPassword);  // PHP Data Object
//    $PDO -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch(PDOEXCEPTION $error){
//    echo "Connection Failed: " . $error->getMessage();
// }