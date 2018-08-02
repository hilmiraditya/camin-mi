<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TC Fast Food | Register</title>
  <link rel="icon" href="{{url('satean.jpg')}}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content=" initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('adminlte/dist/css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('adminlte/plugins/iCheck/square/blue.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body" style="z-index: 1;">
    <div align="center">
      <img src="{{url('satean.jpg')}}" style="width: 100px;height: 100px;">
    </div>
    <br>
    <p class="login-box-msg">Registrasi Member Baru</p>
      @if (count($errors) > 0)
      <div class="row">
        <div class = "alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      </div>
      @endif
      <form class="form-horizontal" role="form" method="POST" action="{{url('/registerAkun')}}">
      @csrf
      <div class="form-group has-feedback">
        <input id="name" type="text" class="form-control" name="name" placeholder="Nama Lengkap">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="email" type="email" class="form-control" name="email" placeholder="Alamat Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="no_handphone" type="no_handphone" class="form-control" name="no_handphone" placeholder="Nomor Handphone">
        <span class=" glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select name="alamat" id="alamat" class="form-control">
          <option value="Ruang Himpunan">Ruang Himpunan</option>
          <option value="Lab AJK">Lab AJK</option>
          <option value="Lab LP1">Lab LP1</option>
          <option value="Lab Alpro">Lab Alpro</option>
          <option value="Lab MI">Lab MI</option>
          <option value="Lab DTK">Lab DTK</option>
          <option value="Lab RPL">Lab RPL</option>
          <option value="Lab NCC">Lab NCC</option>
          <option value="Lab KCV">Lab KCV</option>
          <option value="Lab LP2">Lab LP2</option>
          <option value="Ruang Danzo">Ruang Danzo</option>
        </select>
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div align="center">
          <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Register') }}</button>
          <a href="{{url('/login')}}" class="btn btn-warning btn-block btn-flat">Saya sudah punya akun</a>
        </div>
        <!-- /.col -->
      </div>
      <br>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
</body>

<!-- jQuery 3 -->
<script src="{{url('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{url('adminlte/plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</html>
