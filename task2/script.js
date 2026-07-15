console.log("Script Loaded");

const password = document.getElementById("password");
const togglePassword = document.getElementById("togglePassword");
const eyeIcon = document.getElementById("eyeIcon");

if (password && togglePassword && eyeIcon) {
    togglePassword.addEventListener("click", function () {
        if (password.type === "password") {
            password.type = "text";
            eyeIcon.classList.remove("bi-eye-fill");
            eyeIcon.classList.add("bi-eye-slash-fill");
        } else {
            password.type = "password";
            eyeIcon.classList.remove("bi-eye-slash-fill");
            eyeIcon.classList.add("bi-eye-fill");
        }
    });
}           
const email = document.getElementById("email");
const emailMessage = document.getElementById("emailMessage");

if (email && emailMessage) {

    email.addEventListener("keyup", function () {

        let xhr = new XMLHttpRequest();

        xhr.open("POST", "check_email.php", true);

        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            emailMessage.innerHTML = this.responseText;
        };

        xhr.send("email=" + encodeURIComponent(email.value));
    });

}