<section class="presentation">
	<div class="title-container">
		<a href="/" class="home-link">
			<img src="/images/title-treatment.png" alt="title" class="title-treatment">
		</a>
	</div>
	<div class="content-container">
		<div class="col-6">
			<img src="{{ $url }}" alt="ecard" class="final-card">
		</div>
		<div class="col-6">
			<div class="email-notification"></div>
			<div class="share share-email">
				<form id="email-form" action="/send" method="POST">
					<div class="flex-form-group">
						<label for="to">SEND TO:</label>
						<input type="email" name="to" placeholder="Email">
					</div>
					<div class="flex-form-group">
						<label for="from">FROM:</label>
						<input type="email" name="from" placeholder="Enter your email">
					</div>
					<input type="hidden" name="image" value="{{ $url }}">
					{{ csrf_field() }}
					<input type="submit" value="Send your Ecard">
				</form>
			</div>
			<div class="share share-download">
				<h3>DOWNLOAD YOUR CARD</h3>
				<a href="{{ $url }}" download="the-shack-ecard.jpg" target="_BLANK" class="cta-button">DOWNLOAD</a>
			</div>
			<div class="share share-social">
				<h3>SHARE YOUR CARD</h3>
				<ul>
					<li>
						<a id="facebook-share" href="" data-link="http://earlymanecards.com/" target="_BLANK">
							<img src="/images/fb.png" alt="fb" class="fb-icon">
						</a>
					</li>
					<li>
						<a id="twitter-share" href="" target="_BLANK">
							<img src="/images/twitter.png" alt="twitter" class="twitter-icon">
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>