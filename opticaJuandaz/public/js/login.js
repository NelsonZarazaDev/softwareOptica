document.addEventListener("DOMContentLoaded", function () {
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        if (emailInput.value.trim() === "") {
            event.preventDefault();
            alert("Please enter your email.");
            emailInput.focus();
        } else if (passwordInput.value.trim() === "") {
            event.preventDefault();
            alert("Please enter your password.");
            passwordInput.focus();
        }
    });
});
