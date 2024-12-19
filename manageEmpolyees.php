<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage User</title>
    <link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <style>
      #container {
        background-color: #dde6ed;
        max-width: 80%;
        border-radius: 10px;
        height: 42rem;
        color: #27374d;
      }
      #table tr {
        border-bottom: 2px;

        border-style: solid;
        border-color: #9db2bf;
      }

      #status {
        background-color: #55ff66;
        color: white;
        font-weight: bold;
        border-radius: 6px;
        margin-left: 8px;
      }
      #dateData {
        background-color: #00ffff;
        color: white;
        font-weight: bold;
        border-radius: 6px;
      }
      #approveBtn {
        border: 2px;
        border-style: solid;
        background-color: #3366ff;
        margin: 4px;
        border-radius: 4px;
      }
      #approveBtn:hover {
        opacity: 80%;
      }
      #declineBtn {
        border: 2px;
        border-style: solid;
        background-color: rgb(129, 23, 23);
        border-radius: 4px;
      }
      #declineBtn:hover {
        opacity: 80%;
      }

      #tableWrapper h1 {
        color: #9db2bf;
      }

      #tableWrapper {
        overflow: auto;
        height: 85%;
      }
      #addreviewBtn {
        border: 2px;
        border-style: solid;
        background-color: green;
        border-radius: 4px;
      }
      #addreviewBtn:hover {
        opacity: 80%;
      }
      ::-webkit-scrollbar {
        width: 10px;
      }
    </style>
  </head>
  <body>
    <div id="container" class="p-4 text-left m-auto">
      <div class="flex justify-between mb-4">
        <h1 id="myH1" class="text-2xl">Manage Employees</h1>
        <button
          id="addBtn"
          class="bg-blue-500 p-2 rounded-lg text-white font-bold"
        >
          + Add Users
        </button>
      </div>
      <div id="tableWrapper" class="bg-white h-5/6 p-4 rounded-t-lg">
        <h1 class="text-base mb-2">User dashboard</h1>
        <div class="flex justify-between mb-2">
          <p>
            Show
            <select
              name="colomnsNumber"
              id="columnSelection"
              class="border-2 border-black shadow-md"
            >
              <option value="10">10</option>
              <option value="20">20</option>
              <option value="30">30</option>
            </select>
            Columns
          </p>

          <span class="font-bold"
            >Search
            <input
              type="text"
              class="border-2 border-slid border-[#9DB2BF] p-[2px]"
          /></span>
        </div>
        <table id="table" class="w-full min-h-[5rem]">
          <thead class="m-2">
            <tr class="text-center">
              <th class="min-w-12">Id</th>
              <th class="max-w-[10rem]">Name</th>
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
                <button id="approveBtn">☝️</button>
                <button id="addreviewBtn">😏</button>
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
  </body>
</html>
