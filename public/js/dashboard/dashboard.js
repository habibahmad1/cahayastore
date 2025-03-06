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
document.addEventListener("DOMContentLoaded", function () {
    const sections = [
        { toggle: "bagHomeToggle", submenu: "bagHomeSubmenu" },
        { toggle: "bagProdukToggle", submenu: "bagProdukSubmenu" },
        { toggle: "bagArtikelToggle", submenu: "bagArtikelSubmenu" },
        {
            toggle: "bagUserManajemenToggle",
            submenu: "bagUserManajemenSubmenu",
        },
        { toggle: "bagStokBarangToggle", submenu: "bagStokBarangSubmenu" },
    ];

    // Load submenu state and active class from localStorage
    sections.forEach((section) => {
        const submenuElement = document.getElementById(section.submenu);
        const toggleElement = document.getElementById(section.toggle);
        const isVisible = localStorage.getItem(section.submenu) === "true";
        const isActive = localStorage.getItem(section.toggle) === "true";

        if (submenuElement && isVisible) {
            submenuElement.classList.remove("d-none");
        }

        if (toggleElement && isActive) {
            toggleElement.classList.add("active-section");
        }
    });

    sections.forEach((section) => {
        const toggleElement = document.getElementById(section.toggle);
        const submenuElement = document.getElementById(section.submenu);

        if (toggleElement && submenuElement) {
            toggleElement.addEventListener("click", function () {
                // Hide all submenus except the clicked one
                sections.forEach((sec) => {
                    const secSubmenuElement = document.getElementById(
                        sec.submenu
                    );
                    if (
                        secSubmenuElement &&
                        secSubmenuElement !== submenuElement
                    ) {
                        secSubmenuElement.classList.add("d-none");
                        localStorage.setItem(sec.submenu, "false");
                    }
                });

                // Remove active class from all toggle elements except the clicked one
                sections.forEach((sec) => {
                    const secToggleElement = document.getElementById(
                        sec.toggle
                    );
                    if (
                        secToggleElement &&
                        secToggleElement !== toggleElement
                    ) {
                        secToggleElement.classList.remove("active-section");
                        localStorage.setItem(sec.toggle, "false");
                    }
                });

                // Toggle the clicked submenu and add active class to the clicked toggle element
                const isCurrentlyVisible =
                    !submenuElement.classList.contains("d-none");
                submenuElement.classList.toggle("d-none");
                toggleElement.classList.toggle("active-section");
                localStorage.setItem(section.submenu, !isCurrentlyVisible);
                localStorage.setItem(section.toggle, !isCurrentlyVisible);
            });
        }
    });
});
