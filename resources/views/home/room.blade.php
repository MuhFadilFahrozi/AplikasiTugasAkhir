<div class="our_room py-5">
   <div class="container">
      <!-- Judul Section -->
      <div class="row mb-5 text-center">
         <div class="col-md-12">
            <div class="titlepage">
               <h2 class="fw-bold mb-3 text-primary">Ruangan Yang Tersedia</h2>
               <p class="text-muted fs-5">
                  Ruangan dan Aula yang tersedia di Kampus Universitas Dian Nuswantoro Semarang
               </p>
            </div>
         </div>
      </div>

      <!-- Grid Daftar Ruangan -->
      <div class="row g-3 g-lg-5"> <!-- g-4 = jarak antar kolom & baris -->
         @foreach($room as $rooms)
         <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden room-card">

               <!-- Gambar Ruangan -->
               <div class="position-relative" style="height: 230px; overflow: hidden;">
                  <img 
                     src="{{ asset('room/'.$rooms->image) }}" 
                     alt="{{ $rooms->room_title }}" 
                     class="card-img-top room-image"
                  />
               </div>

               <!-- Isi Card -->
               <div class="card-body d-flex flex-column justify-content-between p-4">
                  <div>
                     <!-- Judul Ruangan -->
                     <h5 class="card-title text-dark fw-bold mb-3" style="font-size: 1.3rem;">
                        {{ $rooms->room_title }}
                     </h5>

                     <!-- Fasilitas & Kapasitas -->
                     <ul class="list-unstyled mb-3">
                        @if(!empty($rooms->capacity))
                        <li class="text-secondary" style="font-size: 1rem;">
                           <i class="bi bi-people-fill me-2 text-primary"></i>
                           <strong>Kapasitas:</strong> {{ $rooms->capacity }} orang
                        </li>
                        @endif

                        @if(!empty($rooms->facilities))
                        <li class="text-secondary" style="font-size: 1rem;">
                           <i class="bi bi-tools me-2 text-success"></i>
                           <strong>Fasilitas:</strong> {{ $rooms->facilities }}
                        </li>
                        @endif
                     </ul>
                  </div>

                  <div class="mt-auto">
                     <a href="{{ url('room_details', $rooms->id) }}" class="btn btn-primary w-100 fw-semibold py-2">
                        <i class="bi bi-calendar-check me-1"></i> Booking Ruangan
                     </a>
                  </div>
               </div>

            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>

<!-- Style -->
<style>
   .our_room {
      background-color: #f8f9fa;
   }

   /* Tambah jarak antar card */
   .row.g-4 {
      row-gap: 2rem;   /* jarak vertikal antar baris */
      column-gap: 2rem; /* jarak horizontal antar kolom */
   }

   .room-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
   }

   .room-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
   }

   .room-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s ease;
   }

   .room-image:hover {
      transform: scale(1.05);
   }

   .titlepage h2 {
      letter-spacing: 0.5px;
   }

   @media (max-width: 768px) {
      .our_room {
         padding: 40px 15px;
      }
      .card-title {
         font-size: 1.15rem !important;
      }
      ul li {
         font-size: 0.95rem !important;
      }
   }
</style>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
