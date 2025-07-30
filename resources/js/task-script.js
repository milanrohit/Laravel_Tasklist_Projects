document.addEventListener("DOMContentLoaded", () => {
    const toastMsg = document.getElementById("toast-msg");
    if (toastMsg) {
        toastMsg.classList.add("show");
        setTimeout(() => toastMsg.classList.remove("show"), 4000);
    }
});