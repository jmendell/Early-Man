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