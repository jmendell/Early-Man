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

				_WindowResize = function () {
					jQuery(document).ready(function($){
						var backgroundHeight = '';
						function responsiveBackground(){
							backgroundHeight = $('.dynamic-content').height() + 50; 
							$('body').css('height', backgroundHeight);
						}
						responsiveBackground();
						$(window).resize(function(){
							responsiveBackground();
						});
					});
				},

				_Animations = function() {
					jQuery(document).ready(function($){
						$('.js_choose_title').addClass('animate');
					});
				},

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
						_WindowResize();
					}).fadeIn(500);
					$('.mammoth-container').animate({
						bottom: 0
					}, 1000, function() {

					});
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
(function ($) {
	$.legal = function (element, options) {

		var $c = $(element),

			legal = (function ($c, o) {
				var defaults = {
					
				}; 

				var _o = {},
					$legal = null
				;

				var _InitObjects = function () {
					_o = $.extend({}, defaults, o);
				},

				_ShowModal = function () {
					$('#legal').fadeIn();
				},

				_HideModal = function () {
					$('#legal').fadeOut();
				},

				_BindEvents = function () {
					$('#legal-button').click(function(e){
						e.preventDefault();
						_ShowModal();
					});
					$('.escape').click(function(){
						_HideModal();
					});
					$('.overlay').click(function(){
						_HideModal();
					});
					$(document).keyup(function(e) {
						if (e.keyCode === 27){
							_HideModal();
						}
					});
				},

				init = (function() {
					_InitObjects();
					_BindEvents();
				})();
			}) ($c, options);
	};

	$.fn.legal = function (options) {
		return this.each(function () {
			if (undefined === $(this).data('legal')) {
				var plugin = new $.legal(this, options);
				$(this).data('legal', plugin);
			}
		});
	};
})(jQuery);
(function ($) {
	$.bgResponsiveImage = function (element, options) {
		// **************************************************************
		// Public Properties
		// **************************************************************

		var $c = $(element), // Context 

			BgResponsiveImage = (function ($c, o) {
				var defaults = {
					'parent': 'figure',

					'activeClass': 'active',
					'breakPoint': 768,

					'speed': 500,
					'easing': 'swing'
				}; 

				var _o = {},

					$p = null, // Parent
					src = {},

					debounce = 0,
					isMobile = false
				;

				var _InitObjects = function () {
					_o = $.extend({}, defaults, o);

					$p = $c.parent(_o.parent);
					src = $c.data('src');

					_GetSizes();
				}, 

					_GetSizes = function() {
						isMobile = $(window).width() < _o.breakPoint;
					},

					_CheckImageChange = function() {
						_GetSizes();

						var nSrc = (isMobile) ? src.m : src.d,
							cSrc = $c.prop('src');
						if (cSrc.indexOf(nSrc) < 0) {
							_LoadImage(nSrc);
						}
					},

					_LoadImage = function(src) {
						var $img = $('<img />');
						$img
							.on('load', function(e) {
								$p.attr('style', 'background-image: url(\''+src+'\');');
							})
							.prop('src', src);
					},

					_OnResize = function(e) {
						clearTimeout(debounce);
						debounce = setTimeout(function() {
							clearTimeout(debounce);
							_CheckImageChange();
						}, 250);
					},

				_BindEvents = function () {
					$(window).resize(_OnResize);
				},

				init = (function() {
					_InitObjects();
					_BindEvents();
					_CheckImageChange();
				})();
			}) ($c, options);
	};

	$.fn.bgResponsiveImage = function (options) {
		return this.each(function () {
			if (undefined === $(this).data('bgResponsiveImage')) {
				var plugin = new $.bgResponsiveImage(this, options);
				$(this).data('bgResponsiveImage', plugin);
			}
		});
	};
})(jQuery);

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
						notification.html('Your E-Card has been sent. Send again?');
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
(function ($) {
	$.shareUrls = function (element, options) {

		var $c = $(element),

			shareUrls = (function ($c, o) {
				var defaults = {
					
				};

				var socialProps = {};
					socialProps.title = "Early Man";
					socialProps.description = "Early Man Movie";
					socialProps.url = "earlyman-gen.test";

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
						twShareUrl += encodeURIComponent('Check out my Ecard from the Early Man Movie');
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
$('.responsive').bgResponsiveImage();
$(document).ajaxPageLoader();
$(document).sendCard();
$(document).shareUrls();
jQuery('#fbPostForm').fbPost();
jQuery('#legal').legal();
//# sourceMappingURL=main.js.map
