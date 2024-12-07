


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
    currentSlide = (currentSlide + 1) % 4;
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

// iklan muncul beberapa detikik
document.addEventListener("DOMContentLoaded", function () {
    const promoBanner = document.getElementById("promo-banner");
    const promoImage = document.getElementById("promo-image");
    const promoTitle = document.getElementById("promo-title");
    const promoDescription = document.getElementById("promo-description");
    const countdownTimer = document.getElementById("countdown-timer");
    const promoLink = document.getElementById("promo-link");

    let isDragging = false;
    let offsetX, offsetY;

    // Daftar iklan
    const ads = [
        {
            image: "img/iklan1.jpg",
            // title: "Diskon Spesial 50%!",
            // description: "Promo hanya berlaku hari ini, jangan sampai terlewat!",
            link: "#",
            duration: 60,
            delay: 5000,
        },
        {
            image: "img/iklan2.jpg",
            // title: "Gratis Ongkir!",
            // description: "Belanja minimal Rp100.000 untuk gratis ongkos kirim.",
            link: "#",
            duration: 60,
            delay: 15000,
        },
        {
            image: "img/iklan3.jpg",
            // title: "Buy 1 Get 1 Free!",
            // description: "Beli satu, dapatkan satu gratis. Promo hanya 3 hari!",
            link: "#",
            duration: 60,
            delay: 30000,
        },
    ];

    let currentAdIndex = 0;
    let intervalId;

    // Fungsi untuk menampilkan iklan
    function showAd(ad) {
        promoImage.src = ad.image;
        promoTitle.textContent = ad.title;
        promoDescription.textContent = ad.description;
        promoLink.href = ad.link;

        let remainingTime = ad.duration;

        function updateCountdown() {
            if (remainingTime > 0) {
                countdownTimer.textContent = `Waktu Tersisa: ${remainingTime} detik`;
                remainingTime--;
            } else {
                clearInterval(intervalId);
                closeBanner();
            }
        }

        updateCountdown();
        intervalId = setInterval(updateCountdown, 1000);

        promoBanner.classList.remove("hidden");
    }

    // Fungsi untuk menutup iklan
    function closeBanner() {
        promoBanner.classList.add("hidden");
        clearInterval(intervalId);

        currentAdIndex++;
        if (currentAdIndex < ads.length) {
            setTimeout(() => {
                showAd(ads[currentAdIndex]);
            }, ads[currentAdIndex].delay - ads[currentAdIndex - 1].delay);
        }
    }

    // Mulai menampilkan iklan pertama
    setTimeout(() => {
        showAd(ads[currentAdIndex]);
    }, ads[currentAdIndex].delay);

    // Event listener untuk tombol close
    document.querySelector(".close-btn").addEventListener("click", closeBanner);

    // Fungsi drag and drop
    promoBanner.addEventListener("mousedown", (event) => {
        isDragging = true;
        offsetX = event.clientX - promoBanner.offsetLeft;
        offsetY = event.clientY - promoBanner.offsetTop;
        promoBanner.style.cursor = "grabbing";
    });

    document.addEventListener("mousemove", (event) => {
        if (isDragging) {
            promoBanner.style.left = `${event.clientX - offsetX}px`;
            promoBanner.style.top = `${event.clientY - offsetY}px`;
        }
    });

    document.addEventListener("mouseup", () => {
        isDragging = false;
        promoBanner.style.cursor = "grab";
    });
});



// spill produkkkk

// Kumpulan produk berdasarkan kategori
const products = {
    led: [
        "img/iklan1.jpg", "img/iklan1.jpg", "img/iklan1.jpg", "img/iklan1.jpg", "img/iklan1.jpg", "img/iklan1.jpg",
      ],
      coffee: [
        "img/iklan1.jpg", "img/iklan1.jpg", "img/iklan1.jpg", "img/iklan1.jpg", "img/iklan1.jpg",
      ],
      sendal: [
        "img/iklan1.jpg", "img/iklan1.jpg", "img/iklan1.jpg", "img/iklan1.jpg", "img/iklan1.jpg", "img/iklan1.jpg",
      ],
      playmat: [
        "img/iklan1.jpg", "img/iklan1.jpg", "img/iklan1.jpg", "img/iklan1.jpg", "img/iklan1.jpg",
      ],
  };

  // Gabungkan semua produk
  const allProducts = [
    ...products.led,
    ...products.coffee,
    ...products.sendal,
    ...products.playmat,
  ];

  // Dapatkan elemen tombol dan area untuk menampilkan produk
  const buttons = document.querySelectorAll(".filter-btn-prd");
  const productDisplay = document.querySelector(".product-display");

  // Fungsi untuk menampilkan produk
  function displayProducts(images) {
    productDisplay.innerHTML = ""; // Bersihkan gambar sebelumnya
    images.forEach((image, index) => {
      const productItem = document.createElement("div");
      productItem.classList.add("product-item");
      productItem.style.backgroundImage = `url(${image})`;

      // Tambahkan animasi delay
      setTimeout(() => {
        productItem.classList.add("show");
      }, index * 200); // Delay 200ms untuk setiap item

      productDisplay.appendChild(productItem);
    });
  }

  // Tambahkan event listener ke setiap tombol
  buttons.forEach((button) => {
    const category = button.getAttribute("data-category");

    // Update angka produk berdasarkan kategori
    const productCountSpan = button.closest(".button-wrapper").querySelector(".product-count");

    let productImages = [];
    if (category === "all") {
      productImages = allProducts;
      productCountSpan.textContent = allProducts.length;
    } else {
      productImages = products[category];
      productCountSpan.textContent = products[category].length;
    }

    // Tampilkan produk saat tombol diklik
    button.addEventListener("click", () => {
      displayProducts(productImages);
    });
  });

  // Menampilkan semua produk saat pertama kali halaman dimuat
  window.addEventListener('load', () => {
    displayProducts(allProducts);
  });
