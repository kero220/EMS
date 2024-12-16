<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Schedule</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="Schedule.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet" />

</head>

<body>
    <div class="page">
        <div class="list">
            <a href="dashboard.php" class="dashboard_link"><i class="fa-solid fa-sliders"></i> Dashboard</a>
            <!----user managment---->
            <a href="#" class="mainLink">User Managment</a>
            <div id="linksList">
                <a href="manageUser.php"><i class="fa-solid fa-user"></i> Manage User</a>
                <a href="addUser.php"><i class="fa-solid fa-gears"></i> Add User</a>
            </div>
            <!----employee managment---->
            <a href="#" class="mainLink">Employee Managment</a>
            <div id="linksList">
                <a href="manageEmployee.php"><i class="fa-solid fa-users-viewfinder"></i> Manage Employees</a>
                <a href="#"><i class="fa-solid fa-users-gear"></i> Manage Departments</a>
                <a href="#"><i class="fa-solid fa-file"></i> Manage Designations</a>
            </div>
            <!----attendance---->
            <a href="#" class="mainLink">Attendance</a>
            <div id="linksList">
                <a href="Schedule.php"><i class="fa-solid fa-clock"></i> Schedule</a>
                <a href="dailyAttendance.php"><i class="fa-solid fa-calendar-days"></i> Daily Attendance</a>
                <a href="#"><i class="fa-solid fa-book"></i> Sheet Report</a>
            </div>
            <!----leave managment---->
            <a href="#" class="mainLink">Leave Managment</a>
            <div id="linksList">
                <a href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i> Manage Leaves</a>
            </div>
        </div>

        <div class="content">
            <header>
                <a href="#"><i class="fa-solid fa-plus"></i> New Item</a>
                <div class="navbar flex items-center gap-4">
                    <img src="user.png" alt="User Icon" class="w-10">
                    <label for="username">User_name</label>
                    <a href="#" class="text-red-500 font-bold">Sign Out</a>
                </div>

            </header>
            <section>
                <div id="container" class="p-4 text-left m-auto">
                    <div class="flex justify-between mb-4">
                        <h1 id="myH1" class="text-2xl">Manage Schedule</h1>
                        <button id="addBtn" class="p-2 rounded-lg text-white font-bold">
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
                                    <th class="max-w-[10rem]">Name</th>
                                    <th class="max-w-[10rem]">Date</th>
                                    <th>Time In</th>
                                    <th>Time Out</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td>1</td>
                                    <td>Kero Soliman</td>
                                    <td>12/12/2024</td>
                                    <td>
                                        <div id="time">08:00:00</div>
                                    </td>
                                    <td>
                                        <div id="time">17:00:18</div>
                                    </td>

                                    <td id="actionBtn">
                                        <button id="approveBtn">🖋️</button>

                                        <button id="declineBtn">❌</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <footer class="flex justify-between bg-white border-t-2 p-2 rounded-b-lg">
                        <p>List of users</p>
                        <p>Page <span>1</span></p>
                    </footer>
                </div>

            </section>
            <footer>
                <div class="copyright">
                    <h2>EMS&copy;</h2>
                </div>
                <ul class="Fnavbar">
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">terms</a></li>
                </ul>

            </footer>
        </div>

    </div>
    <script src="list.js"></script>
</body>

</html>