<?php
include "signin.php";

echo $_POST['username'] . "<br>";
echo $_POST['password'] . "<br>";
echo $hash . "<br>";
echo $_COOKIE["token"];