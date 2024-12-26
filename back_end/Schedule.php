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
   <title>Schedule</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
   <link rel="stylesheet" href="../front_end/Schedule.css">
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
         <!----user managment---->
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
            <a href="Schedule.php"><i class="fa-solid fa-clock"></i> Schedule</a>
            <a href="dailyAttendance.php"><i class="fa-solid fa-calendar-days"></i> Daily Attendance</a>
            <a href="attendanceSheet.php"><i class="fa-solid fa-book"></i> Sheet Report</a>
         </div>
         <!----leave managment---->
         <a href="#" class="mainLink block">Leave Managment</a>
         <div id="linksList">
            <a href="manageLeave.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Manage Leaves</a>
            <a href="leaveRequest.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Leave Request</a>
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
            <div id="container" class="p-4 text-left m-auto">
               <div class="flex justify-between mb-4">
                  <h1 id="myH1" class="text-2xl">Manage Schedule</h1>
                  <button id="addBtn" class="p-2 rounded-lg text-white font-bold">
                     + Add Users
                  </button>
               </div>
               <div id="tableWrapper" class="bg-white h-5/6 p-4 rounded-t-lg">
                  <h1 class="text-base mb-2">User dashboard</h1>
                  <div class="flex justify-between mb-2">
                     <p>
                        Show
                        <select name="colomnsNumber" id="columnSelection" class="border-2 border-black shadow-md">
                           <option value="0">0</option>
                           <option value="10">10</option>
                           <option value="20">20</option>
                           <option value="50">50</option>
                           <option value="100">100</option>
                           <option value="1000">1000</option>
                           <option value="10000">10000</option>
                        </select>
                        Rows
                     </p>


                     <span class="font-bold">Search
                        <input type="search" class="border-2 border-slid border-[#9DB2BF] p-[2px]" name="search" />
                     </span>
                  </div>
                  <table id="table" class="w-full min-h-[5rem]">
                     <thead class="m-2">
                        <tr class="text-center">
                           <th class="min-w-12">Id</th>
                           <th class="max-w-[10rem]">Name</th>
                           <th class="max-w-[10rem]">Date</th>
                           <th>Time In</th>
                           <th>Time Out</th>
                        </tr>
                     </thead>
                     <tbody class="text-center">

                        <?php
                        // ##### DISPLAY EMPLOYEES ATTENDANCE #####
                        $query = "SELECT a.attendance_time, a.attendance_id, a.attendance_date, a.emp_id, a.time_out, e.username
                        FROM attendance a JOIN employees e
                        ON(a.emp_id = e.emp_id)";

                        $stmt = $pdo->prepare($query);
                        $stmt->execute();
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        $result = $stmt->fetchAll();

                        foreach ($result as $row): ?>

                           <tr>
                              <td><?php echo $row['emp_id'] ?></td>
                              <td><?php echo $row['username'] ?></td>
                              <td><?php echo $row['attendance_date'] ?></td>
                              <td>
                                 <div id="time"><?php echo $row['attendance_time'] ?></div>
                              </td>
                              <td>
                                 <div id="time"><?php echo $row['time_out'] ?></div>
                              </td>
                           </tr>
                        <?php endforeach; ?>

                     </tbody>
                  </table>
               </div>
               <footer class="flex justify-between bg-white border-t-2 p-2 rounded-b-lg">
                  <p>List of users</p>
                  <p>Page <span>1</span></p>
               </footer>
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

<?php



?>