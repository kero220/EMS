<?php
require_once  "../back_end/conn.php";
require_once  "../database_for_php/edituser_dp.php";
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
    <meta http-equiv="refresh" content="3600">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="../front_end/editUser.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet" />
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
                <a href="../back_end/mangeDepartments.php"><i class="fa-solid fa-users-gear"></i> Manage Departments</a>
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
                <a href="../back_end/leaveRequest.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Leave Request</a>
            </div>
        </div>

        <div class="content w-full">
            <header class="z-10">
                <!--<a href="#"><i class="fa-solid fa-plus ml-8"></i> New Item</a>-->
                <div class="navbar flex items-center gap-4">
                    <?php echo "<img id='user_img' src='data:image/jpeg;base64," .   $_SESSION['image']  .  "'alt='User Image' class='w-10'>" ?>
                    <label for="username" <?php echo $_SESSION['username']; ?></label>
                        <a href="../back_end/signin.php" class="text-red-500 font-bold">Sign Out</a>
                </div>

            </header>
            <section>
                <div id="container" class="m-auto mt-20 rounded-xl">
                    <h1 class="text-center text-2xl p-4 m-4 font-semibold">
                        Edit Employee Info
                    </h1>
                    <div id="wrapper">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="flex flex-col gap-4 ">
                            <div class="rounded-md border  bg-white p-4 shadow-md w-36 m-auto mb-4">
                                <label for="upload" class="flex flex-col items-center gap-2 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-10 w-10 fill-white stroke-indigo-500" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-gray-600 font-medium">Select Image</span>
                                </label>
                                <input id="upload" name="file" type="file" class="hidden" value="<?php echo (isset($GLOBALS['image_tmp_name']) ? file_get_contents($GLOBALS['image_tmp_name']) : null); ?>">
                                <?php
                                if (isset($_POST['submit'])) {



                                    $image = $_FILES['file'];
                                    $GLOBALS['image_name'] = $image['name'];
                                    $GLOBALS['image_size'] = $image['size'];
                                    $GLOBALS['image_error'] = $image['error'];
                                    $GLOBALS['image_type'] = $image['type'];
                                    $GLOBALS['image_tmp_name'] = $image['tmp_name'];
                                }
                                ?>
                            </div>
                            <div class="m-4 flex justify-around">
                                <div>
                                    <input type="text" name="emp_id" id="emp_id" placeholder="EMP_ID"
                                        class="rounded-lg text-center font-bold p-2 m-4" value="<?php echo (isset($GLOBALS['emp_id']) ? $GLOBALS['emp_id'] : null); ?>">
                                    <button type='submit' id="check" name="check" class=" m-auto p-2 text-black
                                     font-bold rounded-2xl">Check</button>

                                </div>
                            </div>
                            <div id="nameDiv" class="m-4 flex justify-around">
                                <input type="number" name='dept_id' id="departmentID" placeholder="Department ID"
                                    class="rounded-lg text-center font-bold p-2 m-4" value="<?php echo (isset($GLOBALS['dept_id']) ? $GLOBALS['dept_id'] : null); ?>">
                                <input type="number" name='manager_id' id="manager_id" placeholder="Manager ID"
                                    class="rounded-lg text-center font-bold p-2 m-4" value="<?php echo (isset($GLOBALS['manager_id']) ? $GLOBALS['dept_id'] : null); ?>">

                            </div>
                            <div id="positionDiv" class="m-4 flex justify-around">
                                <input type="text" name='position' id="position" placeholder="New Position"
                                    class="rounded-lg text-center font-bold p-2 m-4" value="<?php echo (isset($GLOBALS['position']) ? $GLOBALS['dept_id'] : null); ?>">
                                <input type="text" name='branch_location' id="location" placeholder="New Location"
                                    class="rounded-lg text-center font-bold p-2 m-4" value="<?php echo (isset($GLOBALS['branch_location']) ? $GLOBALS['dept_id'] : null); ?>">
                            </div>
                            <button type="submit" name="submit" id="submitBtn"
                                class="w-4/6 m-auto p-2 text-white font-bold rounded-2xl">
                                Submit
                            </button>
                            <?php
                            if (isset($_POST['check'])) {
                                #echo "hello1";
                                if (isset($_POST['emp_id']) && $_POST['emp_id'] != '') {;
                                    $result = find_all_employee_info($_POST['emp_id'], $pdo);
                                    $GLOBALS['image_tmp_name'] = $result['image'];
                                    $GLOBALS['dept_id'] = $result['dept_id'];
                                    $GLOBALS['manager_id'] = $result['manager_id'];
                                    $GLOBALS['position'] = $result['position'];
                                    $GLOBALS['branch_location'] = $result['branch_location'];
                                    $GLOBALS['emp_id'] = $result['emp_id'];
                                    #echo  $GLOBALS['emp_id'];
                                    echo "<div class='success' >";
                                    echo "Employee checked Successfully";
                                    echo "</div>";
                                } else {
                                    echo "<div class='error' style='color:red'>";
                                    echo "Nothing To Be Checked";
                                    echo "</div>";
                                }
                            }
                            ?>
                            <?php

                            if (isset($_POST['submit'])) {



                                if (
                                    isset($GLOBALS['image_tmp_name'])  && $GLOBALS['image_tmp_name'] != '' &&
                                    isset($_POST['emp_id']) &&  $_POST['emp_id'] != '' &&
                                    isset($_POST['position']) && $_POST['position'] != '' && isset($_POST['manager_id']) && $_POST['manager_id'] != '' &&
                                    isset($_POST['dept_id']) && $_POST['dept_id'] != '' && isset($_POST['branch_location']) && $_POST['branch_location'] != ''
                                ) {
                                    if (update_user(
                                        $_POST['emp_id'],
                                        file_get_contents($GLOBALS['image_tmp_name']),
                                        $_POST['dept_id'],
                                        $_POST['manager_id'],
                                        $_POST['position'],
                                        $_POST['branch_location'],
                                        $pdo
                                    )) {
                                        echo "<div class='success' >";
                                        echo "Employee Updated Successfully";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='error'>";
                                        echo "There Was An Error In Update";
                                        echo "</div>";
                                    }
                                } else {


                                    echo "<div class='error'>";
                                    echo "One Or More Fields Are Missing , Please Try Again";
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
                    <li><a href="../back_end/support.php">Support</a></li>
                    <li><a href="../back_end/privacy.php">Privacy</a></li>
                    <li><a href="../back_end/terms.php">terms</a></li>
                </ul>

            </footer>
        </div>

    </div>
    <script src="../front_end/list.js"></script>
</body>

</html>