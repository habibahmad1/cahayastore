document.addEventListener("DOMContentLoaded", function () {
    const themeLight = document.getElementById("theme-light");
    const themeDark = document.getElementById("theme-dark");
    const themeAuto = document.getElementById("theme-auto");

    const themeButtons = [themeLight, themeDark, themeAuto].filter(Boolean);

    function setTheme(theme) {
        document.documentElement.setAttribute("data-bs-theme", theme);
        localStorage.setItem("theme", theme);

        themeButtons.forEach((button) => button.classList.remove("active"));
        const activeButton = document.querySelector(`[data-theme="${theme}"]`);
        if (activeButton) activeButton.classList.add("active");
    }

    const savedTheme = localStorage.getItem("theme") || "auto";
    setTheme(savedTheme);

    if (themeLight)
        themeLight.addEventListener("click", () => setTheme("light"));
    if (themeDark) themeDark.addEventListener("click", () => setTheme("dark"));
    if (themeAuto) themeAuto.addEventListener("click", () => setTheme("auto"));
});

document.addEventListener("DOMContentLoaded", function () {
    const sections = [
        { toggle: "bagHomeToggle", submenu: "bagHomeSubmenu" },
        { toggle: "bagProdukToggle", submenu: "bagProdukSubmenu" },
        { toggle: "bagArtikelToggle", submenu: "bagArtikelSubmenu" },
        { toggle: "bagUserManajemenToggle", submenu: "bagUserManajemenSubmenu" },
        { toggle: "bagTambahBarangToggle", submenu: "bagTambahBarangSubmenu" },
        { toggle: "bagStokBarangToggle", submenu: "bagStokBarangSubmenu" },
        { toggle: "bagSettingsToggle", submenu: "SsettingsSubmenu" },
    ];

    sections.forEach((section) => {
        const submenuElement = document.getElementById(section.submenu);
        const isVisible = localStorage.getItem(section.submenu) === "true";

        if (submenuElement) {
            if (isVisible) {
                submenuElement.classList.add("expanded");
                submenuElement.classList.remove("collapsed");
                setTimeout(() => {
                    submenuElement.style.maxHeight = submenuElement.scrollHeight + "px";
                }, 10); // Tambahkan delay untuk memastikan DOM sudah render
            } else {
                submenuElement.classList.add("collapsed");
                submenuElement.classList.remove("expanded");
                submenuElement.style.maxHeight = "0";
            }
        }
    });

    sections.forEach((section) => {
        const toggleElement = document.getElementById(section.toggle);
        const submenuElement = document.getElementById(section.submenu);

        if (toggleElement && submenuElement) {
            toggleElement.addEventListener("click", function (event) {
                event.preventDefault();

                sections.forEach((sec) => {
                    const secSubmenuElement = document.getElementById(sec.submenu);
                    if (secSubmenuElement && secSubmenuElement !== submenuElement) {
                        secSubmenuElement.classList.remove("expanded");
                        secSubmenuElement.classList.add("collapsed");
                        secSubmenuElement.style.maxHeight = "0";
                        localStorage.setItem(sec.submenu, "false");
                    }
                });

                const isCurrentlyVisible = submenuElement.classList.contains("expanded");
                submenuElement.classList.toggle("collapsed", isCurrentlyVisible);
                submenuElement.classList.toggle("expanded", !isCurrentlyVisible);

                if (isCurrentlyVisible) {
                    submenuElement.style.maxHeight = "0";
                } else {
                    submenuElement.style.maxHeight = submenuElement.scrollHeight + "px";
                }

                localStorage.setItem(section.submenu, !isCurrentlyVisible);
            });
        }
    });
});

// Icon Minca and Chat Window
document.addEventListener("DOMContentLoaded", function () {
    const closeIcon = document.querySelector(".floating-icon .close-icon");
    const floatingIcon = document.querySelector(".floating-icon");
    const chatWindow = document.getElementById("chatWindow");
    const hoverIcon = document.querySelector(".hover-icon");

    if (closeIcon) {
        closeIcon.addEventListener("click", function () {
            floatingIcon.style.display = "none";
            chatWindow.classList.remove("show");
        });
    }

    if (hoverIcon) {
        hoverIcon.addEventListener("click", function () {
            chatWindow.classList.toggle("show");
        });
    }

    const closeChatButton = document.querySelector(".close-chat");
    if (closeChatButton) {
        closeChatButton.addEventListener("click", function () {
            chatWindow.classList.remove("show");
        });
    }
});
