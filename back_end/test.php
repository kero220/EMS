<?php
require_once "conn.php";

$query = "SELECT * FROM attendance";
$stmt = $pdo->prepare($query);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);


echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Employee ID</th>";
    echo "<th>Attendance Time</th>";
    echo "<th>Attendance ID</th>";
    echo "<th>Attendance Date</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

   foreach ($stmt->fetchAll() as $row){
      echo "<tr>";
        echo "<td>" . $row['emp_id'] . "</td>";
        echo "<td>" . $row['attendance_time'] . "</td>";
        echo "<td>" . $row['attendance_id'] . "</td>";
        echo "<td>" . $row['attendance_date'] . "</td>";
      echo "</tr>";
   }

    echo "</tbody>";
    echo "</table>";
   /* [0] => attendance_time
   /* [1] => attendance_id
   /* [2] => attendance_date
   /* [3] => emp_id
   */





?>