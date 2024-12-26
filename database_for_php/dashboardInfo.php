<?php


function getInfo($pdo)
{
   try {
      $sql = "SELECT e.emp_id, CONCAT(e.fname, CONCAT(' ', e.lname)) as name,
            d.dept_id, d.manager_id, d.dept_name,
            r.feedback, s.base_salary
      FROM departments d JOIN employees e
      ON(d.dept_id = e.dept_id)
      JOIN review r ON(r.reviewee_id = e.emp_id)
      JOIN salary s ON(s.emp_id = e.emp_id)";

      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   } catch (PDOException $e) {
      die("Error accepting request: " . $e->getMessage());
   }
}


// FOR NUMBER OF EMPLOYEES
function numatt($pdo)
{
   try {
      $sql = "SELECT count(attendance_id) FROM attendance where attendance_date=current_date";

      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetch();
   } catch (PDOException $e) {
      die("Error accepting request: " . $e->getMessage());
   }
}


// FOR NUMBER OF REVIEWS
function numReviews($pdo)
{
   try {
      $sql = "SELECT count(feedback) FROM review";

      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   } catch (PDOException $e) {
      die("Error accepting request: " . $e->getMessage());
   }
}


// FOR NUMBER OF REQUESTS
function numRequests($pdo)
{
   try {
      $sql = "SELECT leave_request FROM leaves
            WHERE leave_status = 'pending'";

      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   } catch (PDOException $e) {
      die("Error accepting request: " . $e->getMessage());
   }
}


// FOR NUMBER OF ACTIVES
function numActives($pdo)
{
   try {
      $sql = "SELECT active_flag FROM employees where active_flag='active' ";

      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   } catch (PDOException $e) {
      die("Error accepting request: " . $e->getMessage());
   }
}
function small_table_show($pdo)
{
   $sql = "select emp_id,CONCAT(fname, CONCAT(' ', lname)) as emp_name,active_flag
 ,dept_id from employees   ";
   $stmt = $pdo->prepare($sql);
   $stmt->execute();
   return $stmt;
}
