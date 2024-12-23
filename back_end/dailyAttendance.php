<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Daily Attendace</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
   <link rel="stylesheet" href="../front_end/dailyAttendance.css">
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet" />

</head>

<body>
   <div class="page">
      <button class="text-red-500 absolute top-3 left-2 z-20  rounded-lg p-2" id="hideShowBtn" onclick="myFunction()">
         <div><img src="../webapp_img/pngegg.png" alt=""></div>
      </button>
      <div class="list">
         <a href="dashboard.php" class="dashboard_link block"><i class="fa-solid fa-sliders "></i> Dashboard</a>
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
            <a href="../back_end/Schedule.php"><i class="fa-solid fa-clock"></i> Schedule</a>
            <a href="../back_end/dailyAttendance.php"><i class="fa-solid fa-calendar-days"></i> Daily Attendance</a>
            <a href="../back_end/attendanceSheet.php"><i class="fa-solid fa-book"></i> Sheet Report</a>
         </div>
         <!----leave managment---->
         <a href="#" class="mainLink block">Leave Managment</a>
         <div id="linksList">
            <a href="../back_end/managLeave.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Manage Leaves</a>
            <a href="../back_end/leaveRequest.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Leave
               Request</a>
         </div>
      </div>

      <div class="content w-full">
         <header class="z-10">
            <a href="#"><i class="fa-solid fa-plus ml-8"></i> New Item</a>
            <div class="navbar flex items-center gap-4">
               <?php require_once 'uploadPhoto.php'; ?>
               <label for="username">User_name</label>
               <a href="signout.php" class="text-red-500 font-bold">Sign Out</a>
            </div>

         </header>
         <section>
            <div id="container" class="m-auto my-4 p-2">
               <div id="header" class="text-left flex justify-between mb-4 mt-2 mx-2">
                  <h1 id="myH1" class="text-2xl">Attendace Schedule</h1>
                  <button id="btnAdd" class=" rounded-lg text-white font-bold">
                     Add
                  </button>
               </div>
               <div id="wrapper" class="rounded-t-lg">
                  <p class="text-left mb-2 text-[] text-base">Daily Attendance</p>
                  <table id="table" class="w-full">
                     <thead>
                        <tr>
                           <th>Image</th>
                           <th>ID</th>
                           <th>Name</th>
                           <th>Department ID</th>
                           <th>1</th>
                           <th>2</th>
                           <th>3</th>
                           <th>4</th>
                           <th>5</th>
                           <th>6</th>
                           <th>7</th>
                           <th>8</th>
                           <th>9</th>
                           <th>10</th>
                           <th>11</th>
                           <th>12</th>
                           <th>13</th>
                           <th>14</th>
                           <th>15</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>
                              <div id="image"><img src="" alt="" /></div>
                           </td>
                           <td>1</td>
                           <td>Mohamed Amer</td>
                           <td>5</td>
                           <td>
                              <div id="attendanceBtn">
                                 <input type="checkbox" />
                                 <input type="checkbox" />
                              </div>
                           </td>
                           <td>
                              <div id="attendanceBtn">
                                 <input type="checkbox" />
                                 <input type="checkbox" />
                              </div>
                           </td>
                           <td>
                              <div id="attendanceBtn">
                                 <input type="checkbox" />
                                 <input type="checkbox" />
                              </div>
                           </td>
                           <td>
                              <div id="attendanceBtn">
                                 <input type="checkbox" />
                                 <input type="checkbox" />
                              </div>
                           </td>
                           <td>
                              <div id="attendanceBtn">
                                 <input type="checkbox" />
                                 <input type="checkbox" />
                              </div>
                           </td>
                           <td>
                              <div id="attendanceBtn">
                                 <input type="checkbox" />
                                 <input type="checkbox" />
                              </div>
                           </td>
                           <td>
                              <div id="attendanceBtn">
                                 <input type="checkbox" />
                                 <input type="checkbox" />
                              </div>
                           </td>
                           <td>
                              <div id="attendanceBtn">
                                 <input type="checkbox" />
                                 <input type="checkbox" />
                              </div>
                           </td>
                           <td>
                              <div id="attendanceBtn">
                                 <input type="checkbox" />
                                 <input type="checkbox" />
                              </div>
                           </td>
                           <td>
                              <div id="attendanceBtn">
                                 <input type="checkbox" />
                                 <input type="checkbox" />
                              </div>
                           </td>
                           <td>
                              <div id="attendanceBtn">
                                 <input type="checkbox" />
                                 <input type="checkbox" />
                              </div>
                           </td>
                           <td>
                              <div id="attendanceBtn">
                                 <input type="checkbox" />
                                 <input type="checkbox" />
                              </div>
                           </td>
                           <td>
                              <div id="attendanceBtn">
                                 <input type="checkbox" />
                                 <input type="checkbox" />
                              </div>
                           </td>
                           <td>
                              <div id="attendanceBtn">
                                 <input type="checkbox" />
                                 <input type="checkbox" />
                              </div>
                           </td>
                           <td>
                              <div id="attendanceBtn">
                                 <input type="checkbox" />
                                 <input type="checkbox" />
                              </div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
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