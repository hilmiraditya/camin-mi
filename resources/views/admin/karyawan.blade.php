@extends('admin.layout')
@section('title', 'Akun Karyawan')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Akun Karyawan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Cabang</th>
                  <th>No. Handphone</th>
                  <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php $a = 1;?>
                @foreach($karyawan as $karyawan)
                <tr>
                  <td><?php echo $a++;?></td>
                  <td>{{$karyawan->name}}</td>
                  <td>{{$karyawan->email}}</td>
                  @if($karyawan->cabang_id == NULL)
                    <td>
                      <a class="btn btn-xs btn-warning">Belum Ditentukan oleh Admin !</a>
                    </td>
                  @else

                  @endif
                  @if($karyawan->no == NULL) 
                    <td>
                      <a class="btn btn-xs btn-warning">Belum Diisi !</a>
                    </td>
                  @else
                    <td>{{$karyawan->no}}
                  @endif
                  <td>
                    <a class="btn btn-xs btn-primary">Ubah Cabang</a>
                    <a class="btn btn-xs btn-success">Lihat Detil</a>
                    <a href="{{url('Admin/HapusAkun').'/'.$karyawan->id}}" class="btn btn-xs btn-danger">Hapus Akun</a>
                  </td>
                @endforeach
                </tr>
                </tfoot>
              </table>
            </div>
            <div align="center">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahakun">
              Tambah Akun
              </button>
            </div>
            <br>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('modal')
<!-- Modal -->
<div class="modal fade" id="tambahakun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form method="POST" action="{{url('/Admin/TambahAkun')}}">
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tambah Akun Karyawan</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Nama Lengkap :</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
          <label>Alamat :</label>
          <input type="text" class="form-control" name="alamat">
        </div>
        <div class="form-group">
          <label>Email :</label>
          <input type="text" class="form-control" name="email">
        </div>
        <div class="form-group">
          <label>No. Handphone :</label>
          <input type="text" class="form-control" name="no">
        </div>
        <div class="form-group">
          <label>Password :</label>
          <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
          <label>Tanggal Lahir :</label>
          <input type="date" class="form-control" name="tanggal_lahir">
        </div>
        <div class="form-group">
          <label>Cabang :</label>
          <br>
          @if($cekJumlahCabang > 0)
            @foreach($cabang as $cabang)
            <label class="radio-inline">
              <input type="radio" name="cabang_id" value="{{$cabang->id}}">
                {{$cabang->nama}}
            </label>
            @endforeach
          @else
          <label class="radio-inline">
            <input type="radio" name="cabang_id" value="" disabled="disabled" readonly>Belum Ada Cabang
          </label>
          @endif
        </div>
        <div class="form-group">
          <label>Upload Foto Profil : </label>
          <br>
          <input type="file" name="FotoProfil" accept="image/*">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah Akun</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
      </div>
    </form> 
    </div>
  </div>
@endsection