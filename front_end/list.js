// احصل على جميع الروابط الرئيسية
document.querySelectorAll("a.mainLink").forEach(function (mainLink) {
  mainLink.addEventListener("click", function (event) {
    //event.preventDefault(); // منع الانتقال إلى صفحة أخرى
    const linksList = mainLink.nextElementSibling; // الحصول على القائمة التابعة
    if (linksList && linksList.id === "linksList") {
      // التحقق من حالة الإظهار والإخفاء
      if (linksList.style.display === "none" || !linksList.style.display) {
        linksList.style.display = "block";
      } else {
        linksList.style.display = "none";
      }
    }
  });
});
let inputFile = document.getElementById("upload");
let fileName = document.getElementById("fileName");
inputFile.addEventListener("change", (event) => {
  console.log(event.target.files);
  fileName.textContent = event.target.files[0].name;
});
function myFunction() {
  const x = document.querySelector(".list");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
// check box required
document.getElementById("Cdate").addEventListener("change", function () {
  const dateInput = document.getElementById("date");
  if (this.checked) {
    dateInput.required = false;
    dateInput.value = "";
  } else {
    dateInput.required = true;
  }
});

document.getElementById("date").addEventListener("input", function () {
  const checkbox = document.getElementById("Cdate");
  if (this.value) {
    checkbox.required = false;
    checkbox.checked = false;
  } else {
    checkbox.required = true;
  }
});
