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
    <style>
      #image input span {
        color: red;
      }
      #container input::placeholder {
        color: #5782c0;
      }
      #container input {
        color: #674ca3;
      }
      #container:hover {
        box-shadow: 1px 1px 5px 1px gray;
      }

      #fname:hover,
      #lname:hover,
      #date:hover,
      #email:hover,
      #phone:hover,
      #position:hover,
      #submitBtn:hover {
        opacity: 90%;
      }

      #submitBtn:active {
        border: 2px;
        border-style: solid;
        border-color: #5782c0;
        box-shadow: 2px 2px 4px 1px blue;
      }
      #submitBtn {
        background-color: #40bcfc;
      }
      #container {
        background-color: #dde6ed;
        max-width: 670px;
      }
      #container h1 {
        color: #27374d;
      }
      #wrapper {
        min-height: 35rem;
      }
      #container path {
        color: #6b6bf4;
      }
    </style>
  </head>
  <body>
    <div id="container" class="m-auto rounded-xl">
      <h1 class="text-center text-2xl p-4 m-4 font-semibold">Add Employee</h1>
      <div id="wrapper">
        <form class="flex flex-col text-left h-full p-4">
          <div
            class="rounded-md border border-indigo-500 bg-white p-4 shadow-md w-36 m-auto mb-4"
          >
            <label
              for="upload"
              class="flex flex-col items-center gap-2 cursor-pointer"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-10 w-10 fill-white stroke-indigo-500"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                />
              </svg>
              <span class="text-gray-600 font-medium">Select Image</span>
            </label>
            <input id="upload" type="file" class="hidden" required />
          </div>
          <div id="nameDiv" class="m-4 flex justify-around">
            <input
              type="text"
              id="fname"
              placeholder="First Name"
              class="rounded-lg text-center font-bold p-1"
              required
            />

            <input
              type="text"
              id="lname"
              placeholder="Last Name"
              class="rounded-lg text-center font-bold p-2"
              required
            />
          </div>

          <div id="dateDiv" class="my-4 p-4">
            <input
              type="date"
              id="date"
              placeholder=""
              class="rounded-lg text-center font-bold p-1 w-full cursor-text"
              required
            />
          </div>
          <div id="contacts" class="flex justify-around my-4">
            <input
              type="email"
              id="email"
              placeholder="Email"
              class="rounded-lg text-center font-bold p-2"
              required
            />

            <input
              type="text"
              id="phone"
              placeholder="Phone"
              class="rounded-lg text-center font-bold p-1"
              required
            />
          </div>

          <div id="positionDiv" class="my-4 p-4">
            <input
              type="text"
              id="position"
              placeholder="Position"
              class="rounded-lg text-center font-bold p-1 w-full"
              required
            />
          </div>
          <button
            type="submit"
            id="submitBtn"
            class="w-4/6 m-auto p-2 text-white font-bold rounded-2xl"
          >
            Submit
          </button>
        </form>
      </div>
    </div>
  </body>
</html>
