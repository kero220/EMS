<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employees</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="manageEmployee.css">
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
                <a href="manageEmployee"><i class="fa-solid fa-users-viewfinder"></i> Manage Employees</a>
                <a href="manageDepartments.php"><i class="fa-solid fa-users-gear"></i> Manage Departments</a>
                <a href="manageDesignation"><i class="fa-solid fa-file"></i> Manage Designations</a>
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
                <div id="container" class="p-4 text-left m-auto ">
                    <form id="manageEmployeesForm" class="flex flex-col gap-4 h-full max-h-auto min-w-auto">
                        <div class="flex justify-between mb-4">
                            <h1 id="myH1" class="text-2xl">Manage Employees</h1>
                            <button id="addBtn" class=" p-2 rounded-lg text-white font-bold">
                                + Add Users
                            </button>
                        </div>
                        <div id="tableWrapper" class="bg-white h-5/6 p-4 rounded-t-lg">
                            <h1 class="text-base mb-2">User dashboard</h1>
                            <div class="flex justify-between mb-2">
                                <p>
                                    Show
                                    <select name="colomnsNumber" id="columnSelection"
                                        class="border-2 border-black shadow-md">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                    </select>
                                    Columns
                                </p>

                                <span class="font-bold">Search
                                    <input type="text" class="border-2 border-slid border-[#9DB2BF] p-[2px]" /></span>
                            </div>
                            <table id="table" class="w-full min-h-[5rem]">
                                <thead class="m-2">
                                    <tr class="text-center">
                                        <th class="min-w-12">Id</th>
                                        <th class="min-w-[3rem]">Name</th>
                                        <th>Department</th>
                                        <th>Hire Date</th>
                                        <th>Position</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td>1</td>
                                        <td>Kerolos Soliman</td>
                                        <td>Benha Branch</td>
                                        <td>
                                            <div id="dateData">1/2/2024</div>
                                        </td>
                                        <td>IT</td>
                                        <td id="actionBtn">
                                            <button id="approveBtn"><a href="editUser.php" class="m-0"
                                                    alt="edit employee">🖋️</a></button>
                                            <button id="addreviewBtn"><a href="#" class="m-0"
                                                    alt="add review">⭐</i></a></button>
                                            <button id="declineBtn" alt="delete employee">❌</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <footer class="flex justify-between bg-white border-t-2 p-2 rounded-b-lg">
                            <p>List of users</p>
                            <p>Page <span>1</span></p>
                        </footer>
                    </form>
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