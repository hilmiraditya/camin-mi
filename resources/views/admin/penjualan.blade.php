@extends('admin.layout')
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
                  <th>Opsi</th>
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
                  <td>{{$penjualan->id_transaksi}}</td>
                  <td>{{$penjualan->Katalog->nama}}</td>
                  <td>{{$penjualan->Katalog->Kategori->nama}}
                  <td>{{$penjualan->jumlah}}</td>
                  <td>{{$penjualan->Cabang->nama}}</td>
                  <td>{{$penjualan->created_at}}</td>
                  <td>
                    <a href="{{url('Admin/HapusLaporanPenjualan'.'/'.$penjualan->id)}}" class="btn btn-xs btn-danger">Hapus</a>
                  </td>
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
                  <th>Opsi</th>
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