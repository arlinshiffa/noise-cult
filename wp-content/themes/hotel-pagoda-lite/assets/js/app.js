(function($) {


    // Menu dropdown on hover
    extendNav();
    function extendNav() {
        $('.nav-wrapper .navbar-collapse .dropdown').on({
            mouseenter: function () {
                jQuery(this).children('.dropdown-menu').stop(true, true).show().addClass('animated-fast slfadeInDown');
                jQuery(this).toggleClass('open');
            },
            mouseleave: function () {
                jQuery(this).children('.dropdown-menu').stop(true, true).hide().removeClass('animated-fast slfadeInDown');
                jQuery(this).toggleClass('open');
            }
        });
    }

    $('.slider-item-wrapper').slick({
        dots: false,
        infinite: true,
        speed: 800,
        fade: true,
        autoplay: true,
        pauseOnHover: false,
        arrows: false,
    });

    $('.about-slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        autoplay: true,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
    });

    $('.hp-accomodation-wrap').slick({
        dots: false,
        infinite: true,
        speed: 500,
        autoplay: true,
        arrows: false,
        centerMode: true,
        centerPadding: '250px',
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 989,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    centerMode: false,
                    centerPadding: '0',
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: false,
                    centerPadding: '0',
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: false,
                    centerPadding: '0',
                }
            }
        ]
    });

// $('.features-slider').slick({
//   dots: false,
//   infinite: true,
//   speed: 500,
//   autoplay: true,
//   arrows: false,
//   slidesToShow: 4,
//   slidesToScroll: 1,
//   responsive: [
//       {
//         breakpoint: 990,
//         settings: {
//           slidesToShow: 2,
//           slidesToScroll: 1,
//           infinite: true,
//         }
//       },
//       {
//         breakpoint: 768,
//         settings: {
//           slidesToShow: 2,
//           slidesToScroll: 1
//         }
//       },
//       {
//         breakpoint: 600,
//         settings: {
//           slidesToShow: 1,
//           slidesToScroll: 1
//         }
//       }
//   ]
// });


    $('.amentitles-cat-block').slick({
        dots: false,
        infinite: true,
        speed: 500,
        autoplay: true,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 990,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


    //gallery
    $('.post-format-gallery').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        autoplay: true,
        arrows: true
    });


    $('.room-detail-slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        autoplay: true,
        arrows: false,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.room-detail-slider',
        dots: false,
        autoplay: true,
        centerMode: true,
        focusOnSelect: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 989,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                    centerMode: false,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    centerMode: false,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerMode: false,
                }
            }
        ]
    });




    $('.testimonial-slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        autoplay: true,
        arrows: false,
    });



    $('.nav-wrapper').stickMe({
        transitionDuration: 500,
        shadow: true,
        shadowOpacity: 0.6,
    });


    AOS.init({once: 'true',});

    $('.timer').countTo();


})(jQuery);
