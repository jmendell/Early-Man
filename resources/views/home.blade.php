@extends('layouts.app')
@section('bodyClass', 'home')

@section('content')
	<div class="background-container">
		<figure class="background">
			<img src="/images/loader.png" class="responsive"
			alt="" data-src='{"m":"/images/bg-mobile.jpg","d":"/images/bg.jpg"}'
			/>
			<img src="/images/loader.png" alt="background">
		</figure>
	</div>
	<div class="dynamic-content">
		<section class="home">
			<div class="content-container">
				<div class="col center">
					<img src="/images/intro-cluster.png" class="intro" alt="">
					<a href="choose" class="cta-button ajax-load">Get Started</a>
				</div>
				<div class="col center">
					<img src="/images/cards-fanned.png" alt="">
				</div>
			</div>
		</section>
	</div>
@stop