let currentIndex = 0;
const testimonials = document.querySelectorAll(".card-testi");

// Function to show the current testimonial
function showTestimonial(index) {
    testimonials.forEach((testi, i) => {
        testi.classList.remove("active"); // Hide all cards
        testi.querySelector(".star-testi").classList.remove("animate"); // Reset animation
        if (i === index) {
            testi.classList.add("active"); // Show only the current card
            // Trigger star animation with a small delay
            setTimeout(() => {
                testi.querySelector(".star-testi").classList.add("animate");
            }, 100);
        }
    });
}

//navbar scroll
window.addEventListener("scroll", function () {
    const navbar = document.querySelector(".mynavbar");
    if (window.scrollY > 50) {
        // Adjust scroll threshold as needed
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
});

// Show next testimonial
function showNext() {
    currentIndex = (currentIndex + 1) % testimonials.length; // Move to the next card, loop back if at end
    showTestimonial(currentIndex);
}

// Show previous testimonial
function showPrev() {
    currentIndex =
        (currentIndex - 1 + testimonials.length) % testimonials.length; // Move to the previous card, loop to end if at start
    showTestimonial(currentIndex);
}

// Initial display of the first testimonial
showTestimonial(currentIndex);

let lastScrollTop = 0;

const button = document.querySelector(".button");
const navbarhp = document.querySelector(".navbar-side");

if (navbarhp) {
    button.addEventListener("click", () => {
        navbarhp.classList.toggle("active"); // Toggle kelas "active"
    });
}

// FAQ
// JavaScript untuk menambahkan interaksi klik pada setiap card FAQ
document.querySelectorAll(".card-faq").forEach((card) => {
    card.addEventListener("click", () => {
        // Toggle kelas 'active' pada kartu yang diklik
        card.classList.toggle("active");
    });
});
