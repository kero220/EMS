// احصل على جميع الروابط الرئيسية
document.querySelectorAll('a.mainLink').forEach(function (mainLink) {
    mainLink.addEventListener('click', function (event) {
        //event.preventDefault(); // منع الانتقال إلى صفحة أخرى
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
  
