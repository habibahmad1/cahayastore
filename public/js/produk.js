document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".category-btn");
    const productLists = document.querySelectorAll(".product-list");
    const searchSections = document.querySelectorAll(".search-section");

    // Handle Category Switch
    buttons.forEach(button => {
        button.addEventListener("click", () => {
            // Remove active class from all buttons
            buttons.forEach(btn => btn.classList.remove("active"));

            // Hide all product lists and search sections with animation
            productLists.forEach(list => list.classList.add("hidden"));
            searchSections.forEach(section => {
                section.classList.remove("zoom-in", "fade-bounce");
                section.classList.add("zoom-out");
                setTimeout(() => {
                    section.classList.add("hidden");
                }, 500); // Match with animation duration
            });

            // Show selected product list and search section with animation
            const category = button.getAttribute("data-category");
            const productList = document.getElementById(category);
            const searchSection = document.getElementById(`${category}-search`);

            productList.classList.remove("hidden");
            searchSection.classList.remove("hidden", "zoom-out");
            searchSection.classList.add("zoom-in", "fade-bounce");

            // Add active class to clicked button
            button.classList.add("active");
        });
    });

    // Handle Search Filtering
    const searchInputs = document.querySelectorAll(".search-input");
    searchInputs.forEach(input => {
        input.addEventListener("input", event => {
            const query = event.target.value.toLowerCase();
            const category = event.target.parentElement.id.replace("-search", "");
            const products = document.querySelectorAll(`#${category} .product-card`);

            products.forEach(product => {
                const name = product.getAttribute("data-name").toLowerCase();
                if (name.includes(query)) {
                    product.style.display = "block";
                } else {
                    product.style.display = "none";
                }
            });
        });
    });
});
