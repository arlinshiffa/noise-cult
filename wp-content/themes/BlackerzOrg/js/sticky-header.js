jQuery(document).ready(function($) {
	"use strict"; 
	
	$('body').addClass('sticky-header');

	// Sticky header
	$(window).scroll(function() {
		var scrolled = $(this).scrollTop(),
		headerHeight = $('#navigation-wrapper').height(),
		headerOffset = $('#navigation-wrapper').offset().top;
		
		if(scrolled > headerOffset) {
			$('#navigation-container').css({ 'position' : 'fixed', 'top' : '0px' });
			$('.admin-bar #navigation-container').css({ 'position' : 'fixed', 'top' : '32px'});
			
		} else {
			$('#navigation-container').css({ 'position' : 'static', 'top' : 'auto' });
		}
		
	});
	
	
	// Trigger scroll
	setTimeout( function(){ 
		$(window).scroll();
	}, 500 );
	
});