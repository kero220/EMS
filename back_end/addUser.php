<?php
require_once  "../back_end/conn.php";
require_once  "../database_for_php/adduser_db.php";
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
   <meta http-equiv="refresh" content="3600">
   <title>Add User</title>
   <!-- External CSS Libraries -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
   <link rel="stylesheet" href="../front_end/addUser.css">
   <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
   <link rel="icon" href="../webapp_img/employee-management-system-icon-hexa-color-_27374D-_1_ (1).ico"
      type="image/ico">
</head>

<body>
   <div class="page">

      <!-- Sidebar Navigation -->
      <button class="text-red-500 absolute top-3 left-2 z-20  rounded-lg p-2" id="hideShowBtn" onclick="myFunction()">
         <div><img src="../front_end/pngegg.png" alt=""></div>
      </button>
      <div class="list">
         <a href="../back_end/dashboard.php" class="dashboard_link block"><i class="fa-solid fa-sliders"></i>
            Dashboard</a>

         <!-- User Management Section -->
         <a href="#" class="mainLink block">User Management</a>
         <div id="linksList">
            <a href="../back_end/manageUser.php"><i class="fa-solid fa-user "></i> Manage User</a>
            <a href="../back_end/addUser.php"><i class="fa-solid fa-gears"></i> Add User</a>
         </div>

         <!-- Employee Management Section -->
         <a href="#" class="mainLink block">Employee Management</a>
         <div id="linksList">
            <a href="../back_end/manageEmployee.php"><i class="fa-solid fa-users-viewfinder"></i> Manage Employees</a>
            <a href="../back_end/manageDepartments.php"><i class="fa-solid fa-users-gear"></i> Manage Departments</a>
            <a href="../back_end/manageDesignation.php"><i class="fa-solid fa-file"></i> Manage Designations</a>
         </div>

         <!-- Attendance Section -->
         <a href="#" class="mainLink block">Attendance</a>
         <div id="linksList">
            <a href="../back_end/Schedule.php"><i class="fa-solid fa-clock "></i> Schedule</a>
            <a href="../back_end/dailyAttendance.php"><i class="fa-solid fa-calendar-days"></i> Daily Attendance</a>
            <a href="../back_end/attendanceSheet.php"><i class="fa-solid fa-book"></i> Sheet Report</a>
         </div>

         <!-- Leave Management Section -->
         <a href="#" class="mainLink block">Leave Management</a>
         <div id="linksList">
            <a href="../back_end/manageLeave.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Manage Leaves</a>
            <a href="../back_end/leaveRequest.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Leave
               Request</a>

         </div>
      </div>

      <!-- Main Content -->
      <div class="content w-full">
         <!-- Header -->
         <header class="z-10">

            <!--a href="#"><i class="fa-solid fa-plus ml-8"></i> New Item</!a>-->
            <div class="navbar flex items-center gap-4">
               <!-- <img id='user_img' src='data:image/jpeg;base64," . <?php echo $_SESSION['image'] ?> . "' alt='User Image'
                  class="w-10"> -->
               <label for="username"></label>
               <?php echo isset($_SESSION['username'])? $_SESSION['username'] : ''; ?></label>
               <a href="../back_end/signin.php" class="text-red-500 font-bold">Sign Out</a>
            </div>
         </header>

         <!-- Form Section -->
         <section>
            <div id="container" class="m-auto mt-20 rounded-xl bg-gray-100 p-6 shadow-lg max-w-xl">
               <h1 class="text-center text-2xl font-semibold mb-6">Add Employee</h1>
               <div id="wrapper">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                     enctype="multipart/form-data" class="flex flex-col gap-4 h-full max-h-auto min-w-auto">
                     <!-- Image Upload -->
                     <div class="rounded-md border  bg-white p-4 shadow-md w-36 mx-auto">
                        <label for="upload" class="flex flex-col items-center gap-2 cursor-pointer">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-white stroke-indigo-500"
                              viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                 d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                           </svg>
                           <span class="text-gray-600 font-medium">Select Image</span>
                        </label>
                        <input id="upload" name="file" type="file" class="hidden" required />
                        <?php
                                if (isset($_POST['submit'])) {
                                    $file = $_POST['file'];
                                    $_FILES['file'] = $file;

                                    $GLOBALS['image'] = $_FILES['file'];
                                    $GLOBALS['image_name'] = $image['name'];
                                    $GLOBALS['image_size'] = $image['size'];
                                    $GLOBALS['image_error'] = $image['error'];
                                    $GLOBALS['image_type'] = $image['type'];
                                    $GLOBALS['image_tmp_name'] = $image['tmp_name'];
                                }
                                ?>
                     </div>


                     <!-- Name Input -->
                     <div id="nameDiv" class="flex justify-around gap-4">
                        <input type="text" id="fname" placeholder="First Name"
                           class="rounded-lg text-center font-bold p-2 w-full" required />
                        <input type="text" id="lname" placeholder="Last Name"
                           class="rounded-lg text-center font-bold p-2 w-full" required />
                     </div>

                     <!-- Date Input -->
                     <div id="dateDiv">
                        <input disabled='<?php echo isset($GLOBALS['date']) ? $GLOBALS['date'] : false ?>' type="date"
                           id="date" name="date" class="rounded-lg text-center font-bold p-2 w-full cursor-text"
                           required />
                     </div>

                     <!-- User Info -->
                     <div id="nameDiv" class="flex justify-around gap-4">
                        <input type="text" id="User_name" placeholder="User Name"
                           class="rounded-lg text-center font-bold p-2 w-full" required />
                        <input type="password" id="Password" placeholder="Password"
                           class="rounded-lg text-center font-bold p-2 w-full" required />
                     </div>

                     <!-- Position Input -->
                     <div id="positionDiv">
                        <input type="text" id="position" placeholder="Position"
                           class="rounded-lg text-center font-bold p-2 w-full" required />
                     </div>
                     <!-- Anthor Info -->
                     <div id="nameDiv" class="flex justify-around gap-4">
                        <input type="number" id="manager_id" placeholder="Manager ID"
                           class="rounded-lg text-center font-bold p-2 w-full" required />
                        <input type="number" id="dept_id" placeholder="Department ID"
                           class="rounded-lg text-center font-bold p-2 w-full" required />
                     </div>
                     <!-- Branch Location -->
                     <div id="positionDiv">
                        <input type="text" id="Branch_location" placeholder="Branch Location"
                           class="rounded-lg text-center font-bold p-2 w-full" />
                     </div>
                     <!--email+phone-->
                     <div id="nameDiv" class="flex justify-around gap-4">
                        <input type='tel' id="phone" placeholder="Phone Number"
                           class="rounded-lg text-center font-bold p-2 w-full" required />
                        <input type="email" id="email" placeholder="Email"
                           class="rounded-lg text-center font-bold p-2 w-full" required />
                     </div>
                     <!--Check Box-->
                     <div id="checkDiv">
                        <input type="checkbox" id="Cdate" name="Cdate" class="rounded-lg text-center font-bold p-2  "
                           required /><span>Choose Current Date
                        </span>
                        <?php
                                if (isset($_POST['Cdate'])) {
                                    $GLOBALS['date'] = true;
                                }
                                ?>
                     </div>
                     <!-- Submit Button -->
                     <button name='submit' type="submit" id="submitBtn"
                        class="bg-blue-500 text-white font-bold rounded-2xl p-3 mx-auto w-4/6">
                        Submit
                     </button>
                     <?php
                            if (isset($submit)) {
                            }






                            ?>
                  </form>
               </div>
            </div>
         </section>

         <!-- Footer -->
         <footer>
            <div class="copyright text-gray-500 text-sm">
               <h2>EMS&copy; 2024</h2>
            </div>
            <ul class="Fnavbar flex gap-6">
               <li><a href="../back_end/support.php">Support</a></li>
               <li><a href="../back_end/privacy.php">Privacy</a></li>
               <li><a href="../back_end/terms.php">terms</a></li>
            </ul>
         </footer>
      </div>
   </div>

   <!-- JS Script -->
   <script src="../front_end/list.js"></script>
</body>

</html>