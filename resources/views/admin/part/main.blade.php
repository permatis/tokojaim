<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('admin/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/dist/css/skins/skin-purple.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/dist/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">
      
      @include('admin.part.header')

      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
     
      @include('admin.part.sidebar')

      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        @yield('content')
        
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
     
      @include('admin.part.footer')

      </footer>


    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::asset('admin/dist/js/app.min.js') }}"></script>
    <script src="{{ URL::asset('admin/dist/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script>
  $(function () {
    $('#rupiah2').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
    $("#textarea").wysihtml5();

    $("#rupiah2").keyup(function() {
    var clone = $(this).val();
    var cloned = clone.replace(/[A-Za-z$. ,-]/g, "")
    $("#rupiah").val(cloned);
    });    
  });
</script>
  </body>
</html>