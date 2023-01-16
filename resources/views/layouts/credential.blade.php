<!DOCTYPE html>
<html lang="en-us" id="extr-page">
	<head>
		<meta charset="utf-8">
		<title> SmartAdmin</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- #CSS Links -->
		<!-- Basic Styles -->
		{!! HTML::style('public/smartadmin/css/bootstrap.min.css') !!}
		{!! HTML::style('public/smartadmin/css/font-awesome.min.css') !!}
		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		{!! HTML::style('public/smartadmin/css/smartadmin-production-plugins.min.css') !!}
		{!! HTML::style('public/smartadmin/css/smartadmin-production.min.css') !!}
		{!! HTML::style('public/smartadmin/css/smartadmin-skins.min.css') !!}

		<!-- SmartAdmin RTL Support -->
		{!! HTML::style('public/smartadmin/css/smartadmin-rtl.min.css') !!}

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		{!! HTML::style('public/smartadmin/css/demo.min.css') !!}

		<!-- #FAVICONS -->
		<link rel="shortcut icon" href="{{ url('public/smartadmin/img/favicon/favicon.ico')}}" type="image/x-icon">
		<link rel="icon" href="{{ url('public/smartadmin/img/favicon/favicon.ico')}}" type="image/x-icon">

		<!-- #GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- #APP SCREEN / ICONS -->
		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="{{ url('public/smartadmin/img/splash/sptouch-icon-iphone.png')}}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{ url('public/smartadmin/img/splash/touch-icon-ipad.png')}}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{ url('public/smartadmin/img/splash/touch-icon-iphone-retina.png')}}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{ url('public/smartadmin/img/splash/touch-icon-ipad-retina.png')}}">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="{{ url('public/smartadmin/img/splash/ipad-landscape.png')}}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="{{ url('public/smartadmin/img/splash/ipad-portrait.png')}}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="{{ url('public/smartadmin/img/splash/iphone.png')}}" media="screen and (max-device-width: 320px)">
		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		
	    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
	    {!! HTML::script('public/smartadmin/js/libs/jquery-2.1.1.min.js') !!}
		{!! HTML::script('public/smartadmin/js/libs/jquery-ui-1.10.3.min.js') !!}
		<!-- IMPORTANT: APP CONFIG -->
		{!! HTML::script('public/smartadmin/js/app.config.js') !!}

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events 		
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

		<!-- BOOTSTRAP JS -->		
		{!! HTML::script('public/smartadmin/js/bootstrap/bootstrap.min.js') !!}
		<!-- JQUERY VALIDATE -->
		{!! HTML::script('public/smartadmin/js/plugin/jquery-validate/jquery.validate.min.js') !!}
		<!-- JQUERY MASKED INPUT -->
		{!! HTML::script('public/smartadmin/js/plugin/masked-input/jquery.maskedinput.min.js') !!}
		
		<!--[if IE 8]>
			
			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
			
		<![endif]-->

		<!-- MAIN APP JS FILE -->
		{!! HTML::script('public/smartadmin/js/app.min.js') !!}
	</head>
	
	<body class="animated fadeInDown">
		
		<!--================================================== -->	
		@section('content')
	</body>
</html>