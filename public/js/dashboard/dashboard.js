document.addEventListener("DOMContentLoaded", function () {
    const themeLight = document.getElementById("theme-light");
    const themeDark = document.getElementById("theme-dark");
    const themeAuto = document.getElementById("theme-auto");
    const themeButtons = [themeLight, themeDark, themeAuto]; // Semua tombol tema

    // Fungsi untuk mengatur tema
    function setTheme(theme) {
        document.documentElement.setAttribute("data-bs-theme", theme); // Terapkan tema
        localStorage.setItem("theme", theme); // Simpan tema ke localStorage

        // Perbarui tampilan tombol yang aktif
        themeButtons.forEach((button) => button.classList.remove("active")); // Hapus class aktif dari semua tombol
        const activeButton = document.querySelector(`[data-theme="${theme}"]`); // Cari tombol sesuai tema
        if (activeButton) activeButton.classList.add("active"); // Tambahkan class aktif ke tombol
    }

    // Ambil tema yang disimpan dari localStorage
    const savedTheme = localStorage.getItem("theme") || "auto"; // Default ke "auto" jika tidak ada
    setTheme(savedTheme); // Terapkan tema saat halaman dimuat

    // Event listener untuk tombol tema
    themeLight.addEventListener("click", () => setTheme("light"));
    themeDark.addEventListener("click", () => setTheme("dark"));
    themeAuto.addEventListener("click", () => setTheme("auto"));
});

const dropkelolabarang = document.getElementById("dropkelolabarang");
const barangmasuk = document.getElementById("barangmasuk");
const barangkeluar = document.getElementById("barangkeluar");
const riwayatbarang = document.getElementById("riwayatbarang");

const riwayatstok = document.getElementById("riwayatstok");
const uploadriwayat = document.getElementById("uploadriwayat");
const lihatriwayat = document.getElementById("lihatriwayat");

if (dropkelolabarang) {
    dropkelolabarang.addEventListener("click", () => {
        barangmasuk.classList.toggle("d-none");
        barangkeluar.classList.toggle("d-none");
    });
}
if (riwayatstok) {
    riwayatstok.addEventListener("click", () => {
        uploadriwayat.classList.toggle("d-none");
        lihatriwayat.classList.toggle("d-none");
    });
}
