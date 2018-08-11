@extends('admin.layout')
@section('title', 'Laporan Penjualan')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Point Of Sales</a></li>
        <li><a href="#">Admin</a></li>
        <li class="active">Laporan Transaksi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          @if(session()->has('message'))
            <div class="alert alert-success">
              {{ session()->get('message') }}
            </div>
          @endif
          <div class="alert alert-warning">
            <h4>List Proses Transaksi</h4>
            <a>
              <a class="btn btn-xs btn-primary">Pending</a>
              <a class="btn btn-xs btn-info">Sedang Di Proses</a> 
              <a class="btn btn-xs btn-success">Selesai</a>
              <a class="btn btn-xs btn-danger">Dibatalkan Admin</a>
              <a class="btn btn-xs btn-danger">Dibatalkan Pengguna</a>
            </a>
          </div>
          @if($penjualan->count() > 0)
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Transaksi</th>
                  <th>Nama Pemesan</th>
                  <th>Menu</th>
                  <th>Restoran</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  @if(!Request::is('Admin/Transaksi/Dibatalkan') && !Request::is('Admin/Transaksi/Selesai'))<th>Opsi</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                <?php $a=1 ?>
                @foreach($penjualan as $penjualan)
                <tr>
                  <td>{{$a++}}</td>
                  <td>{{$penjualan->id_transaksi}}</td>
                  <td>{{$penjualan->Users->name}}</td>
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
                  @if(!Request::is('Admin/Transaksi/Dibatalkan') && !Request::is('Admin/Transaksi/Selesai'))
                    <td>
                      <a href="{{url('Admin/Proses/'.$penjualan->id)}}" class="btn btn-xs btn-success">Proses Selanjutnya</a>
                      @if(!Request::is('Admin/Transaksi/SedangBerjalan'))
                      <a class="btn btn-xs btn-danger">Batalkan</a>
                      @endif
                    </td>
                  @endif
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>ID Transaksi</th>
                  <th>Nama Pengguna</th>
                  <th>Menu</th>
                  <th>Restoran</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  @if(!Request::is('Admin/Transaksi/Dibatalkan') && !Request::is('Admin/Transaksi/Selesai'))<th>Opsi</th>
                  @endif
                </tr>
                </tfoot>
              </table>
            </div>
            <div align="center">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#downloadlaporan">Download Laporan</button>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#emaillaporan">Kirim Email</button>
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

@section('modal')
<!-- Email Laporan -->
<div>
<div class="modal fade" id="emaillaporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Kirim Email Laporan</h4>
      </div>
      <div class="modal-body">
        <strong>Kirim Laporan Transaksi yang telah dilakukan ke email Admin</strong>
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary" href="{{url('Admin/EmailHarian')}}">Hari Ini</a>
        <a class="btn btn-primary" href="{{url('Admin/EmailBulanan')}}">Bulan Ini</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Batal</button>
      </div>
    </form> 
    </div>
  </div>
</div>
<!-- Download Laporan -->
<div>
<div class="modal fade" id="downloadlaporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Download Laporan</h4>
      </div>
      <div class="modal-body">
        <strong>Download Laporan Transaksi yang telah dilakukan</strong>
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary" href="{{url('Admin/LaporanHarian')}}">Hari Ini</a>
        <a class="btn btn-primary" href="{{url('Admin/LaporanBulanan')}}">Bulan Ini</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Batal</button>
      </div>
    </form> 
    </div>
  </div>
</div>
@endsection