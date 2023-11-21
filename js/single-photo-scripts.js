var SingleBtn = document.querySelector(".single-modal");

SingleBtn.onclick = function() {
    modal.style.display = "block";
    jQuery("#refphoto").val(ref.innerHTML);
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}