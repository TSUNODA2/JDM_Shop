let slidePosition = 0;
const slides = document.getElementsByClassName('carousel_img');
const totalSlides = slides.length;

document.
 getElementById('carousel_button--next')
 .addEventListener("click", function(){
     moveToNextSlide();
 });

 document.
 getElementById('carousel_button--prev')
 .addEventListener("click", function(){
     moveToPrevSlide();
 });

function updateSlidePosition() {
    for(let slide of slides) {
        slide.classList.remove('carousel_img--visible');
        slide.classList.add('carousel_img--hidden');
    }
    
    slides[slidePosition].classList.add('carousel_img--visible');

}

function moveToNextSlide() {
    
    if (slidePosition === totalSlides - 1 ) {
        slidePosition = 0;
    } else {
        slidePosition++;
    }
    updateSlidePosition();
}

 function moveToPrevSlide() {

    if (slidePosition === 0) {
        slidePosition = totalSlides - 1;
    } else {
        slidePosition--;
    }
    updateSlidePosition();
}
 
