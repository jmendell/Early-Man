 (function ($) {
	$.fbPost = function (element, options) {
		// **************************************************************
		// Public Properties
		// **************************************************************

		var $c = $(element), // Context 

			fbPost = (function ($c, o) {
				var defaults = {
					
				}; 

				var _o = {},
					$fbPost = null
				;

				var _InitObjects = function () {
					_o = $.extend({}, defaults, o);
				},

				_FbPost = function () {
					var token = $('input[name=_token]').val();
					var message = $('#postContent').val();
					var image = Cookies.get('meme-url');
					$.ajax({
						method: "POST",
						url: "/facebook/post",
						data: { 
							message: message,
							image: image,
							"_token": token
						}
					}).done(function( res ) {
						_HandleResponse(res);
					});
				},

				_HandleResponse = function (res) {
					if (res !== null) {
						_ShowComfirmation();
					}
				},

				_ShowLoadingAlert = function () {
					$('.loading').slideDown();
				},

				_ShowComfirmation = function () {
					$('.loading').slideUp(function(){
						$('.comfirmation').slideDown();
					});
				},

				_BindEvents = function () {
					$('#fbPostSubmit').click(function(e){
						e.preventDefault();
						_FbPost();
						_ShowLoadingAlert();
					});
				},

				init = (function() {
					_InitObjects();
					_BindEvents();
				})();
			}) ($c, options);
	};

	$.fn.fbPost = function (options) {
		return this.each(function () {
			if (undefined === $(this).data('fbPost')) {
				var plugin = new $.fbPost(this, options);
				$(this).data('fbPost', plugin);
			}
		});
	};
})(jQuery);