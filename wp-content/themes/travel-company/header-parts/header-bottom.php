<div class="header-bottom">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Main Menu -->
				<div class="main-menu">
					<nav class="navigation">
						<?php
						if ( has_nav_menu( 'menu-1' ) ) :
							wp_nav_menu( array(
								'theme_location'    => 'menu-1',
								'depth'             => 6,
								'menu_class'        => 'nav menu',
								'fallback_cb'       => 'travel_company_wp_bootstrap_navwalker::fallback',
								'walker'            => new travel_company_wp_bootstrap_navwalker(),
							));
							?>
							<?php else : ?>
								<ul class="nav menu">
									<li>
										<a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>"><?php esc_html_e('Add a menu','travel-company'); ?></a>
									</li>
								</ul>
							<?php endif; ?>
						</nav>
					</div>
					<!--/ End Main Menu -->
				</div>
			</div>
		</div>
	</div>