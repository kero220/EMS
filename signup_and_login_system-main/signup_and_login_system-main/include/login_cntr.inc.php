<?php

declare(strict_types=1);

function is_empty(string $username, string $pwd){
   if (empty($username) || empty($pwd))
      return true;
   else
      return false;
}

function is_user_wrong(bool|array $result){
   if (!$result)
      return true;
   else
      return false;
}

function is_password_wrong(string $pwd, string $hashPwd){
   if (!password_verify($pwd, $hashPwd))
      return true;
   else
      return false;
}