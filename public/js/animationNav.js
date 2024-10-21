document.addEventListener("DOMContentLoaded", function () {
    const currentLocation = window.location.pathname
    const menuLinks = document.querySelectorAll(".nav-link")

    menuLinks.forEach((link) => {
        console.log(link.getAttribute("href"))
        if (link.getAttribute("href") === `..${currentLocation}`) {
            link.classList.add("active")
        }
    })
})
