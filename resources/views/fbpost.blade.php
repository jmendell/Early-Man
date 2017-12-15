@extends('layouts.app')
@section('bodyClass', 'home')

@section('content')
	<div class="background-container">
		<figure class="background">
			<img src="/images/loader.png" class="responsive"
			alt="" data-src='{"m":"/images/bg.jpg","d":"/images/bg.jpg"}'
			/>
			<img src="/images/loader.png" alt="background">
		</figure>
	</div>
	<div class="fb-post">
		<div class="content-container">
			<h2>Thank You {{ $user['user']['name'] }}, Post to facebook now!</h2>
			<div class="post">
				<div class="row">
					<div class="col-4">
						<img src="{{ $user['card'] }}" class="post-image" alt="">
					</div>
					<div class="col-8">
						<div class="post-header">
							<img src="{{ $user['image'] }}" class="fb-image" alt="">
							<p>Say something about your Holiday Card</p>
						</div>
						<form action="/facebook/post" id="fbPostForm">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<textarea name="message" id="postContent"></textarea>
							<input type="submit" value="Post" id="fbPostSubmit">
						</form>
					</div>
				</div>
				<div class="alert loading">
					<h3>Posting Now...</h3>
				</div>
				<div class="alert comfirmation">
					<h3>Post successful!</h3>
					<a href="/" class="cta-button">Make Another</a>
				</div>
			</div>
		</div>
	</div>
@stop