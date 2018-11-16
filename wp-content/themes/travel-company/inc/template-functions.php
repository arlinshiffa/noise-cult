<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Travel_Company
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function travel_company_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'travel_company_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function travel_company_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'travel_company_pingback_header' );


if( ! function_exists( 'travel_agency_social_links' ) ) :
/**
 * Prints social links in header
*/
function travel_company_social_links(){
	$defaults = array(
		array(
			'font' => 'fa fa-facebook',
			'link' => 'https://www.facebook.com/',                        
		),
		array(
			'font' => 'fa fa-linkedin',
			'link' => 'https://www.linkedin.com/',
		),
		array(
			'font' => 'fa fa-twitter',
			'link' => 'https://twitter.com/',
		),
		array(
			'font' => 'fa fa-google-plus',
			'link' => 'https://plus.google.com',
		)
	);
	$social_links = get_theme_mod( 'top_header_social_links', $defaults );
	$social_enable    = get_theme_mod( 'travel_company_top_header_social_links_enable', '1' ); 

	if( $social_enable && $social_links ){ ?>
		<ul class="social">
			<?php foreach( $social_links as $link ){ ?>
				<li><a href="<?php echo esc_url( $link['link'] ); ?>" target="_blank"><i class="<?php echo esc_attr( $link['font'] ); ?>"></i></a></li>    	   
			<?php } ?>
		</ul>
		<?php    
	}
}
endif;
if( ! function_exists('middle_header_widget_items')):
	function middle_header_widget_items(){
		$defaults =  array(
			array(
				'icon' => 'fa fa-map-marker',
				'title' => '87 Rue Jeanne St, Nancy',    
				'sub_title'=> 'Middlesex, London'                    
			),
			array(
				'icon' => 'fa fa-phone',
				'title' => '+012 345 678990',    
				'sub_title'=> 'Troll Free' 
			),
			array(
				'icon' => 'fa fa-clock-o',
				'title' => 'Mon -Fri: 9:00-19:00',    
				'sub_title'=> 'Sunday Closed' 
			),
		);
		$header_widget_items = get_theme_mod( 'middle_header_widget_items', $defaults );
		if( $header_widget_items  ){ 
			foreach( $header_widget_items as $header_widget ){ ?>

				<div class="single-widget">
					<i class="<?php echo esc_attr( $header_widget['icon'] );?>" aria-hidden="true"></i>
					<h4><?php echo esc_attr( $header_widget['title'] );?></h4>
					<p><?php echo esc_attr( $header_widget['sub_title'] );?></p>
				</div>
				<?php
			}
		}
	}
endif;	

if(! function_exists('travel_company_skill_items')):
	function travel_company_skill_items(){
		$defaults = array(
			array(
				'number' => 1,
				'title'=> 'Satisfied Clients'                    
			),
			array(
				'number' => 0.75,
				'title'=> 'Advanced Booking'         
			),
		);
		$skill_items = get_theme_mod( 'travel_company_skill_items', $defaults );
		if( $skill_items  ){ 
			foreach( $skill_items as $skill ){ 
				$skill_number = $skill['number'];
				if($skill_number): $skill_percentage = ($skill['number']*100).'%' ; endif;
				$skill_title  = $skill['title'];
				?>
				<div class="col-lg-6 col-md-6 col-12">
					<!-- Single Skill -->
					<div class="single-skill">
						<?php if($skill_number):?>
							<div class="circle" data-value="<?php echo esc_attr( $skill_number );?>" data-size="130">
								<strong><?php echo esc_html($skill_percentage);?></strong>
							</div>
						<?php endif;?>
						<?php if($skill_title):?>
							<h4><?php echo esc_html($skill_title);?></h4>
						<?php endif;?>
					</div>
					<!--/ End Single Skill -->
				</div>
				<?php
			}
		}
	}
endif;	



if( ! function_exists( 'travel_company_footer_social_links' ) ) :
/**
 * Prints social links in header
*/
function travel_company_footer_social_links(){
	$defaults = array(
		array(
			'font' => 'fa fa-facebook',
			'link' => 'https://www.facebook.com/',                        
		),
		array(
			'font' => 'fa fa-linkedin',
			'link' => 'https://www.linkedin.com/',
		),
		array(
			'font' => 'fa fa-twitter',
			'link' => 'https://twitter.com/',
		),
		array(
			'font' => 'fa fa-google-plus',
			'link' => 'https://plus.google.com',
		)
	);
	$social_links = get_theme_mod( 'bottom_footer_social_links', $defaults );
	$social_enable    = get_theme_mod( 'travel_company_bottom_footer_social_links_enable', '1' ); 

	if( $social_enable && $social_links ){ ?>
		<ul class="social">
			<?php foreach( $social_links as $link ){ ?>
				<li><a href="<?php echo esc_url( $link['link'] ); ?>" target="_blank"><i class="<?php echo esc_attr( $link['font'] ); ?>"></i></a></li>    	   
			<?php } ?>
		</ul>
		<?php    
	}
}
endif;


if( ! function_exists('travel_company_contact_items')):
	function travel_company_contact_items(){
		$defaults =  array(
			array(
				'icon' => 'fa fa-map-marker',
				'title' => 'Our Location',    
				'address'=> '87 Rue Jeanne St, House 20, Block E, Nancy Middlesex, London',
				'email'	=> '' 
			),
			array(
				'icon' => 'fa fa-phone',
				'title' => 'Contact Us',    
				'address'=> 'Telephone: +012 345 678990',
				'email'	=> 'info@yourwebsite.com' 
			),
			array(
				'icon' => 'fa fa-clock-o',
				'title' => 'Working Times',    
				'address'=> 'Monday - Friday: 9:00AM -19:00PM Sunday Close',
				'email'	=> '' 
			),
		);
		$contact_items = get_theme_mod( 'travel_company_contact_items', $defaults );
		if( $contact_items  ){ 
			foreach( $contact_items as $contact ){ ?>

				<div class="col-lg-4 col-md-4 col-12">
					<!-- Single Contact -->
					<div class="single-contact">
						<i class="<?php echo esc_attr($contact['icon']);?>" aria-hidden="true"></i>
						<h4><?php echo esc_html($contact['title']);?></h4>
						<p><?php echo esc_html($contact['address']);?></p>
						<?php if(isset($contact['email']) && ($contact['email']) != ''):?>
						<p><a href="mailto:<?php echo esc_attr($contact['email']);?>"><?php echo esc_html__('Email:','travel-company');?> <?php echo esc_html($contact['email']);?></a></p>
					<?php endif;?>
				</div>
				<!--/ End Single Contact -->
			</div>
			<?php
		}
	}
}
endif;	

