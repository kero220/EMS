<?php
require_once "../back_end/conn.php";
function select_all_from_employees($rows_num, $pdo)
{
  $sql = "select * from employees limit :r";
  $stmt = $pdo->prepare($sql);
  #echo $rows_num;
  $stmt->bindParam(':r',  $rows_num, PDO::PARAM_STR);


  $stmt->execute();

  return $stmt;
}
function return_contact_row($emp_id, $pdo)
{
  $sql = 'select phone,e_mail from contact where emp_id=:e';
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':e', $emp_id, PDO::PARAM_STR);
  $stmt->execute();
  $result = $stmt->fetch();

  return $result;
}
function return_department_row($dept_id, $pdo)
{
  $sql = "select dept_name,manager_id from departments where dept_id=:d ";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':d', $dept_id, PDO::PARAM_STR);
  $stmt->execute();
  $result = $stmt->fetch();
  return $result;
}
function search($name, $limit, $pdo)
{
  $sql = "select  * from employees where concat(concat(fname,' '),lname) like :n limit :l";
  $stmt = $pdo->prepare($sql);
  $n = '%' . $name . '%';
  $stmt->bindParam(':n', $n, PDO::PARAM_STR);
  $stmt->bindParam(':l', $limit, PDO::PARAM_STR);
  $stmt->execute();


  return $stmt;
}
function button_delete($emp_id, $pdo)
{





  $sql = "DELETE FROM employees WHERE emp_id = :e";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':e', $emp_id, PDO::PARAM_STR);
  return $stmt->execute();
}
