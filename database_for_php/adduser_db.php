<?php



require_once   "../back_end/conn.php";

function insert_new_employee($upload = null, $fname, $lname, $date, $user, $pass, $man_id = null, $dept_id, $position, $branch_location, $email, $flag, $phone, $pdo)
{
  $sql1 = "insert into employees (image, fname, lname, hire_date, username, password, manager_id, dept_id, position,branch_location,active_flag)
  values(:i,:f,:l,:h,:u,:pass,:m,:d,:p,:b,:a)";

  $stmt1 = $pdo->prepare($sql1);
  $stmt1->bindParem(':i', $upload, PDO::PARAM_STR);
  $stmt1->bindParem(':f', $fname, PDO::PARAM_STR);
  $stmt1->bindParem(':l', $lname, PDO::PARAM_STR);
  $stmt1->bindParem(':h', $date, PDO::PARAM_STR);
  $stmt1->bindParem(':u', $user, PDO::PARAM_STR);
  $stmt1->bindParem(':pass', $pass, PDO::PARAM_STR);
  $stmt1->bindParem(':m', $man_id, PDO::PARAM_STR);
  $stmt1->bindParem(':d', $dept_id, PDO::PARAM_STR);
  $stmt1->bindParem(':p', $position, PDO::PARAM_STR);
  $stmt1->bindParem(':b', $branch_location, PDO::PARAM_STR);
  $stmt1->bindParem(':a', $flag, PDO::PARAM_STR);
  $f1 = $stmt1->execute();
  $emp_id = $pdo->lastInsertId(); #get last table name from last insert statement


  $sql2 = "insert into contact (emp_id , phone , e_mail)values(:em,:p,:e)";
  $stmt2 = $pdo->prepare($sql2);
  $stmt2->bindParem(':em', $emp_id, PDO::PARAM_STR);
  $stmt2->bindParem(':p', $phone, PDO::PARAM_STR);
  $stmt2->bindParem(':e', $email, PDO::PARAM_STR);

  $f2 = $stmt2->execute();

  return $emp_id;
}
function generate_unique_password_username($emp_id, $name, $insert_date, $pdo)
{
  $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' .
    '0123456789`-=~!@#$%^&*()_+,./<>?;:[]{}\|';

  $username =  $name . explode('-', $insert_date) . $emp_id;
  $password =  substr(str_shuffle($chars), 0, 12);

  return [$username, $password];
}