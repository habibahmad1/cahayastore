
    function showCategory(categoryId) {
        const categories = document.querySelectorAll('.page-content');
        categories.forEach(category => category.classList.remove('active'));
        document.getElementById(categoryId).classList.add('active');
    }

    document.querySelectorAll('.card-faq').forEach(card => {
        card.addEventListener('click', () => {
            card.classList.toggle('active');
        });
    });


    // Efek klik pada kartu FAQ
    document.querySelectorAll('.card-faq').forEach(card => {
        card.addEventListener('click', () => {
            card.classList.toggle('active');
        });
    });

    // Efek animasi scroll reveal
    window.addEventListener('scroll', () => {
        document.querySelectorAll('.card-faq').forEach(card => {
            const rect = card.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                card.style.transform = "translateY(0)";
                card.style.opacity = "1";
            } else {
                card.style.transform = "translateY(50px)";
                card.style.opacity = "0";
            }
        });
    });

    // Filter kategori (opsional jika ada tombol kategori)
    document.querySelectorAll('.category-button').forEach(button => {
        button.addEventListener('click', () => {
            const category = button.getAttribute('data-category');
            document.querySelectorAll('.card-faq').forEach(card => {
                if (category === 'all' || card.getAttribute('data-category') === category) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });


// Fungsi untuk scroll ke atas
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Tampilkan atau sembunyikan tombol saat pengguna menggulir
window.addEventListener('scroll', () => {
    const scrollTopButton = document.getElementById('scrollTopButton');
    if (window.scrollY > 200) { // Tampilkan tombol jika scroll melebihi 200px
        scrollTopButton.classList.add('visible');
    } else {
        scrollTopButton.classList.remove('visible');
    }
});



