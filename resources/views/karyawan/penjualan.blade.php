@extends('karyawan.layout')
@section('title', 'Laporan Penjualan')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Transaksi
        <small>{{$date}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Point Of Sales</a></li>
        <li><a href="#">Karyawan</a></li>
        <li class="active">Laporan Transaksi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
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
                  <th>Atas Nama</th>
                  <th>ID Transaksi</th>
                  <th>Nama Menu</th>
                  <th>Kategori</th>
                  <th>Jumlah</th>
                  <th>Cabang</th>
                  <th>Tanggal</th>
                </tr>
                </thead>
                <tbody>
                <?php $a=1 ?>
                @foreach($penjualan as $penjualan)
                <tr>
                  <td>{{$a++}}</td>
                  @if($penjualan->keterangan == NULL) <td><a class="btn btn-xs btn-warning">Tidak diisi</a></td>
                  @else<td>{{$penjualan->keterangan}}</td>
                  @endif
                  <td>{{$penjualan->id}}</td>
                  <td>{{$penjualan->Katalog->nama}}</td>
                  <td>{{$penjualan->Katalog->Kategori->nama}}
                  <td>{{$penjualan->jumlah}}</td>
                  <td>{{$penjualan->Cabang->nama}}</td>
                  <td>{{$penjualan->created_at}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Atas Nama</th>
                  <th>ID Transaksi</th>
                  <th>Nama Menu</th>
                  <th>Kategori</th>
                  <th>Jumlah</th>
                  <th>Keuntungan</th>
                  <th>Tanggal</th>
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
