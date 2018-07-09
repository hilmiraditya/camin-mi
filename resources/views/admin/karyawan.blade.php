  @extends('admin.layout')
  @section('title', 'Akun Karyawan')
  @section('content')
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Akun Karyawan
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Point Of Sales</a></li>
          <li><a href="#">Admin</a></li>
          <li class="active">Akun Karyawan</li>
        </ol>
      </section>
  

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            @if($cekJumlahKaryawan > 0)
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
                      <td>
                        {{$karyawan->Cabang->nama}}
                      </td>
                    @endif
                    @if($karyawan->no_handphone == NULL) 
                      <td>
                        <a class="btn btn-xs btn-warning">Belum Diisi !</a>
                      </td>
                    @else
                      <td>{{$karyawan->no_handphone}}</td>
                    @endif
                    <td>
                      <button class="btn btn-xs btn-primary" type="button" data-toggle="modal" data-target="#editakun{{$karyawan->id}}">
                          Edit Akun
                      </button>
                      <a href="{{url('Admin/HapusAkun').'/'.$karyawan->id}}" class="btn btn-xs btn-danger">Hapus Akun</a>
                    </td>
                  </tr>
                  @endforeach
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
            @else
            <div align="center">
              <h4>Belum ada Akun Karyawan</h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahakun">
                  Tambah Akun
                </button>
            </div>
            @endif
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
  @endsection
  

@section('modal')
  <!--Tambah Akun Modal -->
  <div>
  <div class="modal fade" id="tambahakun" tabindex="-3" role="dialog" aria-labelledby="tambah-akun" aria-hidden="true">
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
            <label>Email :</label>
            <input type="text" class="form-control" name="email">
          </div>
          <div class="form-group">
            <label>No. Handphone :</label>
            <input type="text" class="form-control" name="nohape">
          </div>
          <div class="form-group">
            <label>Password :</label>
            <input type="password" class="form-control" name="password">
          </div>
          <div class="form-group">
            <label>Cabang :</label>
            <br>
            @if($cekJumlahCabang > 0)
              @foreach($tambah_karyawan_cabang as $cabang)
              <label class="radio-inline">
                <input type="radio" name="cabang_id" value="{{$cabang->id}}">
                  {{$cabang->nama}}
              </label>
              @endforeach
            @else
            <label class="radio-inline">
              Belum Ada Cabang
            </label>
            @endif
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Tambah Akun</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </form> 
      </div>
    </div>
  </div>

  <!-- Edit Akun Modal -->
  <div>
  @foreach($karyawanUpdate as $karyawanUpdate)
  <div class="modal fade" id="editakun{{$karyawanUpdate->id}}" tabindex="-2" role="dialog" aria-labelledby="edit-akun" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <form method="GET" action="{{url('Admin/UpdateAkun').'/'.$karyawanUpdate->id}}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Edit Akun Karyawan</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Lengkap :</label>
            <input type="text" class="form-control" name="name" value="{{$karyawanUpdate->name}}" placeholder="{{$karyawanUpdate->name}}">
          </div>
          <div class="form-group">
            <label>Email :</label>
            <input type="text" class="form-control" name="email" value="{{$karyawanUpdate->email}}" placeholder="{{$karyawanUpdate->email}}">
          </div>
          <div class="form-group">
            <label>No. Handphone :</label>
            <input type="text" class="form-control" name="nohape" value="{{$karyawanUpdate->no_handphone}}" placeholder="{{$karyawanUpdate->no_handphone}}">
          </div>
          <div class="form-group">
            <label>Password :</label>
            <input type="password" class="form-control" name="password">
          </div>
          <div class="form-group">
            <label>Cabang :</label>
            <br>
            @if($cekJumlahCabang > 0)
              @foreach($edit_karyawan_cabang as $cabang)
              <label class="radio-inline">
                <input type="radio" name="cabang_id" value="{{$cabang->id}}">
                  {{$cabang->nama}}
              </label>
              @endforeach
            @else
            <label class="radio-inline">
              Belum Ada Cabang
            </label>
            @endif
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Edit Akun</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </form> 
      </div>
    </div>
  @endforeach
</div>
  <!-- Hapus Akun Modal -->
  <div>
  <div class="modal fade" id="hapusakun" tabindex="-1" role="dialog" aria-labelledby="hapus-akun" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Akun karyawan ini akan dihapus.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger">Hapus</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
</div>
@endsection