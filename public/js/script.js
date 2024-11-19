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
    const navbar = document.querySelector(".navbar");
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

button.addEventListener("click", () => {
    navbarhp.classList.toggle("active"); // Toggle kelas "active"
});

// grafik about
document.addEventListener("DOMContentLoaded", () => {
    const ctx = document.getElementById("myChart").getContext("2d");
    const myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [
                "Januari",
                "Februari",
                "Maret",
                "April",
                "Mei",
                "Juni",
                "Juli",
                "Agustus",
                "September",
                "Oktober",
                "November",
                "Desember",
            ],
            datasets: [
                {
                    label: "LED PANJANG",
                    data: [30, 45, 40, 60, 50, 70, 80, 76, 80, 88, 93, 85], // Data penjualan sandal
                    backgroundColor: "rgba(54, 162, 235, 0.5)",
                    borderColor: "rgba(54, 162, 235, 1)",
                    borderWidth: 1,
                },
                {
                    label: "LED BULAT",
                    data: [20, 35, 25, 45, 30, 55, 78, 96, 86, 75, 88, 64], // Data penjualan kopi
                    backgroundColor: "#ff8d58",
                    borderColor: "rgba(255, 99, 132, 1)",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: "top",
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
            animation: {
                duration: 1000,
                easing: "easeInOutBounce",
            },
        },
    });
});

// FAQ
// JavaScript untuk menambahkan interaksi klik pada setiap card FAQ
document.querySelectorAll(".card-faq").forEach((card) => {
    card.addEventListener("click", () => {
        // Toggle kelas 'active' pada kartu yang diklik
        card.classList.toggle("active");
    });
});
