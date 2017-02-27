<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>PASANTÍAS AIS UNERG</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<link rel="shortcut icon" href="{{asset('assets/img/logo_pasantias.png')}}" />
	    <link rel="apple-touch-icon" href="{{asset('assets/img/logo_pasantias.png')}}" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/font-awesome/4.2.0/css/font-awesome.min.css')}}" />

		<!-- text fonts -->
		<link rel="stylesheet" href="{{asset('assets/fonts/fonts.googleapis.com.css')}}" />

		<!-- ace styles -->
		<link rel="stylesheet" href="{{asset('assets/css/ace.min.css')}}" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="{{asset('assets/css/ace-rtl.min.css')}}" />

		<link rel="stylesheet" href=" {{asset('assets/css/icomoon.css')}} " />
		<link rel="stylesheet" href="{{asset('assets/js/formValidation/css/formValidation.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->

		<script src="{{asset('assets/js/jquery.2.1.1.min.js')}}"></script>
	    <script src="{{asset('assets/js/ace-extra.min.js')}}"></script>

	    <script src="{{asset('assets/js/formValidation/js/formValidation.min.js')}}"></script>
	    <script src="{{asset('assets/js/formValidation/js/framework/bootstrap.min.js')}}"></script>
	</head>

	<body class="login-layout">
		@yield('content')

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="{{asset('assets/js/jquery.2.1.1.min.js')}}"></script>
		<script src="{{asset('assets/js/acciones.js')}}"></script>

		<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 // $(document).on('click', '.toolbar a[data-target]', function(e) {
				// e.preventDefault();
				// var target = $(this).data('target');
				// $('.widget-box.visible').removeClass('visible');//hide others
				// $(target).addClass('visible');//show target
				// $('.widget-box.visible input')[1].focus();// focus firts input
			 // });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
	</body>
</html>
