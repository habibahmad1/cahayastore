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

// Observer untuk mendeteksi elemen yang masuk ke viewport
const categoryDescriptions = document.querySelectorAll('.category-description');

const categoryObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            const categoryId = entry.target.id; // Ambil ID elemen yang terlihat
            showCategory(categoryId); // Tampilkan kategori terkait
        }
    });
});

// Mendaftarkan observer ke semua elemen deskripsi kategori
categoryDescriptions.forEach((description) => categoryObserver.observe(description));



// Fungsi untuk scroll ke atas
function scrollToTopug() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Tampilkan tombol saat posisi scroll di bawah
window.addEventListener('scroll', () => {
    const scrollTopButtonug = document.getElementById('scrollTopButtonug');
    if (window.scrollY > 200) { // Sesuaikan nilai ini dengan kebutuhan
        scrollTopButtonug.classList.add('visible');
    } else {
        scrollTopButtonug.classList.remove('visible');
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


// button aktif
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.category-buttonn');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            // Hapus kelas 'active' dari semua tombol
            buttons.forEach(btn => btn.classList.remove('active'));
            // Tambahkan kelas 'active' ke tombol yang diklik
            this.classList.add('active');
        });
    });
});

