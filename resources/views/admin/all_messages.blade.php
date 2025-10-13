<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .table_deg
{
    border: 2px solid white;
    margin: auto;
    width: 100%;
    text-align: center;
    margin-top: 40px;
}
.th_deg
{
    background-color: skyblue;
    padding: 15px;
}
tr
{
    border: 3px solid white;
}

td
{
    padding: 10px;
}
    </style>
  </head>
  <body>
  @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">


          <table class="table_deg">

                    <tr>
                        <th class="th_deg">Nama</th>
                        <th class="th_deg">Email</th>
                        <th class="th_deg">Nomor Telepon</th>
                        <th class="th_deg">Pesan</th>
                    </tr>

                    @foreach($data as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->message}}</td>
                      </td>

                    </tr>
                @endforeach
                    
            </table>

        </div>
    </div>
</div>
        @include('admin.footer')
  </body>
</html>