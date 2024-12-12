<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
   <link rel="stylesheet" href="Stemplet.css">
</head>

<body>
   <div class="page">
      <div class="list">
         <a href="#" class="mainlink"><i class="fa-solid fa-sliders"></i> Dashboard</a>
         <!----user managment---->
         <a href="#" class="mainLink">User Managment</a>
         <div id="linksList">
            <a href="#" target="_blank"><i class="fa-solid fa-user"></i> Manage User</a>
            <a href="#" target="_blank"><i class="fa-solid fa-gears"></i> User Settings</a>
         </div>
         <!----employee managment---->
         <a href="#" class="mainLink">Employee Managment</a>
         <div id="linksList">
            <a href="#" target="_blank"><i class="fa-solid fa-users-viewfinder"></i> Manage Employees</a>
            <a href="#" target="_blank"><i class="fa-solid fa-users-gear"></i> Manage Departments</a>
            <a href="#" target="_blank"><i class="fa-solid fa-file"></i> Manage Designations</a>
         </div>
         <!----attendance---->
         <a href="#" class="mainLink">Attendance</a>
         <div id="linksList">
            <a href="$" target="_blank"><i class="fa-solid fa-clock"></i> Schedule</a>
            <a href="#" target="_blank"><i class="fa-solid fa-calendar-days"></i> Daily Attendance</a>
            <a href="#" target="_blank"><i class="fa-solid fa-book"></i> Sheet Report</a>
         </div>
         <!----leave managment---->
         <a href="#" class="mainLink">Leave Managment</a>
         <div id="linksList">
            <a href="#" target="_blank"><i class="fa-solid fa-arrow-right-from-bracket"></i> Manage Leaves</a>
         </div>
      </div>

      <div class="content">
         <header>
            <a href="#"><i class="fa-solid fa-plus"></i> New Item</a>
            <ul class="navbar">
               <li><img src="user.png" alt="">
                  <label for="uesrname"></label>
               </li>
               <li><a href="#">Sign Out</a></li>

            </ul>

         </header>
         <section>

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
   <script>
   // احصل على جميع الروابط الرئيسية
   document.querySelectorAll('a.mainLink').forEach(function(mainLink) {
      mainLink.addEventListener('click', function(event) {
         event.preventDefault(); // منع الانتقال إلى صفحة أخرى
         const linksList = mainLink.nextElementSibling; // الحصول على القائمة التابعة
         if (linksList && linksList.id === 'linksList') {
            // التحقق من حالة الإظهار والإخفاء
            if (linksList.style.display === 'none' || !linksList.style.display) {
               linksList.style.display = 'block';
            } else {
               linksList.style.display = 'none';
            }
         }
      });
   });
   </script>
</body>

</html>
<!-- <?php
// require 'signin.php';
// echo $_COOKIE["token"]."<br>";
// echo $_SESSION["time"]."<br>";
// echo $_SESSION['emp_id']."||".
// $_SESSION['active']."||".
// $_SESSION['username']."||".
// $_SESSION['password']."||".
// $_SESSION['hash'];
?> -->