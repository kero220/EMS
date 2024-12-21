<?php

echo <<< 'upload'

<div class='container'>
   <label for="upload" class="flex flex-col items-center gap-2 cursor-pointer">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-white stroke-indigo-500"
         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
         <path stroke-linecap="round" stroke-linejoin="round"
            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
      </svg>
   </label>
   <input id="upload" name="file" type="file" class="hidden" required />
</div>

upload;
?>


<style>
/* Basic styling for the upload area */
.container {
   width: 4rem;
   height: 4rem;
   border-radius: 50%;
   padding: 8px;
}

.upload-container {
   display: flex;
   flex-direction: column;
   align-items: center;
   justify-content: center;
   border: 2px dashed #ccc;
   border-radius: 8px;
   /* Rounded corners */
   padding: 20px;
   cursor: pointer;
   /* Indicate it's clickable */
   transition: border-color 0.3s ease;
   /* Smooth transition for hover effect */
   width: 200px;
   /* Adjust as needed */
   height: 150px;
   /* Adjust as needed */
   overflow: hidden;
   /* Hide overflowing preview image */
   position: relative;
   background-color: #f8f8f8;
   /* Light background */
}

.upload-container:hover {
   border-color: #777;
   background-color: #eee;
   /* Slightly darker background on hover */
}

.upload-icon {
   font-size: 3em;
   color: #aaa;
   transition: color 0.3s ease;
}

.upload-container:hover .upload-icon {
   color: #777;
}

.upload-text {
   margin-top: 10px;
   color: #888;
   transition: color 0.3s ease;
}

.upload-container:hover .upload-text {
   color: #555;
}

/* Hide the actual file input */
#upload {
   position: absolute;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   opacity: 0;
   cursor: pointer;
}

/* Style for the preview image */
#preview-image {
   max-width: 100%;
   max-height: 100%;
   display: none;
   /* Initially hidden */
   object-fit: contain;
   /* Prevents image distortion */
}

.uploaded {
   display: none;
   margin-top: 10px;
   color: green;
}
</style>