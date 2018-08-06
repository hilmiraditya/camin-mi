@extends('karyawan.layout')
@section('title', 'Pembayaran')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="invoice">
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
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            Pembayaran
            <small class="pull-right">Date: {{date("Y-m-d H:i")}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Menu</th>
              <th>Nama Restoran</th>
              <th>Jumlah</th>
              <th>Total</th>
             </tr>
            </thead>
            <tbody>
            <?php $a=1; ?>
            @foreach($layout['kantongbelanja'] as $kantongbelanja)
            <tr>
              <th scope="row">{{$a++}}</th>
              <td>{{$kantongbelanja->katalog->nama}}</td>
              <td>{{$kantongbelanja->katalog->kategori->nama}}</td>
              <td>{{$kantongbelanja->jumlah}}</td>
              <td>{{ "Rp " . number_format($kantongbelanja->total_harga,2,',','.') }}</td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Detail Penerima order :</p>
          <form method="post" action={{url('Karyawan/Bayar')}}>
          @csrf
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Nama :</th>
                <td>
                  {{$layout['user']->name}}
                </td>
              </tr>
              <tr>
                <th style="width:50%">Tempat Tinggal :</th>
                <td>
                  {{$layout['user']->alamat}}
                </td>
              </tr>
              <tr>
                <th style="width:50%">No. Telfon :</th>
                <td>
                  {{$layout['user']->no_handphone}}
                </td>
              </tr>
            </table>
          </div>
        </form>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Keterangan :</p>
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Total :</th>
                <td>
                  {{"Rp ".number_format($hasil=$layout['kantongbelanja']->where('users_id', $layout['user']->id)->sum('total_harga'),2,',','.') }}
                </td>
              </tr>
            </table>
          </div>
          <br><br>
          <div align="center">
            <a href="{{url('Karyawan/ProsesTransaksi')}}" class="btn btn-primary">Proses Transaksi</a>
            <a href="{{url('Karyawan/BatalkanTransaksi')}}" class="btn btn-danger">Batalkan Transaksi</a>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
@endsection