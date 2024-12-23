<?php
require_once '../back_end/conn.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $reason = $_POST['reason'];
   // echo $reason;

      // **ADD reviewee_id & reviewer_id ATTRIBUTE**

      $sql = "INSERT INTO review(reviewee_id, reviewer_id, feedback)
            VALUES('625802', '2000', :reason)";

      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(":reason", $reason);
      // $stmt->bindParam(":reviewee_id", $reviewee_id);
      // $stmt->bindParam(":reviewer_id", $reviewer_id);
      $stmt->execute();

      header("Location: ../back_end/addReview.php");
      exit;
}