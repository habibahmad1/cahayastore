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


// persentase pengalaman kami
    document.addEventListener("DOMContentLoaded", function () {
        const progressBars = document.querySelectorAll(".progress");

        progressBars.forEach(progress => {
            const target = parseInt(progress.getAttribute("data-target"), 10);
            const percentDisplay = progress.nextElementSibling;
            let current = 0;

            const updateProgress = setInterval(() => {
                if (current <= target) {
                    progress.style.width = `${current}%`;
                    percentDisplay.textContent = `${current}%`;
                    current++;
                } else {
                    clearInterval(updateProgress);
                }
            }, 15); // Kecepatan animasi (15ms per step)
        });
    });

// bagian fakta tentang kami
const factsSection = document.querySelector('.facts-and-achievements');
const factNumbers = document.querySelectorAll('.fact-number');

// Function to animate numbers
const animateNumbers = (entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // Jalankan animasi hanya sekali
            factNumbers.forEach(num => {
                const updateCount = () => {
                    const target = +num.getAttribute('data-target');
                    const count = +num.innerText;

                    const increment = target / 100; // Kecepatan animasi
                    if (count < target) {
                        num.innerText = Math.ceil(count + increment);
                        setTimeout(updateCount, 30); // Interval update
                    } else {
                        num.innerText = target;
                    }
                };
                updateCount();
            });

            // Hentikan observer agar tidak berjalan berulang kali
            observer.unobserve(factsSection);
        }
    });
};

// Buat Intersection Observer
const observer = new IntersectionObserver(animateNumbers, {
    threshold: 0.5, // Jalankan animasi ketika 50% elemen terlihat
});

// Observasi elemen
observer.observe(factsSection);

