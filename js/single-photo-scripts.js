let SingleBtn = document.querySelector(".single-modal");
let ref = document.querySelector(".single-ref");

let lightbox = document.querySelector(".lightbox");
let boxcross = document.querySelector(".lightbox__close");

let NavPrevPost = document.querySelector(".prev-post");
let NavNextPost = document.querySelector(".next-post");
let NavPrevArrow = document.querySelector(".nav-post__arrow .fa-arrow-left");
let NavNextArrow = document.querySelector(".nav-post__arrow .fa-arrow-right");

let Singlefullscreen = document.querySelector(".single-image__overlay .fa-expand");
let image = document.querySelector(".single-image img");

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