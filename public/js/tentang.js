
    document.getElementById("hubungiButton").addEventListener("click", function () {
        const contactMenu = document.getElementById("contactMenu");
        contactMenu.classList.toggle("hidden");
    });

    document.querySelectorAll(".tok").forEach(function (link) {
        link.addEventListener("click", function (event) {
            event.preventDefault(); // Mencegah scroll ke atas
        });
    });
