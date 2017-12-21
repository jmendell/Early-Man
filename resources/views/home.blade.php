@extends('layouts.app')
@section('bodyClass', 'home')

@section('content')
	<div class="background-container">
		<!-- <figure class="background">
			<img src="/images/loader.png" class="responsive"
			alt="" data-src='{"m":"/images/earlyman-bg-mobile.png","d":"/images/earlyman-bg.png"}'
			/>
			<img src="/images/loader.png" alt="background">
		</figure> -->
	</div>
	<div class="dynamic-content">
		<section class="home">
			<div class="content-container">
				<div class="title-content">
					<div class="title">
						<img src="/images/title-treatment.png" alt="logo" class="logo">
					</div>
				</div>
				<div class="content">
					<img src="/images/cards.png" alt="cards" class="cards">
					<p class="tagline uppercase">SEND A HOLIDAY CARD FROM THE STONE AGE</p>
					<a href="choose" class="home-button-link ajax-load">
						<figure class="get-started" style="background-image:url('/images/btn-option-1.png');">
							<span class="home-btn-text">GET STARTED</span>
						</figure>
					</a>
				</div>
			</div>
		</section>
	</div>
@stop