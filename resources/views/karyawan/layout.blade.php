<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TC Fast Food | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="icon" href="{{url('satean.jpg')}}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('adminlte/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('adminlte/dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{url('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  @yield('script')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">TC-FF</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">TC Fast Food</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          @if(!Request::is('Pengguna/KantongBelanja') && !Request::is('Pengguna/ProsesTransaksi'))
          <li class="dropdown messages-menu">
            <a href="#" data-toggle="modal" data-target="#exampleModalLong">
              <i class="fa fa-shopping-bag"></i>
            </a>
          </li>
          @endif
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{url('satean.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{$layout['user']->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{url('satean.jpg')}}" class="img-circle" alt="User Image">

                <p>
                  {{$layout['user']->name}}
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div align="center">
                  <a href="#" data-toggle="modal" data-target="#ubahakun" class="btn btn-default btn-flat">Ubah Akun</a>
                  <a class="btn btn-default btn-flat" href="{{ route('logout') }}"] onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    Logout
                  </a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }} 
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  @if(!Request::is('Pengguna/KantongBelanja') && !Request::is('Pengguna/ProsesTransaksi'))
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="{{url('/Pengguna/Dashboard')}}">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cutlery"></i>
            <span>Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @foreach($layout['listkategori'] as $kategori)
            <li>
              <a href="{{url('Pengguna/Menu'.'/'.$kategori->id)}}">
                <i class="fa fa-circle-o"></i>{{$kategori->nama}}
              </a>
            </li>
            @endforeach
          </ul>
        </li>
        @if($layout['user']->isAdmin == 0)
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{url('Pengguna/Dibatalkan')}}">
                <i class="fa fa-circle-o"></i>Dibatalkan
              </a>
            </li>
            <li>
              <a href="{{url('Pengguna/SedangBerjalan')}}">
                <i class="fa fa-circle-o"></i>Sedang Berjalan
              </a>
            </li>
            <li>
              <a href="{{url('Pengguna/Selesai')}}">
                <i class="fa fa-circle-o"></i>Selesai
              </a>
            </li>
          </ul>
        </li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  @endif
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Kelompok </b> 1
    </div>
    <strong>&copy; 2018 Lab. Manajemen Informasi Teknik Informatika ITS</a></strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{url('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('adminlte/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{url('adminlte/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{url('adminlte/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{url('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{url('adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('adminlte/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{url('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{url('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{url('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{url('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('adminlte/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('adminlte/dist/js/demo.js')}}"></script>
<!-- DataTables -->
<script src="{{url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<!-- Shopping Cart Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">
          <i class="fa fa-shopping-bag"></i> Kantong Belanja
        </h4>
      </div>
      <div class="modal-body">
@if($layout['kantongbelanja']->count() > 0)
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Total</th>
      <th scope="col">Opsi</th>
    </tr>
  </thead>
  <?php $a=1; ?>
  <tbody id="kantongbelanja_list" name="list_kantongbelanja">
    @foreach($layout['kantongbelanja'] as $kantongbelanja)
    <tr id="kantongbelanja{{$kantongbelanja->id}}">
      <th scope="row">{{$a++}}</th>
      <td>{{$kantongbelanja->katalog->nama}}</td>
      <td>{{$kantongbelanja->jumlah}}</td>
      <td>{{"Rp " . number_format($kantongbelanja->total_harga,2,',','.')}}</td>
      <td><a href="{{url('Pengguna/HapusItem'.'/'.$kantongbelanja->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
    </tr>
    @endforeach
  </tbody>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td><b>Total</b></td>
      <td>{{"Rp " . number_format($layout['kantongbelanja']->sum('total_harga'),2,',','.')}}</td> 
      <td></td> 
    </tr>
</table>
@else
<div align="center">
  <h4>Kantong Belanja Masih Kosong</h4>
</div>
@endif
      </div>
      <div class="modal-footer">
        @if($layout['kantongbelanja']->count() > 0)
        <a href="{{url('/Pengguna/KantongBelanja')}}" class="btn btn-success">Lanjut Ke Pembayaran</a>
        <a href="{{url('/Pengguna/BatalkanBelanja')}}" class="btn btn-warning">Batalkan Transaksi</a>
        @endif
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<!-- Ubah Data Modal -->
<div class="modal fade" id="ubahakun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Cabang pada Akun Admin</h5>
      </div>
      <form method="POST" action="{{url('Pengguna/UbahAkunPengguna')}}" enctype="multipart/form-data">
      <div class="modal-body">
          @csrf
          <input type="hidden" name="id" value="{{$layout['user']->id}}">
          <div class="form-group">
            <label>Nama :</label>
            <input class="form-control" type="text" name="name" value="{{$layout['user']->name}}">
          </div>
          <div class="form-group">
            <label>Email :</label>
            <input class="form-control" type="text" value="{{$layout['user']->email}}" disabled>
          </div>
          <div class="form-group">
            <label>No. Handphone :</label>
            <input class="form-control" type="text" name="no_handphone" value="{{$layout['user']->no_handphone}}">
          </div>
          <div class="form-group">
            <label>Alamat :</label>
            <input class="form-control" type="text" name="alamat" value="{{$layout['user']->alamat}}">
          </div>
          <div class="form-group">
            <label>Password :</label>
            <input class="form-control" type="password" name="password">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ubah</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
@yield('modal')
@yield('script')
</body>
</html>
