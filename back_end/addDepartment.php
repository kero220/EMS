<?php
require_once  "../back_end/conn.php";
require_once  "../database_for_php/adddepartment_dp.php";
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
    <title>Edit Department</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="../front_end/editUser.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet" />
    <meta http-equiv="refresh" content="3600">
    <link rel="icon" href="../webapp_img/employee-management-system-icon-hexa-color-_27374D-_1_ (1).ico" type="image/ico">
</head>

<body>
    <div class="page">
        <button class="text-red-500 absolute top-3 left-2 z-20  rounded-lg p-2" id="hideShowBtn" onclick="myFunction()">
            <div><img src="../front_end/pngegg.png" alt=""></div>
        </button>
        <div class="list">
            <a href="../back_end/dashboard.php" class="dashboard_link block"><i class="fa-solid fa-sliders"></i> Dashboard</a>
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
                <a href="../back_end/managedesignation.php"><i class="fa-solid fa-file"></i> Manage Designations</a>
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
                <a href="../back_end/leaveRequest.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Leave Request</a>
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
                <div id="container" class="m-auto mt-20 rounded-xl">
                    <h1 class="text-center text-2xl p-4 m-4 font-semibold">
                        Add Department
                    </h1>
                    <div class="p-8">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" id="manageEmployeesForm" class="flex flex-col gap-6">

                            <input type="text" id="Dept_name" name="dept_name" placeholder="Department Name"
                                class="rounded-lg text-center font-bold p-2 m-4 w-50" required />
                            <input type="number" id="manager_id" name="manager_id" placeholder="Manager ID"
                                class="rounded-lg text-center font-bold p-2 m-4 w-50" required />

                            <button type="submit" name="submit" id="submitBtn"
                                class="w-4/6 m-auto p-2 text-white font-bold rounded-2xl ">
                                Submit
                            </button>
                            <?php
                            if (isset($_POST['submit'])) {


                                if (insert_department($_POST['dept_name'], $_POST['manager_id'], $pdo)) {
                                    echo "<div style='color:green'>";
                                    echo "Department Added Successfully✅";
                                    echo "</div>";
                                } else {
                                    echo "<div style='color:red'>";
                                    echo "Error Existed , Please Try Again!";
                                    echo "</div>";
                                }
                            }



                            ?>
                        </form>
                    </div>
                </div>
            </section>
            <footer>
                <div class="copyright">
                    <h2>EMS&copy;</h2>
                </div>
                <ul class="Fnavbar">
                    <li><a href="../back_end/">Support</a></li>
                    <li><a href="../back_end/privacy.php">Privacy</a></li>
                    <li><a href="../back_end/terms.php">terms</a></li>
                </ul>

            </footer>
        </div>

    </div>
    <script src="../front_end/list.js"></script>
</body>

</html>