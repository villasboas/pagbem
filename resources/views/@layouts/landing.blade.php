<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PagBem - {{ isset( $title ) ? $title : '' }}</title>
    <link rel="shortcut icon" href="img/fav.png">
    <meta name="author" content="Codeback">
    <meta name="description" content="">
    <meta name="keywords" content="">


    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ asset( 'site/css/linearicons.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'site/css/font-awesome.min.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'site/css/bootstrap.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'site/css/magnific-popup.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'site/css/owl.carousel.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'site/css/main.css' ) }}">
    @stack('styles')
</head>
<body>
    @yield('content')

    <script src="{{ asset( 'site/js/vendor/jquery-2.2.4.min.js' ) }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="{{ asset( 'site/js/vendor/bootstrap.min.js' ) }}"></script>
    <script src="{{ asset( 'site/js/jquery.ajaxchimp.min.js' ) }}"></script>
    <script src="{{ asset( 'site/js/jquery.magnific-popup.min.js' ) }}"></script>
    <script src="{{ asset( 'site/js/parallax.min.js' ) }}"></script>			
    <script src="{{ asset( 'site/js/owl.carousel.min.js' ) }}"></script>			
    <script src="{{ asset( 'site/js/jquery.sticky.js' ) }}"></script>
    <script src="{{ asset( 'site/js/main.js' ) }}"></script>	
    @stack('scripts')
</body>
</html>