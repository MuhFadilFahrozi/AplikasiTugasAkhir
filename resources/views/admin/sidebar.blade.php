<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{ asset('images/logo.png') }}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Universitas Dian Nuswantoro</h1>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="{{url('home')}}"> <i class="icon-home"></i>Home </a></li>

                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Ruangan</a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('create_room')}}">Tambah Ruangan</a></li>
                    <li><a href="{{url('view_room')}}">Lihat Ruangan</a></li>
                  
                  </ul>
                </li>

                <li><a href="{{url('bookings')}}"> <i class="icon-home"></i>Data Booking Ruangan </a></li>

                <li>
                  <a href="{{url('all_messages')}}"><i class="icon-home"></i>Pesan</a>
                </li>

               
        </ul>
      </nav>