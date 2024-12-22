<?php
require_once '../back_end/conn.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $email = htmlspecialchars($_POST['email']);
      $phone = htmlspecialchars($_POST['phone']);
      $reason = htmlspecialchars($_POST['reason']);
      $summary = htmlspecialchars($_POST['summary']);
      $time = $_POST['time'];
      $date = $_POST['date'];

      $_SESSION['state_request'] = "Pending";
      $state = $_SESSION['state_request'];
      // $id = $_SESSION['emp_id'];

      // echo $email . "<br>";
      // echo $phone . "<br>";
      // echo $time . "<br>";
      // echo $date . "<br>";
      // echo $reason . "<br>";
      // echo $summary . "<br>";
      // echo $id . "<br>";

      // INSERT INTO DATABASE
      // **ADD emp_id ATTRIBUTE**

      $sql = "INSERT INTO leaves(leave_time, leave_date, leave_request, leave_type, leave_status, emp_id)
            VALUES(:time, :date, :reason, :summ, :st, '625802')";

      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(":time", $time);
      $stmt->bindParam(":date", $date);
      $stmt->bindParam(":reason", $reason);
      $stmt->bindParam(":summ", $summary);
      $stmt->bindParam(":st", $state);
      // $stmt->bindParam(":id", $id);
      $stmt->execute();

      header("Location: ../back_end/manageLeave.php");
      exit;
}