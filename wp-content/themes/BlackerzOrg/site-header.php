<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Template part: site header
*	--------------------------------------------------------------------- 
*/
?>	


<?php 
$header_style = ot_get_option('header_style', '1');
$search_button = ot_get_option('search_button', 'on');
$cart_widget = ot_get_option('cart_widget', 'on');

if( is_category() || is_single() ){
	$category_styles = ot_get_option( 'category_styles', array() );
	if( ! empty( $category_styles ) ) {
		foreach( $category_styles as $category_style ) {
			if( $category_style['custom_header'] != '' ) {
				$custom_header = $category_style['custom_header'];
				if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ){
					$header_style = get_post_meta( $custom_header, 'header_style', true);
					$search_button = get_post_meta( $custom_header, 'search_button', true);
					$cart_widget = get_post_meta( $custom_header, 'cart_widget', true);
				}
				if( is_single() && $category_style['cs_select'] != '' && in_category( $category_style['cs_select'] )  && $category_style['cs_header_posts'] != 'off' ) {
					$header_style = get_post_meta( $custom_header, 'header_style', true);
					$search_button = get_post_meta( $custom_header, 'search_button', true);
					$cart_widget = get_post_meta( $custom_header, 'cart_widget', true);
				}
			}	
		}
	}
}
	
if( is_page() || is_single() ){
	$custom_header = get_post_meta( get_the_ID(), 'custom_header', true);
	if( $custom_header != '' ) {
		$header_style = get_post_meta( $custom_header, 'header_style', true);
		$search_button = get_post_meta( $custom_header, 'search_button', true);
		$cart_widget = get_post_meta( $custom_header, 'cart_widget', true);
	}
}
?>
	
<header id="mobile-site-header" class="mobile-header">
<div id="mobile-site-logo">
<?php get_template_part( 'mobile-logo' ); // Include logo.php ?>
</div>		
<a href="#mobile-site-navigation" class="toggle-mobile-menu"><i class="fa fa-bars"></i></a>	
</header>	
	

<?php if( $header_style == 1 ) : ?>
		
	<header id="site-header" class="header-style-<?php echo sanitize_html_class($header_style); ?>" itemscope itemtype="http://schema.org/WPHeader">
		<div id="header-wrapper">
			<div id="header-container" class="clearfix">
				<div id="site-logo">
					<?php get_template_part( 'logo' ); // Include logo.php ?>
				</div>			

				<?php if ( is_active_sidebar( 'header-sidebar' ) ) :
					get_sidebar('header'); 
				endif; ?>

			</div><!-- #header-container -->
		</div><!-- #header-wrapper -->	
	</header><!-- #site-header -->

	<div id="navigation-wrapper" class="header-style-<?php echo sanitize_html_class($header_style); ?>">
		<div id="navigation-container">
			<div id="navigation-inner" class="clearfix">
				<?php if ( has_nav_menu( 'secondary' ) ) : ?>
					<div class="secondary-menu-toggle">
						<i class="fa fa-bars"></i>
					</div>
				<?php endif; ?>

				<nav id="site-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'menu-container', 'fallback_cb' => 'mnky_no_menu', 'walker' => new mnky_walker() ) ); ?>
				</nav><!-- #site-navigation -->
								
				<div id="site-utility">
					<?php if( class_exists( 'WooCommerce' ) && ot_get_option('cart_button') != 'off' ) : ?>
						<div class="header_cart_wrapper">
							<?php global $woocommerce; ?>
							<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'bitz' ); ?>" class="header_cart_link" >
								<?php woocommerce_cart_button(); ?>
							</a>	
							<?php if( $cart_widget != 'off' ) {
								woocommerce_cart_widget();
							} ?>
						</div>
					<?php endif; ?>
											
					<?php if( $search_button != 'off' ) : ?>
						<button id="trigger-header-search" class="search_button" type="button">
							<i class="fa fa-search"></i>
						</button>
					<?php endif; ?>
						
					<?php if ( is_active_sidebar( 'menu-sidebar' ) ) :
						get_sidebar('menu');
					endif; ?>

				</div>
									
				<?php if( $search_button != 'off' ) : ?>
					<div class="header-search">
						<?php get_search_form(); ?>
					</div>
				<?php endif; ?>
						
			</div><!-- #navigation-inner -->
		</div><!-- #navigation-container -->
	</div><!-- #navigation-wrapper -->
		
