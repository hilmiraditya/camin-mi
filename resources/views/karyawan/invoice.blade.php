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
              <th>Qty</th>
              <th>Product</th>
              <th>Serial #</th>
              <th>Description</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>1</td>
              <td>Call of Duty</td>
              <td>455-981-221</td>
              <td>El snort testosterone trophy driving gloves handsome</td>
              <td>$64.50</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Need for Speed IV</td>
              <td>247-925-726</td>
              <td>Wes Anderson umami biodiesel</td>
              <td>$50.00</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Monsters DVD</td>
              <td>735-845-642</td>
              <td>Terry Richardson helvetica tousled street art master</td>
              <td>$10.70</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Grown Ups Blue Ray</td>
              <td>422-568-642</td>
              <td>Tousled lomo letterpress</td>
              <td>$25.99</td>
            </tr>
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
          <p class="lead">Amount Due 2/22/2014</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Total :</th>
                <td>$250.30</td>
              </tr>
              <tr>
                <th>Bayar :</th>
                <td><input type="bayar" class="form-control" id="bayar"></td>
              </tr>
              <tr>
                <th>Kembali :</th>
                <td>$5.80</td>
              </tr>
            </table>
          </div>
          <div align="center">
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