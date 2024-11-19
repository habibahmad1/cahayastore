document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".category-btn");
    const productLists = document.querySelectorAll(".product-list");
    const searchSections = document.querySelectorAll(".search-section");

    // Handle Category Switch
    buttons.forEach(button => {
        button.addEventListener("click", () => {
            // Remove active class from all buttons
            buttons.forEach(btn => btn.classList.remove("active"));

            // Hide all product lists and search sections
            productLists.forEach(list => list.classList.add("hidden"));
            searchSections.forEach(section => section.classList.add("hidden"));

            // Show selected product list and search section
            const category = button.getAttribute("data-category");
            document.getElementById(category).classList.remove("hidden");
            document.getElementById(`${category}-search`).classList.remove("hidden");

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
