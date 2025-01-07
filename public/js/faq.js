document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".btn-buka-card");
    const popup = document.querySelector(".faq-popup");
    const popupContent = document.querySelector("#faq-popup-content");
    const popupTitle = document.querySelector("#faq-popup-title");
    const closeButton = document.querySelector(".close-popup");

    // Event listener untuk tombol buka kategori
    buttons.forEach((button) => {
        button.addEventListener("click", function () {
            const kategori = button.getAttribute("data-kategori");

            // Ubah judul popup sesuai kategori
            popupTitle.textContent = `Kategori: ${kategori}`;

            // Filter pertanyaan berdasarkan kategori
            const faqItems = popupContent.querySelectorAll(".faq-item");
            faqItems.forEach((item) => {
                if (item.getAttribute("data-kategori") === kategori) {
                    item.style.display = "block"; // Tampilkan
                } else {
                    item.style.display = "none"; // Sembunyikan
                }
            });

            // Tampilkan popup
            popup.style.display = "block";
        });
    });

    // Event listener untuk tombol tutup
    closeButton.addEventListener("click", function () {
        popup.style.display = "none";
    });

    // Event listener untuk menampilkan/menyembunyikan jawaban
    const faqQuestions = document.querySelectorAll(".faq-question");
    faqQuestions.forEach((question) => {
        question.addEventListener("click", function () {
            const answer = this.nextElementSibling; // Elemen jawaban di bawahnya
            if (answer.style.display === "block") {
                answer.style.display = "none"; // Sembunyikan jika sedang ditampilkan
            } else {
                answer.style.display = "block"; // Tampilkan jika sedang disembunyikan
            }
        });
    });
});
