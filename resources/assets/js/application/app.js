$app = {};

$app.init = function () {
	$app.canvas = new fabric.Canvas('c', { preserveObjectStacking: true }),
	$app.degree = 0,
	$app.height = 0,
	$app.width = 0,
	$app.canvasHeight = 900,
	$app.canvasWidth = 900,
	$app.topOffset = 238,
	$app.maxChars = 50,
	$app.design = $('body').data('design'),
	$app.text = new fabric.Textbox('', {
		fontSize: 36,
		fontFamily:"EarlyMan-Regular"
	});
	$app.card = executeFunctionByName('cards.card' + $app.design, $app);
	$app.placeholder = $('#content-input').val(),
	$app.canvas.add($app.text);
	$app.text.setText($app.placeholder);
	$app.canvas.bringToFront($app.text);
	$app.canvas.setHeight($app.canvasHeight);
	$app.canvas.setWidth($app.canvasWidth);

	$app.drawBase();
	$app.bindInput();

	$app.canvas.renderAll();
}

$app.drawBase = function () {

	fabric.Image.fromURL($app.baseUrl, function(oImg) {
		oImg.set({
			left:0,
			bottom:0,
			width:$app.canvasWidth,
			height:$app.canvasHeight,
			selectable:false,
			evented:false
		});

		$app.cardImage = oImg;

		$app.canvas.sendToBack(oImg);
	});
}

$app.bindInput = function () {
	$('#content-input').on('keyup touchend', function(){
		if (containsProfanity($(this).val())) {
			$app.updateText('Innapropriate language');
		}else{
			$app.updateText($(this).val());
			$app.updateCounter();
		}
	});
}

$app.updateText = function (val) {
	$app.text.setText(val);
	$app.canvas.renderAll();
}

$app.resetImage = function () {
	setTimeout(function(){
		$app.canvas.remove($app.cardImage);
	}, 400);
}

$app.newCard = function () {
	$(document).on('click', '.card-item', function(){

		var design = $(this).data('design');
		$('body').data('design', design);

		$app.design = design;
		$app.card = executeFunctionByName('cards.card' + $app.design, $app);
		$app.drawBase();
		$app.canvas.renderAll();
		
	});
}

$app.updateCounter = function () {
	var remainingChars = $app.maxChars - $app.text.text.length;
	$('#charCount').text(remainingChars);

	if (remainingChars <= 0) {
		$('#charCount').addClass('warn');
		$('#finalize-creation').attr('disabled', 'true');
	}else{
		$('#charCount').removeClass('warn');
		$('#finalize-creation').removeAttr('disabled');
	}
}

$app.centerText = function () {
	var canvasRemainder = $app.canvasHeight - $app.topOffset;
	var top = $app.topOffset + (canvasRemainder / 2) - ($app.text.height / 2);
	var left = ($app.canvasWidth / 2) - ($app.text.width / 2);
	$app.text.setTop(top);
	$app.text.setLeft(left);
	$app.canvas.renderAll();
}

$app.saveImage = function () {
	var imgData = $app.canvas.toDataURL({format:'jpeg', quality:0.8});
	return imgData;
}

$app.loadingCues = function () {
	$('.progress-section').slideDown();
	$('#finalize-creation').attr('disabled', 'true');
	setTimeout(function(){
		setProgress(40);
	}, 400);
}

$app.finalize = function () {

	var img = $app.saveImage();

	$app.loadingCues();

	$app.uploadImage(img, function (res){
		preloadImage(Cookies.get('card'), function(){
			setProgress(100);
			$app.presentation(res);
		})
	});

}

$app.presentation = function (res) {
	
	ga('set', 'page', 'presentation');

	$('.dynamic-content').fadeOut(500, function() {
		$(this).html(res);
		registerEvent('presentation');
		$('body').attr('class', '');
		$('body').addClass('presentation');
	}).fadeIn(500);
}
