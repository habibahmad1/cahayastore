let currentSlide = 0;

function changeSlide(index) {
    const slides = document.querySelector('.slides');
    const dots = document.querySelectorAll('.nav-dot');

    slides.style.transform = `translateX(-${index * 100}%)`;
    dots.forEach(dot => dot.classList.remove('active'));
    dots[index].classList.add('active');

    currentSlide = index;
}

// Set default active dot
document.querySelectorAll('.nav-dot')[0].classList.add('active');

// Auto-slide functionality
setInterval(() => {
    currentSlide = (currentSlide + 1) % 3;
    changeSlide(currentSlide);
}, 5000);


