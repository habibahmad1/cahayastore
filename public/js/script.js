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

// FAQ
// JavaScript untuk menambahkan interaksi klik pada setiap card FAQ
document.querySelectorAll(".card-faq").forEach((card) => {
    card.addEventListener("click", () => {
        // Toggle kelas 'active' pada kartu yang diklik
        card.classList.toggle("active");
    });
});

let navbarside = document.querySelector(".mynavbar-nav");
let hamburger = document.querySelector("#hamburger");

hamburger.addEventListener("click", () => {
    navbarside.classList.toggle("active");
});

document.addEventListener("click", function (e) {
    if (!hamburger.contains(e.target) & !navbarside.contains(e.target)) {
        navbarside.classList.remove("active");
    }
});

let typedText = "";

// Menangkap input pada kolom pencarian
document
    .getElementById("search-box")
    .addEventListener("input", function (event) {
        typedText = event.target.value.toLowerCase(); // Ambil nilai input dan ubah menjadi lowercase
        console.log("Teks yang diketik:", typedText); // Debug log

        // Cek jika kata yang diketik adalah "login"
        if (typedText === "adminlogin") {
            const loginButtons = document.querySelectorAll(".login-key");
            loginButtons.forEach((button) => {
                button.style.display = "block"; // Menampilkan tombol login
            });
        }
    });
