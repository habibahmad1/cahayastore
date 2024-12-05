    // butoon kontak wa
    document.getElementById("hubungiButton").addEventListener("click", function () {
        const contactMenu = document.getElementById("contactMenu");
        contactMenu.classList.toggle("hidden1");
    });

    // Bagian Online shop
    document.querySelectorAll(".online-stores > li > a").forEach(function (dropdownToggle) {
        dropdownToggle.addEventListener("click", function (event) {
            event.preventDefault(); // Mencegah aksi default (scroll ke atas)

            const dropdown = this.nextElementSibling; // Ambil elemen dropdown di bawahnya

            // Tutup semua dropdown lainnya
            document.querySelectorAll(".dropdown").forEach(function (menu) {
                if (menu !== dropdown) {
                    menu.classList.add("hidden");
                }
            });

            // Toggle visibilitas dropdown yang diklik
            if (dropdown) {
                dropdown.classList.toggle("hidden");
            }
        });
    });

    // Klik di luar dropdown untuk menutupnya
    document.addEventListener("click", function (event) {
        if (!event.target.closest(".online-stores")) {
            document.querySelectorAll(".dropdown").forEach(function (menu) {
                menu.classList.add("hidden");
            });
        }
    });




