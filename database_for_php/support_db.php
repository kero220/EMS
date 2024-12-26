<?php
require_once "../back_end/conn.php";
function insert_comment($emp_id, $issue, $file, $pdo)
{
  $sql = "insert into support (emp_id,file,string_comment,support_timestamp)
 values(e:,f:,c:,now())";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':e', $emp_id, PDO::PARAM_STR);
  $stmt->bindParam(':f', $file, PDO::PARAM_STR);
  $stmt->bindParam(':c', $issue, PDO::PARAM_STR);
  return $stmt->execute();
}
