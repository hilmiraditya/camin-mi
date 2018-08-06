@extends('karyawan.layout')
@section('title','Dashboard')
@section('content')
  <!-- Content Wrapper. Contains page content -->
    <section class="content-header">
      <h1>
        Selamat Datang, {{$layout['user']->name}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Point Of Sales</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
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
    </section>
@endsection