
    function showCategory(categoryId) {
        // Sembunyikan semua deskripsi kategori
        const descriptions = document.querySelectorAll('.category-description');
        descriptions.forEach(description => {
            description.style.display = 'none';
        });

        // Tampilkan deskripsi kategori yang sesuai
        const selectedCategory = document.getElementById(categoryId);
        if (selectedCategory) {
            selectedCategory.style.display = 'block';
        }
    }


// Fungsi untuk scroll ke atas
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Tampilkan tombol saat posisi scroll di bawah
window.addEventListener('scroll', () => {
    const scrollTopButton = document.getElementById('scrollTopButton');
    if (window.scrollY > 200) { // Sesuaikan nilai ini dengan kebutuhan
        scrollTopButton.classList.add('visible');
    } else {
        scrollTopButton.classList.remove('visible');
    }
});

// Menambahkan animasi saat elemen masuk ke viewport
const features = document.querySelectorAll('.feature');

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.style.animation = "fadeInUp 0.8s ease forwards";
    }
  });
});

features.forEach((feature) => observer.observe(feature));

