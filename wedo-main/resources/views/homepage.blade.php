<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Wedo &mdash; Wedding Organizer Kabupaten Bireuen</title>
	<link rel="icon" type="image/x-icon" href="{{url('favicon.png')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{url('homepage')}}/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{url('homepage')}}/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{url('homepage')}}/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{url('homepage')}}/css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{url('homepage')}}/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{{url('homepage')}}/css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{url('homepage')}}/css/style.css">

	<!-- Modernizr JS -->
	<script src="{{url('homepage')}}/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
					<div id="fh5co-logo"><a href="{{url('')}}">Wedo<strong>.</strong></a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li class="{{$page == 'Home'?'active':''}}"><a href="{{url('')}}">Beranda</a></li>
						<li class="{{$page == 'Store'?'active':''}}"><a href="{{url('stores')}}">Wedding Organizer</a></li>
						{{-- <li class="has-dropdown">
							<a href="services.html">Services</a>
							<ul class="dropdown">
								<li><a href="#">Web Design</a></li>
								<li><a href="#">eCommerce</a></li>
								<li><a href="#">Branding</a></li>
								<li><a href="#">API</a></li>
							</ul>
						</li> --}}
						{{-- <li class="has-dropdown">
							<a href="gallery.html">Gallery</a>
							<ul class="dropdown">
								<li><a href="#">HTML5</a></li>
								<li><a href="#">CSS3</a></li>
								<li><a href="#">Sass</a></li>
								<li><a href="#">jQuery</a></li>
							</ul>
						</li> --}}
						<li><a href="{{url('login')}}">Login</a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url({{url('homepage')}}/images/img_bg_4.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Wedding Organizer</h1>
							<h2>Kabupaten Bireuen dan Sekitarnya</h2>
							{{-- <div class="simply-countdown simply-countdown-one"></div> --}}
							<p><a href="#" class="btn btn-default btn-sm">Ayo Kenal Lebih Dekat</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-couple">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<h2>Halo Warga Bireuen!</h2>
					<h3>Perkenalkan, Kami Wedo.</h3>
					<p>Platform E-Commerse Wedding Organizer Kabupaten Bireuen.</p>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-gallery" class="fh5co-section-gray">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<span>Produk Kita</span>
					<h2>Wedding Organizer</h2>
					<p>Nikmati penawaran istimewa dari Wedding Organizer kami! Dapatkan kualitas terbaik dengan harga terjangkau.</p>
				</div>
			</div>
			<div class="row row-bottom-padded-md">
				<div class="col-md-12">
					<ul id="fh5co-gallery-list">
						
						@foreach ($store as $data)
						<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{url('storage')}}/{{$data->foto}}); "> 
							<a href="{{url('store/product?str='.$data->id)}}">
								<div class="case-studies-summary">
									<h2>{{$data->nama}}</h2>
									<span>{{$data->alamat}}</span>
								</div>
							</a>
						</li>
						@endforeach
						
					</ul>		
				</div>
			</div>
		</div>
	</div>


	

	<div id="fh5co-testimonial">
		<div class="container">
			<div class="row">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<span>Testimoni</span>
						<h2>Apa Kata Mereka?</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="wrap-testimony">
							<div class="owl-carousel-fullwidth">
								<div class="item">
									<div class="testimony-slide active text-center">
										<figure>
											<img src="{{url('homepage')}}/images/couple-1.jpg" alt="user">
										</figure>
										<span>Ahmad Syauqi, via <a href="#" class="twitter">Twitter</a></span>
										<blockquote>
											<p>"Wedding organizer ini luar biasa! Mereka mengambil semua stres perencanaan dari pundak kami dan menjadikan pernikahan kami sempurna. Terima kasih atas layanan yang luar biasa!"</p>
										</blockquote>
									</div>
								</div>
								<div class="item">
									<div class="testimony-slide active text-center">
										<figure>
											<img src="{{url('homepage')}}/images/couple-2.jpg" alt="user">
										</figure>
										<span>Muhammad Reza, via <a href="#" class="twitter">Twitter</a></span>
										<blockquote>
											<p>"Aplikasi Wedo ini luar biasa! Mengelola perencanaan pernikahan saya menjadi lebih mudah dan menyenangkan. Saya tak bisa membayangkan merencanakan pernikahan tanpanya. Sungguh membantu dan sangat direkomendasikan!"</p>
										</blockquote>
									</div>
								</div>
								<div class="item">
									<div class="testimony-slide active text-center">
										<figure>
											<img src="{{url('homepage')}}/images/couple-3.jpg" alt="user">
										</figure>
										<span>Oki Rengga, via <a href="#" class="twitter">Twitter</a></span>
										<blockquote>
											<p>"Aplikasi wedding organizer ini sungguh luar biasa! Membantu saya mengatur setiap detail secara mulus, dari persiapan hingga hari besar. Terima kasih telah membuat perencanaan pernikahan kami begitu lancar dan tak terlupakan!"</p>
										</blockquote>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div id="fh5co-started" class="fh5co-bg" style="background-image:url({{url('homepage')}}/images/img_bg_4.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Tertarik dengan Wedo?</h2>
					<p>Daftarkan akun dan login sekarang juga!</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-10 col-md-offset-1">
					<a href="{{url('registration')}}" class="btn btn-default btn-block">Mulai daftar</a>
				</div>
			</div>
		</div>
	</div>

	<footer id="fh5co-footer" role="contentinfo">
		<div class="container">

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; {{date('Y')}} Wedo. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="{{url('')}}" target="_blank">Wedo</a></small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="{{url('homepage')}}/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="{{url('homepage')}}/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="{{url('homepage')}}/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="{{url('homepage')}}/js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="{{url('homepage')}}/js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="{{url('homepage')}}/js/jquery.countTo.js"></script>

	<!-- Stellar -->
	<script src="{{url('homepage')}}/js/jquery.stellar.min.js"></script>
	<!-- Magnific Popup -->
	<script src="{{url('homepage')}}/js/jquery.magnific-popup.min.js"></script>
	<script src="{{url('homepage')}}/js/magnific-popup-options.js"></script>

	<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script> -->
	<script src="{{url('homepage')}}/js/simplyCountdown.js"></script>
	<!-- Main -->
	<script src="{{url('homepage')}}/js/main.js"></script>

	<script>
    var d = new Date(new Date().getTime() + 200 * 120 * 120 * 2000);

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });
</script>

	</body>
</html>

