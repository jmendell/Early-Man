$(window).on('create', function(){
	$app.init();
});

$(document).on('click', '#finalize-creation', function(){
	$app.finalize();
});

$(document).on('click', '#reset-image', function(){
	$app.resetImage();
	$app.newCard();
});