<?php
require_once  "../back_end/conn.php";
require_once  "../database_for_php/support_db.php";
date_default_timezone_set("Africa/Cairo"); # set time() to egypt timestamp
session_start(); #to get session permission
# check security

if (isset($_COOKIE['token'])) {
  if (is_token_expired($_COOKIE['token'], $pdo)) { # if cookie exist .. will check the expiration
    $_SESSION['active'] = "not_active";

    update_emp_status($_SESSION['emp_id'], $_SESSION['active'], $pdo);
    #echo $_SESSION['emp_id'] . "hh";
    delete_token($_SESSION['emp_id'], $pdo);

    session_unset(); #remove all session variables
    session_destroy();
    # delete all user tokens


    setcookie("token", "", time() - 1, "/"); #expire cookie and token and delete from browser


    header("location: ../back_end/signin.php");
    exit;
  }

  # echo "no cookie set";
}







?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EMS - Support</title>
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../front_end/terms.css">
  <meta http-equiv="refresh" content="3600">
  <link rel="icon" href="../webapp_img/employee-management-system-icon-hexa-color-_27374D-_1_ (1).ico" type="image/ico">
</head>

<body>
  <header>
    <h1>Employee Management System</h1>
    <p>Support</p>
  </header>

  <div id="container" class="pb-40px">
    <h2>Introduction</h2>
    <p>Welcome to the Employee Management System (EMS) support page. Here you will find resources and guidance for addressing any issues or inquiries you may have.</p>

    <h2>1. Common Issues</h2>
    <ol>
      <li>Login Problems: Ensure your credentials are correct. If you’ve forgotten your password, use the “Forgot Password” feature.</li>
      <li>Data Errors: Contact the HR department to report discrepancies in your records.</li>
      <li>System Downtime: Check for announcements regarding maintenance or outages.</li>
    </ol>

    <h2>2. How to Get Help</h2>
    <ol>
      <li>Email Support: Reach out to <a href="mailto:support@ems.com">support@ems.com</a> for assistance.</li>
      <li>Help Desk: Visit the help desk during business hours for in-person support.</li>
      <li>Online Resources: Access FAQs and user guides through the EMS portal.</li>
    </ol>

    <h2>3. Reporting Issues</h2>
    <ol>
      <li>Provide a detailed description of the issue, including screenshots if possible.</li>
      <li>Specify the steps to reproduce the problem to help us resolve it quickly.</li>
      <li>Report urgent issues via the emergency contact line.</li>
    </ol>

    <h2>4. Submit an Issue</h2>
    <form action="/submit-issue" method="post">
      <!--<input type="text" id="name" placeholder="Your Name" name="name" class="bg-blue-900 text-white font-bold rounded-2xl p-3 mx-auto w-4/6" required><br><br>-->

      <!--<input type="email" id="email" placeholder="Your Email" name="email" class="bg-blue-900 text-white font-bold rounded-2xl p-3 mx-auto w-4/6" required><br><br>-->

      <textarea id="issue" name="issue" placeholder="Describe the Issue" rows="5" class="bg-blue-900 text-white font-bold rounded-2xl p-3 mx-auto w-4/6" required></textarea><br><br>

      <input type="file" name="file" id="attachment" placeholder="Attach a File (optional)" class="bg-blue-900 text-white font-bold rounded-2xl p-3 mx-auto w-4/6" name="attachment"><br><br>

      <button type="submit" name="submit" class="bg-blue-900 text-white font-bold rounded-2xl p-3 mx-auto">Submit</button>


      <?php
      if (isset($_POST['submit'])) {


        if (insert_comment($_SESSION['emp_id'], $_POST['issue'], file_get_contents($_FILES['file']), $pdo)) {
          echo "<div style='color:green'>";
          echo "Comment Submitted Successfully✅";
          echo "</div>";
        } else {
          echo "<div style='color:red'>";
          echo "Error Existed , Please Try Again!";
          echo "</div>";
        }
      }



      ?>
    </form>

    <h2>5. Feedback</h2>
    <p>We value your feedback and use it to improve the EMS. Submit your suggestions or concerns through the feedback form available on the portal.</p>

    <h2>Contact Information</h2>
    <p>For further support, contact our support team at:</p>
    <ul>
      <li>Email: <a href="mailto:support@ems.com">support@ems.com</a></li>
      <li>Phone: +1-800-555-EMS1</li>
      <li>Office: EMS Support Center, 123 Main Street, Cityville</li>
    </ul>
  </div>

  <footer>
    <p>&copy; 2024 EMS. All Rights Reserved.</p>
  </footer>
</body>

</html>