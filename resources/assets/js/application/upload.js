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