@extends('karyawan.layout')
@section('title','Dashboard')
@section('content')
  <!-- Content Wrapper. Contains page content -->
    <section class="content-header">
        <div align="center">
          <br>
          <img src="{{url('sukses.png')}}" style="width: 150px;height: 150px;">
          <br>
          <h3>
          Transaksi atas nama <b>{{$nama}}</b> berhasil, Kembali {{"Rp " . number_format($kembali,2,',','.')}}
        </h3>
          <h4>ID Transaksi : <b>{{$id_transaksi}}</b></h4>
          <br>
          <a class="btn btn-success" href="{{url('Karyawan/Dashboard')}}">Kembali Ke Dashboard</a>
        </div>
    </section>
@endsection