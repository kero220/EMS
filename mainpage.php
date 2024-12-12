<?php
include "signin.php";

echo $_POST['username'] . "||" . $_POST['password'] . "<br>";
echo $hash . "<br>";
echo $_SESSION["time"] . "<br>";
echo $_COOKIE["token"]. "<br>";