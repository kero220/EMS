<?php

session_start();
session_unset();
session_destroy();

// ERASE COOKIES

// if (isset($_SERVER['HTTP_COOKIE'])) {
//    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);

//    foreach($cookies as $cookie) {
//       $parts = explode('=', $cookie);  //VALUE OF PHPSESSID
//       $name = trim($parts[0]);   //PHPSESSID
//       setcookie($name, '', time()-1, '/');
//    }
// }

foreach($_COOKIE as $name => $value){
   echo $name . '=>' . $value;
   setcookie($name, '', time()-1, '/');
}

header("Location: signin.php");
die();