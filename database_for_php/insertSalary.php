<?php
require_once "../back_end/conn.php";

function getName($pdo){
   $query = "SELECT CONCAT(fname, CONCAT(' ', lname)) as name, position
            FROM employees";

   $stmt = $pdo->prepare($query);
   $stmt->execute();
   return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



// if(isset($_POST['baseSalary']) || isset($_POST['salaryDate']) || isset($_POST['salaryTime'])){
//    try{
//       $sql = "UPDATE salary s
//       JOIN employees e ON(s.emp_id = e.emp_id)
//       SET
//       base_salary = :base,
//       salary_date = :dat,
//       salary_time = :tim,
//       commission = :com,
//       deduction = :ded
//       WHERE e.username = :uname";

//          $stmt = $pdo->prepare($sql);
//          $stmt->bindParam(":base", $_POST['baseSalary']);
//          $stmt->bindParam(":dat", $_POST['salaryDate']);
//          $stmt->bindParam(":tim", $_POST['salaryTime']);
//          $stmt->bindParam(":com", $_POST['commission']);
//          $stmt->bindParam(":de", $_POST['deduction']);
//          $stmt->bindParam(":uname", $_POST['username']);
//          $stmt->execute();
//    } catch (PDOException $e){
//       echo "Error accepting request: " . $e->getMessage();
//       }
// }

// header("Location: ../back_end/Payroll.php");
// exit;