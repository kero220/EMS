<?php
require_once '../back_end/conn.php';
?>

<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
   <link rel="stylesheet" href="../front_end/dashboard.css">
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet" />
</head>

<body>
   <div class="page">
      <button class="text-red-500 absolute top-3 left-2 z-20  rounded-lg p-2" id="hideShowBtn" onclick="myFunction()">
         <div><img src="../webapp_img/pngegg.png" alt=""></div>
      </button>
      <div class="list" id="myDIV">
         <a href="../back_end/dashboard.php" class="dashboard_link block"><i class="fa-solid fa-sliders"></i>
            Dashboard</a>
         <!----user managment---->
         <a href="#" class="mainLink block">User Managment</a>
         <div id="linksList" class="block">
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

      <div class="content w-full ">
         <header class="z-10">

            <a href="#"><i class="fa-solid fa-plus ml-8"></i> New Item</a>
            <div class="navbar flex items-center gap-4">
               <?php require_once 'uploadPhoto.php'; ?>
               <label for="username">User_name</label>
               <a href="signout.php" class="text-red-500 font-bold">Sign Out</a>
            </div>
         </header>
         <section>
            <div id="about" class="m-auto">
               <h1 id="mainH1" class="text-left text-2xl px-4 pt-2">
                  <span class="font-bold">Analytics</span> Dahsboard
               </h1>
               <div id="container" class="grid grid-rows-2 grid-cols-4 p-4 gap-6">
                  <div id="left" class="col-span-2 grid grid-rows-2 grid-cols-2 gap-4">
                     <div id="first" class="bg-white rounded-md relative p-2">
                        <p id="leftP" class="text-sm text-left font-semibold">Reviews</p>
                        <span id="leftLogo" class="absolute top-2 right-2 bg-blue-400 opacity-30 rounded-2xl w-8 h-8">
                           <img src="https://cdn-icons-png.flaticon.com/128/1828/1828640.png" alt="" />
                        </span>
                        <p id="leftP2" class="mt-10 text-2xl text-left">
                           <?php

                        // *****SELECT REVIEWS NUMBER*****
                           require_once '../database_for_php/dashboardInfo.php';
                           $review = numReviews($pdo);
                           echo count($review);
                           ?>
                        </p>
                     </div>
                     <div id="second" class="bg-white rounded-md relative p-2">
                        <p id="leftP" class="text-sm text-left font-semibold">Employees</p>
                        <span id="leftLogo"
                           class="absolute top-2 right-2 bg-blue-400 opacity-30 rounded-2xl w-8 h-8"><img
                              src="https://cdn-icons-png.flaticon.com/128/14026/14026792.png" alt="" /></span>
                        <p id="leftP2" class="mt-10 text-2xl text-left">

                           <?php
                           // *****SELECT EMPLOYEES NUMBER*****
                           require_once '../database_for_php/dashboardInfo.php';
                           $employees = numEmployees($pdo);
                           echo count($employees);
                           ?>
                        </p>
                     </div>
                     <div id="third" class="bg-white rounded-md relative p-2">
                        <p id="leftP" class="text-sm text-left font-semibold">Active</p>
                        <span id="leftLogo" class="absolute top-2 right-2 bg-blue-400 opacity-30 rounded-2xl w-8 h-8">
                           <img src="https://cdn-icons-png.flaticon.com/128/14025/14025691.png" alt="" /></span>
                        <p id="leftP2" class="mt-10 text-2xl text-left">

                           <?php
                           // *****SELECT ACTIVES NUMBER*****
                           require_once '../database_for_php/dashboardInfo.php';
                           $active = numActives($pdo);
                           echo count($active);
                           ?>
                        </p>
                     </div>
                     <div id="forth" class="bg-white rounded-md relative p-2">
                        <p id="leftP" class="text-sm text-left font-semibold">
                           Leave request
                        </p>
                        <span id="leftLogo"
                           class="absolute top-2 right-2 bg-blue-400 opacity-30 rounded-2xl w-8 h-8"><img
                              src="https://cdn-icons-png.flaticon.com/128/14025/14025827.png" alt="" /></span>
                        <p id="leftP2" class="mt-10 text-2xl text-left">

                           <?php
                        // *****SELECT PENDING REQUESTS NUMBER*****
                           require_once '../database_for_php/dashboardInfo.php';
                           $requst = numRequests($pdo);
                           echo count($requst);
                           ?>
                        </p>
                     </div>
                  </div>
                  <div id="right" class="col-span-2 text-[#27374d]">
                     <div id="tableWrapper" class="bg-white rounded-md p-2 overflow-auto">
                        <div id="tableDiv" class="flex justify-between mb-4">
                           <h1>Employee</h1>
                           <span class="text-white p-2 rounded-lg">Status</span>
                        </div>
                        <table id="rightTable" class="w-full rounded-md bg-white h-full">
                           <thead>
                              <tr class="border-gray-300 border-solid h-12">
                                 <th>el</th>
                                 <th>Name</th>
                                 <th>Status</th>
                                 <th>Department ID</th>
                                 <th>Review</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <td id="name">Mohamed</td>
                                 <td>
                                    <div class="active">Active</div>
                                 </td>
                                 <td>5</td>
                                 <td>
                                    <button id="tableBtn">Review</button>
                                 </td>
                              </tr>
                              <tr>
                                 <td>1</td>
                                 <td id="name">Mohamed</td>
                                 <td>
                                    <div class="active">Active</div>
                                 </td>
                                 <td>5</td>
                                 <td>
                                    <button id="tableBtn">Review</button>
                                 </td>
                              </tr>
                              <tr>
                                 <td>1</td>
                                 <td id="name">Mohamed</td>
                                 <td>
                                    <div class="active">Active</div>
                                 </td>
                                 <td>5</td>
                                 <td>
                                    <button id="tableBtn">Review</button>
                                 </td>
                              </tr>
                              <tr>
                                 <td>1</td>
                                 <td id="name">Mohamed</td>
                                 <td>
                                    <div class="active">Active</div>
                                 </td>
                                 <td>5</td>
                                 <td>
                                    <button id="tableBtn">Review</button>
                                 </td>
                              </tr>
                              <tr>
                                 <td>1</td>
                                 <td id="name">Mohamed</td>
                                 <td>
                                    <div class="active">Active</div>
                                 </td>
                                 <td>5</td>
                                 <td>
                                    <button id="tableBtn">Review</button>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div id="bottom" class="row-start-2 col-span-4">
                     <div id="tableWrapper" class="bg-white rounded-md p-2">
                        <div id="tableDiv" class="flex justify-between mb-4">
                           <h1 class="text-[#9DB2BF]">Employee</h1>
                           <span class="bg-[#526D82] text-white p-2 rounded-lg">Profile</span>
                        </div>
                        <table id="bottomTable" class="w-full rounded-md bg-white h-44">
                           <thead>
                              <tr class="border-b-[1px] border-gray-300 border-solid h-12">
                                 <th>Id</th>
                                 <th>Name</th>
                                 <th>Department ID</th>
                                 <th>Manager ID</th>
                                 <th>Assosiation</th>
                                 <th>Feedback</th>
                                 <th>Salary</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              // *****SELECT INFO ABOUT EMPLOYEES*****
                              require_once '../database_for_php/dashboardInfo.php';
                              $result = getInfo($pdo);

                              foreach ($result as $row):?>

                              <tr>
                                 <td><?php echo $row['emp_id'];?></td>
                                 <td id="name"><?php echo $row['name'];?></td>
                                 <td><?php echo $row['dept_id'];?></td>
                                 <td><?php echo is_null($row['manager_id']) ? 'empty' : $row['manager_id'];?></td>
                                 <td><?php echo $row['dept_name'];?></td>
                                 <td><?php echo $row['feedback'];?></td>
                                 <td><?php echo $row['base_salary'];?></td>
                              </tr>

                              <?php endforeach;?>

                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
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