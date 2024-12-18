document.querySelectorAll("input").forEach((el) => {
    el.addEventListener("keyup", (event) => {
        el.setAttribute("aria-invalid", "false")
        el.nextElementSibling.remove()
    })
})
document.querySelectorAll("textarea").forEach((el) => {
    el.addEventListener("keyup", (event) => {
        el.setAttribute("aria-invalid", "false")
        el.nextElementSibling.remove()
    })
})
