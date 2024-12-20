<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <!-- External CSS Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="addUser.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="page">

        <!-- Sidebar Navigation -->
        <button class="text-red-500 absolute top-3 left-2 z-20  rounded-lg p-2" id="hideShowBtn" onclick="myFunction()">
            <div><img src="pngegg.png" alt=""></div>
        </button>
        <div class="list">
            <a href="dashboard.php" class="dashboard_link block"><i class="fa-solid fa-sliders"></i> Dashboard</a>

            <!-- User Management Section -->
            <a href="#" class="mainLink block">User Management</a>
            <div id="linksList">
                <a href="manageUser.php"><i class="fa-solid fa-user "></i> Manage User</a>
                <a href="addUser.php"><i class="fa-solid fa-gears"></i> Add User</a>
            </div>

            <!-- Employee Management Section -->
            <a href="#" class="mainLink block">Employee Management</a>
            <div id="linksList">
                <a href="manageEmployee.php"><i class="fa-solid fa-users-viewfinder"></i> Manage Employees</a>
                <a href="manageDepartments.php"><i class="fa-solid fa-users-gear"></i> Manage Departments</a>
                <a href="manageDesignation.php"><i class="fa-solid fa-file"></i> Manage Designations</a>
            </div>

            <!-- Attendance Section -->
            <a href="#" class="mainLink block">Attendance</a>
            <div id="linksList">
                <a href="Schedule.php"><i class="fa-solid fa-clock "></i> Schedule</a>
                <a href="dailyAttendance.php"><i class="fa-solid fa-calendar-days"></i> Daily Attendance</a>
                <a href="attendanceSheet.php"><i class="fa-solid fa-book"></i> Sheet Report</a>
            </div>

            <!-- Leave Management Section -->
            <a href="#" class="mainLink block">Leave Management</a>
            <div id="linksList">
                <a href="manageLeave.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Manage Leaves</a>
                <a href="leaveRequest.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Leave Request</a>

            </div>
        </div>

        <!-- Main Content -->
        <div class="content w-full">
            <!-- Header -->
            <header class="z-10">

                <a href="#"><i class="fa-solid fa-plus ml-8"></i> New Item</a>
                <div class="navbar flex items-center gap-4">
                    <img src="user.png" alt="User Icon" class="w-10">
                    <label for="username">User_name</label>
                    <a href="#" class="text-red-500 font-bold">Sign Out</a>
                </div>
            </header>

            <!-- Form Section -->
            <section>
                <div id="container" class="m-auto mt-20 rounded-xl bg-gray-100 p-6 shadow-lg max-w-xl">
                    <h1 class="text-center text-2xl font-semibold mb-6">Add Employee</h1>
                    <div id="wrapper">
                        <form class="flex flex-col gap-6">
                            <!-- Image Upload -->
                            <div class="rounded-md border  bg-white p-4 shadow-md w-36 mx-auto">
                                <label for="upload" class="flex flex-col items-center gap-2 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-10 w-10 fill-white stroke-indigo-500" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-gray-600 font-medium">Select Image</span>
                                </label>
                                <input id="upload" type="file" class="hidden" required />
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
                                <input type="date" id="date" name="date"
                                    class="rounded-lg text-center font-bold p-2 w-full cursor-text" required />
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
                            <!--Check Box-->
                            <div id="checkDiv">
                                <input type="checkbox" id="Cdate" name="Cdate"
                                    class="rounded-lg text-center font-bold p-2  " required /><span>Choose Current Date
                                    .</span>
                            </div>
                            <!-- Submit Button -->
                            <button type="submit" id="submitBtn"
                                class="bg-blue-500 text-white font-bold rounded-2xl p-3 mx-auto w-4/6">
                                Submit
                            </button>
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
                    <li><a href="support.php">Support</a></li>
                    <li><a href="privacy.php">Privacy</a></li>
                    <li><a href="terms.php">terms</a></li>
                </ul>
            </footer>
        </div>
    </div>

    <!-- JS Script -->
    <script src="list.js"></script>
</body>

</html>