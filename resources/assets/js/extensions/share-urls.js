(function ($) {
	$.shareUrls = function (element, options) {

		var $c = $(element),

			shareUrls = (function ($c, o) {
				var defaults = {
					
				};

				var socialProps = {};
					socialProps.title = "The Shack";
					socialProps.description = "The Shack Movie";
					socialProps.url = "shack-meme.dev";

				var _o = {},
					$shareUrls = null
				;

				var _InitObjects = function () {
					_o = $.extend({}, defaults, o);
				},

				_FbUrl = function (){

					$.ajax({
						method: "GET",
						url: "/facebook/login"
					}).done(function( res ) {
						$('#facebook-share').attr('href', res);
					});

				},

				_TwUrl = function (url) {

					var twShareUrl = '';
						//base url
						twShareUrl += 'https://twitter.com/intent/tweet?';
						//text
						twShareUrl += 'text=';
						twShareUrl += encodeURIComponent('Check out my Ecard from #theshackmovie in theaters March 3rd');
						//home url
						twShareUrl += '&url=';
						twShareUrl += encodeURIComponent(url);

					$('#twitter-share').attr('href', twShareUrl);

				},

				_PUrl = function (url) {

					var pShareUrl = '';
						//base url
						pShareUrl += 'https://www.pinterest.com/pin/create/button/';
						//home url
						pShareUrl += '?url=';
						pShareUrl += encodeURIComponent(socialProps.url);
						//link to image
						pShareUrl += '&media=';
						pShareUrl += encodeURIComponent(url);
						//description
						pShareUrl += '&description=';
						pShareUrl += encodeURIComponent('Check out my Ecard from #theshackmovie in theaters March 3rd');

					$('#pinterest-share').attr('href', pShareUrl);

				},

				_BindEvents = function () {
					$(window).on('presentation', function (){

						var img = Cookies.get('card');

						_FbUrl();
						_TwUrl(img);
						_PUrl(img);

					});
				},

				init = (function() {
					_InitObjects();
					_BindEvents();
				})();
			}) ($c, options);
	};

	$.fn.shareUrls = function (options) {
		return this.each(function () {
			if (undefined === $(this).data('shareUrls')) {
				var plugin = new $.shareUrls(this, options);
				$(this).data('shareUrls', plugin);
			}
		});
	};
})(jQuery);