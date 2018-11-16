/*
 Title: Hide header on scroll down, show on scroll up
 Author: Marius Craciunoiu
 URL: https://medium.com/@mariusc23/hide-header-on-scroll-down-show-on-scroll-up-67bbaae9a78c

 Edited by: MNKY (http://themeforest.net/user/MNKY)
*/

(function($) {
"use strict;"
	
	$('body').addClass('sticky-header');

	var didScroll,
		lastScrollTop = 0,
		delta = 5,
		headerHeight = $('#navigation-wrapper').height(),
		headerOffset = $('#navigation-wrapper').offset().top,
		headerOut = headerHeight + headerOffset;

	
	$(window).scroll(function(event){
		var scrolled = $(this).scrollTop();

		if (scrolled > headerOut) {
			$('#navigation-container').addClass('header-sticky');
		} else if ( scrolled < headerOffset || scrolled == headerOffset) {
			$('#navigation-container').removeClass('header-sticky');
			$('#navigation-container').css('top', '');
		} 
		
        didScroll = true;
	});
	
	interval(function() {
		if (didScroll) {
			hasScrolled();
			didScroll = false;
		}
	}, 250);

	function interval(func, wait, times){
		var interv = function(w, t){
			return function(){
				if(typeof t === "undefined" || t-- > 0){
					setTimeout(interv, w);
					try{
						func.call(null);
					}
					catch(e){
						t = 0;
						throw e.toString();
					}
				}
			};
		}(wait, times);

		setTimeout(interv, wait);
	};

	function hasScrolled() {
		var st = $(this).scrollTop();

		// Make sure they scroll more than delta
		if(Math.abs(lastScrollTop - st) <= delta)
			return;
		
		if (st > lastScrollTop && st > headerHeight){
			// Scroll Down
			var headerHeightTop = headerHeight + 5;
			$('#navigation-container').css({ 'top' : '-' + headerHeightTop + 'px' });
		} else {
			// Scroll Up
			if(st + $(window).height() < $(document).height() && st > headerOffset) {
				$('#navigation-container').css({ 'top' : '0' });
			}
		}
		
		lastScrollTop = st;
	}
	
}(jQuery));
