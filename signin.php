<?php
require_once "conn.php";
require_once "token.php";
session_start();


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



   <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
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
                                                                                          echo fetch_one_column(find_employee_by_token($_COOKIE['token'], $pdo), "username");
                                                                                        }   ?>" required>
         </div>
         <!----------------------------password field-------------------------------->
         <div class="password_txt">
            <!-- <label for="password">Password</label> -->
            <input type="password" name="password" id="password" placeholder="Password" value="<?php if (isset($_COOKIE['token'])) {
                                                                                              echo fetch_one_column(find_employee_by_token($_COOKIE['token'], $pdo), "password");
                                                                                            } ?>" required>
         </div>
         <!----------------------------check box-------------------------------->
         <div class="remember_forget">
            <input type="checkbox" name="remember" value="<?php echo isset($_COOKIE['token']) ? 'checked' : '' ?>">
            <label>Remember Me</label>
         </div>
         <!----------------------------signin button-------------------------------->
         <input type="submit" name="submit" value="Signin" class="btn">
         <br>
      </div>
   </form>
</body>

</html>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST["password"]) && isset($_POST["username"])) {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    $hash = hash('sha256', $password);


    // DISPLAY DATA FROM DB
    $sql = "SELECT * FROM employees WHERE username =:u AND password = :pwd";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':u', $username, PDO::PARAM_STR);
    $stmt->bindParam(':pwd', $hash, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {

      $rs = $stmt->fetch();
      /*foreach ($rs as $row => $col) {
        echo $row . '=>' . $col;
      }*/

      if (isset($_POST["remember"])) {
        $token = generate_tokens();
        $selector = $token[0];
        $validator = $token[1];
        $hashed_validator = hash('sha256', $validator);

        date_default_timezone_set("Africa/Cairo");
        $expire = date('Y-m-d H:i:s', strtotime("+1 hour"));
        insert_token($selector, $hashed_validator, $expire, $rs['emp_id'], $pdo);

        setcookie("token", "$selector:$hashed_validator", strtotime("+1 hour"), "/");

      } else {
        setcookie("token", "$selector:$hashed_validator", time() - 1, "/");
      }


      if (isset($_SESSION['time'])) {  // first time login using session[time] + add function that create this session after the login only
        session_regenerate_id(true);
        $_SESSION["session_id"] = session_create_id();
        $_SESSION['emp_id'] = $rs['emp_id'];
        $_SESSION['active'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['hash'] = $hash;
        update_emp_status($rs['emp_id'], $_SESSION['active'], $pdo);
      } else {
          if(time() - $_SESSION['time'] >= 1800){  // expire after 30 min
            session_regenerate_id(true);
            $_SESSION['time'] = time();  // change 'last_generation' with 'time'
          }
      }

      $pdo = NULL;
      $stmt = NULL;
      header('Location:templet.php');
      $_SESSION['time'] = time();
      exit;
    } else {

      echo "<div class='error' style='letter-spacing: 1px;color: red;margin-top: 10px;margin-bottom: 50px;font-size: medium;text-align: center;font_weight:10px;border : 2px solid;border-radius:10px;box-shadow:5px 5px 10px 2px  rgb(188, 187, 187);padding: 2px'>";
      echo "Invalid Username or Password , Please Try Again";
      echo "</div>";
    }
  }
}
?>