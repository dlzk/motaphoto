var lightbox = document.querySelector(".lightbox");
var fullscreens = document.querySelectorAll(".overlay .fa-expand");
var boxcross = document.querySelector(".lightbox__close");
const links = document.querySelectorAll('img[src$=".jpeg"]');
var LightSource = lightbox.querySelector(".lightbox__container img");
var LightRef = lightbox.querySelector(".lightbox__ref");
var LightCat = lightbox.querySelector(".lightbox__cat");
var LightPrev = lightbox.querySelector(".lightbox__prev");
var LightNext = lightbox.querySelector(".lightbox__next");

fullscreens.forEach( function(fullscreen) {
    fullscreen.onclick = function() {
        var ImageSrc = fullscreen.parentNode.parentNode.querySelector("img");
        var OverlayRef = fullscreen.parentNode.querySelector(".overlay__ref");
        var OverlayCat = fullscreen.parentNode.querySelector(".overlay__cat");
        LightSource.src = ImageSrc.src;
        LightRef.innerHTML = OverlayRef.innerHTML;
        LightCat.innerHTML = OverlayCat.innerHTML;
        lightbox.style.display = "block";
    }
});

LightPrev.onclick = function() {
    for (let i = 0; i < links.length; i++) {
        if (links[i].src == LightSource.src) {
         console.log(links[i-1].src);
        } 
    }
}

LightNext.onclick = function() {
    for (let i = 0; i < links.length; i++) {
        if (links[i].src == LightSource.src) {
         console.log(links[i+1].src);
        } 
    }
    
}

boxcross.onclick = function() {
    lightbox.style.display = "none"; 
}