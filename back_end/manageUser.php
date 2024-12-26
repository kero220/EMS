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
    <title>Manage User</title>
    <meta http-equiv="refresh" content="3600">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="../front_end/manageUser.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="../webapp_img/employee-management-system-icon-hexa-color-_27374D-_1_ (1).ico" type="image/ico">
</head>

<body>
    <div class="page">
        <div class="list">
            <button class="text-red-500 absolute top-3 left-2 z-20  rounded-lg p-2" id="hideShowBtn" onclick="myFunction()">
                <div><img src="../front_end/pngegg.png" alt=""></div>
            </button>
            <a href="../back_end/dashboard.php" class="dashboard_link"><i class="fa-solid fa-sliders"></i> Dashboard</a>
            <!----user managment---->
            <a href="#" class="mainLink">User Managment</a>
            <div id="linksList">
                <a href="../back_end/manageUser.php"><i class="fa-solid fa-user"></i> Manage User</a>
                <a href="../back_end/addUser.php"><i class="fa-solid fa-gears"></i> Add User</a>
            </div>
            <!----employee managment---->
            <a href="#" class="mainLink block">Employee Managment</a>
            <div id="linksList">
                <a href="../back_end/manageEmployee.php"><i class="fa-solid fa-users-viewfinder"></i> Manage Employees</a>
                <a href="../back_end/manageDepartments.php"><i class="fa-solid fa-users-gear"></i> Manage Departments</a>
                <a href="../back_end/manageDesignation"><i class="fa-solid fa-file"></i> Manage Designations</a>
            </div>
            <!----attendance---->
            <a href="#" class="mainLink">Attendance</a>
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

        <div class="content">

            <header>
                <!-- <a href="#"><i class="fa-solid fa-plus"></i> New Item</a>-->
                <div class="navbar flex items-center gap-4">

                    <?php echo "<img id='user_img' src='data:image/jpeg;base64," .   $_SESSION['image']  .  "'alt='User Image' class='w-10'>" ?>
                    <label for="username"><?php echo $_SESSION['username']; ?></label>
                    <a href="../back_end/signin.php" class="text-red-500 font-bold">Sign Out</a>
                </div>

            </header>
            <section>
                <div id="container" class="p-4 text-left m-auto max-w-auto">

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" id="manageUsersForm" class="flex flex-col gap-4 h-full max-h-auto min-w-auto">
                        <div class="flex justify-between mb-4">
                            <h1 id="myH1" class="text-2xl">Manage Users</h1>
                            <button type="submit" name="addBtn" id="addBtn" class="bg-blue-500 p-2 rounded-lg text-white font-bold">
                                <a href="../back_end/addUser.php"> + Add Users</a>
                            </button>


                        </div>
                        <div id="tableWrapper" class="bg-white h-5/6 p-4 rounded-t-lg">
                            <h1 style="color:#526D82" class="text-base mb-2">User dashboard</h1>
                            <div class="flex justify-between mb-2">
                                <p>
                                    Show
                                    <select name="rowsNumber" id="columnSelection"
                                        class="border-2 border-black shadow-md">
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
                                <div class="radio">
                                    <label>ID</label> <input type="radio" name="check" value="ID">
                                    <label>NAME</label><input type="radio" name="check" value="NAME">
                                </div>
                                <span class="font-bold">Search
                                    <input name="search" type="search" class="border-2 border-slid border-[#9DB2BF] p-[2px]" /></span>

                            </div>
                            <table id="table" class="w-full min-h-[5rem]">
                                <thead class="m-2">
                                    <tr class="text-center">
                                        <th>Image</th>
                                        <th class="min-w-12">Id</th>
                                        <th class="max-w-[10rem]">Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Position</th>
                                        <th>Location</th>
                                        <th>Department</th>
                                        <th>ManagerID</th>
                                        <th>Hire Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    $GLOBALS['rownumber'] = 0;

                                    if (isset($_POST['rowsNumber']) && $_POST['rowsNumber'] != 0 && empty($_POST['search'])) {
                                        $res = select_all_from_employees($_POST['rowsNumber'], $pdo);


                                        while ($result = $res->fetch()) {
                                            $contact = return_contact_row($result['emp_id'], $pdo);
                                            $department = return_department_row($result['dept_id'], $pdo);

                                            echo "<tr>";
                                            echo "<td>";
                                            echo " <div id='image'> ";
                                            $file = base64_encode($result['image']);

                                            echo "<img id='user_img' src='data:image/jpeg;base64," . $file . "' alt='User Image'>";


                                            echo "</div>"; # $_FILES here
                                            echo "</td>";
                                            echo "<td>";
                                            echo isset($result['emp_id']) ? $result['emp_id'] : '-';
                                            echo "</td>";
                                            echo "<td>";
                                            echo (isset($result['fname']) ? $result['fname'] : '-') . " " . (isset($result['lname']) ? $result['lname'] : '-') . "</td>";
                                            echo "<td>";
                                            echo isset($contact["e_mail"]) ? $contact["e_mail"] : '-';
                                            echo "</td>";
                                            echo "<td>";
                                            echo isset($contact["phone"]) ? $contact["phone"] : '-';
                                            echo "</td>";
                                            echo "<td>";
                                            echo isset($result['position']) ? $result['position'] : '-';
                                            echo  "</td>";
                                            echo " <td>";
                                            echo isset($result['branch_location']) ? $result['branch_location'] : '-';
                                            echo "</td>";
                                            echo "<td>";
                                            echo isset($department['dept_name']) ? $department['dept_name'] : '-';
                                            echo "</td>";
                                            echo "<td>";
                                            echo isset($result['manager_id']) && $result['manager_id'] != 0 ? $result['manager_id'] : '-';
                                            echo "</td>";
                                            echo "<td>";
                                            echo " <div id='dateData'>";
                                            echo isset($result['hire_date']) ? $result['hire_date'] : '-';
                                            echo "</div>";
                                            echo "</td>";
                                            echo "<td>";
                                            echo "<div id='status'>";
                                            echo isset($result['active_flag']) ? $result['active_flag'] : '-';
                                            echo "</div>";
                                            echo "</td>";
                                            echo "<td id='actionBtn'>";
                                            echo "<button id='approveBtn'><a href='../back_end/editUser.php' class='m-0'
                                                alt='edit employee'>🖋️</a></button>";
                                            echo "<button id='declineBtn'>❌</button>";
                                            echo " </td>";
                                            echo "</tr>";
                                            #echo $_SERVER['PHP_SELF'];
                                            $GLOBALS['rownumber']++;
                                        }
                                    } elseif (isset($_POST['search']) && isset($_POST['rowsNumber']) && $_POST['rowsNumber'] != 0) {
                                        $GLOBALS['is_id'] = 1;

                                        if (isset($_POST['check']) && $_POST['check'] == "ID") {
                                            $GLOBALS['is_id'] = 1;
                                        } elseif (isset($_POST['check']) && $_POST['check'] == "NAME") {
                                            $GLOBALS['is_id'] = 0;
                                        } else {
                                            echo "<div class='error' style='color:red'>";
                                            echo "Invalid Option";
                                            echo "</div>";
                                        }

                                        $res = search($_POST['search'],  $GLOBALS['is_id'], $_POST['rowsNumber'], $pdo);


                                        while ($result = $res->fetch()) {
                                            $contact = return_contact_row($result['emp_id'], $pdo);
                                            $department = return_department_row($result['dept_id'], $pdo);

                                            echo "<tr>";
                                            echo "<td>";
                                            echo " <div id='image'> ";
                                            $file = base64_encode($result['image']);

                                            echo "<img id='user_img' src='data:image/jpeg;base64," . $file . "' alt='User Image'>";


                                            echo "</div>"; # $_FILES here
                                            echo "</td>";
                                            echo "<td>";
                                            echo isset($result['emp_id']) ? $result['emp_id'] : '-';
                                            echo "</td>";
                                            echo "<td>";
                                            echo (isset($result['fname']) ? $result['fname'] : '-') . " " . (isset($result['lname']) ? $result['lname'] : '-') . "</td>";
                                            echo "<td>";
                                            echo isset($contact["e_mail"]) ? $contact["e_mail"] : '-';
                                            echo "</td>";
                                            echo "<td>";
                                            echo isset($contact["phone"]) ? $contact["phone"] : '-';
                                            echo "</td>";
                                            echo "<td>";
                                            echo isset($result['position']) ? $result['position'] : '-';
                                            echo  "</td>";
                                            echo " <td>";
                                            echo isset($result['branch_location']) ? $result['branch_location'] : '-';
                                            echo "</td>";
                                            echo "<td>";
                                            echo isset($department['dept_name']) ? $department['dept_name'] : '-';
                                            echo "</td>";
                                            echo "<td>";
                                            echo isset($result['manager_id']) ? $result['manager_id'] : '-';
                                            echo "</td>";
                                            echo "<td>";
                                            echo " <div id='dateData'>";
                                            echo isset($result['hire_date']) ? $result['hire_date'] : '-';
                                            echo "</div>";
                                            echo "</td>";
                                            echo "<td>";
                                            echo "<div id='status'>";
                                            echo isset($result['active_flag']) ? $result['active_flag'] : '-';
                                            echo "</div>";
                                            echo "</td>";
                                            echo "<td id='actionBtn'>";
                                            echo "<button id='approveBtn'><a href='../back_end/editUser.php' class='m-0'
                                                        alt='edit employee'>🖋️</a></button>";
                                            echo "<button id='declineBtn'>❌</button>";
                                            echo " </td>";
                                            echo "</tr>";
                                            #echo $_SERVER['PHP_SELF'];
                                            $GLOBALS['rownumber']++;
                                        }
                                    } else {
                                        echo "<div class='error' style='color:red'>";
                                        echo "Nothing To Be Shown";
                                        echo "</div>";
                                    }


                                    ?>
                                </tbody>
                            </table>

                        </div>
                        <footer class="flex justify-between bg-white border-t-2 p-2 rounded-b-lg">
                            <p>Showing <span><?php echo isset($GLOBALS['rownumber']) ? $GLOBALS['rownumber'] : '-' ?> Users</span></p>
                            <button id="sub" type="submit">Sumbit</button>
                            <p>Number Of Rows : <span><?php echo isset($GLOBALS['rownumber']) ? $GLOBALS['rownumber'] : '-' ?></span></p>
                        </footer>
                    </form>
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
<!--
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="' . $pdfName . '"'); header tells the browser to display the PDF inline (i.e., within the browser window)
header('Content-Transfer-Encoding: binary'); Content-Disposition: attachment would prompt the user to download the file instead.
header('Accept-Ranges: bytes');
-->