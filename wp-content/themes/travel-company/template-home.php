<?php
/**
* Template Name: FrontPage
*/
get_header();


get_template_part( 'sections/section', 'banner' );
get_template_part( 'sections/section', 'about' );
get_template_part( 'sections/section', 'p-destination' );
get_template_part( 'sections/section', 'p-trips' );
get_template_part( 'sections/section', 'top-destination' );
get_template_part( 'sections/section', 'call-to-action' );
get_template_part( 'sections/section', 'testimonials' );
get_template_part( 'sections/section', 'services' );
get_template_part( 'sections/section', 'blog' );
get_template_part( 'sections/section', 'clients' );

get_footer();