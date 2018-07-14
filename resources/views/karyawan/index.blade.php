@extends('karyawan.layout')
@section('title','Dashboard')
@section('content')
  <!-- Content Wrapper. Contains page content -->
    <section class="content-header">
      <h1>
        Selamat Datang, {{$karyawan->name}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Point Of Sales</a></li>
        <li class="active">Karyawan</li>
      </ol>
    </section>
@endsection