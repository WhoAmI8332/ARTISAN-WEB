import './bootstrap.js';

document.addEventListener("DOMContentLoaded", function () {
    const logoutButton = document.getElementById("logout-btn");
    const logoutForm = document.getElementById("logout-form");

    if (logoutButton) {
        // Check if logout button exists
        logoutButton.addEventListener("click", function (event) {
            event.preventDefault();
            logoutForm.submit();
        });
    }
});