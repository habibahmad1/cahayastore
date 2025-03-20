document.addEventListener("DOMContentLoaded", function () {
    const cardArtikels = document.querySelectorAll(".card-artikel-image img");
    let currentIndex = 0;
    let images = [];

    if (cardArtikels.length > 0) {
        // Simpan semua gambar dalam array
        images = Array.from(cardArtikels).map((img) => img.src);

        cardArtikels.forEach((img, index) => {
            img.addEventListener("click", function () {
                currentIndex = index;
                updateModalImage();
                const imageModal = new bootstrap.Modal(
                    document.getElementById("imageModal")
                );
                imageModal.show();
            });
        });

        // Event listener untuk tombol Next
        document
            .getElementById("nextBtn")
            .addEventListener("click", function () {
                currentIndex = (currentIndex + 1) % images.length;
                updateModalImage();
            });

        // Event listener untuk tombol Previous
        document
            .getElementById("prevBtn")
            .addEventListener("click", function () {
                currentIndex =
                    (currentIndex - 1 + images.length) % images.length;
                updateModalImage();
            });

        function updateModalImage() {
            let modalImage = document.getElementById("modalImage");
            let downloadBtn = document.getElementById("downloadBtn");

            modalImage.src = images[currentIndex]; // Set gambar di modal
            downloadBtn.href = images[currentIndex]; // Set link download ke gambar yang tampil
        }
    }
});
