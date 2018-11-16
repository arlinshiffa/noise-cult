<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travel_Company
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- End Preloader -->
	<!-- Header Area -->
	<header id="site-header" class="site-header">
		<!-- Start Topbar -->
		<?php get_template_part( 'header-parts/header', 'top' );?>
		<!--/ End Topbar -->
		<!-- Middle Header -->
		<?php get_template_part( 'header-parts/header', 'middle' );?>
		<!-- End Middle Header -->
		<!-- Header Bottom -->
		<?php get_template_part( 'header-parts/header', 'bottom' );?>
		<!--/ End Header Bottom -->
	</header>
	<!--/ End Header Area -->


	<?php if(!is_front_page()): ?>
		<!-- Breadcrumb -->
		<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image:url(<?php if(has_header_image()):echo esc_url(get_header_image());endif;?>)">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<?php if(is_home()): ?>
							<h2><?php bloginfo('name'); ?></h2>
							<p><?php bloginfo('description'); ?></p>
							<?php else: ?>
								<h2><?php the_title(); ?></h2>
								<?php breadcrumb_trail(); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>