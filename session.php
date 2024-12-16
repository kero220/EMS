<?php

require_once "conn.php";

session_start();
function validate_user_then_set_cookie($session_id, $token)
{
  if (isset($_SESSION['HTTP_USER_AGENT'])) {
    if ($_SESSION['HTTP_USER_AGENT'] != hash('sha256', ($_SERVER['HTTP_USER_AGENT']))) { #prevent session high jacking
      header("location:signin.php");
      exit;
    }
  }
}