<section class="banner_main">
   <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
      <!-- Bulatan navigasi -->
      <ol class="carousel-indicators">
         <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
         <li data-target="#myCarousel" data-slide-to="1"></li>
         <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Gambar Slide -->
      <div class="carousel-inner">
         <div class="carousel-item active">
            <img class="d-block w-100 carousel-img" src="images/udinus1.jpeg" alt="Slide 1">
         </div>
         <div class="carousel-item">
            <img class="d-block w-100 carousel-img" src="images/Aula i 6.jpg" alt="Slide 2">
         </div>
         <div class="carousel-item">
            <img class="d-block w-100 carousel-img" src="images/ruang rapat g1 .jpg" alt="Slide 3">
         </div>
      </div>

      <!-- Navigasi Kanan-Kiri -->
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
      </a>
   </div>
</section>

<!-- CSS Agar Gambar Sama Ukuran -->
<style>
.carousel-img {
   height: 500px; /* Atur tinggi sesuai kebutuhan */
   object-fit: cover;
}
@media (max-width: 768px) {
   .carousel-img {
      height: 300px;
   }
}
</style>
