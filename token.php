
<?php
require_once "conn.php";

function generate_tokens()
{



  $selector = bin2hex(random_bytes(16));
  $validator = bin2hex(random_bytes(32)); #convert bytes to hexa
  return array($selector, $validator);
}
#----------------------------------------------------------------
function divide_token($token)
{

  $parts = explode(":", $token);
  if ($parts && count($parts) == 2) {
    return [$parts[0], $parts[1]];
  }
  return null;
}
#----------------------------------------------------------------

function insert_token($selector, $hashed_validator, $expire, $emp_id, $pdo)
{


  $sql = "insert into user_tokens (selector,hashed_validator,expire,emp_id) values(:s,:v,:ex,:emp)";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':s', $selector, PDO::PARAM_STR);
  $stmt->bindParam(':v', $hashed_validator, PDO::PARAM_STR);

  $stmt->bindParam(':ex', $expire, PDO::PARAM_STR);

  $stmt->bindParam(':emp', $emp_id, PDO::PARAM_STR);


  return $stmt->execute(); # return $stmt->execute(); also true 
}
#----------------------------------------------------------------
function find_token_by_emp_id($emp_id, $pdo)
{

  $sql = "select selector , hashed_validator , expire , token_id , emp_id from user_tokens where emp_id=:e and expire > now()";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':e', $emp_id, PDO::PARAM_STR);


  $stmt->execute();
  $result = $stmt->fetch();
  return $result;
}
#----------------------------------------------------------------
function delete_token($emp_id, $pdo)
{


  $sql = "delete from user_tokens where emp_id=:e ";/*all tokens of user*/

  $stmt = $pdo->prepare($sql);

  $stmt->bindParam(':e', $emp_id, PDO::PARAM_STR);


  return $stmt->execute();
}

#----------------------------------------------------------------
function find_username_by_token($token, $pdo)
{

  if (!$token) {
    return false;
  }
  $parts = divide_token($token);
  #echo $parts[0] . " " . $parts[1];
  $sql = "SELECT  e.username
            FROM employees e 
            left  JOIN user_tokens u ON e.emp_id = u.emp_id
            WHERE u.selector =:s AND
                u.hashed_validator=:v and u.expire > now()";

  $stmt = $pdo->prepare($sql);

  $stmt->bindParam(':s', $parts[0], PDO::PARAM_STR);
  $stmt->bindParam(':v', $parts[1], PDO::PARAM_STR);
  $stmt->execute();
  $rs = $stmt->fetch();

  if (!$rs) {
    return false;  // Return false if no username found
  }

  return $rs['username'];
}

#----------------------------------------------------------------

#----------------------------------------------------------------
function valid_token($token, $pdo)
{

  if (!$token) return false;
  #$rs = find_token_by_selector($token[0], $pdo);
  #return $token[1] == $rs["hashed_validator"];
}
#----------------------------------------------------------------

function update_emp_status($emp_id, $flag, $pdo)
{

  $sql = "UPDATE employees SET active_flag = :a WHERE emp_id = :u";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':a', $flag, PDO::PARAM_STR);
  $stmt->bindParam(':u', $emp_id, PDO::PARAM_STR);
  $stmt->execute();
}
#----------------------------------------------------------------

function find_password_by_token($token, $pdo)
{

  if (!$token) {
    return false;
  }
  $parts = divide_token($token);
  #echo $parts[0] . " " . $parts[1];
  $sql = "SELECT  e.password
            FROM employees e 
            left  JOIN user_tokens u ON e.emp_id = u.emp_id
            WHERE u.selector =:s AND
               u.hashed_validator=:v and u.expire > now()";

  $stmt = $pdo->prepare($sql);

  $stmt->bindParam(':s', $parts[0], PDO::PARAM_STR);
  $stmt->bindParam(':v', $parts[1], PDO::PARAM_STR);
  $stmt->execute();
  $rs = $stmt->fetch();
  if (!$rs) {
    return false;  // Return false if no username found
  }


  return $rs['password'];
}
#---------------------------------------------------------------
function find_all_employees_columns($username, $password, $pdo)
{




  $sql = "SELECT * FROM employees WHERE username =:u AND password =:p";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':u', $username, PDO::PARAM_STR);
  $stmt->bindParam(':p', $password, PDO::PARAM_STR);
  $stmt->execute();
  return $stmt;
}






#______________________________________________________________________
function is_token_expired($token, $pdo)
{

  $parts = divide_token($token);


  $sql = "select expire from user_tokens where selector=:s and hashed_validator =:v";
  $stmt = $pdo->prepare($sql);

  $stmt->bindParam(':s', $parts[0], PDO::PARAM_STR);
  $stmt->bindParam(':v', $parts[1], PDO::PARAM_STR);
  $stmt->execute();
  $rs = $stmt->fetch();
  $is_expired = 0;
  if (!$rs) {
    return $is_expired;
  }

  $now = date("Y-m-d H:i:s", time());
  /*echo $now . "<br>";
  echo $rs['expire'];*/

  for ($i = 0; $i < strlen($rs['expire']); $i++) { #YYYY-MM-DD HH:MM:SS;

    if ($rs['expire'][$i] == " " || $rs['expire'][$i] == "-" || $rs['expire'][$i] == ":") {

      continue;
    }
    echo intval($now[$i]) - intval($rs['expire'][$i]);
    if ((intval($now[$i]) - intval($rs['expire'][$i]))   > 0) { # if now - expiredate is negative so token not expired

      $is_expired = 1;
      break;
    } elseif ((intval($now[$i]) - intval($rs['expire'][$i])) < 0) {
      $is_expired = 0;
      break;
    }
  }
  #echo $is_expired;
  return $is_expired;
}
#----------------------------------------------------------------
function update_token_status($token, $flag, $pdo)
{
  $parts = divide_token($token);

  $sql = "UPDATE user_tokens SET is_expired =:e WHERE selector =:s and hashed_validator=:v";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':e', $flag, PDO::PARAM_STR);
  $stmt->bindParam(':s', $parts[0], PDO::PARAM_STR);
  $stmt->bindParam(':v', $parts[1], PDO::PARAM_STR);
  $stmt->execute();
}
function search_about_hash($username, $password, $pdo)
{
  $sql = "SELECT password FROM employees WHERE password =:p and username=:u";
  $stmt = $pdo->prepare($sql);

  $stmt->bindParam(':p', $password, PDO::PARAM_STR);
  $stmt->bindParam(':u', $username, PDO::PARAM_STR);
  $stmt->execute();

  return $stmt->fetch();
}
function get_last_connection_of_user($emp_id, $pdo)
{



  $sql = "SELECT selector,hashed_validator ,expire FROM user_tokens WHERE emp_id=:e order by  expire desc limit 1;";
  $stmt = $pdo->prepare($sql);

  $stmt->bindParam(':e', $emp_id, PDO::PARAM_STR);

  $stmt->execute();
  $rs = $stmt->fetch();
  return $rs['selector'] . ":" . $rs['hashed_validator'];
}
?>