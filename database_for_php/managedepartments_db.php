<?php
require_once "../back_end/conn.php";
function return_department_row($limit, $pdo)
{
  $sql = "select * from departments  limit :l ";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':l', $limit, PDO::PARAM_STR);

  $stmt->execute();

  return $stmt;
}
function search($name, $dept_id, $limit, $pdo)
{
  if ($dept_id == 1) {
    $sql = "select * from departments where dept_id=:e  limit :l";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':l', $limit, PDO::PARAM_STR);
    $stmt->bindParam(':e', $name, PDO::PARAM_STR);

    $stmt->execute();


    return $stmt;
  } elseif ($dept_id == 0) {

    $sql = "select * from departments where dept_name like :n  limit :l";
    $stmt = $pdo->prepare($sql);
    $n = '%' . $name . '%';
    $stmt->bindParam(':n', $n, PDO::PARAM_STR);
    $stmt->bindParam(':l', $limit, PDO::PARAM_STR);

    $stmt->execute();
    return $stmt;
  }
}
function get_empnum_in_department($dept_id, $pdo)
{
  $sql = "select count(emp_id) from employees where dept_id=:d  ";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':d', $dept_id, PDO::PARAM_STR);
  $stmt->execute();
  $result = $stmt->fetch();
  return $result;
}
