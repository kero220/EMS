<?php
require_once "../back_end/conn.php";
function insert_department($name, $manager_id, $pdo)
{

  $sql = "insert into departments (dept_name,manager_id) values(:n,:m)";

  $stmt = $pdo->prepare($sql);

  $stmt->bindParam(':n', $name, PDO::PARAM_STR);

  $stmt->bindParam(':m', $manager_id, PDO::PARAM_STR);

  return $stmt->execute();
}
