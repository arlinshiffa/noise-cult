	</div><!-- #main  -->

	<?php get_sidebar('footer'); ?>
	
<div id="mobile-menu-bg"></div>	
</div><!-- #wrapper -->

<nav id="mobile-site-navigation">
	<span class="mobile-menu-header"><span class="mobile-menu-heading"><?php esc_html_e('Menu', 'bitz') ?></span><i class="fa fa-times toggle-mobile-menu"></i></span>
	<?php wp_nav_menu( array( 'theme_location' => 'mobile', 'container' => false, 'fallback_cb' => 'mnky_no_menu', 'after' => '<span></span>' ) ); ?>
	<?php get_sidebar('mobile-menu'); ?>	
</nav><!-- #mobile-site-navigation -->

<?php if ( has_nav_menu( 'secondary' ) ) : ?>
	<div id="secondary-navigation-wrapper">
		<div id="secondary-navigation-inner">
			<div class="secondary-navigation-close"><i class="post-icon icon-close"></i></div>
			<nav id="secondary-navigation" class="clearfix" itemscope itemtype="http://schema.org/SiteNavigationElement">
				<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false, 'fallback_cb' => false ) ); ?>
			</nav><!-- #secondary-navigation -->
			<?php get_sidebar('secondary-menu'); ?>
		</div>
	</div>
<?php endif; ?>

<?php if (ot_get_option('scroll_to_top_button') == 'on'){
	echo '<a href="#top" class="scrollToTop"><i class="fa fa-angle-up"></i></a>';
} ?>
		
<?php wp_footer(); ?>
</body>
</html>