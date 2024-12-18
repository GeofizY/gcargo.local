const openPopUp = document.querySelector(".open_pop_up")
const closePopUp = document.querySelector(".pop_up_close")
const popUp = document.querySelector(".pop_up")

openPopUp.addEventListener("click", (event) => {
    event.preventDefault()
    popUp.classList.add("active")
})

closePopUp.addEventListener("click", (event) => {
    popUp.classList.remove("active")
})
