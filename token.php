<?php
require_once "conn.php";

function generate_tokens(){
  $selector = bin2hex(random_bytes(16));
  $validator = bin2hex(random_bytes(32)); #convert bytes to hexa
  return array($selector, $validator);
}

function divide_token($token){
  $parts = explode(":", $token);
  return $parts;
}


function insert_token($selector, $hashed_validator, $expire, $emp_id, object $pdo){
  $sql = "insert into user_tokens (selector,hashed_validator,expire,emp_id) values(:s,:v,:ex,:emp)";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':s', $selector, PDO::PARAM_STR);
  $stmt->bindParam(':v', $hashed_validator, PDO::PARAM_STR);

  $stmt->bindParam(':ex', $expire, PDO::PARAM_STR);

  $stmt->bindParam(':emp', $emp_id, PDO::PARAM_STR);
  $stmt->execute();
  return $stmt->rowCount() > 0; # return $stmt->execute(); also true
}

function find_token_by_selector($selector, $pdo){
  $sql = "select selector , hashed_validator , expire , token_id , emp_id from user_tokens where selector=:s and expire > now()";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':s', $selector, PDO::PARAM_STR);

  $stmt->execute();
  $result = $stmt->fetch();
  return $result;
}

function delete_token($emp_id, $pdo){
  $sql = "delete from user_tokens where emp_id=:e ";/*all tokens of user*/

  $stmt = $pdo->prepare($sql);

  $stmt->bindParam(':e', $emp_id, PDO::PARAM_STR);

  return $stmt->execute();
}

function find_employee_by_token($token, $pdo){
  if (!$token) {
    return false;
  }
  $parts = divide_token($token);
  #echo $parts[0] . " " . $parts[1];
  $sql = "SELECT e.emp_id, e.username,e.password
            FROM employees e left JOIN user_tokens u 
            ON e.emp_id = u.emp_id
            WHERE u.selector =:s 
            AND u.expire > now()";

  $stmt = $pdo->prepare($sql);

  $stmt->bindParam(':s', $parts[0], PDO::PARAM_STR);
  $stmt->execute();

  return $stmt->fetch();
}
function fetch_one_column($result, $index){
  if (!$result)
    return false;

  return $result[$index];
}

function valid_token($token, $pdo){
  if (!$token) return false;
  $rs = find_token_by_selector($token[0], $pdo);
  return $token[1] == $rs["hashed_validator"];
}


function update_emp_status($emp_id, $flag, $pdo){
  $sql = "UPDATE employees SET active_flag = :a WHERE emp_id = :u";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':a', $flag, PDO::PARAM_STR);
  $stmt->bindParam(':u', $emp_id, PDO::PARAM_STR);
  $stmt->execute();
}

?>