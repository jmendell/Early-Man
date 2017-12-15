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