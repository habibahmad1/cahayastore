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

    document.addEventListener("DOMContentLoaded", () => {
        const progressBars = document.querySelectorAll(".progress");

        const animateProgress = () => {
            progressBars.forEach((bar) => {
                const rect = bar.getBoundingClientRect();
                const windowHeight = window.innerHeight;

                // Periksa apakah elemen terlihat di viewport
                if (rect.top >= 0 && rect.top <= windowHeight) {
                    const targetProgress = bar.getAttribute("data-progress");
                    bar.style.width = `${targetProgress}%`;
                }
            });
        };

        // Tambahkan event listener untuk scroll
        window.addEventListener("scroll", animateProgress);

        // Jalankan fungsi saat halaman dimuat
        animateProgress();
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


//halaman kruuuuuuuuuuu
document.querySelectorAll('.team-card').forEach(card => {
    card.addEventListener('mouseover', () => {
        card.querySelector('h3').style.transform = 'scale(1.1)';
    });
    card.addEventListener('mouseout', () => {
        card.querySelector('h3').style.transform = 'scale(1)';
    });
});


//music bagian kata kata bijak
const audio = document.getElementById('myAudio');
const playPauseBtn = document.getElementById('playPauseBtn');
const stopBtn = document.getElementById('stopBtn');
const volumeSlider = document.getElementById('volumeSlider');

// Play/Pause Toggle
playPauseBtn.addEventListener('click', () => {
    if (audio.paused) {
        audio.play();
        playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>'; // Ganti ikon menjadi Pause
    } else {
        audio.pause();
        playPauseBtn.innerHTML = '<i class="fas fa-play"></i>'; // Ganti ikon menjadi Play
    }
});

// Stop Audio
// stopBtn.addEventListener('click', () => {
//     audio.pause();
//     audio.currentTime = 0; // Reset audio ke awal
//     playPauseBtn.innerHTML = '<i class="fas fa-play"></i>'; // Kembali ke ikon Play
// });

// Adjust Volume
volumeSlider.addEventListener('input', (e) => {
    audio.volume = e.target.value;
});

