<?php
/*
* Template Name: Contact page
*/	
get_header();
?>	
<!-- Start Contact -->
<section id="contact-us" class="contact-us section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="title-line center">
					<?php 
					$contact_text =  get_theme_mod( 'travel_company_contact_text', __( 'Our Information', 'travel-company' ) );
					$contact_title =  get_theme_mod( 'travel_company_contact_title', __( 'Contact Us', 'travel-company' ) );
					?>
					<p><?php echo esc_html($contact_text);?></p>
					<h2><?php echo esc_html($contact_title);?></h2>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- Contact Form -->
			<div class="col-lg-8 offset-lg-2 col-12">
				<form class="form" method="post" action="mail/mail.php">
					<div class="row">
						<?php if (get_theme_mod('travel_company_contact_form_shortcode')):
							echo do_shortcode(get_theme_mod('travel_company_contact_form_shortcode'));
						endif; ?>	
					</div>
				</form>
			</div>
			<!--/ End Contact Form -->
			<div class="col-lg-12">
				<div class="contact">
					<div class="row">
						<?php travel_company_contact_items();?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Contact -->

<!-- Map Section -->
<div class="map-section">
	<div id="myMap">
		<?php if ( is_active_sidebar( 'google-map' ) ) { ?>
			<?php dynamic_sidebar( 'google-map' );?>
		<?php } ?>
	</div>
</div>
<!--/ End Map Section -->
<?php 
get_footer(); 