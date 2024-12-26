<?php

require_once "../back_end/conn.php";
function select_all_from_employees($rows_num, $pdo)
{
  $sql = "select * from employees limit :r";
  $stmt = $pdo->prepare($sql);
  #echo $rows_num;
  $stmt->bindParam(':r', $rows_num, PDO::PARAM_STR);


  $stmt->execute();

  return $stmt;
}
function get_last_attendance_id($emp_id, $pdo)
{

  $sql = "select attendance_id from attendance where emp_id=:e order by attendance_time desc , attendance_date desc limit 1";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':e', $emp_id, PDO::PARAM_STR);
  $stmt->execute();

  $result = $stmt->fetch();
  return $result;
}
function get_last_leave_id($emp_id, $pdo)
{



  $sql = "select leave_id from leaves where emp_id=:e order by leave_time desc , leave_date desc limit 1";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':e', $emp_id, PDO::PARAM_STR);
  $stmt->execute();

  $result = $stmt->fetch();
  return $result;
}
function search($name, $emp_id, $limit, $pdo)
{
  if ($emp_id == 1) {
    $sql = "select * from employees where emp_id=:e ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':e', $name, PDO::PARAM_STR);
    $stmt->execute();
    #echo "hello";


    return $stmt;
  } elseif ($emp_id == 0) {

    $sql = "select * from employees where concat(concat(fname,' '),lname) like :n  limit :l";
    $stmt = $pdo->prepare($sql);
    $n = '%' . $name . '%';
    $stmt->bindParam(':n', $n, PDO::PARAM_STR);
    $stmt->bindParam(':l', $limit, PDO::PARAM_STR);

    $stmt->execute();
    return $stmt;
  }
}
function button_delete($emp_id, $pdo)
{





  $sql = "DELETE FROM employees WHERE emp_id = :e";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':e', $emp_id, PDO::PARAM_STR);
  return $stmt->execute();
}
function return_department_row($dept_id, $pdo)
{
  $sql = "select dept_name from departments where dept_id=:d ";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':d', $dept_id, PDO::PARAM_STR);
  $stmt->execute();
  $result = $stmt->fetch();
  return $result;
}
