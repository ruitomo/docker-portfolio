document.addEventListener("DOMContentLoaded", () => {
    const settingsBtn = document.getElementById("settings-btn");
    const closeNavBtn = document.getElementById("close-nav-btn");
    const navContainer = document.getElementById("nav-container");

    settingsBtn.addEventListener("click", () => {
        navContainer.classList.toggle("opacity-0");
        navContainer.classList.toggle("pointer-events-none");
    });

    closeNavBtn.addEventListener("click", () => {
        navContainer.classList.toggle("opacity-0");
        navContainer.classList.toggle("pointer-events-none");
    });
});
