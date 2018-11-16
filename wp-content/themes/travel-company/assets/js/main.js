  /*=======================================
[Start Activation Code]
=========================================
	01. Mobile Menu JS
	02. Nice Select JS
	03. Circle Progress JS
	04. Trips Slider JS
	05. Testimonial Slider JS
	06. Testimonial Slider Two JS
	07. Client Carousel JS
	08. Home Slider JS
	09. Counter JS
	10. Youtube Player JS
	11. Trip Single Slider JS
	12. Wow JS
	13. Parallax JS
	14. Video Popup JS
	15. Date Picker JS
	16. Scroll UP JS
	17. Others JS
=========================================
[End Activation Code]
=========================================*/ 
(function($) {
    "use strict";
     $(document).on('ready', function() {	
		
		/*====================================
		01. Mobile Menu
		======================================*/ 	
		$('.menu').slicknav({
			prependTo:".mobile-nav",
			duration: 600,
			closeOnClick:true,
		});

		/*====================================
		02.	Nice Select
		======================================*/ 	
		$('.trip-search select').niceSelect();
		
		/*====================================
		03.	Circle Progress
		======================================*/ 	
		$('.circle').circleProgress({
			fill: {
			color: '#FF7550'
			}
		})
		
		/*===============================
		04. Trips Slider
		=================================*/ 
		$(".trips-slider").owlCarousel({
			loop:true,
			autoplay:true,
			smartSpeed: 500,
			autoplayTimeout:3500,
			singleItem: true,
			autoplayHoverPause:true,
			margin:30,
			dots:false,
			nav:true,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			responsive:{
				300: {
					items:1,
				},
				480: {
					items:2,
				},
				768: {
					items:2,
				},
				1170: {
					items:3,
				},
			}
		});		
		
		/*===============================
		05.	Testimonial Slider JS
		=================================*/ 
		$(".testimonial-slider").owlCarousel({
			loop:true,
			autoplay:true,
			smartSpeed: 500,
			autoplayTimeout:3500,
			singleItem: true,
			autoplayHoverPause:true,
			items:1,
			nav:true,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			dots:false,
		});	
 
		/*===============================
		06.	Testimonial Slider Two
		=================================*/ 
		$(".testimonial-slider-two").owlCarousel({
			loop:true,
			autoplay:false,
			smartSpeed: 500,
			autoplayTimeout:3500,
			singleItem: true,
			autoplayHoverPause:true,
			center:false,
			nav:false,
			margin:30,
			responsive:{
				300: {
					items:1,
				},
				480: {
					items:1,
				},
				768: {
					items:2,
				},
				1170: {
					items:2,
				},
			}
		});	
		
		/*===============================
		07.	Clients Carousel JS
		=================================*/ 
		$(".clients-slider").owlCarousel({
			loop:true,
			autoplay:true,
			smartSpeed: 500,
			autoplayTimeout:2000,
			singleItem: true,
			autoplayHoverPause:true,
			center:false,
			margin:30,
			nav:false,
			dots:false,
			responsive:{
				300: {
					items:1,
				},
				480: {
					items:2,
				},
				768: {
					items:4,
				},
				1170: {
					items:5,
				},
			}
		});	
			
		/*===============================
		08.	Home Slider JS
		=================================*/ 
		$(".slider-active").owlCarousel({
			loop:true,
			autoplay:true,
			smartSpeed: 700,
			autoplayTimeout:3500,
			singleItem: true,
			autoplayHoverPause:true,
			center:false,
			nav:true,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			dots:false,
			items:1,
		});		
		
		/*===============================
		09. Counter JS
		=================================*/  
		$('.number').counterUp({
			time: 1000
		});
		
		/*====================================
		10. Youtube Player JS
		======================================*/
		$('.player').mb_YTPlayer();		
		
		/*===============================
		11.	Trip Single Slider JS
		=================================*/ 
		$(".gallery-slider").owlCarousel({
			loop:true,
			autoplay:true,
			smartSpeed: 500,
			autoplayTimeout:2500,
			animateIn: 'fadeIn',
			animateOut: 'fadeOut',
			singleItem: true,
			autoplayHoverPause:true,
			center:false,
			margin:0,
			items:1,
			dots:false,
			nav:true,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
		});	
		
		/*====================================
		12.	Wow JS
		======================================*/		
		var window_width = $(window).width();   
			if(window_width > 767){
            new WOW().init();
		}
		
		/*======================================
		13.	Parallax JS
		======================================*/ 
		$(window).stellar({
            responsive: true,
            positionProperty: 'position',
			horizontalOffset: 0,
			verticalOffset: 0,
            horizontalScrolling: false
        });
		
		
		/*=====================================
		14.  Video Popup
		======================================*/ 
		$('.video-popup').magnificPopup({
			type: 'iframe',
			removalDelay: 300,
			mainClass: 'mfp-fade'
		});
		
		
		/*=====================================
		15.  Date Picker JS
		======================================*/ 
		$( function() {
			$( "#datepicker" ).datepicker();
			$( "#datepicker2" ).datepicker();
		} );
		
		/*=====================================
		16. Scroll Up
		======================================*/ 
		$.scrollUp({
			scrollName: 'scrollUp',      // Element ID
			scrollDistance: 300,         // Distance from top/bottom before showing element (px)
			scrollFrom: 'top',           // 'top' or 'bottom'
			scrollSpeed: 1000,            // Speed back to top (ms)
			easingType: 'easeInQuad',        // Scroll to top easing (see http://easings.net/)
			animation: 'slide',           // Fade, slide, none
			animationSpeed: 200,         // Animation speed (ms)
			scrollTrigger: false,        // Set a custom triggering element. Can be an HTML string or jQuery object
			scrollTarget: false,         // Set a custom target element for scrolling to. Can be element or number
			scrollText: ["<i class='fa fa-angle-up'></i>"], // Text for element, can contain HTML
			scrollTitle: false,          // Set a custom <a> title if required.
			scrollImg: false,            // Set true to use image
			activeOverlay: false,        // Set CSS color to display scrollUp active point, e.g '#00FFFF'
			zIndex: 323332           // Z-Index for the overlay
		});
		
		$('.single-faq .faq-title').on('click', function() {
            $(".single-faq .faq-title").removeClass("active");
            $(this).addClass("active");
		});
	});
		/*=====================================
		17. Others JS
		======================================*/ 	
		$( function() {
			$( "#slider-range" ).slider({
			  range: true,
			  min: 0,
			  max: 500,
			  values: [ 0, 500 ],
			  slide: function( event, ui ) {
				$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			  }
			});
			$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
			  " - $" + $( "#slider-range" ).slider( "values", 1 ) );
		} );
			
		$(window).load(function(){
				$('.cp-preloader').fadeOut('slow', function(){
				$(this).remove();
			});
		});

		$(".blog-area .post-navigation").hide();
})(jQuery);
