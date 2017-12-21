(function ($) {
	$.ajaxPageLoader = function (element, options) {

		var $c = $(element),

			ajaxPageLoader = (function ($c, o) {
				var defaults = {
					'url' : ''
				}; 

				var _o = {},
					$ajaxPageLoader = null
				;

				var _InitObjects = function () {
					_o = $.extend({}, defaults, o);
				},

				_GetParams = function($$) {
					if ($$.hasClass('app-init')) {
						$('body').attr('data-design', $$.data('design'));
					}
					_o.url = $$.attr('href');
					_LoadContent();
				},

				_LoadContent = function() {
					$.ajax({
						method: "GET",
						url: _o.url
					}).done(function( res ) {
						_AddContent(res);
					});
				},

				// _WindowResize = function () {
				// 	jQuery(document).ready(function($){
				// 		var backgroundHeight = '';
				// 		function responsiveBackground(){
				// 			backgroundHeight = $('.dynamic-content').height() + 50; 
				// 			$('body').css('height', backgroundHeight);
				// 		}
				// 		responsiveBackground();
				// 		$(window).resize(function(){
				// 			responsiveBackground();
				// 		});
				// 	});
				// },


				_RemoveLoadingClass = function () {
					var loading = $('.dynamic-content').find('.loading');
					$(loading).slideDown();
				},


				_AddContent = function(content) {

					_TrackPageChange();
				

					$('.dynamic-content').fadeOut(500, function() {
						$(this).html(content)
						_RemoveLoadingClass();
						_BodyClass(_o.url);
						registerEvent(_o.url);
						// _WindowResize();
					}).fadeIn(500);
				},

				_TrackPageChange = function () {
					ga('set', 'page', _o.url);
				},

				_BodyClass = function (className) {
					$('body').attr('class', '');
					$('body').addClass(className);
				},

				_BindEvents = function () {
					$(document).on('click', '.ajax-load', function(e) {
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

	$.fn.ajaxPageLoader = function (options) {
		return this.each(function () {
			if (undefined === $(this).data('ajaxPageLoader')) {
				var plugin = new $.ajaxPageLoader(this, options);
				$(this).data('ajaxPageLoader', plugin);
			}
		});
	};
})(jQuery);