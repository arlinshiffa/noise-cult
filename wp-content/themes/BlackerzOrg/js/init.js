jQuery(document).ready(function($) {
	"use strict";
	
	
	// Touch hover fix
	$('.gallery-item').on("touchstart", function (e) {
		var link = $(this); //preselect the link
		
		if (link.hasClass('touch-hover')) {
			return true;
		} else {
			link.addClass('touch-hover');
			$('.gallery-item').not(this).removeClass('touch-hover');
			e.preventDefault();
			return false; //extra, and to make sure the function has consistent return points
		}
	});
	
	
	// Mobile sticky header
	$(window).scroll(function() {
    if ($(this).scrollTop() > 0) {
			$('#mobile-site-header').css({ 'position' : 'fixed', 'top' : '0px', 'z-index' : '9999' });
		} else {
			$('#mobile-site-header').css({ 'position' : 'relative' });
    }
	});
	
	// Mobile menu
	$('.toggle-mobile-menu').click(function () {
		$('#mobile-site-navigation, #wrapper, #mobile-menu-bg').toggleClass('mobile-menu-active');
	});		
	
	$('#mobile-menu-bg').click(function () {
		$('#mobile-site-navigation, #wrapper, #mobile-menu-bg').removeClass('mobile-menu-active');
	});
	
	$('#mobile-site-navigation ul li.menu-item-has-children span, #mobile-site-navigation ul li.menu-item-has-children a').click(function () {
		$(this).parent().toggleClass('submenu-open');
	});	
	
	
	// Scroll to top button
	$(window).scroll(function () {
		if ( $(this).scrollTop() > 150 ) {
			$('.scrollToTop').addClass('scrollactive');
		} else {
			$('.scrollToTop').removeClass('scrollactive');
		}
	});
	
	
	// Scroll to top link
	$('a[href="#top"]').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});	
	
	
	// Header search
	$('#trigger-header-search').click(function () {
		$('.header-search').toggleClass('header-search-active');
	});
	
	
	// Mega menu (with tabs)
	$(window).load(function(){
		$('.megamenu-tabs').each(function(){
			$( '.menu-item', this ).wrapAll( '<ul class="tabs-nav" />');
			$( '.tab-content', this ).wrapAll( '<ul class="tabs-content-wrapper" />');
			$( '.tabs-nav, .tabs-content-wrapper', this ).wrapAll( '<li class="submenu-content" />');
			$('ul.sub-menu', this).show();
			
			$('.tab-content:not(:first-child)', this).addClass('tab-hidden');
			$('.tabs-nav li:first-child', this).addClass('nav-active');
			$('.tabs-nav li', this).hover(function() {
				var tabId = $(this).attr('id');
				$(this).closest('.tabs-nav').find('li').removeClass('nav-active');
				$(this).addClass('nav-active');
				$(this).closest('.submenu-content').find('li.tab-content').addClass('tab-hidden');
				$(this).closest('.submenu-content').find('li.'+tabId).removeClass('tab-hidden');
			}); 
			
			var highestTab = $('.tabs-content-wrapper', this).outerHeight(); 
			$('.tabs-nav', this).css( 'min-height', highestTab-40 );
			
		}); 	
	});  

	
	// Secondary menu
	$('.secondary-menu-toggle').click(function () {
		var marginTop = $(document).scrollTop();
		$('#secondary-navigation-wrapper').show();
		$('#secondary-navigation-inner').css({ 'margin-top' : marginTop + 'px' });
	});	
	
	$('.secondary-navigation-close').click(function () {
		$('#secondary-navigation-wrapper').hide();
	});
	
	// Hide secondary nav when scrolled		
	$(window).scroll(function () {
		var scrolled = $(this).scrollTop(),
			navInner = $('#secondary-navigation-inner');
		
		if(navInner.length){
			var navTop = $('#secondary-navigation-inner').offset().top,
			navHeight = $('#secondary-navigation-inner').outerHeight();
		
		
			if( scrolled > navTop + navHeight / 2 ){
				$('#secondary-navigation-wrapper').fadeOut(800);
			} else if ( scrolled < navTop - navHeight / 2){
				$('#secondary-navigation-wrapper').fadeOut(800);
			}	
		}
	});
	
	
	// Phone/iPod/iPad's hover fix (if no link)
	if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) {
		$('.service-box.sb_center, .mm-menu a').click(function(){
			//we just need to attach a click event listener
		});	
	}

	// Remove animation when viewing on mobile devices
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		$('.wpb_animate_when_almost_visible').removeClass('wpb_animate_when_almost_visible');
	}
	
});