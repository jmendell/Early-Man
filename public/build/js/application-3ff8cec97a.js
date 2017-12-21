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
	var imgData = $app.canvas.toDataURL({format:'jpeg', quality:0.9});
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
$app.cards = {};

$app.cards = {
	card1 : function () {
		$app.baseUrl = "/images/cards/card-1.jpg";
		$app.text.width = 800;
		$app.text.top = 400;
		$app.text.left = 50;
		$app.text.fill = "#000";
		$app.text.textAlign = "left";
	},
	card2 : function () {
		$app.baseUrl = "/images/cards/card-2.jpg";
		$app.text.width = 800;
		$app.text.top = 50;
		$app.text.left = 25;
		$app.text.fill = "#0D2842";
		$app.text.textAlign = "left";
	},
	card3 : function () {
		$app.baseUrl = "/images/cards/card-3.jpg";
		$app.text.width = 800;
		$app.text.top = 725;
		$app.text.left = 500;
		$app.text.fill = "#000";
		$app.text.textAlign = "left";
	},
	card4 : function () {
		$app.baseUrl = "/images/cards/card-4.jpg";
		$app.text.width = 800;
		$app.text.top = 650;
		$app.text.left = 50;
		$app.text.fill = "#fff";
		$app.text.textAlign = "right";
	},
	card5 : function () {
		$app.baseUrl = "/images/cards/card-5.jpg";
		$app.text.width = 800;
		$app.text.top = 650;
		$app.text.left = 50;
		$app.text.fill = "#fff";
		$app.text.textAlign = "left";
	},
	card6 : function () {
		$app.baseUrl = "/images/cards/card-6.jpg";
		$app.text.width = 800;
		$app.text.top = 600;
		$app.text.left = 500;
		$app.text.fill = "#fff";
		$app.text.textAlign = "left";
	},
	card7 : function () {
		$app.baseUrl = "/images/cards/card-7.jpg";
		$app.text.width = 800
		$app.text.top = 650;
		$app.text.left = 50;
		$app.text.fill = "#fff";
		$app.text.textAlign = "left";
	},
	card8 : function () {
		$app.baseUrl = "/images/cards/card-8.jpg";
		$app.text.width = 800;
		$app.text.top = 50;
		$app.text.left = 50;
		$app.text.fill = "#0D2842";
		$app.text.textAlign = "left";
	},
	card9 : function () {
		$app.baseUrl = "/images/cards/card-9.jpg";
		$app.text.width = 800;
		$app.text.top = 700;
		$app.text.left = 50;
		$app.text.fill = "#fff";
		$app.text.textAlign = "left";
	},
	card10 : function () {
		$app.baseUrl = "/images/cards/card-10.jpg";
		$app.text.width = 800;
		$app.text.top = 350;
		$app.text.left = 85;
		$app.text.fill = "#fff";
		$app.text.textAlign = "center";
	},
	card11 : function () {
		$app.baseUrl = "/images/cards/card-11.jpg";
		$app.text.width = 800;
		$app.text.top = 700;
		$app.text.left = 150;
		$app.text.fill = "#000";
		$app.text.textAlign = "center";
	},
	card12 : function () {
		$app.baseUrl = "/images/cards/card-12.jpg";
		$app.text.width = 800;
		$app.text.top = 25;
		$app.text.left = 25;
		$app.text.fill = "#fff";
		$app.text.textAlign = "left";
	}
}
$app.uploadImage = function (data, callback) {
	var token = $('input[name=_token]').val();
	$.ajax({
		method: "POST",
		url: "/presentation",
		data: { 
			data: data,
			"_token": token
		}
	}).done(function( res ) {
		callback(res);
		setProgress(90);
	});
};
function registerEvent(event) {
    var evt = new CustomEvent(event);

    window.dispatchEvent(evt);
}

function preloadImage (url, callback) {
	var img = new Image();
	img.src = url;

	img.onload = function() {
		callback();
	}
}

function executeFunctionByName(functionName, context) {
  var args = [].slice.call(arguments).splice(2);
  var namespaces = functionName.split(".");
  var func = namespaces.pop();
  for(var i = 0; i < namespaces.length; i++) {
    context = context[namespaces[i]];
  }
  return context[func].apply(context, args);
}

function registerEvent(event) {
    var evt = new CustomEvent(event);

    window.dispatchEvent(evt);
}

function setProgress (percent) {
  var value = percent + '%';
  $('.progress-inner').css('width', value);
}
String.prototype.contains = function(str) { return this.indexOf(str) != -1; };

var containsProfanity = function(text){
    var returnVal = false; 
    for (var i = 0; i < profanities.length; i++) {
        if(text.toLowerCase().contains(profanities[i].toLowerCase())){
            returnVal = true;
            break;
        }
    }
    return returnVal;
}
var profanities = new Array(
    'fuck',
    'cock',
    'pussy',
    'dick',
    'shit',
    'cunt',
    'penis',
    'vagina',
    'nigger'
);
//# sourceMappingURL=application.js.map
