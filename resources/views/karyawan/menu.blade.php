@extends('karyawan.layout')
@section('title', 'Daftar Menu')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Menu
        <small>{{$data['kategori']->nama}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Point Of Sales</a></li>
        <li><a href="#">Admin</a></li>
        <li><a href="#">Menu</a></li>
        <li class="active">{{$data['kategori']->nama}}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-md-12">
        <a>
          @if($data['kategori']->gambar == NULL)
          <img src="{{url('adminlte/restaurant.png')}}" alt="Lights" style="width:100% ;height:200px;">
          @else
          <img src="{{url('fotorestoran').'/'.$data['kategori']->gambar}}" alt="Lights" style="width:100% ;height:200px;">
          @endif
        </a>
      </div>
    </div>
      <br>
      <div align="center">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#inforestoran">
          Lihat Lokasi
        </button>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#inforestoran">
          Info Restoran
        </button>
      </div>
      <br>
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
        @if($data['katalog']->count() > 0)
        @foreach($data['katalog'] as $katalog)
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
              <form method="POST" action="{{url('Pengguna/TambahItem')}}">
                @csrf
              <div align="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4" align="center">
                  <div class="input-group">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-danger btn-number"  data-type="minus" onclick="kurang({{$katalog->id}})">
                        <span class="glyphicon glyphicon-minus"></span>
                      </button>
                    </span>
                    <input type="hidden"  id="katalog{{$katalog->id}}" name="katalog_id" value="{{$katalog->id}}">
                    <input type="hidden" id="users_id{{$katalog->id}}" name="users_id" value="{{$layout['user']->id}}">
                    <input type="hidden" id="harga{{$katalog->id}}" name="harga" value="{{$katalog->harga}}">
                    <input type="text" id="input_menu{{$katalog->id}}" name="jumlah" class="form-control input-number" value="0">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-success btn-number" data-type="plus" onclick="tambah({{$katalog->id}})">
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
        </div>
        @endforeach
        @else
        <div class="col-md-12" align="center">
          <br>
          <h4>Belum ada menu pada kategori {{$data['kategori']->nama}}</h4>
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
  function tambah($menu)
  {
    if (document.getElementById("input_menu" + $menu).value < 30)
    {
      var lama = +document.getElementById("input_menu" + $menu).value;
      var hasil = lama + 1;
      document.getElementById("input_menu" + $menu).value = hasil;
    }
  }

  function kurang($menu)
  {
    if (document.getElementById("input_menu" + $menu).value > 1)
    {
      var lama = +document.getElementById("input_menu" + $menu).value;
      var hasil = lama - 1;
      document.getElementById("input_menu" + $menu).value = hasil;
    }
  }
</script>

<script type="text/javascript">
$("#tambah_menu_oi").click(function(){ 
    $.ajax({
        type: 'post',
        url: '/Pengguna/TambahItemAjax',
        data: {
            '_token': $('input[name=_token]').val(),
            'katalog_id': $('input[name=katalog_id]').val(),
            'users_id': $('input[name=users_id]').val(),
            'harga': $('input[name=harga]').val(),
            'jumlah': $('input[name=jumlah]').val(),
        },
        success: function(data) {
            if ((data.errors))
            {
                $('.error').removeClass('hidden');
                $('.error').text(data.errors.name);
            } 
            else 
            {
                $('.error').remove();
            }
        },
    });
    $('#katalog_id' + data.id).val('');
    $('#users_id' + data.id).val('');
    $('#harga' + data.id).val('');
    $('#jumlah'+ data.id).val('');
});
</script>
@endsection

@section('modal')
<!-- Modal untuk info restoran-->
<div class="modal fade" id="inforestoran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Info restoran </h4>
      </div>
      <div class="modal-body">
        <h5>Nama Restoran : <b>{{$data['kategori']->nama}}</b></h5>
        <br>
        <h5>No. Telefon : <b>{{$data['kategori']->no_telepon}}</h5>
        <br>
        <h5>Alamat : <b>{{$data['kategori']->alamat}}</h5>
        <br>
        <h5>Keterangan : <b>{{$data['kategori']->keterangan}}</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
@endsection
