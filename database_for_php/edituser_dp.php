<?php
require_once "../back_end/conn.php";


function update_user($emp_id, $image, $dept_id, $man_id, $position, $branch, $pdo)
{
  $sql = "update employees set  image=:i,dept_id=:d,manager_id=:m,position=:p,
branch_location=:b where emp_id=:emp_id ";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':i', $image, PDO::PARAM_STR);
  $stmt->bindParam(':d', $dept_id, PDO::PARAM_STR);
  $stmt->bindParam(':m', $man_id, PDO::PARAM_STR);
  $stmt->bindParam(':p', $position, PDO::PARAM_STR);
  $stmt->bindParam(':b', $branch, PDO::PARAM_STR);
  $stmt->bindParam(':emp_id', $emp_id, PDO::PARAM_STR);
  return $stmt->execute();
}
function find_all_employee_info($emp_id, $pdo)
{
  $sql = "select * from employees where emp_id=:e";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':e', $emp_id, PDO::PARAM_STR);
  $stmt->execute();
  $result = $stmt->fetch();
  return $result;
}
