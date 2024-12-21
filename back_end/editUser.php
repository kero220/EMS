<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit User</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
   <link rel="stylesheet" href="../front_end/editUser.css">
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
            <a href="mangeDepartments.php"><i class="fa-solid fa-users-gear"></i> Manage Departments</a>
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
            <div id="container" class="m-auto mt-20 rounded-xl">
               <h1 class="text-center text-2xl p-4 m-4 font-semibold">
                  Edit Employee Info
               </h1>
               <div id="wrapper">
                  <form class="flex flex-col gap-6 ">
                     <div class="rounded-md border  bg-white p-4 shadow-md w-36 m-auto mb-4">
                        <label for="upload" class="flex flex-col items-center gap-2 cursor-pointer">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-white stroke-indigo-500"
                              viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                 d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                           </svg>
                           <span class="text-gray-600 font-medium">Select Image</span>
                        </label>
                        <input id="upload" type="file" class="hidden" required />
                     </div>
                     <div id="nameDiv" class="m-4 flex justify-around">
                        <input type="number" id="departmentID" placeholder="Department ID"
                           class="rounded-lg text-center font-bold p-2 m-4" required />
                        <input type="number" id="manager_id" placeholder="Manager ID"
                           class="rounded-lg text-center font-bold p-2 m-4" required />

                     </div>
                     <div id="positionDiv" class="m-4 flex justify-around">
                        <input type="text" id="position" placeholder="New Position"
                           class="rounded-lg text-center font-bold p-2 m-4" required />
                        <input type="text" id="location" placeholder="New Location"
                           class="rounded-lg text-center font-bold p-2 m-4" required />
                     </div>
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