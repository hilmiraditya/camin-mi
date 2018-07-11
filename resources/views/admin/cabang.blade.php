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
                <img class="col-md-12" style="width: 100%;height:100%;max-height:250px;" src="{{url('adminlte/restaurant.png')}}">
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
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahakun">
                  Lihat Stok Menu
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahstok">
                  Tambah Stok Menu
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapuscabang{{$cabang->id}}">
                  Hapus Cabang
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
<!-- Lihat Stok Cabang-->
<div class="modal fade" id="tambahakun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="/action_page.php">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Lihat Stok Cabang</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Sate Ayam :</label>
          <input type="number" class="form-control" id="nama">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
      </div>
    </form> 
    </div>
  </div>
</div>
<!-- Tambah Stok Cabang -->
<div class="modal fade" id="tambahstok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="/action_page.php">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tambah Stok Menu</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Sate Ayam :</label>
          <input type="number" class="form-control" id="nama">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah Menu</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
      </div>
    </form> 
    </div>
  </div>
</div>
<!-- Modal untuk hapus stok -->
@foreach($hapuscabang as $hapuscabang)
<div class="modal fade" id="hapuscabang{{$hapuscabang->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Hapus Cabang</h5>
      </div>
      <div class="modal-body">
        Semua data cabang akan dihapus termasuk stok cabang dan akun karyawan yang terdaftar di cabang ini.
      </div>
      <div class="modal-footer">
        <a href="{{url('/Admin/HapusCabang').'/'.$hapuscabang->id}}" class="btn btn-primary">Hapus</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
@endforeach
<!-- Tambah Cabang-->
<div>
  <div class="modal fade" id="tambahcabang" tabindex="-3" role="dialog" aria-labelledby="tambah-akun" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <form method="POST" action="{{url('/Admin/TambahCabang')}}">
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
            <label>Foto Cabang</label>
            <input type="file" accept="image/*" name="foto-cabang">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Tambah Akun</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </form> 
      </div>
    </div>
</div>
@endsection
