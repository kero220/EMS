<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EMS</title>
  <link rel="icon" href="#">
  <link rel="stylesheet" href="signin.css">
</head>

<body>

  <div class="welcome">
    <h2>Welcome Back</h2>
    <p>Sign In To Your Account To Continue</p>





  </div>
  <div class="signin-container">

    <form action="signin.php" method="post">

      <div class="signin"> <!--Sign in div-->
        <!----------------------------image-------------------------------->
        <div class="image">
            <img src="user.png" alt="user photo">
        </div>
        <!----------------------------username field-------------------------------->
        <div class="user_txt">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" placeholder=" Enter Username">
        </div>
        <!----------------------------password field-------------------------------->
        <div class="user_txt">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" placeholder="Enter Password">
        </div>
        <!----------------------------check box-------------------------------->
        <div class="remember_forget">
          <label>
            <input type="checkbox" name="remember">Remember Me
          </label>
          
          <a href="#">Forgot password?</a>
        </div>
        
        <!----------------------------signin button-------------------------------->
        <button type="submit" class="btn" >Sign in</button>
        <br>


      </div>
      <! <div class="error">
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (isset($_POST["submit"]) && (empty($_POST["username"]) || empty($_POST['password']))) {

            echo "There Is One Or More Fields Empty " . "<br>";
          } else {

            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
            if (isset($_POST["password"])) {
              $hash = password_hash($password, PASSWORD_BCRYPT);
            }
          }
        }

        ?>

  </div>
  </form>

  </div>


</body>

</html>