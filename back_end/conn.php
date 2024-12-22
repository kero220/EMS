<?php
$server = "localhost:3306";
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

  $pdo = new Pdo($dsn, $user, $pass, $options);
} catch (PDOException $e) {

  throw new PDOException($e->getMessage(), $e->getCode());
}