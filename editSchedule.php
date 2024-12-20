<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Schedule</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="editUser.css">
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
                    <img src="user.png" alt="User Icon" class="w-10">
                    <label for="username">User_name</label>
                    <a href="#" class="text-red-500 font-bold">Sign Out</a>
                </div>

            </header>
            <section>
                <div id="container" class="m-auto mt-20 rounded-xl">
                    <h1 class="text-center text-2xl p-4 m-4 font-semibold">
                        Edit Schedule Info
                    </h1>
                    <div id="wrapper">
                        <form class="flex flex-col gap-6 mt-20">
                            <input type="date" id="attend_date" placeholder="Date"
                                class="rounded-lg text-center font-bold p-2 m-4 w-50 " required />
                            <input type="time" id="attend_time_in" placeholder="Time in"
                                class="rounded-lg text-center font-bold p-2 m-4 w-50" required />
                            <input type="time" id="attend_time_out" placeholder="Time Out"
                                class="rounded-lg text-center font-bold p-2 m-4 w-50 mb-20" required />
                            <button type="submit" id="submitBtn"
                                class="w-4/6 m-auto p-2 text-white font-bold rounded-2xl">
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
    <script src="list.js"></script>
</body>

</html>