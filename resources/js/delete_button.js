const doubleConfirm = document.querySelector(".double-confirm");
const doubleConfirmInner = document.querySelector(".double-confirm-inner");

// add event listeners
doubleConfirm.addEventListener("click", () => {
    doubleConfirmInner.classList.add("-translate-x-full");
});
