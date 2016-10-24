<!DOCTYPE HTML>
<head>
<title>Toko Online</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="{{ asset('assets/css/shoppe.css') }}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/shoppe.js') }}"></script>
</head>
<body>
    <div class="wrap">
        @include('themes.shoppe.partials.header')
        <div class="main">
            @yield('content')
        </div>
    </div>
    @include('themes.shoppe.partials.footer')
</body>
</html>
