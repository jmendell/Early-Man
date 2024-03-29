<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Early Man Ecard Generator</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="index, follow">
	<meta name="GOOGLEBOT" content="index, follow" />
	<meta name="author" content="Lionsgate" />
	<meta name="copyright" content="Lionsgate" />
	<!-- for Facebook -->          
	<meta property="og:title" content="Early Man - Ecard Generator" />
	<meta property="og:type" content="video.movie" />
	<meta property="og:image" content="http://earlymanecards.com/images/earlyman-share-graphic.jpg" />
	<meta property="fb:app_id" content="2065661193664389"/>
	<meta property="og:url" content="http://earlymanecards.com/" />
	<meta property="og:description" content="Early Man - Ecard Generator. Send a holiday card from the stone age" />
	<!-- for Twitter -->          
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="Early Man - Ecard Generator" />
	<meta name="twitter:site" content="http://earlymanecards.com/">
	<meta name="twitter:description" content="Early Man Ecard Generator. Send a holiday card from the stone age." />
	<meta name="twitter:image" content="http://earlymanecards.com/images/share-image.jpg" />
	<link rel="icon" href="images/earlyman_fav_icon.png" type="image/x-icon" />
	<title>Early Man - Ecard Generator</title>
	<link rel="canonical" href="">
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="/mstile-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<link rel="stylesheet" href="{{ elixir('css/app.css') }}">
<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-31651-526"></script>
	<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-31651-526');
	</script>
</head>
<body class="@yield('bodyClass')" style="background-image:url('/images/earlyman-bg.jpg');">
<!-- FB SDK -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '2065661193664389',
      xfbml      : true,
      version    : 'v2.11'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

	<main id="main">

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
			</div>
			<div class="row">
				<img src="/images/not-rated.png" class="rating" alt="rating">
			</div>
			<div class="row legal-row">
				<a href="http://www.aardman.com/" target="_BLANK" class="logo-link">
					<img src="/images/aardman-logo.png" alt="logo" class="legal-logo">
				</a>
				<a href="http://www.bfi.org.uk/" target="_BLANK" class="logo-link">
					<img src="/images/fflf-logo.png" alt="logo" class="legal-logo">
				</a>
				<a href="http://www.studiocanal.co.uk/" target="_BLANK" class="logo-link">
					<img src="/images/studiocanal-logo.png" alt="logo" class="legal-logo studiocanal-logo">
				</a>
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
		</div>
	</section>
	<footer>
		<div class="footer-container">
			<a href="#" id="legal-button">Legal</a>
			<img src="/images/characters.png" alt="" class="character-cluster">
		</div>
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="/js/lib/fabric.min.js"></script>
	<script src="/js/lib/js.cookie.js"></script>
	<script src="{{ elixir('js/main.js') }}"></script>
	<script src="{{ elixir('js/application.js') }}"></script>
	<!-- Animation add class script -->
	<script>
			jQuery(document).ready(function($){
				$('.title-content').addClass('animate');
				$('.cards').addClass('animate');
				$('.tagline').addClass('animate');
				$('.get-started').addClass('animate');
				$('footer').addClass('animate');

				jQuery( document ).on( 'click', '#facebook_share', function() {
					var link = jQuery(this).data('link');
						FB.ui({
						method: 'share',
						display: 'popup',
						href: link,
					}, function(response){});
				});
			});
	</script>
</body>
</html>