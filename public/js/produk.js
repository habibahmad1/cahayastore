const btnFilter = document.querySelector(".btn-filter");
const boxKategori = document.querySelector(".filter-kategori");
const btnX = document.querySelector(".btnx");

if (btnFilter) {
    btnFilter.addEventListener("click", function () {
        boxKategori.style.display = "flex";
    });
}

if (btnX) {
    btnX.addEventListener("click", function () {
        boxKategori.style.display = "none";
    });
}
