<?php
require_once  "../back_end/conn.php";
require_once  "../database_for_php/manageUser_dp.php";
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

<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Manage Designations</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
   <link rel="stylesheet" href="../front_end/manageDesignation.css">
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet" />
   <meta http-equiv="refresh" content="3600"><!--auto refresh the page-->
   <link rel="icon" href="../webapp_img/employee-management-system-icon-hexa-color-_27374D-_1_ (1).ico" type="image/ico">
</head>

<body>
   <div class="page">
      <button class="text-red-500 absolute top-3 left-2 z-20  rounded-lg p-2" id="hideShowBtn" onclick="myFunction()">
         <div><img src="../webapp_img/pngegg.png" alt=""></div>
      </button>
      <div class="list">
         <a href="../back_end/dashboard.php" class="dashboard_link block"><i class="fa-solid fa-sliders"></i>
            Dashboard</a>
         <!----50 managment---->
         <a href="#" class="mainLink block">User Managment</a>
         <div id="linksList">
            <a href="../back_end/manageUser.php"><i class="fa-solid fa-user"></i> Manage User</a>
            <a href="../back_end/addUser.php"><i class="fa-solid fa-gears"></i> Add User</a>
         </div>
         <!----employee managment---->
         <a href="#" class="mainLink block">Employee Managment</a>
         <div id="linksList">
            <a href="../back_end/manageEmployee.php"><i class="fa-solid fa-users-viewfinder"></i> Manage Employees</a>
            <a href="../back_end/manageDepartments.php"><i class="fa-solid fa-users-gear"></i> Manage Departments</a>
            <a href="../back_end/manageDesignation.php"><i class="fa-solid fa-file"></i> Manage Designations</a>
         </div>
         <!----attendance---->
         <a href="#" class="mainLink block">Attendance</a>
         <div id="linksList">
            <a href="../back_end/Schedule.php"><i class="fa-solid fa-clock"></i> Schedule</a>
            <a href="../back_end/dailyAttendance.php"><i class="fa-solid fa-calendar-days"></i> Daily Attendance</a>
            <a href="../back_end/attendanceSheet.php"><i class="fa-solid fa-book"></i> Sheet Report</a>
         </div>
         <!----leave managment---->
         <a href="#" class="mainLink block">Leave Managment</a>
         <div id="linksList">
            <a href="../back_end/manageLeave.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Manage Leaves</a>
            <a href="../back_end/leaveRequest.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Leave
               Request</a>
         </div>
      </div>

      <div class="content w-full">
         <header class="z-10">
            <!--<a href="#"><i class="fa-solid fa-plus ml-8"></i> New Item</a>-->
            <div class="navbar flex items-center gap-4">
               <?php echo "<img id='user_img' src='data:image/jpeg;base64," .   $_SESSION['image']  .  "'alt='User Image' class='w-10'>" ?>
               <label for="username"><?php echo $_SESSION['username']; ?></label>
               <a href="../back_end/signin.php" class="text-red-500 font-bold">Sign Out</a>
            </div>

         </header>
         <section>

            <div id="container" class="my-4 m-auto p-4">
               <form id="manageDesignationForm" class="flex flex-col gap-4 h-full max-h-auto min-w-auto">
                  <div id="myH1" class="text-2xl mb-6">Payroll</div>
                  <div id="wrapper">
                     <div id="tableWrapper">
                        <table id="table" class="w-full m-auto">
                           <thead>
                              <tr>
                                 <th>Empolyee Name</th>
                                 <th>Position</th>
                                 <th>Base Salary</th>
                                 <th>Bonus</th>
                                 <th>Salary Date</th>
                                 <th>Salary Time</th>
                                 <th>Deduction</th>
                                 <th>Monthly Salary</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <?php
                                 require_once "../database_for_php/getSalary.php";

                                 $result = getSalary($pdo);
                                 foreach ($result as $row): ?>

                              <tr>
                                 <td><?php echo $row['name']; ?></td>
                                 <td><?php echo $row['position']; ?></td>
                                 <td><?php echo $row['base_salary']; ?></td>
                                 <td><?php echo $row['bonus']; ?></td>
                                 <td><?php echo $row['salary_date']; ?></td>
                                 <td><?php echo $row['salary_time']; ?></td>
                                 <td><?php echo $row['deduction']; ?></td>
                                 <td><?php echo $row['base_salary'] - $row['deduction'] + $row['bonus']; ?></td>
                              </tr>
                              <?php endforeach ?>;
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <!-- <button type="submit" id="submitBtn" class="px-4 py-2 text-white mb-4 rounded-md font-semibold">
                        submit
                     </button> -->

                  </div>
               </form>
            </div>
         </section>
         <footer>
            <div class="copyright">
               <h2>EMS&copy;</h2>
            </div>
            <ul class="Fnavbar">
               <li><a href="support.php">Support</a></li>
               <li><a href="privacy.php">Privacy</a></li>
               <li><a href="terms.php">terms</a></li>
            </ul>

         </footer>
      </div>

   </div>
   <script src="../front_end/list.js"></script>
</body>

</html>