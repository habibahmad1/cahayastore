
    function showCategory(categoryId) {
        const categories = document.querySelectorAll('.page-content');
        categories.forEach(category => category.classList.remove('active'));
        document.getElementById(categoryId).classList.add('active');
    }

