document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("social-menu-toggle");
    const socialMenu = document.getElementById("global-social-networks");

    toggleButton.addEventListener("click", function () {
        socialMenu.classList.toggle("social-menu-open");
    });
});
