<?php


function getInfo($pdo){
   try{
      $sql = "SELECT e.emp_id, CONCAT(e.fname, CONCAT(' ', lname)) as name,
            d.dept_id, d.manager_id, d.dept_name,
            r.feedback, s.base_salary
      FROM departments d JOIN employees e
      ON(d.dept_id = e.dept_id)
      JOIN review r ON(r.reviewee_id = e.emp_id)
      JOIN salary s ON(s.emp_id = e.emp_id)";

      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);

   } catch( PDOException $e){
      die("Error accepting request: " . $e->getMessage());
   }
}


// FOR NUMBER OF EMPLOYEES
function numEmployees($pdo){
   try{
      $sql = "SELECT username FROM employees";

      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);

   } catch( PDOException $e){
      die("Error accepting request: " . $e->getMessage());
   }
}


// FOR NUMBER OF REVIEWS
function numReviews($pdo){
   try{
      $sql = "SELECT feedback FROM review";
      
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

      } catch( PDOException $e){
         die("Error accepting request: " . $e->getMessage());
      }
}


// FOR NUMBER OF REQUESTS
function numRequests($pdo){
   try{
      $sql = "SELECT leave_request FROM leaves
            WHERE leave_status = 'Pending'";
      
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

      } catch( PDOException $e){
         die("Error accepting request: " . $e->getMessage());
      }
}


// FOR NUMBER OF ACTIVES
function numActives($pdo){
   try{
      $sql = "SELECT active_flag FROM employees";
      
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

      } catch( PDOException $e){
         die("Error accepting request: " . $e->getMessage());
      }
}