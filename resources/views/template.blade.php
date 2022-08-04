
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>R💕M💕 &mdash; @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Romaindo Miracle, site web personnel" />
	<meta name="keywords" content="citations, Romaindo Miracle, musique, vidéos, gymnastique, Bénin" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="author" content="Romaindo Miracle" />

  	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	-->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
		<style>
			.notification{
				position: fixed;
				right:10px;
				 top:10px;
				 background:#48c78e;
				 height: 50px;
				 line-height: 50px;
				 color: #fffffb;
				 border-radius: 5px;
				 z-index:999999;
				 padding-left: 15px;
				 padding-right: 15px;
				 display: none;
			}
			.notification.error{
				background:#f14668;
				color: #fffffb;
			}
			.notification.wait{
				background: #485fc7;
			}
		</style>
	</head>
	<body>
	<?php
		$user = \App\Models\User::find(1)->first();
	?>
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="border js-fullheight">

			<h1 id="fh5co-logo"><a href="{{route('home')}}">R💕 M💕</a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<li class="{{URL::current() == route('home')?"fh5co-active":""}}"><a href="{{route('home')}}">Accueil</a></li>
					<li class="{{URL::current() == route('citations')?"fh5co-active":""}}"><a href="{{route('citations')}}">Citations</a></li>
					<li class="{{URL::current() == route('musiques')?"fh5co-active":""}}"><a href="{{route('musiques')}}">Musiques</a></li>
					<li class="{{URL::current() == route('videos')?"fh5co-active":""}}"><a href="{{route('videos')}}">Clips Vidéos</a></li>
					<!--<li class="{{URL::current() == route('patner')?"fh5co-active":""}}"><a href="{{route('patner')}}">Partenaires</a></li>-->
					<li class="{{URL::current() == route('contact')?"fh5co-active":""}}"><a href="{{route('contact')}}">Contacter</a></li>
				</ul>
			</nav>

			<div class="fh5co-footer">
				<p><small>&copy; 2022 All Rights Reserved.</span></p>
				<ul>
					<li><a href="{{$user->facebook}}"><i class="icon-facebook2"></i></a></li>
					<li><a href="{{$user->twitter}}"><i class="icon-twitter2"></i></a></li>
					<li><a href="{{$user->instagram}}"><i class="icon-instagram"></i></a></li>
				</ul>
			</div>

		</aside>
    @yield('main')
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="js/jquery.flexslider-min.js"></script>


<!-- MAIN JS -->
<script src="js/main.js"></script>

</body>
</html>
