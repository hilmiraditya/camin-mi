@extends('admin.layout')
@section('title', 'Daftar Menu')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Menu
        <small>{{$kategori->nama}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Point Of Sales</a></li>
        <li><a href="#">Admin</a></li>
        <li><a href="#">Menu</a></li>
        <li class="active">{{$kategori->nama}}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row" align="center">
        @if($cekKatalog > 0)
        @foreach($katalog as $katalog)
        <div class="col-md-6">
          <!-- Line chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{$katalog->nama}}</h3>
            </div>
            <div class="box-body">
              <div class="row">
                @if($katalog->gambar == NULL)
                <img class="col-md-12" style="width: 100%;height:100%;max-height:250px;" src="https://media.travelingyuk.com/wp-content/uploads/2017/07/Ilustrasi-makanan-yang-biasa-dikonsumsi-masyarakat-Indonesia-1.jpg">
                @else
                <img class="col-md-12" style="width: 100%;height:100%;max-height:250px;" src="{{url('fotomenu').'/'.$katalog->gambar}}"> 
                @endif
              </div>
              <div align="center">
                @if($katalog->diskon != NULL)
                <h3><b><strike>{{ $katalog->harga}}</strike></b> <a style="color: red;"><b>{{$katalog->diskon/100*$katalog->harga}}</b></a></h3>
                @else
                  <h3><b>{{ "Rp " . number_format($katalog->harga,2,',','.') }}</b></h3>    
                @endif
              </div>
              <br>
              <div align="center">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahakun">
                  Ubah
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusstok{{$katalog->id}}">
                  Hapus
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahstok">
                  Tambah Stok
                </button>
              </div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        @endforeach
        @else
        <div class="col-md-12" align="center">
          <br>
          <h4>Belum ada menu pada kategori {{$kategori->nama}}</h4>
          <br>
        </div>
        @endif

        <div class="col-md-12" align="center">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahstok">
            Tambah Stok
          </button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapuskategori">
            Hapus
          </button>
        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection


@section('modal')
<!-- Modal untuk tambah akun-->
<div class="modal fade" id="tambahstok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form method="POST" action="{{url('Admin/TambahMenu')}}" enctype="multipart/form-data">
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tambah Menu pada Kategori {{$kategori->nama}}</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Nama Menu :</label>
          <input type="text" class="form-control" name="nama">
        </div>
        <div class="form-group">
          <label>Harga :</label>
          <input type="text" class="form-control" name="harga">
        </div>
        <div class="form-group">
          <label>Keterangan :</label>
          <input type="text" class="form-control" id="keterangan">
        </div>
          <div class="form-group">
            <label>Foto {{$kategori->nama}} :</label>
            <input type="file" accept="image/*" name="gambar" id="gambar"/>
          </div>
          <input type="hidden" class="form-control" name="kategori_id" value="{{$kategori->id}}">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah Menu</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Batal</button>
      </div>
    </form> 
    </div>
  </div>
</div>
<!-- Modal untuk tambah stok -->
<div class="modal fade" id="tambahstok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="/action_page.php">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tambah Stok Menu</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Nama Lengkap :</label>
          <input type="nama" class="form-control" id="nama">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah Menu</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Batal</button>
      </div>
    </form> 
    </div>
  </div>
</div>
@foreach($hapusKatalog as $hapusKatalog)
<!-- Modal untuk hapus katalof -->
<div>
<div class="modal fade" id="hapusstok{{$hapusKatalog->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Hapus Menu</h4>
      </div>
      <div class="modal-body">
        Apakah anda yakin akan menghapus Menu {{$hapusKatalog->nama}} ? 
      </div>
      <div class="modal-footer">
        <a href="{{url('Admin/HapusMenu'.'/'.$hapusKatalog->id.'/'.$kategori->id)}}" class="btn btn-primary">Lanjut</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
</div>
@endforeach
<!-- Modal untuk hapus Kategori -->
<div class="modal fade" id="hapuskategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Hapus Stok</h5>
      </div>
      <div class="modal-body">
        Semua makanan yang ada di dalam kategori ini juga ikut dihapus.
      </div>
      <div class="modal-footer">
        <a href="{{url('/Admin/HapusMenu').'/'.$kategori->id}}" class="btn btn-primary">Lanjut</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
@endsection
