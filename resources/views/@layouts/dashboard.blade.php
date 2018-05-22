<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>PagBem - {{ isset( $title ) ? $title : '' }}</title>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="description" content="Phoenixcoded">
	<meta name="keywords"
		  content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
	<meta name="author" content="Phoenixcoded">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Favicon icon -->
	<link rel="shortcut icon" href="{{ asset( 'assets/images/favicon.png' ) }}" type="image/x-icon">
	<link rel="icon" href="{{ asset( 'assets/images/favicon.ico' ) }}" type="image/x-icon">

	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="{{ asset( 'assets/css/font-awesome.min.css' ) }}" rel="stylesheet" type="text/css">

	<!--ico Fonts-->
	<link rel="stylesheet" type="text/css" href="{{ asset( 'assets/icon/icofont/css/icofont.css' ) }}">
    
    <!-- simple line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset( 'assets/icon/simple-line-icons/css/simple-line-icons.css' ) }}">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset( 'assets/plugins/bootstrap/css/bootstrap.min.css' ) }}">
    
    <!-- Weather css -->
    <link href="{{ asset( 'assets/css/svg-weather.css' ) }}" rel="stylesheet">

    <!-- Echart js -->
    <script src="{{ asset( 'assets/plugins/charts/echarts/js/echarts-all.js' ) }}"></script>
    
	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="{{ asset( 'assets/css/main.css' ) }}">

	<!-- Responsive.css-->
	<link rel="stylesheet" type="text/css" href="{{ asset( 'assets/css/responsive.css' ) }}">

	<!--color css-->
	<link rel="stylesheet" type="text/css" href="{{ asset( 'assets/css/color/color-1.min.css' ) }}" id="color"/>

    <!-- css -->
    <link rel="stylesheet" href="{{ asset( 'css/app.css' )}}">

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

    <div class="loader-bg">
        <div class="loader-bar">
        </div>
    </div>
    <div class="wrapper">
        @include('@components.navbar')
        @include('@components.sidenav')
        @include('@components.chat')
    </div>

    @yield('content')

    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 9]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="{{ asset( 'assets/images/browser/chrome.png' ) }}" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="{{ asset( 'assets/images/browser/firefox.png' ) }}" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="{{ asset( 'assets/images/browser/opera.png' ) }}" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="{{ asset( 'assets/images/browser/safari.png' ) }}" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="{{ asset( 'assets/images/browser/ie.png' ) }}" alt="">
                        <div>IE (9 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
    <![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Jqurey -->
    <script src="{{ asset( 'assets/js/jquery.min.js' ) }}"></script>
    <script src="{{ asset( 'assets/plugins/jquery/dist/jquery.min.js' ) }}"></script>
    <script src="{{ asset( 'assets/plugins/jquery-ui/jquery-ui.min.js' ) }}"></script>
    <script src="{{ asset( 'assets/plugins/tether/dist/js/tether.min.js' ) }}"></script>

    <!-- Required Fremwork -->
    <script src="{{ asset( 'assets/plugins/bootstrap/js/bootstrap.min.js' ) }}"></script>

    <!-- waves effects.js -->
    <script src="{{ asset( 'assets/plugins/waves/waves.min.js' ) }}"></script>

    <!-- Scrollbar JS-->
    <script src="{{ asset( 'assets/plugins/jquery-slimscroll/jquery.slimscroll.js' ) }}"></script>
    <script src="{{ asset( 'assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js' ) }}"></script>

    <!--classic JS-->
    <script src="{{ asset( 'assets/plugins/classie/classie.js' ) }}"></script>

    <!-- notification -->
    <script src="{{ asset( 'assets/plugins/notification/js/bootstrap-growl.min.js' ) }}"></script>

    <!-- Rickshaw Chart js -->
    <script src="{{ asset( 'assets/plugins/d3/d3.js' ) }}"></script>
    <script src="{{ asset( 'assets/plugins/rickshaw/rickshaw.js' ) }}"></script>

    <!-- Sparkline charts -->
    <script src="{{ asset( 'assets/plugins/jquery-sparkline/dist/jquery.sparkline.js' ) }}"></script>

    <!-- Counter js  -->
    <script src="{{ asset( 'assets/plugins/waypoints/jquery.waypoints.min.js' ) }}"></script>
    <script src="{{ asset( 'assets/plugins/countdown/js/jquery.counterup.js' ) }}"></script>

    <!-- custom js -->
    <script type="text/javascript" src="{{ asset( 'assets/js/main.min.js' ) }}"></script>
    <script type="text/javascript" src="{{ asset( 'assets/pages/dashboard.js' ) }}"></script>
    <script type="text/javascript" src="{{ asset( 'assets/pages/elements.js' ) }}"></script>
    <script src="{{ asset( 'assets/js/menu.min.js' ) }}"></script>

    <script>
        var $window = $(window);
        var nav = $('.fixed-button');
        $window.scroll(function(){
            if ($window.scrollTop() >= 200) {
             nav.addClass('active');
         }
         else {
             nav.removeClass('active');
         }
     });
    </script>

    <!-- stacks -->
    @stack('scripts')
</body>
</html>