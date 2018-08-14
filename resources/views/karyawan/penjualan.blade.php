@extends('karyawan.layout')
@section('title', 'Laporan Penjualan')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi
          @if(Request::is('Pengguna/Selesai'))<small>Selesai</small>
          @elseif(Request::is('Pengguna/SedangBerjalan'))<small>Sedang Berjalan</small>
          @elseif(Request::is('Pengguna/Dibatalkan'))<small>Dibatalkan</small>
          @elseif(Request::is('Pengguna/Request'))<small>Request</small>
          @endif
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Point Of Sales</a></li>
        <li><a href="#">Karyawan</a></li>
        <li class="active">Laporan Transaksi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @if(session()->has('message'))
      <div class="row"><div class="col-xs-12">
        <div class="alert alert-success">
          {{ session()->get('message') }}
        </div>
      </div></div>
      @endif
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
      <div class="row">
        <div class="col-xs-12">
          @if($penjualan->count() > 0)
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Transaksi</th>
                  <th>Menu</th>
                  <th>Restoran</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  @if(Request::is('Pengguna/SedangBerjalan'))<th>Opsi</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                <?php $a=1 ?>
                @foreach($penjualan as $penjualan)
                <tr>
                  <td>{{$a++}}</td>
                  <td>{{$penjualan->id_transaksi}}</td>
                  <td>{{$penjualan->Katalog->nama}}</td>
                  <td>{{$penjualan->Katalog->Kategori->nama}}</td>
                  <td>{{$penjualan->jumlah}}</td>
                  <td>{{$penjualan->created_at}}</td>
                  @if($penjualan->keterangan == 0)<td><a class="btn btn-xs btn-primary">Pending</a></td>
                  @elseif($penjualan->keterangan == -1)<td><a class="btn btn-xs btn-danger">Dibatalkan Pengguna</a></td>
                  @elseif($penjualan->keterangan == -2)<td><a class="btn btn-xs btn-danger">Dibatalkan Admin</a></td>
                  @elseif($penjualan->keterangan == 1)<td><a class="btn btn-xs btn-info">Sedang Diproses</a></td>
                  @elseif($penjualan->keterangan == 2)<td><a class="btn btn-xs btn-success">Selesai</a></td>
                  @endif
                  @if(Request::is('Pengguna/SedangBerjalan'))<td><a class="btn btn-xs btn-danger">Batalkan</a></td>
                  @endif
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>ID Transaksi</th>
                  <th>Menu</th>
                  <th>Restoran</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  @if(Request::is('Pengguna/SedangBerjalan'))<th>Opsi</th>
                  @endif
                </tr>
                </tfoot>
              </table>
            </div>
            <br>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          @else
          <div align="center">
            <h3>Belum Ada Transaksi</h3>
          </div>
          @endif
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
