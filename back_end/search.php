<?php

require_once "conn.php";

$sql = "SELECT * FROM attendance
   WHERE attendance_time LIKE ?, attendance_id LIKE ?, 
   attendance_date LIKE ?, emp_id LIKE ?, time_out LIKE ?";

$stmt = $pdo->prepare($sql);
$stmt->execute(["%" . $_POST['search'] . "%", "%" . $_POST['search'] . "%"]);

$stmt->setFetchMode(PDO::FETCH_ASSOC);
$res = $stmt->fetchAll();