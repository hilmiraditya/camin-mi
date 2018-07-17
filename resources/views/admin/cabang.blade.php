@extends('admin.layout')
@section('title', 'Cabang')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cabang Restoran
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Point Of Sales</a></li>
        <li><a href="#">Admin</a></li>
        <li class="active">Cabang Restoran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-md-12">
      @if(session()->has('message'))
        <div class="alert alert-success">
          {{ session()->get('message') }}
        </div>
      @endif
      @if (count($errors) > 0)
        <div class = "alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      </div>
    </div>
    @if($cekJumlahCabang > 0)
      <div class="row">
      @foreach($cabang as $cabang)
        <div class="col-md-6">
          <!-- Line chart -->
          <div class="box box-primary">
            <div class="box-header with-border" align="center">
              <h3 class="box-title">Cabang {{$cabang->nama}}</h3>
            </div>
            <div class="box-body">
              <div class="row">
              @if($cabang->gambar == NULL)
                <img class="col-md-12" style="width: 100%;height:100%;max-height:250px;" src="{{url('adminlte/restaurant.png')}}">
              @else
                <img class="col-md-12" style="width: 100%;height:100%;max-height:250px;" src="{{url('fotocabang').'/'.$cabang->gambar}}"> 
              @endif
              </div>
              <div align="center">
                @if($cabang->alamat != NULL) <h5>{{$cabang->alamat}}</h5>
                @else <h5>Alamat Belum Diisi</h5>
                @endif

                @if($cabang->no != NULL) <h3>{{$cabang->no}}</h3>
                @else <h3>Nomor Belum Diisi</h3>
                @endif
              </div>
              <br>
              <div align="center">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ubahacabang{{$cabang->id}}">
                  Ubah
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapuscabang{{$cabang->id}}">
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
        <div class="col-md-12" align="center">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahcabang">
            Tambah Cabang
          </button>
        </div>
      </div>
      <!-- /.row -->
    @else
      <div class="row">
        <div class="col-md-12" align="center">
          <h4>Tidak ada Cabang</h4>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahcabang">
            Tambah Cabang
          </button>
        </div>
      </div>
    @endif
    </section>
    <!-- /.content -->
@endsection


@section('modal')
@foreach($hapuscabang as $hapuscabang)
<!-- Ubah Cabang-->
<div class="modal fade" id="ubahacabang{{$hapuscabang->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form method="POST" action="{{url('/Admin/UpdateCabang')}}" enctype="multipart/form-data">
  @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Ubah Data Cabang</h4>
      </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Cabang :</label>
            <input type="text" class="form-control" name="nama" placeholder="{{$hapuscabang->nama}}" value="{{$hapuscabang->nama}}">
            <input type="hidden" name="id" value="{{$hapuscabang->id}}">
          </div>
          <div class="form-group">
            <label>Alamat :</label>
            <input type="text" class="form-control" name="alamat" placeholder="{{$hapuscabang->alamat}}" value="{{$hapuscabang->alamat}}">
          </div>
          <div class="form-group">
            <label>No. Telfon :</label>
            <input type="text" class="form-control" name="no" placeholder="{{$hapuscabang->no}}" value="{{$hapuscabang->no}}">
          </div>
          <div class="form-group">
            <label>Foto Cabang :</label>
            <input type="file" accept="image/*" name="gambar" id="gambar">
          </div>
        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ubah</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Batal</button>
      </div>
    </form> 
    </div>
  </div>
</div>
<!-- Modal untuk hapus stok -->
<div class="modal fade" id="hapuscabang{{$hapuscabang->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Hapus Cabang</h5>
      </div>
      <div class="modal-body">
        Semua data cabang akan dihapus termasuk akun karyawan dan laporan transaksi yang terdaftar di cabang ini.
      </div>
      <div class="modal-footer">
        <a href="{{url('/Admin/HapusCabang').'/'.$hapuscabang->id}}" class="btn btn-primary">Hapus</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
@endforeach
<!-- Tambah Cabang-->
<div>
  <div class="modal fade" id="tambahcabang" tabindex="-3" role="dialog" aria-labelledby="tambah-akun" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <form method="POST" action="{{url('/Admin/TambahCabang')}}" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Buat Cabang Baru</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Cabang :</label>
            <input type="text" class="form-control" name="nama">
          </div>
          <div class="form-group">
            <label>Alamat :</label>
            <input type="text" class="form-control" name="alamat">
          </div>
          <div class="form-group">
            <label>No. Telfon :</label>
            <input type="text" class="form-control" name="no">
          </div>
          <div class="form-group">
            <label>Foto Cabang :</label>
            <input type="file" accept="image/*" name="gambar" id="gambar">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Tambah Akun</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Batal</button>
        </div>
      </form> 
      </div>
    </div>
</div>
@endsection
