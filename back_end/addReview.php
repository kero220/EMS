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
        min-height: 20rem;
      }
    </style>
  </head>
  <body>
    <div id="container" class="m-auto rounded-xl">
      <h1 class="text-center text-2xl p-4 m-4 font-semibold">Add Review</h1>
      <div id="wrapper">
        <form class="flex flex-col text-left h-full p-4">
          <!-- index.html -->

          <div id="rating" class="flex space-x-2 mb-4 m-auto">
            <svg
              class="w-8 h-8 text-gray-400 hover:text-yellow-400 cursor-pointer"
              fill="currentColor"
              viewBox="0 0 20 20"
              data-value="1"
            >
              <path
                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
              />
            </svg>
            <svg
              class="w-8 h-8 text-gray-400 hover:text-yellow-400 cursor-pointer"
              fill="currentColor"
              viewBox="0 0 20 20"
              data-value="2"
            >
              <path
                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
              />
            </svg>
            <svg
              class="w-8 h-8 text-gray-400 hover:text-yellow-400 cursor-pointer"
              fill="currentColor"
              viewBox="0 0 20 20"
              data-value="3"
            >
              <path
                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
              />
            </svg>
            <svg
              class="w-8 h-8 text-gray-400 hover:text-yellow-400 cursor-pointer"
              fill="currentColor"
              viewBox="0 0 20 20"
              data-value="4"
            >
              <path
                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
              />
            </svg>
            <svg
              class="w-8 h-8 text-gray-400 hover:text-yellow-400 cursor-pointer"
              fill="currentColor"
              viewBox="0 0 20 20"
              data-value="5"
            >
              <path
                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
              />
            </svg>
          </div>

          <!-- Display the selected rating -->
          <div id="rating-text" class="text-lg mb-4 m-auto">
            Rating: 0 stars
          </div>
          <textarea
            name="reason"
            id="reviewReason"
            placeholder="Reason"
            class="p-4 text-center mb-8 mt-4 mx-8"
          ></textarea>

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
