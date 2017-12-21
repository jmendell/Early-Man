<section class="create">
	<img src="/images/lord-nooth.png" alt="lord-nooth" class="lord-nooth">
	<div class="row">
		<a href="choose" class="ajax-load" id="reset-image">
			<figure class="back-bg" style="background-image:url('/images/back-btn.png');">
				<span class="go-back">BACK</span>
			</figure>
		</a>
		<div class="col-6 center-text">
			<span>CLICK & DRAG WHERE YOU WANT YOUR TEXT</span>
			<canvas id="c"></canvas>
			<div class="form-wrap desktop-size">
				<div class="field-group">
					<h3>ENTER YOUR MESSAGE</h3>
					<span class="character-amount">(Limit 50 characters)</span>
					<textarea id="content-input" rv-text="content">To: You
From: Me</textarea>
				<p class="counter">CHARACTERS REMAINING: <span id="charCount">50</span></p>
				</div>
				<input type="submit" id="finalize-creation" value="See Your Card">
				{{ csrf_field() }}
			</div>
			<div class="progress-section">
				<h4>GENERATING YOUR ECARD!</h4>
				<div class="progress">
					<div class="progress-inner"></div>
				</div>
			</div>
		</div>
	</div>
</section>