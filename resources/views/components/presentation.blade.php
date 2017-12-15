<section class="presentation">
	<div class="content-container">
		<div class="col-6">
			<img src="{{ $url }}" alt="ecard" class="final-card">
		</div>
		<div class="col-6">
			<div class="email-notification"></div>
			<div class="share share-email">
				<form id="email-form" action="/send" method="POST">
					<div class="flex-form-group">
						<label for="to">Send to:</label>
						<input type="email" name="to" placeholder="Email">
					</div>
					<div class="flex-form-group">
						<label for="from">From:</label>
						<input type="email" name="from" placeholder="Enter your email">
					</div>
					<fieldset>
						<label for="subscribe">I'd like to receive updates on The Shack Movie</label>
						<input type="checkbox" name="subscribe" id="subscribe">
					</fieldset>
					<input type="hidden" name="image" value="{{ $url }}">
					{{ csrf_field() }}
					<input type="submit" value="Send your Ecard">
				</form>
			</div>
			<div class="share share-download">
				<h3>Download your Card</h3>
				<a href="{{ $url }}" download="the-shack-ecard.jpg" target="_BLANK" class="cta-button">Download</a>
			</div>
			<div class="share share-social">
				<h3>Share your Card</h3>
				<ul>
					<li>
						<a id="facebook-share" href="" target="_BLANK">
							<svg viewBox="0 0 512 512"><path d="M211.9 197.4h-36.7v59.9h36.7V433.1h70.5V256.5h49.2l5.2-59.1h-54.4c0 0 0-22.1 0-33.7 0-13.9 2.8-19.5 16.3-19.5 10.9 0 38.2 0 38.2 0V82.9c0 0-40.2 0-48.8 0 -52.5 0-76.1 23.1-76.1 67.3C211.9 188.8 211.9 197.4 211.9 197.4z"/></svg><!--[if lt IE 9]><em>Facebook</em><![endif]-->
						</a>
					</li>
					<li>
						<a id="twitter-share" href="" target="_BLANK">
							<svg viewBox="0 0 512 512"><path d="M419.6 168.6c-11.7 5.2-24.2 8.7-37.4 10.2 13.4-8.1 23.8-20.8 28.6-36 -12.6 7.5-26.5 12.9-41.3 15.8 -11.9-12.6-28.8-20.6-47.5-20.6 -42 0-72.9 39.2-63.4 79.9 -54.1-2.7-102.1-28.6-134.2-68 -17 29.2-8.8 67.5 20.1 86.9 -10.7-0.3-20.7-3.3-29.5-8.1 -0.7 30.2 20.9 58.4 52.2 64.6 -9.2 2.5-19.2 3.1-29.4 1.1 8.3 25.9 32.3 44.7 60.8 45.2 -27.4 21.4-61.8 31-96.4 27 28.8 18.5 63 29.2 99.8 29.2 120.8 0 189.1-102.1 185-193.6C399.9 193.1 410.9 181.7 419.6 168.6z"/></svg><!--[if lt IE 9]><em>Twitter</em><![endif]-->
						</a>
					</li>
					<li>
						<a id="pinterest-share" href="" target="_BLANK">
							<svg viewBox="0 0 512 512"><path d="M266.6 76.5c-100.2 0-150.7 71.8-150.7 131.7 0 36.3 13.7 68.5 43.2 80.6 4.8 2 9.2 0.1 10.6-5.3 1-3.7 3.3-13 4.3-16.9 1.4-5.3 0.9-7.1-3-11.8 -8.5-10-13.9-23-13.9-41.3 0-53.3 39.9-101 103.8-101 56.6 0 87.7 34.6 87.7 80.8 0 60.8-26.9 112.1-66.8 112.1 -22.1 0-38.6-18.2-33.3-40.6 6.3-26.7 18.6-55.5 18.6-74.8 0-17.3-9.3-31.7-28.4-31.7 -22.5 0-40.7 23.3-40.7 54.6 0 19.9 6.7 33.4 6.7 33.4s-23.1 97.8-27.1 114.9c-8.1 34.1-1.2 75.9-0.6 80.1 0.3 2.5 3.6 3.1 5 1.2 2.1-2.7 28.9-35.9 38.1-69 2.6-9.4 14.8-58 14.8-58 7.3 14 28.7 26.3 51.5 26.3 67.8 0 113.8-61.8 113.8-144.5C400.1 134.7 347.1 76.5 266.6 76.5z"/></svg><!--[if lt IE 9]><em>Pinterest</em><![endif]-->
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>