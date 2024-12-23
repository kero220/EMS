<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
   <link rel="stylesheet" href="../front_end/addReview.css">
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet" />

</head>

<body>
   <div class="page">
      <button class="text-red-500 absolute top-3 left-2 z-20  rounded-lg p-2" id="hideShowBtn" onclick="myFunction()">
         <div><i class="fa-solid fa-bars"></i></div>
      </button>
      <div class="list">

         <a href="../back_end/dashboard.php" class="dashboard_link block"><i class="fa-solid fa-sliders"></i>
            Dashboard</a>
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
            <a href="../back_end/leaveRequest.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Leave
               Request</a>
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
            <div id="container" class="m-auto rounded-xl mt-20">
               <h1 class="text-center text-2xl p-4 m-4 font-semibold">Add Review</h1>
               <div id="wrapper">
                  <form class="flex flex-col text-left  p-4" method="POST" action="../database_for_php/insertReview.php">
                     <!-- index.html -->

                     <div id="rating" class="flex space-x-2 mb-4 m-auto">
                        <svg class="w-8 h-8 text-gray-400 hover:text-yellow-400 cursor-pointer" fill="currentColor"
                           viewBox="0 0 20 20" data-value="1">
                           <path
                              d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-8 h-8 text-gray-400 hover:text-yellow-400 cursor-pointer" fill="currentColor"
                           viewBox="0 0 20 20" data-value="2">
                           <path
                              d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-8 h-8 text-gray-400 hover:text-yellow-400 cursor-pointer" fill="currentColor"
                           viewBox="0 0 20 20" data-value="3">
                           <path
                              d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-8 h-8 text-gray-400 hover:text-yellow-400 cursor-pointer" fill="currentColor"
                           viewBox="0 0 20 20" data-value="4">
                           <path
                              d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-8 h-8 text-gray-400 hover:text-yellow-400 cursor-pointer" fill="currentColor"
                           viewBox="0 0 20 20" data-value="5">
                           <path
                              d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                     </div>

                     <!-- Display the selected rating -->
                     <div id="rating-text" class="text-lg mb-4 m-auto">
                        Rating: 0 stars
                     </div>
                     <textarea name="reason" id="reviewReason" placeholder="Reason"
                        class="p-4 text-center mb-8 mt-4 mx-8 rounded-2xl"></textarea>

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
   <script src="../front_end/list.js">

   </script>
   <script>
   const stars = document.querySelectorAll("#rating svg");
   const ratingText = document.getElementById("rating-text");
   let selectedRating = 0;

   // Hover and click functionality for stars
   stars.forEach((star, index) => {
      star.addEventListener("click", () => {
         selectedRating = index + 1;
         updateStars(selectedRating);
      });
   });

   function updateStars(rating) {
      stars.forEach((star, i) => {
         if (i < rating) {
            star.classList.add("text-yellow-400");
         } else {
            star.classList.remove("text-yellow-400");
         }
      });
      ratingText.innerHTML = `Rating: ${rating} star${rating > 1 ? "s" : ""}`;
   }

   const submitBtn = document.getElementById("submit-btn");
   const resultDiv = document.getElementById("result");
   const submittedRatingText = document.getElementById("submitted-rating");

   submitBtn.addEventListener("click", () => {
      if (selectedRating > 0) {
         resultDiv.classList.remove("hidden");
         submittedRatingText.textContent = selectedRating;
      } else {
         alert("Please select a rating before submitting.");
      }
   });
   </script>
</body>

</html>