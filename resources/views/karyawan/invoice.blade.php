@extends('karyawan.layout')
@section('title', 'Pembayaran')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Point Of Sales</a></li>
        <li><a href="#">Karyawan</a></li>
        <li class="active">Pembayaran</li>
      </ol>
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
      @if($layout['kantongbelanja']->count() > 0)
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jumlah</th>
              <th>Total</th>
             </tr>
            </thead>
            <tbody>
            @foreach($layout['kantongbelanja'] as $kantongbelanja)
            <tr>
              <th scope="row">1</th>
              <td>{{$kantongbelanja->katalog->nama}}</td>
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
          <p class="lead">Pilih Uang :</p>
          <button onclick="bayar(500)" style="margin-bottom: 3px;" type="button" class="btn btn-success">Rp. 500,-</button>
          <button onclick="bayar(1000)" style="margin-bottom: 3px;" type="button" class="btn btn-success">Rp. 1.000,-</button>
          <button onclick="bayar(2000)" style="margin-bottom: 3px;" type="button" class="btn btn-success">Rp. 2.000,-</button>
          <button onclick="bayar(5000)" style="margin-bottom: 3px;" type="button" class="btn btn-success">Rp. 5.000,-</button>
          <button onclick="bayar(10000)" style="margin-bottom: 3px;" type="button" class="btn btn-success">Rp. 10.000,-</button>
          <button onclick="bayar(20000)" style="margin-bottom: 3px;" type="button" class="btn btn-success">Rp. 20.000,-</button>
          <button onclick="bayar(50000)" style="margin-bottom: 3px;" type="button" class="btn btn-success">Rp. 50.000,-</button>
          <button onclick="bayar(100000)" style="margin-bottom: 3px;" type="button" class="btn btn-success">Rp. 100.000,-</button>
          <button onclick="bersihin()" style="margin-bottom: 3px;" type="button" class="btn btn-danger">Hapus</button>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Keterangan :</p>
          <form method="post" action={{url('Karyawan/Bayar')}}>
          @csrf
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Atas Nama :</th>
                <td><input type="text" class="form-control" name="nama" placeholder="Nama Masih Kosong"></td>
              </tr>
              <tr>
                <th style="width:50%">Total :</th>
                <td>
{{"Rp ".number_format($hasil=$layout['kantongbelanja']->where('users_id', $layout['user']->id)->sum('total_harga'),2,',','.') }}
                </td>
              </tr>
              <tr>
                <th>Bayar :</th>
                <td><input type="text" class="form-control" id="input_bayar" name="bayar"></td>
                <input type="hidden" name="total" value="{{$hasil}}">
              </tr>
            </table>
          </div>
          <div align="center">
            <a href="{{url('/Karyawan/Pembayaran')}}" class="btn btn-success">Test View</a>
            <button type="submit" class="btn btn-primary">Bayar</button>
            <button class="btn btn-danger">Batalkan Transaksi</button>
          </div>
        </form>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    @else
    <div align="center">
      <h4>Kantong Belanja Masih Kosong</h4>
      <a href="{{url('/Karyawan/Dashboard')}}" class="btn btn-sm btn-success">Kembali ke Dashboard</a>
    </div>
    @endif
    <!-- /.content -->
    <div class="clearfix"></div>
@endsection

@section('script')
<script>
  function bayar(uang) 
  {
    var lama = +document.getElementById("input_bayar").value;
    var hasil = uang + lama;
    document.getElementById("input_bayar").value = hasil;
  }

  function bersihin()
  {
    document.getElementById("input_bayar").value = 0;    
  }
</script>
@endsection