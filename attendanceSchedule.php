<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    />
  </head>
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
      text-align: center;
    }
    #attendanceBtn {
      display: flex;

      flex-direction: column;
    }
    #attendanceBtn input {
      accent-color: red;
      margin: 4px;
    }
    #table tr td,
    th {
      border: 2px;
      min-width: 40px;
      border-style: dashed;
      border-color: #9db2bf;
    }
    #table tr {
      border-bottom: 2px;

      border-style: solid;
      border-color: #9db2bf;
    }

    #image {
      width: 60px;
      height: 60px;
      margin: auto;
      background-color: #00ffff;
    }
    #wrapper p {
      color: #9db2bf;
    }

    ::-webkit-scrollbar {
      width: 10px;
    }
  </style>

  <body>
    <div id="container" class="m-auto my-4 p-2">
      <div id="header" class="text-left flex justify-between mb-4 mt-2 mx-2">
        <h1 id="myH1" class="text-2xl">Attendace Schedule</h1>
        <button class="bg-blue-500 p-2 rounded-lg text-white font-bold">
          Add
        </button>
      </div>
      <div id="wrapper" class="rounded-t-lg">
        <p class="text-left mb-2 text-[] text-base">Daily Attendance</p>
        <table id="table" class="w-full">
          <thead>
            <tr>
              <th>Image</th>
              <th>ID</th>
              <th>Name</th>
              <th>Department ID</th>
              <th>1</th>
              <th>2</th>
              <th>3</th>
              <th>4</th>
              <th>5</th>
              <th>6</th>
              <th>7</th>
              <th>8</th>
              <th>9</th>
              <th>10</th>
              <th>11</th>
              <th>12</th>
              <th>13</th>
              <th>14</th>
              <th>15</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div id="image"><img src="" alt="" /></div>
              </td>
              <td>1</td>
              <td>Mohamed Amer</td>
              <td>5</td>
              <td>
                <div id="attendanceBtn">
                  <input type="checkbox" />
                  <input type="checkbox" />
                </div>
              </td>
              <td>
                <div id="attendanceBtn">
                  <input type="checkbox" />
                  <input type="checkbox" />
                </div>
              </td>
              <td>
                <div id="attendanceBtn">
                  <input type="checkbox" />
                  <input type="checkbox" />
                </div>
              </td>
              <td>
                <div id="attendanceBtn">
                  <input type="checkbox" />
                  <input type="checkbox" />
                </div>
              </td>
              <td>
                <div id="attendanceBtn">
                  <input type="checkbox" />
                  <input type="checkbox" />
                </div>
              </td>
              <td>
                <div id="attendanceBtn">
                  <input type="checkbox" />
                  <input type="checkbox" />
                </div>
              </td>
              <td>
                <div id="attendanceBtn">
                  <input type="checkbox" />
                  <input type="checkbox" />
                </div>
              </td>
              <td>
                <div id="attendanceBtn">
                  <input type="checkbox" />
                  <input type="checkbox" />
                </div>
              </td>
              <td>
                <div id="attendanceBtn">
                  <input type="checkbox" />
                  <input type="checkbox" />
                </div>
              </td>
              <td>
                <div id="attendanceBtn">
                  <input type="checkbox" />
                  <input type="checkbox" />
                </div>
              </td>
              <td>
                <div id="attendanceBtn">
                  <input type="checkbox" />
                  <input type="checkbox" />
                </div>
              </td>
              <td>
                <div id="attendanceBtn">
                  <input type="checkbox" />
                  <input type="checkbox" />
                </div>
              </td>
              <td>
                <div id="attendanceBtn">
                  <input type="checkbox" />
                  <input type="checkbox" />
                </div>
              </td>
              <td>
                <div id="attendanceBtn">
                  <input type="checkbox" />
                  <input type="checkbox" />
                </div>
              </td>
              <td>
                <div id="attendanceBtn">
                  <input type="checkbox" />
                  <input type="checkbox" />
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div>
        <footer class="flex justify-between p-2 bg-white rounded-b-lg">
          <p>Copy right</p>
          <span>Mohamed Amer</span>
        </footer>
      </div>
    </div>
  </body>
</html>
