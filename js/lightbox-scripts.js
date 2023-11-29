function initLightbox() {
let lightbox = document.querySelector(".lightbox");
let boxcross = document.querySelector(".lightbox__close");
let LightSource = lightbox.querySelector(".lightbox__container img");
let LightRef = lightbox.querySelector(".lightbox__ref");
let LightCat = lightbox.querySelector(".lightbox__cat");
let LightPrev = lightbox.querySelector(".lightbox__prev");
let LightNext = lightbox.querySelector(".lightbox__next");




    let fullscreens = document.querySelectorAll(".overlay .fa-expand");

    fullscreens.forEach( function(fullscreen) {
        fullscreen.onclick = function() {
            let ImageSrc = fullscreen.parentNode.parentNode.querySelector("img");
            let OverlayRef = fullscreen.parentNode.querySelector(".overlay__ref");
            let OverlayCat = fullscreen.parentNode.querySelector(".overlay__cat");
            LightSource.src = ImageSrc.src;
            LightRef.innerHTML = OverlayRef.innerHTML;
            LightCat.innerHTML = OverlayCat.innerHTML;
            lightbox.style.display = "block";
        }
    });

    let links = document.querySelectorAll('.catalogue-photo img[src$=".jpeg"], .single-image img[src$=".jpeg"]');
    const refs = document.querySelectorAll('.overlay__ref, .single-ref');
    const cats = document.querySelectorAll('.overlay__cat, .single-cat');
    LightPrev.onclick = function() {
        for (let i = 0; i < links.length; i++) {
            if (links[i].src === LightSource.src) {
                if(links[i-1]) {
                    console.log(links[i-1].src);
                    LightSource.src = links[i-1].src;
                    LightRef.innerHTML = refs[i-1].innerHTML;
                    LightCat.innerHTML = cats[i-1].innerHTML;
                }
                else {
                    LightSource.src = links[links.length-1].src;
                    LightRef.innerHTML = refs[links.length-1].innerHTML;
                    LightCat.innerHTML = cats[links.length-1].innerHTML;
                }
                i=100;
            } 
        }
    }

    LightNext.onclick = function() {
        for (let i = 0; i < links.length; i++) {
            if (links[i].src === LightSource.src) {
                if(links[i+1]) {
                    console.log(links[i+1].src);
                    LightSource.src = links[i+1].src;
                    LightRef.innerHTML = refs[i+1].innerHTML;
                    LightCat.innerHTML = cats[i+1].innerHTML;
                }
                else {
                    LightSource.src = links[0].src;
                    LightRef.innerHTML = refs[0].innerHTML;
                    LightCat.innerHTML = cats[0].innerHTML;
                }
                i=100;
            } 
        }
    }


// for (let i = 0; i < links.length; i++) {
//     console.log(i);
//     console.log(links[i].src);
// }

boxcross.onclick = function() {
    lightbox.style.display = "none"; 
}

}
initLightbox();