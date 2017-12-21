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
	<meta property="og:image" content="/images/share-image.jpg" />
	<meta property="og:url" content="http://earlymanecards.com/" />
	<meta property="og:description" content="Early Man - Ecard Generator. Send a holiday card from the stone age" />
	<!-- for Twitter -->          
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="Early Man - Ecard Generator" />
	<meta name="twitter:site" content="http://earlymanecards.com/">
	<meta name="twitter:description" content="Early Man Ecard Generator. Send a holiday card from the stone age." />
	<meta name="twitter:image" content="" />
	<link rel="icon" href="images/earlyman_fav_icon.png" type="image/x-icon" />
	<title>Early Man - Ecard Generator</title>
	<link rel="canonical" href="">
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

<?php 
	// Generate a login URL
	Route::get('/facebook/login', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb)
	{
	    // Send an array of permissions to request
	    $login_url = $fb->getLoginUrl(['email']);

	    // Obviously you'd do this in blade :)
	    echo '<a href="' . $login_url . '">Login with Facebook</a>';
	});

	// Endpoint that is redirected to after an authentication attempt
	Route::get('/facebook/callback', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb)
	{
	    // Obtain an access token.
	    try {
	        $token = $fb->getAccessTokenFromRedirect();
	    } catch (Facebook\Exceptions\FacebookSDKException $e) {
	        dd($e->getMessage());
	    }

	    // Access token will be null if the user denied the request
	    // or if someone just hit this URL outside of the OAuth flow.
	    if (! $token) {
	        // Get the redirect helper
	        $helper = $fb->getRedirectLoginHelper();

	        if (! $helper->getError()) {
	            abort(403, 'Unauthorized action.');
	        }

	        // User denied the request
	        dd(
	            $helper->getError(),
	            $helper->getErrorCode(),
	            $helper->getErrorReason(),
	            $helper->getErrorDescription()
	        );
	    }

	    if (! $token->isLongLived()) {
	        // OAuth 2.0 client handler
	        $oauth_client = $fb->getOAuth2Client();

	        // Extend the access token.
	        try {
	            $token = $oauth_client->getLongLivedAccessToken($token);
	        } catch (Facebook\Exceptions\FacebookSDKException $e) {
	            dd($e->getMessage());
	        }
	    }

	    $fb->setDefaultAccessToken($token);

	    // Save for later
	    Session::put('fb_user_access_token', (string) $token);

	    // Get basic info on the user from Facebook.
	    try {
	        $response = $fb->get('/me?fields=id,name,email');
	    } catch (Facebook\Exceptions\FacebookSDKException $e) {
	        dd($e->getMessage());
	    }

	    // Convert the response to a `Facebook/GraphNodes/GraphUser` collection
	    $facebook_user = $response->getGraphUser();

	    // Create the user if it does not exist or update the existing entry.
	    // This will only work if you've added the SyncableGraphNodeTrait to your User model.
	    $user = App\User::createOrUpdateGraphNode($facebook_user);

	    // Log the user into Laravel
	    Auth::login($user);

	    return redirect('/')->with('message', 'Successfully logged in with Facebook');
	});

	Route::get('/facebook/login', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
    $login_link = $fb
            ->getRedirectLoginHelper()
            ->getLoginUrl('https://exmaple.com/facebook/callback', ['email', 'user_events']);
    
    echo '<a href="' . $login_link . '">Log in with Facebook</a>'; });

    $login_link = $fb->getLoginUrl();

    $login_link = $fb->getLoginUrl(['email', 'user_status'], 'http://earlymanecards.com/facebook/callback');
	// Or, if you want to default to the callback URL set in the config
	$login_link = $fb->getLoginUrl(['email', 'user_status']);

	Route::get('/facebook/callback', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
		try {
		    $token = $fb
		        ->getRedirectLoginHelper()
		        ->getAccessToken();
		} catch (Facebook\Exceptions\FacebookSDKException $e) {
		    // Failed to obtain access token
		    dd($e->getMessage());
		}
	});

	Route::get('/facebook/callback', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
	    try {
	        $token = $fb->getAccessTokenFromRedirect();
	    } catch (Facebook\Exceptions\FacebookSDKException $e) {
	        // Failed to obtain access token
	        dd($e->getMessage());
	    }
	    
	    // $token will be null if the user denied the request
	    if (! $token) {
	        // User denied the request
	    }
	});
?>

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
			});
		</script>
</body>
</html>