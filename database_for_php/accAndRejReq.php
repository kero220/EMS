<?php
require_once "../back_end/conn.php";

date_default_timezone_set("Africa/Cairo");
$_SESSION['state_request'] = "Pending";
$status = $_SESSION['state_request'];
// $id = $_SESSION['emp_id'];

if(isset($_POST['accept'])){
   $_SESSION['state_request'] = "Accept";
   $status = $_SESSION['state_request'];
   $time = $_POST['accept'];

   // echo $status . "<br>";
   // echo $time;


   // UPDATE STATUS

   try{
      $sql = "UPDATE leaves SET leave_status = :st WHERE leave_time = :tm";  // AND emp_id = :id
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(":st", $status);
      $stmt->bindParam(":tm", $time, PDO::PARAM_STR);
      // $stmt->bindParam(":id", $id);
      $stmt->execute();
   } catch (PDOException $e){
      die( "Error accepting request: " . $e->getMessage());
   }
}


if(isset($_POST['reject'])){
   $_SESSION['state_request'] = "Reject";
   $status = $_SESSION['state_request'];
   $time = $_POST['reject'];

   // echo $status;
   // echo $time;


   // UPDATE STATUS

   try{
      $sql = "UPDATE leaves SET leave_status = :st WHERE leave_time = :tm";  // AND emp_id = :id
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(":st", $status);
      $stmt->bindParam(":tm", $time, PDO::PARAM_STR);
      // $stmt->bindParam(":id", $_SESSION['emp_id']);
      $stmt->execute();
   } catch (PDOException $e){
      echo "Error rejecting request: " . $e->getMessage();
   }
}

header("Location: ../back_end/manageLeave.php");
exit;