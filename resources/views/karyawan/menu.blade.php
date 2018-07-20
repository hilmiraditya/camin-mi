@extends('karyawan.layout')
@section('title', 'Daftar Menu')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Menu
        <small>{{$kategori->nama}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Point Of Sales</a></li>
        <li><a href="#">Admin</a></li>
        <li><a href="#">Menu</a></li>
        <li class="active">{{$kategori->nama}}</li>
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
      <div class="row" align="center">
        @if($katalog->count() > 0)
        @foreach($katalog as $katalog)
        <div class="col-md-6">
          <!-- Line chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{$katalog->nama}}</h3>
            </div>
            <div class="box-body">
              <div class="row">
                @if($katalog->gambar == NULL)
                <img class="col-md-12" style="width: 100%;height:100%;max-height:250px;" src="{{url('adminlte/restaurant.png')}}">
                @else
                <img class="col-md-12" style="width: 100%;height:100%;max-height:250px;" src="{{url('fotomenu').'/'.$katalog->gambar}}"> 
                @endif
              </div>
              <div align="center">
                @if($katalog->diskon != NULL)
                <h3><b><strike>{{ "Rp " . number_format($katalog->harga,2,',','.') }}</strike></b> <a style="color: red;"><b>{{ "Rp " . number_format($katalog->harga-($katalog->diskon/100*$katalog->harga),2,',','.') }}</b></a></h3>
                @else
                  <h3><b>{{ "Rp " . number_format($katalog->harga,2,',','.') }}</b></h3>    
                @endif
              </div>
            </div>
            <div class="box-footer with-border">
              <form method="POST" action="{{url('Karyawan/TambahItem')}}">
              @csrf
              <div align="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4" align="center">
                  <div class="input-group">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-danger btn-number"  data-type="minus" onclick="kurang()">
                        <span class="glyphicon glyphicon-minus"></span>
                      </button>
                    </span>
                    <input type="hidden" name="katalog_id" value="{{$katalog->id}}">
                    <input type="hidden" name="users_id" value="{{$layout['user']->id}}">
                    <input type="hidden" name="harga" value="{{$katalog->harga}}">
                    <input type="text" id="input_menu" name="jumlah" class="form-control input-number" value="0">

                    <span class="input-group-btn">
                      <button type="button" class="btn btn-success btn-number" data-type="plus" onclick="tambah()">
                        <span class="glyphicon glyphicon-plus"></span>
                      </button>
                    </span>
                  </div>
                  <div class="input-group">
                    <br>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                  </div>
                </div>
                <div class="col-sm-4"></div>
              </div>
            </form>
            </div>
          </div>
        <!-- /.col -->
        @endforeach
        @else
        <div class="col-md-12" align="center">
          <br>
          <h4>Belum ada menu pada kategori {{$kategori->nama}}</h4>
          <br>
        </div>
        @endif
      </div>
      <!-- /.row -->
    </section>
    <!-- /.conten -->
@endsection

@section('script')
<script>
  function tambah()
  {
    if (document.getElementById("input_menu").value < 30)
    {
      var lama = +document.getElementById("input_menu").value;
      var hasil = lama + 1;
      document.getElementById("input_menu").value = hasil;
    }
  }

  function kurang()
  {
    if (document.getElementById("input_menu").value > 1)
    {
      var lama = +document.getElementById("input_menu").value;
      var hasil = lama - 1;
      document.getElementById("input_menu").value = hasil;
    }
  }
</script>
@endsection
