// // Kiểm tra đầu vào sử dụng các biểu thức chính quy


// function validateInputs() {


//     document.querySelector(".form").addEventListener("submit", function (event) {
//         event.preventDefault(); 
//     const fnameInput = document.getElementById("fname");
//     const lnameInput = document.getElementById("lname");
//     const numberInput = document.getElementById("number");
//     const unameInput = document.getElementById("uname");
//     const passwordInput = document.getElementById("password");
//     const birthdateInput = document.getElementById("birthdate");
//     const rolesSelect = document.getElementById("roles");
    
//     const fnameError = document.getElementById("fnameError");
//     const lnameError = document.getElementById("lnameError");
//     const numberError = document.getElementById("numberError");
//     const unameError = document.getElementById("unameError");
//     const passwordError = document.getElementById("passwordError");
//     const birthdateError = document.getElementById("birthdateError");
//     const rolesError = document.getElementById("rolesError");

//     fnameError.textContent = ""; // Reset error messages
//     lnameError.textContent = "";
//     numberError.textContent = "";
//     unameError.textContent = "";
//     passwordError.textContent = "";
//     birthdateError.textContent = "";
//     rolesError.textContent = ""

//     const nameRegex = /^[A-Z][a-z]*$/;
//     const numberRegex = /^0\d{9}$/;
//     const unameRegex = /^[a-zA-Z0-9]+@gmail\.com$/;
//     const passwordRegex = /^.{8,}$/;

//     const currentYear = new Date().getFullYear();
//     const birthdateYear = new Date(birthdateInput.value).getFullYear();
//     const birthdateLimitYear = currentYear - 18;

//     let isValid = true;

//     if (!nameRegex.test(fnameInput.value) || !nameRegex.test(lnameInput.value)) {
//         fnameError.textContent = "First Name và Last Name cần viết hoa chữ cái đầu và không có ký tự đặc biệt.";
//         isValid = false;
//     }
    
//     if (!numberRegex.test(numberInput.value)) {
//         numberError.textContent = "Number cần có 10 số và bắt đầu bằng số 0.";
//         isValid = false;
//     }
    
//     if (!unameRegex.test(unameInput.value)) {
//         unameError.textContent = "Username cần theo định dạng chữ và số và có đuôi là @gmail.com.";
//         isValid = false;
//     }
    
//     if (!passwordRegex.test(passwordInput.value)) {
//         passwordError.textContent = "Password cần ít nhất 8 ký tự.";
//         isValid = false;
//     }
    
//     if (birthdateYear > birthdateLimitYear) {
//         birthdateError.textContent = "Date of Birth cần nhỏ hơn 18 năm so với năm hiện tại.";
//         isValid = false;
//     }
    

//     return isValid;
// }
// }
// const submitButton = document.getElementById("submit");

// submitButton.addEventListener("click", function (event) {
//     if (!validateInputs()) {
//         event.preventDefault(); // Ngăn chặn sự kiện submit nếu có lỗi
//     }
// });