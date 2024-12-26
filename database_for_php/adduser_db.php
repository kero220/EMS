<?php



require_once   "../back_end/conn.php";

function insert_new_employee($upload = null, $fname, $lname, $date, $man_id = null, $dept_id, $position, $branch_location, $email, $flag = null, $phone, $pdo)
{
  if (isset($date)) {
    $sql1 = "insert into employees (image, fname, lname, hire_date, manager_id, dept_id, position,branch_location,active_flag)
   values(:i,:f,:l,:h,:m,:d,:p,:b,:a)";

    $stmt1 = $pdo->prepare($sql1);
    $stmt1->bindParam(':i', $upload, PDO::PARAM_STR);
    $stmt1->bindParam(':f', $fname, PDO::PARAM_STR);
    $stmt1->bindParam(':l', $lname, PDO::PARAM_STR);
    $stmt1->bindParam(':h', $date, PDO::PARAM_STR);
    #$stmt1->bindParam(':u', $user, PDO::PARAM_STR);
    #$stmt1->bindParam(':pass', $pass, PDO::PARAM_STR);
    $stmt1->bindParam(':m', $man_id, PDO::PARAM_STR);
    $stmt1->bindParam(':d', $dept_id, PDO::PARAM_STR);
    $stmt1->bindParam(':p', $position, PDO::PARAM_STR);
    $stmt1->bindParam(':b', $branch_location, PDO::PARAM_STR);
    $stmt1->bindParam(':a', $flag, PDO::PARAM_STR);
    $f1 = $stmt1->execute();
    $emp_id = $pdo->lastInsertId(); #get last table name from last insert statement


    $sql2 = "insert into contact (emp_id , phone , e_mail)values(:em,:p,:e)";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(':em', $emp_id, PDO::PARAM_STR);
    $stmt2->bindParam(':p', $phone, PDO::PARAM_STR);
    $stmt2->bindParam(':e', $email, PDO::PARAM_STR);

    $stmt2->execute();

    return $emp_id;
  } else {
    $sql1 = "insert into employees (image, fname, lname, hire_date, manager_id, dept_id, position,branch_location,active_flag)
   values(:i,:f,:l,CURRENT_DATE(),:m,:d,:p,:b,:a)";

    $stmt1 = $pdo->prepare($sql1);
    $stmt1->bindParam(':i', $upload, PDO::PARAM_STR);
    $stmt1->bindParam(':f', $fname, PDO::PARAM_STR);
    $stmt1->bindParam(':l', $lname, PDO::PARAM_STR);
    #$stmt1->bindParam(':h', $date, PDO::PARAM_STR);
    #$stmt1->bindParam(':u', $user, PDO::PARAM_STR);
    #$stmt1->bindParam(':pass', $pass, PDO::PARAM_STR);
    $stmt1->bindParam(':m', $man_id, PDO::PARAM_STR);
    $stmt1->bindParam(':d', $dept_id, PDO::PARAM_STR);
    $stmt1->bindParam(':p', $position, PDO::PARAM_STR);
    $stmt1->bindParam(':b', $branch_location, PDO::PARAM_STR);
    $stmt1->bindParam(':a', $flag, PDO::PARAM_STR);
    $stmt1->execute();
    $emp_id = $pdo->lastInsertId(); #get last table name from last insert statement


    $sql2 = "insert into contact (emp_id , phone , e_mail)values(:em,:p,:e)";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(':em', $emp_id, PDO::PARAM_STR);
    $stmt2->bindParam(':p', $phone, PDO::PARAM_STR);
    $stmt2->bindParam(':e', $email, PDO::PARAM_STR);

    $f2 = $stmt2->execute();

    return $emp_id;
  }
}
function generate_unique_password_username($emp_id, $name, $insert_date, $pdo)
{
  $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' .
    '0123456789`-=~!@#$%^&*()_+,./<>?;:[]{}\|';
  $arr = explode('-', $insert_date);

  $username =  $name . $arr[0] . $arr[1] . $arr[2] . $emp_id;
  $password =  substr(str_shuffle($chars), 0, 15);
  $pass = hash('sha256', $password);
  $sql = "UPDATE employees SET username = :u, password = :p WHERE emp_id = :i";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':u', $username, PDO::PARAM_STR);
  $stmt->bindParam(':p', $pass, PDO::PARAM_STR);
  $stmt->bindParam(':i', $emp_id, PDO::PARAM_STR);
  $stmt->execute();


  return array($username, $password);
}
