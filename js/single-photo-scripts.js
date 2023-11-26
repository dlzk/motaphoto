var SingleBtn = document.querySelector(".single-modal");
var ref = document.querySelector(".single-ref");

SingleBtn.onclick = function() {
    modal.style.display = "block";
    jQuery("#refphoto").val(ref.innerHTML);
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}