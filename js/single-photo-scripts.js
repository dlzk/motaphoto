var SingleBtn = document.querySelector(".single-modal");
var ref = document.querySelector(".single-ref");

var lightbox = document.querySelector(".lightbox");
var Singlefullscreen = document.querySelector(".single-image__overlay .fa-expand");
var boxcross = document.querySelector(".lightbox__close");
var image = document.querySelector(".single-image img");

SingleBtn.onclick = function() {
    modal.style.display = "block";
    jQuery("#refphoto").val(ref.innerHTML);
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

Singlefullscreen.onclick = function() {
    const source = lightbox.querySelector(".lightbox__container img");
    source.src = image.src;
    lightbox.style.display = "block";
}
boxcross.onclick = function() {
    lightbox.style.display = "none"; 
}