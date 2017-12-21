(function ($) {
	$.sendCard = function (element, options) {

		var $c = $(element),

			sendCard = (function ($c, o) {
				var defaults = {
					
				}; 

				var _o = {},
					$sendCard = null
				;

				var _InitObjects = function () {
					_o = $.extend({}, defaults, o);
				},

				_GetParams = function ($$) {
					var data = {};
					data.to = $$.find("input[name='to']").val();
					data.from = $$.find("input[name='from']").val();
					data.image = $$.find("input[name='image']").val();
					data.subscribe = $$.find("input[name='subscribe']").is(':checked');

					_SendData(data);
				},

				_SendData = function (data) {
					var token = $('input[name=_token]').val();
					$.ajax({
						method: "POST",
						url: "/send",
						data: { 
							'to': data.to,
							'from': data.from,
							'image': data.image,
							'subscribe': data.subscribe,
							"_token": token
						}
					}).done(function( res ) {
						_HandleResponse(res);
					});
				},

				_HandleResponse = function (res) {
					var notification = $('.email-notification');
					if (res == '1') {
						notification.html('YOUR ECARD HAS BEEN SENT. <a href="/">SEND ANOTHER?</a>');
						notification.slideDown();
					}else {
						notification.html('There was an issue sending your E-Card. Please try again.');
						notification.slideDown();
					}
				},

				_BindEvents = function () {
					$(document).on('submit', '#email-form', function(e){
						e.preventDefault();
						_GetParams($(this));
					});
				},

				init = (function() {
					_InitObjects();
					_BindEvents();
				})();
			}) ($c, options);
	};

	$.fn.sendCard = function (options) {
		return this.each(function () {
			if (undefined === $(this).data('sendCard')) {
				var plugin = new $.sendCard(this, options);
				$(this).data('sendCard', plugin);
			}
		});
	};
})(jQuery);