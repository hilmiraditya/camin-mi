@extends('admin.layout')
@section('title','Dashboard')
@section('content')
  <!-- Content Wrapper. Contains page content -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Semua Cabang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Point Of Sales</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $data['cabang'] }}</h3>

              <p>Cabang</p>
            </div>
            <div class="icon">
              <i class="ion ion-home"></i>
            </div>
            <a href="{{url('/Admin/Cabang')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $data['akun'] }}</h3>
              <p>Akun Karyawan</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="{{url('/Admin/AkunKaryawan')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $data['penjualan'] }}</h3>

              <p>Porsi Terjual</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
            <a href="{{ url('/Admin/LaporanPenjualan') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $data['menu'] }}</h3>

              <p>Menu</p>
            </div>
            <div class="icon">
              <i class="ion ion-coffee"></i>
            </div>
            <a href="{{ url('/Admin/LaporanPenjualan') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
