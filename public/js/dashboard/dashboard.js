// Mengatur tema (light, dark, auto) berdasarkan pilihan pengguna
document.addEventListener("DOMContentLoaded", function () {
    const themeLight = document.getElementById("theme-light");
    const themeDark = document.getElementById("theme-dark");
    const themeAuto = document.getElementById("theme-auto");

    const themeButtons = [themeLight, themeDark, themeAuto].filter(Boolean);

    // Fungsi untuk mengatur tema dan menyimpan preferensi ke localStorage
    function setTheme(theme) {
        document.documentElement.setAttribute("data-bs-theme", theme);
        localStorage.setItem("theme", theme);

        // Menandai tombol tema yang aktif
        themeButtons.forEach((button) => button.classList.remove("active"));
        const activeButton = document.querySelector(`[data-theme="${theme}"]`);
        if (activeButton) activeButton.classList.add("active");
    }

    // Mengambil tema yang tersimpan di localStorage atau default ke "auto"
    const savedTheme = localStorage.getItem("theme") || "auto";
    setTheme(savedTheme);

    // Menambahkan event listener untuk setiap tombol tema
    if (themeLight) themeLight.addEventListener("click", () => setTheme("light"));
    if (themeDark) themeDark.addEventListener("click", () => setTheme("dark"));
    if (themeAuto) themeAuto.addEventListener("click", () => setTheme("auto"));
});

// Mengatur visibilitas submenu berdasarkan localStorage
document.addEventListener("DOMContentLoaded", function () {
    const sections = [
        { toggle: "bagHomeToggle", submenu: "bagHomeSubmenu" },
        { toggle: "bagProdukToggle", submenu: "bagProdukSubmenu" },
        { toggle: "bagArtikelToggle", submenu: "bagArtikelSubmenu" },
        { toggle: "bagUserManajemenToggle", submenu: "bagUserManajemenSubmenu" },
        { toggle: "bagTambahBarangToggle", submenu: "bagTambahBarangSubmenu" },
        { toggle: "bagStokBarangToggle", submenu: "bagStokBarangSubmenu" },
        { toggle: "bagSuratToggle", submenu: "bagSuratSubmenu" },
        { toggle: "bagSettingsToggle", submenu: "SsettingsSubmenu" }, // Perbaikan typo pada "SsettingsSubmenu"
    ];

    // Mengatur status awal submenu berdasarkan localStorage
    sections.forEach((section) => {
        const submenuElement = document.getElementById(section.submenu);
        const isVisible = localStorage.getItem(section.submenu) === "true";

        if (submenuElement) {
            if (isVisible) {
                submenuElement.classList.add("expanded");
                submenuElement.classList.remove("collapsed");
                submenuElement.style.maxHeight = submenuElement.scrollHeight + "px";
            } else {
                submenuElement.classList.add("collapsed");
                submenuElement.classList.remove("expanded");
                submenuElement.style.maxHeight = "0";
            }
        }
    });

    // Menambahkan event listener untuk toggle submenu
    sections.forEach((section) => {
        const toggleElement = document.getElementById(section.toggle);
        const submenuElement = document.getElementById(section.submenu);

        if (toggleElement && submenuElement) {
            toggleElement.addEventListener("click", function (event) {
                event.preventDefault();

                // Menutup semua submenu kecuali yang sedang diklik
                sections.forEach((sec) => {
                    const secSubmenuElement = document.getElementById(sec.submenu);
                    if (secSubmenuElement && secSubmenuElement !== submenuElement) {
                        secSubmenuElement.classList.remove("expanded");
                        secSubmenuElement.classList.add("collapsed");
                        secSubmenuElement.style.maxHeight = "0";
                        localStorage.setItem(sec.submenu, "false");
                    }
                });

                // Toggle visibilitas submenu yang diklik
                const isCurrentlyVisible = submenuElement.classList.contains("expanded");
                submenuElement.classList.toggle("collapsed", isCurrentlyVisible);
                submenuElement.classList.toggle("expanded", !isCurrentlyVisible);

                if (isCurrentlyVisible) {
                    submenuElement.style.maxHeight = "0";
                } else {
                    submenuElement.style.maxHeight = submenuElement.scrollHeight + "px";
                }

                // Menyimpan status visibilitas ke localStorage
                localStorage.setItem(section.submenu, !isCurrentlyVisible);
            });
        }
    });
});

// Mengatur ikon mengambang dan jendela chat
document.addEventListener("DOMContentLoaded", function () {
    const closeIcon = document.querySelector(".floating-icon .close-icon");
    const floatingIcon = document.querySelector(".floating-icon");
    const chatWindow = document.getElementById("chatWindow");
    const hoverIcon = document.querySelector(".hover-icon");

    // Menutup ikon mengambang dan jendela chat
    if (closeIcon) {
        closeIcon.addEventListener("click", function () {
            floatingIcon.style.display = "none";
            chatWindow.classList.remove("show");
        });
    }

    // Membuka atau menutup jendela chat saat ikon di-hover
    if (hoverIcon) {
        hoverIcon.addEventListener("click", function () {
            chatWindow.classList.toggle("show");
        });
    }

    // Menutup jendela chat saat tombol close diklik
    const closeChatButton = document.querySelector(".close-chat");
    if (closeChatButton) {
        closeChatButton.addEventListener("click", function () {
            chatWindow.classList.remove("show");
        });
    }
});
