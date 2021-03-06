<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->

    <title>PagBem - {{ isset( $title ) ? $title : '' }}</title>
    
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset( 'css/app.css' ) }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    
    <!-- Dashboard Core -->
    <link href="{{ asset( 'assets/css/dashboard.css' ) }}" rel="stylesheet" />

    <!-- c3.js Charts Plugin -->
    <link href="{{ asset( 'assets/plugins/charts-c3/plugin.css' ) }}" rel="stylesheet" />
 
    <!-- Google Maps Plugin -->
    <link href="{{ asset( 'assets/plugins/maps-google/plugin.css' ) }}" rel="stylesheet" />

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdn.rawgit.com/infostreams/bootstrap-select/fd227d46de2afed300d97fd0962de80fa71afb3b/dist/css/bootstrap-select.min.css" />
    
    <style>
        select[readonly] {
            background: #eee; /*Simular campo inativo - Sugestão @GabrielRodrigues*/
            pointer-events: none;
            touch-action: none;
        }
    </style>

    <!-- stacks -->
    @stack('styles')
</head>
<body>

    @yield('content')
    
    <!-- javascripts personalizados -->
    <script src="{{ asset('js/app.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.rawgit.com/infostreams/bootstrap-select/fd227d46de2afed300d97fd0962de80fa71afb3b/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('plugins/live-select.js') }}"></script>
    <script src="{{ url( 'plugins/mask/jquery.mask.min.js' ) }}"></script>
    <script src="{{ url( 'plugins/mask/input.mask.js' ) }}"></script>
    <script src="{{ asset( 'js/script.js' ) }}"></script>

    <!-- stacks -->
    @stack('scripts')
</body>
</html>