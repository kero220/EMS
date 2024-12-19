<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>dashboard</title>
    <link
      href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css"
      rel="stylesheet"
    />

    <!-- Custom CSS -->
    <link href="dashboard.css" rel="stylesheet" />
    <style>
      #container {
        overflow: auto;
      }
      #about {
        max-width: 62rem;
        background-color: #dde6ed;
      }
      #mainH1 {
        background-color: #dde6ed;
      }
      #container {
        background-color: #dde6ed;
        min-height: 36rem;
        color: #27374d;
      }
      #leftP2 {
        font-weight: 600;
      }
      #tableWrapper {
        overflow: auto;
        max-height: 20rem;
      }

      ::-webkit-scrollbar {
        width: 10px;
      }
      #tableDiv span {
        background-color: #526d82;
        color: white;
        right: 5px;
      }
      #tableDiv h1 {
        color: #9db2bf;
      }
      table tr {
        border-bottom: 1px;
        text-align: center;
        border-color: rgb(187, 177, 177);
        border-style: solid;
        height: 3rem;
      }
      #tableBtn {
        background-color: #29cacc;
        padding: 2px;
      }
      #tableBtn:active {
        border-color: white;
        box-shadow: none;
        border-style: none;
      }

      #name {
        color: rgb(79, 79, 238);
      }
      #tableBtn {
        border-radius: 15px;
        color: white;
        font-weight: bold;
        padding: 2px;
      }
      #tableBtn:hover {
        opacity: 80%;
      }
      .active {
        border-radius: 15px;
        padding: 2px;
        background-color: rgb(9, 149, 9);
      }
      .inactive {
        border-radius: 15px;
        padding: 2px;
        background-color: red;
      }
      #tableWrapper {
        position: relative;
      }
      #container #tableDiv {
        position: sticky;

        top: 0;
      }
    </style>
  </head>
  <body>
    <div id="about" class="m-auto">
      <h1 id="mainH1" class="text-left text-2xl px-4 pt-2">
        <span class="font-bold">Analytics</span> Dahsboard
      </h1>
      <div id="container" class="grid grid-rows-2 grid-cols-4 p-4 gap-6">
        <div id="left" class="col-span-2 grid grid-rows-2 grid-cols-2 gap-4">
          <div id="first" class="bg-white rounded-md relative p-2">
            <p id="leftP" class="text-sm text-left font-semibold">Reviews</p>
            <span
              id="leftLogo"
              class="absolute top-2 right-2 bg-blue-400 opacity-30 rounded-2xl w-8 h-8"
            >
              <img
                src="https://cdn-icons-png.flaticon.com/128/1828/1828640.png"
                alt=""
              />
            </span>
            <p id="leftP2" class="mt-10 text-2xl text-left">2</p>
          </div>
          <div id="second" class="bg-white rounded-md relative p-2">
            <p id="leftP" class="text-sm text-left font-semibold">Emails</p>
            <span
              id="leftLogo"
              class="absolute top-2 right-2 bg-blue-400 opacity-30 rounded-2xl w-8 h-8"
              ><img
                src="https://cdn-icons-png.flaticon.com/128/14026/14026792.png"
                alt=""
            /></span>
            <p id="leftP2" class="mt-10 text-2xl text-left">2</p>
          </div>
          <div id="third" class="bg-white rounded-md relative p-2">
            <p id="leftP" class="text-sm text-left font-semibold">Contacts</p>
            <span
              id="leftLogo"
              class="absolute top-2 right-2 bg-blue-400 opacity-30 rounded-2xl w-8 h-8"
            >
              <img
                src="https://cdn-icons-png.flaticon.com/128/14025/14025691.png"
                alt=""
            /></span>
            <p id="leftP2" class="mt-10 text-2xl text-left">2</p>
          </div>
          <div id="forth" class="bg-white rounded-md relative p-2">
            <p id="leftP" class="text-sm text-left font-semibold">
              Leave request
            </p>
            <span
              id="leftLogo"
              class="absolute top-2 right-2 bg-blue-400 opacity-30 rounded-2xl w-8 h-8"
              ><img
                src="https://cdn-icons-png.flaticon.com/128/14025/14025827.png"
                alt=""
            /></span>
            <p id="leftP2" class="mt-10 text-2xl text-left">2</p>
          </div>
        </div>
        <div id="right" class="col-span-2 text-[#27374d]">
          <div id="tableWrapper" class="bg-white rounded-md p-2">
            <div id="tableDiv" class="flex justify-between mb-4">
              <h1>Employee</h1>
              <span class="text-white p-2 rounded-lg">Status</span>
            </div>
            <table id="rightTable" class="w-full rounded-md bg-white h-full">
              <thead>
                <tr class="border-gray-300 border-solid h-12">
                  <th>el</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Department ID</th>
                  <th>Review</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td id="name">Mohamed</td>
                  <td>
                    <div class="active">Active</div>
                  </td>
                  <td>5</td>
                  <td>
                    <button id="tableBtn">Review</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td id="name">Mohamed</td>
                  <td>
                    <div class="active">Active</div>
                  </td>
                  <td>5</td>
                  <td>
                    <button id="tableBtn">Review</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td id="name">Mohamed</td>
                  <td>
                    <div class="active">Active</div>
                  </td>
                  <td>5</td>
                  <td>
                    <button id="tableBtn">Review</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td id="name">Mohamed</td>
                  <td>
                    <div class="active">Active</div>
                  </td>
                  <td>5</td>
                  <td>
                    <button id="tableBtn">Review</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td id="name">Mohamed</td>
                  <td>
                    <div class="active">Active</div>
                  </td>
                  <td>5</td>
                  <td>
                    <button id="tableBtn">Review</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td id="name">Mohamed</td>
                  <td>
                    <div class="active">Active</div>
                  </td>
                  <td>5</td>
                  <td>
                    <button id="tableBtn">Review</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td id="name">Mohamed</td>
                  <td>
                    <div class="active">Active</div>
                  </td>
                  <td>5</td>
                  <td>
                    <button id="tableBtn">Review</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td id="name">Mohamed</td>
                  <td>
                    <div class="active">Active</div>
                  </td>
                  <td>5</td>
                  <td>
                    <button id="tableBtn">Review</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td id="name">Mohamed</td>
                  <td>
                    <div class="active">Active</div>
                  </td>
                  <td>5</td>
                  <td>
                    <button id="tableBtn">Review</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td id="name">Mohamed</td>
                  <td>
                    <div class="active">Active</div>
                  </td>
                  <td>5</td>
                  <td>
                    <button id="tableBtn">Review</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td id="name">Mohamed</td>
                  <td>
                    <div class="active">Active</div>
                  </td>
                  <td>5</td>
                  <td>
                    <button id="tableBtn">Review</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td id="name">Mohamed</td>
                  <td>
                    <div class="active">Active</div>
                  </td>
                  <td>5</td>
                  <td>
                    <button id="tableBtn">Review</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td id="name">Mohamed</td>
                  <td>
                    <div class="active">Active</div>
                  </td>
                  <td>5</td>
                  <td>
                    <button id="tableBtn">Review</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td id="name">Mohamed</td>
                  <td>
                    <div class="active">Active</div>
                  </td>
                  <td>5</td>
                  <td>
                    <button id="tableBtn">Review</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td id="name">Mohamed</td>
                  <td>
                    <div class="active">Active</div>
                  </td>
                  <td>5</td>
                  <td>
                    <button id="tableBtn">Review</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td id="name">Mohamed</td>
                  <td>
                    <div class="active">Active</div>
                  </td>
                  <td>5</td>
                  <td>
                    <button id="tableBtn">Review</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td id="name">Mohamed</td>
                  <td>
                    <div class="active">Active</div>
                  </td>
                  <td>5</td>
                  <td>
                    <button id="tableBtn">Review</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td id="name">Mohamed</td>
                  <td>
                    <div class="active">Active</div>
                  </td>
                  <td>5</td>
                  <td>
                    <button id="tableBtn">Review</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div id="bottom" class="row-start-2 col-span-4">
          <div id="tableWrapper" class="bg-white rounded-md p-2">
            <div id="tableDiv" class="flex justify-between mb-4">
              <h1 class="text-[#9DB2BF]">Employee</h1>
              <span class="bg-[#526D82] text-white p-2 rounded-lg"
                >Profile</span
              >
            </div>
            <table id="bottomTable" class="w-full rounded-md bg-white h-44">
              <thead>
                <tr class="border-b-[1px] border-gray-300 border-solid h-12">
                  <th>el</th>
                  <th>Name</th>
                  <th>Department ID</th>
                  <th>Manager ID</th>
                  <th>Assosiation</th>
                  <th>Feedback</th>
                  <th>Salary</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td id="name">Mohamed</td>
                  <td>5</td>
                  <td>2</td>
                  <td>IT</td>
                  <td>hard working</td>
                  <td>2000$</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
