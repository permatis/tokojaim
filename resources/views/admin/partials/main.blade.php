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
    <link rel="stylesheet" href="{{ URL::asset('admin/dist/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset('admin/dist/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ URL::asset('admin/dist/ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('admin/dist/fileinput/css/fileinput.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/dist/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/dist/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/dist/selectize.js/dist/css/selectize.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/dist/selectize.js/dist/css/selectize.bootstrap3.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/admin.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/dist/admin-lte/dist/css/AdminLTE.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/dist/admin-lte/dist/css/skins/_all-skins.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body class="skin-purple sidebar-mini">
    <div class="wrapper">

        @include('admin.partials.header')
        @include('admin.partials.sidebar')

        <div class="content-wrapper" style="min-height: 916px;">
            <section class="content-header">
                <h1>@yield('title-page')</h1>
            </section>

            <section class="content">
                @yield('content')
            </section>
        </div>

        @include('admin.partials.footer')

    </div>

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ URL::asset('admin/dist/jquery/dist/jquery.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script> --}}
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ URL::asset('admin/dist/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::asset('admin/dist/admin-lte/dist/js/app.min.js') }}"></script>
    <script src="{{ URL::asset('admin/dist/fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ URL::asset('admin/dist/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/microplugin.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/sifter.min.js') }}"></script>
    <script src="{{ URL::asset('admin/dist/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('admin/dist/selectize.js/dist/js/selectize.js') }}"></script>
    @stack('script-tag')
    @stack('script-images')
    @stack('script-select2')
    <script>

  $(function () {
    // $('#rupiah2').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
    $("#textarea").wysihtml5();

    if('select[id^="kategori"]') {
        $('select').each( function(i,v) {
            $('#'+$(this).attr('id')).select2();
        });
    }

    $("#tag").selectize({
        delimiter: ',',
        create: function(input) {
            return {
                value: input,
                text: input
            }
        },
        render: {
            option_create: function(data, escape) {
              return '<div class="create">Tambahkan tag baru "' + escape(data.input) + '"</div>';
            }
        },
        plugins: {
            'remove_button': { 'title': 'Hapus' }
        }
    });

    // $("#rupiah2").keyup(function() {
    //     var clone = $(this).val();
    //     var cloned = clone.replace(/[A-Za-z$. ,-]/g, "");
    //     $("#rupiah").val(cloned);
    // });
  });
</script>
  </body>
</html>
