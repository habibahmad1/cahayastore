document.addEventListener("DOMContentLoaded", function () {
    const themeLight = document.getElementById("theme-light");
    const themeDark = document.getElementById("theme-dark");
    const themeAuto = document.getElementById("theme-auto");

    const themeButtons = [themeLight, themeDark, themeAuto].filter(Boolean); // Hanya tombol yang ada

    function setTheme(theme) {
        document.documentElement.setAttribute("data-bs-theme", theme);
        localStorage.setItem("theme", theme);

        themeButtons.forEach((button) => button.classList.remove("active"));
        const activeButton = document.querySelector(`[data-theme="${theme}"]`);
        if (activeButton) activeButton.classList.add("active");
    }

    const savedTheme = localStorage.getItem("theme") || "auto";
    setTheme(savedTheme);

    // Pastikan hanya menambahkan event listener jika tombol ada
    if (themeLight)
        themeLight.addEventListener("click", () => setTheme("light"));
    if (themeDark) themeDark.addEventListener("click", () => setTheme("dark"));
    if (themeAuto) themeAuto.addEventListener("click", () => setTheme("auto"));
});

// Dropdown Kelola Barang
const dropkelolabarang = document.getElementById("dropkelolabarang");
const barangmasuk = document.getElementById("barangmasuk");
const barangkeluar = document.getElementById("barangkeluar");

if (dropkelolabarang && barangmasuk && barangkeluar) {
    dropkelolabarang.addEventListener("click", () => {
        barangmasuk.classList.toggle("d-none");
        barangkeluar.classList.toggle("d-none");
    });
}

// Dropdown Riwayat Stok
const riwayatstok = document.getElementById("riwayatstok");
const uploadriwayat = document.getElementById("uploadriwayat");
const lihatriwayat = document.getElementById("lihatriwayat");

if (riwayatstok && uploadriwayat && lihatriwayat) {
    riwayatstok.addEventListener("click", () => {
        uploadriwayat.classList.toggle("d-none");
        lihatriwayat.classList.toggle("d-none");
    });
}

// Sidebar
document.addEventListener('DOMContentLoaded', function() {
    const bagHomeToggle = document.getElementById('bagHomeToggle');
    const bagHomeSubmenu = document.getElementById('bagHomeSubmenu');
    const bagProdukToggle = document.getElementById('bagProdukToggle');
    const bagProdukSubmenu = document.getElementById('bagProdukSubmenu');
    const bagArtikelToggle = document.getElementById('bagArtikelToggle');
    const bagArtikelSubmenu = document.getElementById('bagArtikelSubmenu');
    const bagUserManajemenToggle = document.getElementById('bagUserManajemenToggle');
    const bagUserManajemenSubmenu = document.getElementById('bagUserManajemenSubmenu');

    bagHomeToggle.addEventListener('click', function() {
        bagHomeSubmenu.classList.toggle('d-none');
    });

    bagProdukToggle.addEventListener('click', function() {
        bagProdukSubmenu.classList.toggle('d-none');
    });

    bagArtikelToggle.addEventListener('click', function() {
        bagArtikelSubmenu.classList.toggle('d-none');
    });

    bagUserManajemenToggle.addEventListener('click', function() {
        bagUserManajemenSubmenu.classList.toggle('d-none');
    });

});
