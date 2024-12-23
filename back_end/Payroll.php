<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Document</title>
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet" />
   <style>
   #container {
      background-color: #dde6ed;
      max-width: 80%;
      border-radius: 10px;
      height: 42rem;
      color: #27374d;
   }

   #wrapper {
      padding: 4px;
      background-color: white;
      height: 80%;
      overflow: auto;
   }

   #table {
      background-color: white;
   }

   #table tr td,
   th {
      border: 2px;
      padding: 6px;
      border-style: solid;
      border-color: #9db2bf;
      text-align: center;
   }

   #table tr td {
      margin: auto;
   }

   #table tr {
      border-bottom: 2px;
      border-style: solid;
      border-color: #9db2bf;
   }

   #table tr input {
      border: 2px;
      padding: 4px;
      width: 120px;
      text-align: center;
      border-style: solid;
      border-color: #9db2bf;
   }

   #submitBtn:hover {
      opacity: 85%;
   }

   ::-webkit-scrollbar {
      width: 10px;
   }
   </style>
</head>

<body>
   <div id="container" class="my-4 m-auto p-4">
      <div id="myH1" class="text-2xl mb-6">Payroll</div>
      <div id="wrapper">
         <p class="font-semi-bold mt-2 mb-4">Payroll of the month of August</p>
         <form action="../database_for_php/insertSalary.php" method="POST">
            <button id="submitBtn" class="bg-green-500 px-4 py-2 text-white mb-4 rounded-md font-semibold">
               submit
            </button>
            <div id="tableWrapper">
               <table id="table" class="w-full">
                  <thead>
                     <tr>
                        <th>Empolyee Name</th>
                        <th>Role</th>
                        <th>Base Salary</th>
                        <th>Commission</th>
                        <th>Salary Date</th>
                        <th>Salary Time</th>
                        <th>Taxes</th>
                     </tr>
                  </thead>
                  <tbody>

                     <?php
                require_once "../database_for_php/insertSalary.php";

                  $result = getName($pdo);
                  foreach ($result as $row):?>

                     <tr>
                        <td value=<?php echo $row['name']; ?>><?php echo $row['name']; ?></td>
                        <td><?php echo $row['position']; ?></td>
                        <td>
                           <input type="number" id="baseSalay" name="baseSalay" />
                        </td>
                        <td>
                           <input type="number" id="bonus" name="commission" />
                        </td>
                        <td>
                           <input type="date" id="salaryDate" name="salaryDate" />
                        </td>
                        <td>
                           <input type="time" id="salaryTime" name="salaryTime" />
                        </td>
                        <td>
                           <input type="number" id="taxes" name="deduction" />
                        </td>
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </form>
      </div>
   </div>
</body>

</html>