function initMintyStickyHeader() {
	try {
		var stickyOffset = $('.nav-main').offset().top;
		$(window).scroll(function(){
			var sticky = $('.nav-main').parent();
			var scroll = $(window).scrollTop();
			if (scroll >= stickyOffset) {
				sticky.addClass('fixed navbar');
			} else {
				sticky.removeClass('fixed navbar');
			}				
		});
	} catch (e) {
		// Ignore when in ACP
	}
}
