let approveButtons = document.querySelectorAll(".approve-btn");



approveButtons.forEach(el => el.addEventListener('click', event => {
    let id = el.getAttribute("data-approve-id");
    window.location.replace("http://localhost:3000/approveMails/approve/" + id);
}));