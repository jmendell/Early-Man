<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Earlyman Ecard Generator</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="index, follow">
	<meta name="GOOGLEBOT" content="index, follow" />
	<meta name="author" content="Lionsgate" />
	<meta name="copyright" content="Lionsgate" />
	<!-- for Facebook -->          
	<meta property="og:title" content="THE SHACK - Ecard Generator - Movie In Theaters March 2017" />
	<meta property="og:type" content="video.movie" />
	<meta property="og:image" content="http://www.ecard.theshack.movie/images/share-image.jpg" />
	<meta property="og:url" content="http://www.theshack.movie/" />
	<meta property="og:description" content="Based on the New York Times best-selling novel, The Shack takes us on a father’s uplifting spiritual journey. In theaters March 2017" />
	<!-- for Twitter -->          
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="THE SHACK - Ecard Generator - Movie In Theaters March 2017" />
	<meta name="twitter:site" content="http://www.ecard.theshack.movie/">
	<meta name="twitter:description" content="Based on the New York Times best-selling novel, The Shack takes us on a father’s uplifting spiritual journey. In theaters March 2017" />
	<meta name="twitter:image" content="http://www.ecard.theshack.movie/images/share-image.jpg" />
	<title>THE SHACK &#8211; Official Movie Site &#8211; In Theaters March 2017 &#8211; Based on the New York Times best-selling novel, The Shack takes us on a father’s uplifting spiritual journey. In theaters March 2017</title>
	<link rel="canonical" href="ecard.theshack.movie">
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/favicon-194x194.png" sizes="194x194">
	<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="/mstile-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<link rel="stylesheet" href="{{ elixir('css/app.css') }}">
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	 
	  ga('create', 'UA-31651-486', 'auto');
	  ga('send', 'pageview');
	  
	</script>
</head>
<body class="@yield('bodyClass')">
	<main id="main">
		<header>
			<img src="/images/logo.png" alt="title cluster" class="logo">
		</header>

		@yield('content')

	</main>
	<section id="legal" class="view">
		<div class="overlay"></div>
		<div class="escape"></div>
		<div class="content">
			<div class="row logos">
				<div>
					<img src="/images/lionsgate-logo.png" class="logo" alt="lionsgate logo">
				</div>
				<div>
					<img src="/images/summit-logo-white.png" class="logo" alt="summit logo">
				</div>
			</div>
			<div class="row">
				<img src="/images/shack-billing.png" alt="billing block">
			</div>
			<div class="row">
				<img src="/images/not-rated.png" class="rating" alt="rating">
			</div>
			<ul class="legal-links">
				<li>
					<a href="http://mpaa.org/">MPAA</a>
				</li>
				<li>
					<a href="http://filmratings.com/">Film Ratings</a>
				</li>
				<li>
					<a href="http://parentalguide.org">Parental Guide</a>
				</li>
				<li>
					<a href="http://www.lionsgate.com/corporate/privacy/">Privacy Policy</a>
				</li>
				<li>
					<a href="http://www.lionsgate.com/corporate/terms/">Terms Of Use</a>
				</li>
			</ul>
			<p class="copyright">MOTION PICTURE ARTWORK © 2016 SUMMIT ENTERTAINMENT LLC. ALL RIGHTS RESERVED.</p>
		</div>
	</section>
	<footer>
		<a href="#" id="legal-button">Legal</a>
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="/js/lib/fabric.min.js"></script>
	<script src="/js/lib/js.cookie.js"></script>
	<script src="{{ elixir('js/main.js') }}"></script>
	<script src="{{ elixir('js/application.js') }}"></script>
</body>
</html>