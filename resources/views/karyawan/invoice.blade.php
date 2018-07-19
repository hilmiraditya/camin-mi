@extends('karyawan.layout')
@section('title', 'Pembayaran')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pembayaran
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Point Of Sales</a></li>
        <li><a href="#">Karyawan</a></li>
        <li class="active">Pembayaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            ID Transaksi : #007612
            <small class="pull-right">Date: 2/10/2014</small>
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
              <td>{{$kantongbelanja->total_harga}}</td>
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
          <button style="margin-bottom: 3px;" type="button" class="btn btn-success">Rp. 500,-</button>
          <button style="margin-bottom: 3px;" type="button" class="btn btn-success">Rp. 1.000,-</button>
          <button style="margin-bottom: 3px;" type="button" class="btn btn-success">Rp. 2.000,-</button>
          <button style="margin-bottom: 3px;" type="button" class="btn btn-success">Rp. 5.000,-</button>
          <button style="margin-bottom: 3px;" type="button" class="btn btn-success">Rp. 10.000,-</button>
          <button style="margin-bottom: 3px;" type="button" class="btn btn-success">Rp. 20.000,-</button>
          <button style="margin-bottom: 3px;" type="button" class="btn btn-success">Rp. 50.000,-</button>
          <button style="margin-bottom: 3px;" type="button" class="btn btn-success">Rp. 100.000,-</button>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Keterangan :</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Atas Nama :</th>
                <td><input type="bayar" class="form-control" id="bayar"></td>
              </tr>
              <tr>
                <th style="width:50%">Total :</th>
                <td>$250.30</td>
              </tr>
              <tr>
                <th>Bayar :</th>
                <td><input type="bayar" class="form-control" id="bayar"></td>
              </tr>
            </table>
          </div>
          <div align="center">
            <a href="{{url('/Karyawan/TransaksiSukses')}}" class="btn btn-success">Test View</a>
            <button class="btn btn-primary">Bayar</button>
            <button class="btn btn-danger">Batalkan Transaksi</button>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
@endsection