<?php elseif( $header_style == 2 ) : ?>

	<header id="site-header" class="header-style-<?php echo sanitize_html_class($header_style); ?>" itemscope itemtype="http://schema.org/WPHeader">
		<div id="navigation-wrapper" class="header-style-<?php echo sanitize_html_class($header_style); ?>">
			<div id="navigation-container">
				<div id="navigation-inner" class="clearfix">
					<div id="site-logo">
						<?php get_template_part( 'logo' ); // Include logo.php ?>
					</div>						
					
					<?php if ( has_nav_menu( 'secondary' ) ) : ?>
						<div class="secondary-menu-toggle">
							<i class="fa fa-bars"></i>
						</div>
					<?php endif; ?>

					<nav id="site-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'menu-container', 'fallback_cb' => 'mnky_no_menu', 'walker' => new mnky_walker() ) ); ?>
					</nav><!-- #site-navigation -->
									
					<div id="site-utility">
						<?php if( class_exists( 'WooCommerce' ) && ot_get_option('cart_button') != 'off' ) : ?>
							<div class="header_cart_wrapper">
								<?php global $woocommerce; ?>
								<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'bitz' ); ?>" class="header_cart_link" >
									<?php woocommerce_cart_button(); ?>
								</a>	
								<?php if( $cart_widget != 'off' ) {
									woocommerce_cart_widget();
								} ?>
							</div>
						<?php endif; ?>
												
						<?php if( $search_button != 'off' ) : ?>
							<button id="trigger-header-search" class="search_button" type="button">
								<i class="fa fa-search"></i>
							</button>
						<?php endif; ?>
							
						<?php if ( is_active_sidebar( 'menu-sidebar' ) ) :
							get_sidebar('menu');
						endif; ?>

					</div>
										
					<?php if( $search_button != 'off' ) : ?>
						<div class="header-search">
							<?php get_search_form(); ?>
						</div>
					<?php endif; ?>
								
				</div><!-- #navigation-inner -->
			</div><!-- #navigation-container -->
		</div><!-- #navigation-wrapper -->
	</header>
	
<?php elseif( $header_style == 3 ) : ?>

	<div id="navigation-wrapper" class="header-style-<?php echo sanitize_html_class($header_style); ?>">
		<div id="navigation-container">
			<div id="navigation-inner" class="clearfix">
				<?php if ( has_nav_menu( 'secondary' ) ) : ?>
					<div class="secondary-menu-toggle">
						<i class="fa fa-bars"></i>
					</div>
				<?php endif; ?>

				<nav id="site-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'menu-container', 'fallback_cb' => 'mnky_no_menu', 'walker' => new mnky_walker() ) ); ?>
				</nav><!-- #site-navigation -->
								
				<div id="site-utility">
					<?php if( class_exists( 'WooCommerce' ) && ot_get_option('cart_button') != 'off' ) : ?>
						<div class="header_cart_wrapper">
							<?php global $woocommerce; ?>
							<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'bitz' ); ?>" class="header_cart_link" >
								<?php woocommerce_cart_button(); ?>
							</a>	
							<?php if( $cart_widget != 'off' ) {
								woocommerce_cart_widget();
							} ?>
						</div>
					<?php endif; ?>
											
					<?php if( $search_button != 'off' ) : ?>
						<button id="trigger-header-search" class="search_button" type="button">
							<i class="fa fa-search"></i>
						</button>
					<?php endif; ?>
						
					<?php if ( is_active_sidebar( 'menu-sidebar' ) ) :
						get_sidebar('menu');
					endif; ?>

				</div>
									
				<?php if( $search_button != 'off' ) : ?>
					<div class="header-search">
						<?php get_search_form(); ?>
					</div>
				<?php endif; ?>
	
			</div><!-- #navigation-inner -->
		</div><!-- #navigation-container -->
	</div><!-- #navigation-wrapper -->
	
	<header id="site-header" class="header-style-<?php echo sanitize_html_class($header_style); ?>" itemscope itemtype="http://schema.org/WPHeader">
		<div id="header-wrapper">
			<div id="header-container" class="clearfix">
				<div id="site-logo">
					<?php get_template_part( 'logo' ); // Include logo.php ?>
				</div>			

				<?php if ( is_active_sidebar( 'header-sidebar' ) ) :
					get_sidebar('header'); 
				endif; ?>

			</div><!-- #header-container -->
		</div><!-- #header-wrapper -->	
	</header><!-- #site-header -->
	
