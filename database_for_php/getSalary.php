<?php

require_once '../back_end/conn.php';

function getSalary($pdo){
   try{
      $sql = "SELECT s.base_salary, s.extra_hour_salary as bonus, s.salary_date, s.salary_time, s.deduction,
            CONCAT(e.fname, ' ' , e.lname) as name, e.position
      FROM salary s JOIN employees e
      ON(s.emp_id = e.emp_id)";

      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      // $stmt->setFetchMode(PDO::FETCH_ASSOC);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   } catch (PDOException $e){
      echo "Error accepting request: " . $e->getMessage();
      return [];
   }
}

   // foreach($result as $row){
   //    echo 'base_salary:' . $row['base_salary']. "<br>";
   //    echo 'bonus:' . $row['bonus']. "<br>";
   //    echo 'salary_date:' . $row['salary_date']. "<br>";
   //    echo 'salary_time:' . $row['salary_time']. "<br>";
   //    echo 'deduction:' . $row['deduction']. "<br>";
   //    echo 'name:' . $row['name']. "<br>";
   //    echo 'position:' . $row['position']. "<br>";
   //    echo "<br>";
   // }