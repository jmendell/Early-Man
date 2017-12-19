<section class="create">
	<div class="row">
		<a href="/choose" class="ajax-load" id="reset-image">
			<figure class="back-bg" style="background-image:url('/images/back-btn.png');">
				<span class="go-back">Back</span>
			</figure>
		</a>
		<div class="col-6">
			<canvas id="c"></canvas>
		</div>
		<div class="col-6">
			<div class="form-wrap">
				<div class="field-group">
					<h3>Enter your message</h3>
					<textarea id="content-input" rv-text="content">Merry Christmas,
You're the best!

Love,
Me</textarea>
				<p class="counter">Characters Remaining: <span id="charCount">150</span></p>
				</div>
				<input type="submit" id="finalize-creation" value="See Your Card">
				{{ csrf_field() }}
			</div>
			<div class="progress-section">
				<h4>Generating your Ecard</h4>
				<div class="progress">
					<div class="progress-inner"></div>
				</div>
			</div>
		</div>
	</div>
</section>