<?php elseif( $header_style == 4 || $header_style == 5 ) : ?>
	
	<header id="site-header" class="header-style-<?php echo sanitize_html_class($header_style); ?>" itemscope itemtype="http://schema.org/WPHeader">
		<div id="header-wrapper">
			<div id="header-container" class="clearfix">
				<div id="site-logo">
					<?php get_template_part( 'logo' ); // Include logo.php ?>
				</div>			

				<?php if ( is_active_sidebar( 'header-sidebar' ) ) :
					get_sidebar('header'); 
				endif; ?>

			</div><!-- #header-container -->
		</div><!-- #header-wrapper -->	
	</header><!-- #site-header -->

	<div id="navigation-wrapper" class="header-style-<?php echo sanitize_html_class($header_style); ?>">
		<div id="navigation-container">
			<div id="navigation-inner" class="clearfix">
				<?php if ( has_nav_menu( 'secondary' ) ) : ?>
					<div class="secondary-menu-toggle">
						<i class="fa fa-bars"></i>
					</div>
				<?php endif; ?>

				<nav id="site-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'menu-container', 'fallback_cb' => 'mnky_no_menu', 'walker' => new mnky_walker() ) ); ?>
				</nav><!-- #site-navigation -->
								
				<div id="site-utility">
					<?php if( class_exists( 'WooCommerce' ) && ot_get_option('cart_button') != 'off' ) : ?>
						<div class="header_cart_wrapper">
							<?php global $woocommerce; ?>
							<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'bitz' ); ?>" class="header_cart_link" >
								<?php woocommerce_cart_button(); ?>
							</a>	
							<?php if( $cart_widget != 'off' ) {
								woocommerce_cart_widget();
							} ?>
						</div>
					<?php endif; ?>
											
					<?php if( $search_button != 'off' ) : ?>
						<button id="trigger-header-search" class="search_button" type="button">
							<i class="fa fa-search"></i>
						</button>
					<?php endif; ?>
						
					<?php if ( is_active_sidebar( 'menu-sidebar' ) ) :
						get_sidebar('menu');
					endif; ?>

				</div>
									
				<?php if( $search_button != 'off' ) : ?>
					<div class="header-search">
						<?php get_search_form(); ?>
					</div>
				<?php endif; ?>
		
			</div><!-- #navigation-inner -->
		</div><!-- #navigation-container -->
	</div><!-- #navigation-wrapper -->
	
<?php elseif( $header_style == 6 ) : ?>
	
	<header id="site-header" class="header-style-<?php echo sanitize_html_class($header_style); ?>" itemscope itemtype="http://schema.org/WPHeader">
		<div id="navigation-wrapper" class="header-style-<?php echo sanitize_html_class($header_style); ?>">
			<div id="navigation-container">
				<div id="navigation-inner" class="clearfix">
					<div id="site-logo">
						<?php get_template_part( 'logo' ); // Include logo.php ?>
					</div>						
					
					<?php if ( has_nav_menu( 'secondary' ) ) : ?>
						<div class="secondary-menu-toggle">
							<i class="fa fa-bars"></i>
						</div>
					<?php endif; ?>

					<nav id="site-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'menu-container', 'fallback_cb' => 'mnky_no_menu', 'walker' => new mnky_walker() ) ); ?>
					</nav><!-- #site-navigation -->
									
					<div id="site-utility">
						<?php if( class_exists( 'WooCommerce' ) && ot_get_option('cart_button') != 'off' ) : ?>
							<div class="header_cart_wrapper">
								<?php global $woocommerce; ?>
								<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'bitz' ); ?>" class="header_cart_link" >
									<?php woocommerce_cart_button(); ?>
								</a>	
								<?php if( $cart_widget != 'off' ) {
									woocommerce_cart_widget();
								} ?>
							</div>
						<?php endif; ?>
												
						<?php if( $search_button != 'off' ) : ?>
							<button id="trigger-header-search" class="search_button" type="button">
								<i class="fa fa-search"></i>
							</button>
						<?php endif; ?>
							
						<?php if ( is_active_sidebar( 'menu-sidebar' ) ) :
							get_sidebar('menu');
						endif; ?>

					</div>
										
					<?php if( $search_button != 'off' ) : ?>
						<div class="header-search">
							<?php get_search_form(); ?>
						</div>
					<?php endif; ?>
			
				</div><!-- #navigation-inner -->
			</div><!-- #navigation-container -->
		</div><!-- #navigation-wrapper -->
	</header>
	
<?php endif; ?>	