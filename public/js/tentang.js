
    document.getElementById("hubungiButton").addEventListener("click", function () {
        const contactMenu = document.getElementById("contactMenu");
        contactMenu.classList.toggle("hidden");
    });


    document.querySelectorAll(".online-stores li").forEach((item) => {
        item.addEventListener("click", function (event) {
            // Tutup semua dropdown kecuali yang diklik
            document.querySelectorAll(".dropdown-slide").forEach((dropdown) => {
                if (dropdown !== item.querySelector(".dropdown-slide")) {
                    dropdown.classList.remove("visible");
                }
            });

            // Toggle dropdown yang diklik
            const dropdownMenu = item.querySelector(".dropdown-slide");
            if (dropdownMenu) {
                dropdownMenu.classList.toggle("visible");
            }

            // Mencegah tindakan default jika ada link di dalam
            event.stopPropagation();
        });
    });

    // Tutup dropdown ketika mengklik di luar
    document.addEventListener("click", function () {
        document.querySelectorAll(".dropdown-slide").forEach((dropdown) => {
            dropdown.classList.remove("visible");
        });
    });

