3<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SammyK;
use Session;
use Cookie;

class SocialAuthController extends Controller
{
	public function fbLoginUrl(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
	
		$login_link = $fb
				->getRedirectLoginHelper()
				->getLoginUrl(env('FACEBOOK_REDIRECT'), ['email', 'user_events', 'publish_actions']);

		return $login_link;
		
	}

	public function fbLoginCallback(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
	
		try {

			$token = $fb
				->getRedirectLoginHelper()
				->getAccessToken();
			Session::put('fb_access_token', (string) $token);

			return redirect('/facebook/post-preview');

		} catch (Facebook\Exceptions\FacebookSDKException $e) {
			// Failed to obtain access token
			dd($e->getMessage());
		}
		
	}

	public function fbPostPreview (SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
	
		$token = Session::get('fb_access_token');
		$fb->setDefaultAccessToken($token);

		try {
			$imageResponse = $fb->get('/me/picture?redirect=false&height=300');
			$userResponse = $fb->get('/me?fields=name');
		} catch(\Facebook\Exceptions\FacebookSDKException $e) {
			dd($e->getMessage());
		}

		$user = $userResponse->getGraphUser();
		$userImage = $imageResponse->getGraphUser();
		$card = $_COOKIE['card'];

		$user = array(
			'user'  => $user,
			'image' => $userImage['url'],
			'card'  => $card
		);
		
		return view('fbpost', compact('user'));
	
	}

	public function fbPost (Request $request, SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {

		$token = Session::get('fb_access_token');
		$image = $_COOKIE['card'];

		$data = [
			'message' => $request->message,
			'url' => $image
		];

		try {
			$response = $fb->post('/me/photos', $data, $token);
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			echo 'Error: ' . $e->getMessage();
			exit;
		}

		$graphNode = $response->getGraphNode();

		return $graphNode['id'];

	}
}
