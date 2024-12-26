<?php
require_once "../back_end/conn.php";
function update_dept($dept_id, $dept_name, $man_id, $pdo)
{
  $sql = "update departments set dept_name=:dn,manager_id=:m
 where dept_id=:d";
  $stmt = $pdo->prepare($sql);

  $stmt->bindParam(':d', $dept_id, PDO::PARAM_STR);
  $stmt->bindParam(':m', $man_id, PDO::PARAM_STR);


  $stmt->bindParam(':dn', $dept_name, PDO::PARAM_STR);
  return $stmt->execute();
}
