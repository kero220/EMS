<?php
require_once "conn.php";
require_once "token.php";

#_________following code must be in all pages__________

date_default_timezone_set("Africa/Cairo"); # set time() to egypt timestamp
session_start(); #to get session permission
# check security

if (isset($_COOKIE['token'])) {
  if (is_token_expired($_COOKIE['token'], $pdo)) { # if cookie exist .. will check the expiration
    $_SESSION['active'] = "not_active";

    update_emp_status($_SESSION['emp_id'], $_SESSION['active'], $pdo);
    echo $_SESSION['emp_id'] . "hh";
    delete_token($_SESSION['emp_id'], $pdo);

    session_unset(); #remove all session variables
    session_destroy();
    # delete all user tokens


    setcookie("token", "", time() - 1, "/"); #expire cookie and token and delete from browser


    header("location: signin.php");
    exit;
  }
  echo "no cookie set";
}






?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>EMS</title>
   <link rel="icon" href="webapp_img\employee-management-system-icon-hexa-color-_27374D-_1_ (1).ico" type="image/ico">
   <link rel="stylesheet" href="signin.css">

</head>

<body>



   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
      <div class="welcome">
         <p><strong>Welcome Back</strong><br>Sign In To Your Account To Continue</p>

      </div>
      <div class="signin">
         <!--Sign in div-->
         <!----------------------------image-------------------------------->
         <div class="image">
            <img src="webapp_img/user.png" alt="user photo">
         </div>
         <!----------------------------username field-------------------------------->
         <div class="username_txt">
            <!-- <label for="username">Username</label> -->
            <input type="text" name="username" id="username" placeholder="Username" value="<?php if (isset($_COOKIE['token'])) {
                                                                                          echo find_username_by_token($_COOKIE['token'], $pdo);
                                                                                        }   ?>">
         </div>
         <!----------------------------password field-------------------------------->
         <div class="password_txt">
            <!-- <label for="password">Password</label> -->
            <input type="password" name="password" id="password" placeholder="Password" value="<?php if (isset($_COOKIE['token'])) {
                                                                                              echo find_password_by_token($_COOKIE['token'], $pdo);
                                                                                            }   ?>">
         </div>
         <!----------------------------check box-------------------------------->
         <div class="remember_forget">
            <input type="checkbox" name="remember">
            <label>Remember Me</label>
         </div>
         <!----------------------------signin button-------------------------------->
         <input type="submit" name="submit" value="Sign In" class="btn">
         <br>



      </div>

   </form>



</body>

</html>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  # session_status()

  if (isset($_POST["password"]) && isset($_POST["username"])) {  # ensure fields not empty
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS); # ensure  that field ensure (prevent injection xss,sql,...)
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    #$GLOBALS['password'] = $password;

    #$GLOBALS['stmt'];  # search in db table for unique row
    if (empty($_SESSION['session_id']) && search_about_hash($username, hash("sha256", $password), $pdo)) { #if user isn't rememebered (expired_token) 
      $hash = hash('sha256', $password);  # hashing password in datatbase

      $GLOBALS['stmt'] = find_all_employees_columns($username, $hash, $pdo);
    } else if (isset($_SESSION['session_id']) && $password == hash('sha256', $_SESSION['password'])) { #if user is remembered and fields is auto filled(hash not plaintext password)

      $GLOBALS['stmt'] = find_all_employees_columns($username, $password, $pdo);
    } else if (isset($_SESSION['session_id']) && search_about_hash($username, hash("sha256", $password), $pdo)) { #remembered but user delete auto_filled data

      $hash = hash('sha256', $password);  # hashing password in datatbase

      $GLOBALS['stmt'] = find_all_employees_columns($username, $hash, $pdo);
    } else { #error in password or username

      echo "<div class='error' >";
      echo "Invalid Username or Password , Please Try Again";
      echo "</div>";
      return;
    }



    if ($GLOBALS['stmt']->rowCount() == 1) {  #ensure that sql display the unique row

      $rs = $GLOBALS['stmt']->fetch(); # go to next row


      if (isset($_POST["remember"]) && (empty($_COOKIE['token']))) { # if  rememeber checkbox is on  and not have a token or session id
        $token = generate_tokens();
        $selector = $token[0];
        $validator = $token[1];
        $hashed_validator = hash('sha256', $validator);

        $expire = date('Y-m-d H:i:s', strtotime("+1 hour"));
        insert_token($selector, $hashed_validator, $expire, $rs['emp_id'], $pdo);

        setcookie("token", "$selector:$hashed_validator", strtotime("+2 hour"), "/");
      }
      if (empty($_SESSION['session_id'])) { # if session has created and has id when username 
        #and password are correct according to db

        #session_regenerate_id(true);
        #session_name()

        $_SESSION["session_id"] = session_id();
        $_SESSION['active'] = "active";
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['token'] = $_COOKIE['token'];
        $_SESSION['hash'] = $hash;
        $_SESSION['emp_id'] = $rs['emp_id'];
        $_SESSION['session_time'] = time();
        $_SESSION['HTTP_USER_AGENT'] = hash("sha256", $_SERVER["HTTP_USER_AGENT"]); #infos about client 
        $_SESSION['pat'] = $_SERVER["REMOTE_ADDR"] . ":" . $_SERVER['REMOTE_PORT'];
        $_SESSION['REMOTE_USER'] = $_SERVER['REMOTE_USER'];

        update_emp_status($rs['emp_id'], $_SESSION['active'], $pdo);
      }
      #session_regenerate_id();
      $pdo = null;
      header('Location:templet.php');
      exit;
  
    } else {

      echo "<div class='error' >";
      echo "Invalid Username or Password , Please Try Again";
      echo "</div>";
    }
  }
}

?>