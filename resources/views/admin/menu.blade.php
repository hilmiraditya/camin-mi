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
      @if (count($errors) > 0)
      <div class="row"><div class="col-xs-12">
        <div class = "alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      </div></div>
      @endif
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
                <img class="col-md-12" style="width: 100%;height:100%;max-height:250px;" src="{{url('adminlte/restaurant.png')}}">
                @else
                <img class="col-md-12" style="width: 100%;height:100%;max-height:250px;" src="{{url('fotomenu').'/'.$katalog->gambar}}"> 
                @endif
              </div>
              <div align="center">
                @if($katalog->diskon != NULL)
                <h3><b><strike>{{ "Rp " . number_format($katalog->harga,2,',','.') }}</strike></b> <a style="color: red;"><b>{{ "Rp " . number_format($katalog->harga-($katalog->diskon/100*$katalog->harga),2,',','.') }}</b></a></h3>
                @else
                  <h3><b>{{ "Rp " . number_format($katalog->harga,2,',','.') }}</b></h3>    
                @endif
              </div>
              <br>
              <div align="center">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editmenu{{$katalog->id}}">
                  Ubah
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusstok{{$katalog->id}}">
                  Hapus
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
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahmenu">
            Tambah Menu
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
<!-- Modal untuk tambah stok-->
<div class="modal fade" id="tambahmenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form method="POST" action="{{url('Admin/TambahMenu')}}" enctype="multipart/form-data">
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tambah Menu pada kategori {{$kategori->nama}}</h4>
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
          <label>Keuntungan :</label>
          <input type="text" class="form-control" name="keuntungan">
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

@foreach($editKatalog as $editKatalog)
<!-- Modal untuk ubah stok-->
<div class="modal fade" id="editmenu{{$editKatalog->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form method="POST" action="{{url('Admin/UbahMenu')}}" enctype="multipart/form-data">
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Ubah menu {{$editKatalog->nama}}</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Nama Menu :</label>
          <input type="text" class="form-control" name="nama" value="{{$editKatalog->nama}}" placeholder="{{$editKatalog->nama}}">
        </div>
        <div class="form-group">
          <label>Harga :</label>
          <input type="text" class="form-control" name="harga" value="{{$editKatalog->harga}}" placeholder="{{$editKatalog->harga}}">
        </div>
        <div class="form-group">
          <label>Keuntungan :</label>
          <input type="text" class="form-control" name="keuntungan" value="{{$editKatalog->keuntungan}}" placeholder="{{$editKatalog->keuntungan}}">
        </div>
        <div class="form-group">
          <label>Diskon :</label>
          <input type="number"  class="form-control" name="diskon" min="0" max="100" value="{{$editKatalog->diskon}}" placeholder="{{$editKatalog->diskon}}">
        </div>
        <div class="form-group">
          <label>Keterangan :</label>
          <input type="text" class="form-control" id="keterangan" value="{{$editKatalog->diskon}}" placeholder="{{$editKatalog->keterangan}}">
        </div>
          <div class="form-group">
            <label>Foto {{$editKatalog->nama}} :</label>
            <input type="file" accept="image/*" name="gambar" id="gambar"/>
          </div>
          <input type="hidden" class="form-control" name="kategori_id" value="{{$kategori->id}}">
          <input type="hidden" class="form-control" name="id" value="{{$editKatalog->id}}">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ubah Menu</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Batal</button>
      </div>
    </form> 
    </div>
  </div>
</div>

<!-- Modal untuk hapus katalof -->
<div>
<div class="modal fade" id="hapusstok{{$editKatalog->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Hapus Menu</h4>
      </div>
      <div class="modal-body">
        Apakah anda yakin akan menghapus Menu {{$editKatalog->nama}} ? 
      </div>
      <div class="modal-footer">
        <a href="{{url('Admin/HapusMenu'.'/'.$editKatalog->id.'/'.$kategori->id)}}" class="btn btn-primary">Lanjut</a>
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
        Semua makanan yang ada di dalam kategori ini juga ikut dihapus dan laporan transaksi yang telah dilakukan akan dihapus juga.
      </div>
      <div class="modal-footer">
        <a href="{{url('/Admin/HapusMenu').'/'.$kategori->id}}" class="btn btn-primary">Lanjut</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
@endsection
