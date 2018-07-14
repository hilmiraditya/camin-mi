@extends('admin.layout')
@section('title', 'Akun Karyawan')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Transaksi
        <small>{{$date}}</small>
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
          @if($cekPenjualan > 0)
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Transaksi</th>
                  <th>Nama Menu</th>
                  <th>Kategori</th>
                  <th>Jumlah</th>
                  <th>Keuntungan</th>
                  <th>Tanggal</th>
                  <th>Keterangan</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($penjualan as $penjualan)
                <tr>
                  <td></td>
                  <td>{{$penjualan->idTransaksi}}</td>
                  <td>{{$penjualan->Katalog->nama}}</td>
                  <td>{{$penjualan->Kategori->nama}}</td>
                  <td>{{$penjualan->jumlah}}</td>
                  <td>{{$penjualan->jumlah*$penjualan->Katalog->keuntungan}}</td>
                  <td>{{$penjualan->created_at}}</td>
                  <td>{{$penjualan->keterangan}}</td>
                  <td><a href="{{url('Admin/HapusLaporanPenjualan').'/'.$date.'/'.$penjualan->id}}" class="btn btn-danger">Hapus</a></td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>ID Transaksi</th>
                  <th>Nama Menu</th>
                  <th>Kategori</th>
                  <th>Jumlah</th>
                  <th>Keuntungan</th>
                  <th>Karyawan</th>
                  <th>Tanggal</th>
                  <th>Keterangan</th>
                  <th>Opsi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <div align="center">
              <a class="btn btn-primary" href="{{url('Admin/KirimEmail')}}">Kirim Email</a>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahakun">
              Download Laporan
              </button>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#tambahakun">
              Hapus Laporan
              </button>
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
<!-- Modal -->
<div class="modal fade" id="tambahakun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="/action_page.php">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tambah Akun Karyawan</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Nama Lengkap :</label>
          <input type="nama" class="form-control" id="nama">
        </div>
        <div class="form-group">
          <label>Alamat Email :</label>
          <input type="email" class="form-control" id="email">
        </div>
        <div class="form-group">
          <label>Password :</label>
          <input type="password" class="form-control" id="pwd">
        </div>
        <div class="form-group">
          <label>Ketik Ulang Password :</label>
          <input type="password" class="form-control" id="pwd">
        </div>
        <div class="form-group">
          <label>Cabang :</label>
          <br>
          <label class="radio-inline">
            <input type="radio" name="optradio">Cabang 1
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio">Cabang 2
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio">Cabang 3
          </label>
        </div>
        <div class="form-group">
          <label>Upload Foto Profil : </label>
          <br>
          <input type="file" name="pic" accept="image/*">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah Akun</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
      </div>
    </form> 
    </div>
  </div>
@endsection