var SingleBtn = document.querySelector(".single-modal");
var ref = document.querySelector(".single-ref");

var NavPrevPost = document.querySelector(".prev-post");
var NavNextPost = document.querySelector(".next-post");
var NavPrevArrow = document.querySelector(".nav-post__arrow .fa-arrow-left");
var NavNextArrow = document.querySelector(".nav-post__arrow .fa-arrow-right");

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

NavPrevArrow.addEventListener( "mouseover", function () {
    NavNextPost.style.display = "none";
    NavPrevPost.style.display = "block";
});
NavNextArrow.addEventListener( "mouseover", function () {
    NavPrevPost.style.display = "none";
    NavNextPost.style.display = "block";
});

Singlefullscreen.onclick = function() {
    const source = lightbox.querySelector(".lightbox__container img");
    source.src = image.src;
    lightbox.style.display = "block";
}
boxcross.onclick = function() {
    lightbox.style.display = "none"; 
}