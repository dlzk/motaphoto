var lightbox = document.querySelector(".lightbox");
var Singlefullscreen = document.querySelector(".single-image__overlay .fa-expand");
var boxcross = document.querySelector(".lightbox__close");
var image = document.querySelector(".single-image img")
const links = document.querySelectorAll('img[src$=".png"], img[src$=".jpg"], img[src$=".jpeg"]')

Singlefullscreen.onclick = function() {
    const source = lightbox.querySelector(".lightbox__container img");
    source.src = image.src;
    lightbox.style.display = "block";
}
boxcross.onclick = function() {
    lightbox.style.display = "none"; 
}