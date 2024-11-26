
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
