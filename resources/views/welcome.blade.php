<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPBKPSDM | Client</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/adminlte/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">            
<div class="wrapper">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
    
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
 
    <div class="container">

      <!-- Main content -->
      <section class="content">
        <div class="box box-default">
          <div class="box-header with-border">
              <div class="col-md-12">
                <marquee scrolldelay="500" bgcolor="cyan" width="100%">
                 <h4><b>NAWI ARIGI TOLIKARA</b></h4>
                </marquee>
              </div>
          </div>
          <div class="box-body">
            <div class="row">
                    <div class="col-md-7" style="border:1px dotted;padding:30px;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group has-feedback">
                            
                                <input id="email" type="email" class="form-control {{$errors->has('email')? 'is-incalid':''}}" name="email" placeholder="Email" value="{{old('email')}}" required autofocus>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                @if ($errors->has('email'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                            </div>
                            <div class="form-group has-feedback">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="row">
                                <div class="col-xs-8">
                                <div class="checkbox icheck">
                                    <label>
                                    <input type="checkbox" name="remember" id="remember" {{old('remember')? 'checked':''}}> Remember Me
                                    </label>
                                </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in"></i>Sign In</button>
                                </div>
                                <!-- /.col -->
                            </div>
                            </form>
                </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <strong>Copyright &copy; 2019 <a href="#">Sistem Informasi Presensi BKPSDM Tolikara</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>

</body>
</html>
