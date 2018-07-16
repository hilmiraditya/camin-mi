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
            <div align="center">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#downloadlaporan">Download Laporan</button>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#kirimemail">Kirim Email</button>
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
<div>
<div class="modal fade" id="kirimemail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="/action_page.php">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Kirim Laporan ke Email</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Email :</label>
          <input type="email" class="form-control" id="email">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Kirim</button>
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
        <h4 class="modal-title" id="exampleModalLabel">Kirim Laporan ke Email</h4>
      </div>
      <div class="modal-body">
        <strong>Download Laporan ke Berkas</strong>
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