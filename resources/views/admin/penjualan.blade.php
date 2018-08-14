@extends('admin.layout')
@section('title', 'Laporan Penjualan')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi
          <small>{{$keterangan}}</small>
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
                  <th>Nama Pemesan</th>
                  <th>No. Telfon Pemesan</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  @if(!Request::is('Admin/Transaksi/Dibatalkan') && !Request::is('Admin/Transaksi/Selesai'))
                  <th>Opsi</th>
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
                  <td>{{$penjualan->Users->name}}</td>
                  <td>{{$penjualan->Users->no_handphone}}</td>
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
                        <a href="{{url('Admin/Batalkan/'.$penjualan->id)}}" class="btn btn-xs btn-danger">Batalkan</a>
                      @endif
                    </td>
                  @endif
                </tr>
                @endforeach
              @if(isset($penjualanunread) && $penjualanunread->count() > 0)
                @foreach($penjualanunread as $penjualan)
                <tr style="background-color: green">
                  <td style="color: white;">{{$a++}}</td>
                  <td style="color: white;">{{$penjualan->id_transaksi}}</td>
                  <td style="color: white;">{{$penjualan->Katalog->nama}}</td>
                  <td style="color: white;">{{$penjualan->Katalog->Kategori->nama}}</td>
                  <td style="color: white;">{{$penjualan->Users->name}}</td>
                  <td style="color: white;">{{$penjualan->Users->no_handphone}}</td>
                  <td style="color: white;">{{$penjualan->jumlah}}</td>
                  <td style="color: white;">{{$penjualan->created_at}}</td>
                  @if($penjualan->keterangan == 0)
                    <td>
                      <a class="btn btn-xs btn-primary">Pending</a>
                    </td>
                  @elseif($penjualan->keterangan == -1)
                    <td>
                      <a class="btn btn-xs btn-danger">Dibatalkan Pengguna</a>
                    </td>
                  @elseif($penjualan->keterangan == -2)
                    <td>
                      <a class="btn btn-xs btn-danger">Dibatalkan Admin</a>
                    </td>
                  @elseif($penjualan->keterangan == 1)
                    <td>
                      <a class="btn btn-xs btn-info">Sedang Diproses</a>
                    </td>
                  @elseif($penjualan->keterangan == 2)
                    <td>
                      <a class="btn btn-xs btn-success">Selesai</a>
                    </td>
                  @endif
                  @if(!Request::is('Admin/Transaksi/Dibatalkan') && !Request::is('Admin/Transaksi/Selesai'))
                    <td>
                      <a href="{{url('Admin/Proses/'.$penjualan->id)}}" class="btn btn-xs btn-success">Proses Selanjutnya</a>
                      @if(!Request::is('Admin/Transaksi/SedangBerjalan'))
                        <a href="{{url('Admin/Batalkan/'.$penjualan->id)}}" class="btn btn-xs btn-danger">Batalkan</a>
                      @endif
                    </td>
                  @endif
                </tr>
                @endforeach
              @endif

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
