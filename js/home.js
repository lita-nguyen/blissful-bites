let slideIndex = 0;
let timer; 
showSlides();
document.getElementById('next').addEventListener('click', function() {
    plusSlides(1);
    resetAutoSlide(); 
});
document.getElementById('prev').addEventListener('click', function() {
    plusSlides(-1);
    resetAutoSlide();
});
const container = document.querySelector('.container'); 
container.addEventListener('mouseenter', startAutoSlide);  
container.addEventListener('mouseleave', stopAutoSlide); 
function plusSlides(n) {
    slideIndex += n;
    showSlides();
}
function showSlides() {
    const slides = document.getElementsByClassName("myslides");
    if (slideIndex >= slides.length) { slideIndex = 0; }
    if (slideIndex < 0) { slideIndex = slides.length - 1; }
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex].style.display = "block";
}
function startAutoSlide() {
    timer = setInterval(function() {
        plusSlides(1); 
    }, 3000);
}
function stopAutoSlide() {
    clearInterval(timer); 
}
function resetAutoSlide() {
    stopAutoSlide();  
    startAutoSlide(); 
}
document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll(".slide");
    let currentIndex = 0;
    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove("active");
            if (i === index) slide.classList.add("active");
        });
    }
    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    }
    showSlide(currentIndex);
    setInterval(nextSlide, 5000);
});