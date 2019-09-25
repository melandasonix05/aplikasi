@extends('layouts.admin')
@section('content')
    <!-- div 1 -->
    <div class="container">
        <!-- div 2 -->
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <h4>Apakah ada nasabah baru ?
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahNasabah"> Tambah Nasabah</button>     
                </h4>
            </div>
          <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="tambahNasabah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nasabah Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form -->
            <form id="form" action=" {{route('create_kasir')}} " method="POST"> 
                @csrf
            <div class="form-group">
                <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="nama"  id="nama" >
                </div>
            </div>
            <div class="form-group">
                <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="alamat"  id="alamat" >
                </div>
            </div>
            <div class="form-group">
                <label for="staticEmail" class="col-sm-2 col-form-label">Peminjaman</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="peminjaman"  id="peminjaman">
                </div>
            </div>
            <div class="form-group">
                <label for="staticEmail" class="col-sm-2 col-form-label">Bunga</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="bunga"  id="bunga">
                </div>
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
      </form>
        <!-- penutup form -->
      </div>
    </div>
  </div>
</div>

</div>
<!-- penutup modal -->

<!-- pemberitahuan -->

<div class="col-md-12 col-lg-6">

                @if(session()->has('info')) 
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session()->get('info') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                @endif

                @if(session()->has('delete')) 
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session()->get('delete') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

            </div>
  <!-- penutup pemberitahuan -->
<!-- tabel 1 -->
<section class="row">
  <nav class="col table-responsive ">

      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No Anggota</th>
              <th scope="col">Nama</th>
              <th scope="col">Alamat</th>
              <th scope="col">Pinjaman</th>
              <th scope="col">Bunga</th>
              <th> action 
              </th>
            </tr>
          </thead>
          <tbody>


          @foreach($kasir as $ksr)
            <tr>
              <th scope="row">{{$ksr->id}}</th>
              <td>{{$ksr->nama}}</td>
              <td>{{$ksr->alamat}}</td>
              <td>{{$ksr->peminjaman}}</td>
              <td>{{$ksr->bunga}}</td>
              <!-- untuk edit -->
              <td><a href="#" onclick="editKasir('{{ json_encode($ksr)}}') "  class="btn btn-primary"> edit</a>
              <a href="/admin/kasir/{{$ksr->id}}/delete" class="btn btn-primary">delete</a></td>

            </tr>
     @endforeach

          </tbody>
        </table>
  </nav>
</section>
<!-- penutup tabel 1 -->

        <!-- tabel -->
        <!-- div 2 -->
</div>
    <!-- penutup div 1 -->

@endsection

{{-- pembuatan java script diblade yg akan disimpan di layout dengan js-after --}}
 @section('js-after')
          <script>
            
            function editKasir(ksr) {
      
                // console.log(data);
              // alert("Testing")
              $("#tambahNasabah").modal("show");

              // data = json. jadi harus diparse terlebih dahulu
              var d = JSON.parse(ksr);
              // set value form
              $("#nama").val(d.nama);
              $("#alamat").val(d.alamat);
              $("#peminjaman").val(d.peminjaman);
              $("#bunga").val(d.bunga);


              $("#form").attr("action",`{{url('admin/kasir')}}/${d.id}`);


              
            }
          </script>
@endsection