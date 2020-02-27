;(function($,document,window){
	$(document).ready(function($){
		/* Add scroll recognition class */
		$(window).scroll(function () {
			var scroll = $(this).scrollTop();
			if ($(this).scrollTop() > 160) {
				$('body').addClass('header_scrolled');
			} else {
				$('body').removeClass('header_scrolled');
			}
		});
	});
	})(jQuery,document,window);