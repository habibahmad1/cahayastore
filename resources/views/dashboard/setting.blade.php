@extends('dashboard.layouts.main')
@section('container')
    <div class="setting-container d-flex flex-column flex-wrap mt-5">
        <div class="container-setting d-flex flex-column flex-wrap">
            <div class="tema">
                <p><i class="fa-solid fa-circle-half-stroke"></i> Tema</p>
                <div>
                    <p id="modeTema">Light <i class="fa-solid fa-caret-down"></i></p>
                    <div class="boxTema">
                        <p class="light">Light <i class="fa-solid fa-sun"></i></p>
                        <p class="dark">Dark <i class="fa-solid fa-moon"></i></p>
                    </div>
                </div>
            </div>
            <div class="musik">
                <p><i class="fa-solid fa-music"></i> Musik</p>
                <div>
                    <p id="modeMusik">Off <i class="fa-solid fa-caret-down"></i></p>
                    <div class="boxMusik">
                        <p class="off">Off</p>
                        <p class="on">On</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

   const modeTema = document.getElementById("modeTema");
   const modeMusik = document.getElementById("modeMusik");
   const boxTema = document.querySelector(".boxTema");
   const boxMusik = document.querySelector(".boxMusik");

   const light = document.querySelector(".light");
   const dark = document.querySelector(".dark");
   const off = document.querySelector(".off");
   const on = document.querySelector(".on");

   // Load theme from localStorage
   document.addEventListener("DOMContentLoaded", () => {
       const savedTheme = localStorage.getItem("theme");
       if (savedTheme === "dark") {
           document.body.classList.add("darkActive");
       } else {
           document.body.classList.add("lightActive");
       }
   });

   if (modeTema) {
       modeTema.addEventListener("click", () => {
           boxTema.style.display =
               boxTema.style.display === "block" ? "none" : "block";
       });

       light.addEventListener("click", () => {
           document.body.classList.remove("darkActive");
           document.body.classList.add("lightActive");
           localStorage.setItem("theme", "light");
           boxTema.style.display = "none"; // Hide the box after selection
           modeTema.innerHTML =
               "Light <i class='fa-solid fa-sun'></i> <i class='fa-solid fa-caret-down'></i>";
       });

       dark.addEventListener("click", () => {
           document.body.classList.remove("lightActive");
           document.body.classList.add("darkActive");
           localStorage.setItem("theme", "dark");
           boxTema.style.display = "none"; // Hide the box after selection
           modeTema.innerHTML =
               "Dark <i class='fa-solid fa-moon'></i> <i class='fa-solid fa-caret-down'></i>";
       });
   }

   if (modeMusik) {
       modeMusik.addEventListener("click", () => {
           boxMusik.style.display =
               boxMusik.style.display === "block" ? "none" : "block";
       });

       off.addEventListener("click", () => {
           // Implement functionality for off
           boxMusik.style.display = "none"; // Hide the box after selection
       });

       on.addEventListener("click", () => {
           // Implement functionality for on
           boxMusik.style.display = "none"; // Hide the box after selection
       });
   }
    </script>
@endsection
