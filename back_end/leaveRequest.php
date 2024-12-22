<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Leave Request</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
   <link rel="stylesheet" href="../front_end/leaveRequest.css">
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet" />

</head>

<body>
   <div class="page">
      <button class="text-red-500 absolute top-3 left-2 z-20  rounded-lg p-2" id="hideShowBtn" onclick="myFunction()">
         <div><img src="pngegg.png" alt=""></div>
      </button>
      <div class="list">
         <a href="dashboard.php" class="dashboard_link block"><i class="fa-solid fa-sliders"></i> Dashboard</a>
         <!----user managment---->
         <a href="#" class="mainLink block">User Managment</a>
         <div id="linksList">
            <a href="manageUser.php"><i class="fa-solid fa-user"></i> Manage User</a>
            <a href="addUser.php"><i class="fa-solid fa-gears"></i> Add User</a>
         </div>
         <!----employee managment---->
         <a href="#" class="mainLink block">Employee Managment</a>
         <div id="linksList">
            <a href="manageEmployee.php"><i class="fa-solid fa-users-viewfinder"></i> Manage Employees</a>
            <a href="manageDepartments.php"><i class="fa-solid fa-users-gear"></i> Manage Departments</a>
            <a href="manageDesignation.php"><i class="fa-solid fa-file"></i> Manage Designations</a>
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
            <a href="#"><i class="fa-solid fa-plus ml-8"></i> New Item</a>
            <div class="navbar flex items-center gap-4">
               <?php require_once 'uploadPhoto.php'; ?>
               <label for="username">User_name</label>
               <a href="signout.php" class="text-red-500 font-bold">Sign Out</a>
            </div>

         </header>
         <section>
            <div id="container" class="m-auto mt-20 rounded-xl bg-gray-100 p-6 shadow-lg max-w-xl">
               <h1 class="text-center text-2xl p-4 m-4 font-semibold">
                  Request For leave
               </h1>
               <div id="wrapper">
                  <form class="flex flex-col gap-6 overflow-auto" method="POST" action="../database_for_php/insertToLeaves.php">
                     <div id="contacts" class="flex justify-around my-4 ">
                        <input type="email" id="email" placeholder="Email" class="rounded-lg text-center font-bold p-2"
                           name="email" required />

                        <input type="text" id="phone" placeholder="Phone" class="rounded-lg text-center font-bold p-1"
                           name="phone" required />
                     </div>
                     <div id="date" class="flex justify-around my-4">
                        <input type="time" id="employeeID" placeholder="Time"
                           class="rounded-lg text-center font-bold p-2 w-1/3" name="time" required />

                        <input type="date" id="date" class="rounded-lg text-center font-bold p-2 w-2/6"
                           value="<?php date_default_timezone_set("Africa/Cairo"); $d = date_create(); echo date_format($d, "Y-m-d") ?>"
                           name="date" required />
                     </div>
                     <textarea name="reason" id="reson" class="mx-10 mt-4 mb-8 p-2 text-center"
                        placeholder="Enter Your Reason" required></textarea>
                     <textarea name="summary" id="reson" class="mx-10 mt-4 mb-8 p-2 text-center"
                        placeholder="Enter summary" required></textarea>
                     <button type="submit" id="submitBtn" class="w-4/6 m-auto p-2 text-white font-bold rounded-2xl">
                        Submit
                     </button>
                  </form>
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