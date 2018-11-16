<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Travel_Company
 */

get_header();
?>
<!-- Error Page -->
<section id="error-page" class="error-page overlay">
	<div class="table">
		<div class="table-cell">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3 col-12">
						<!-- Error Inner -->
						<div class="error-inner">
							<h2><?php echo esc_html__('404','travel-company');?><span><?php echo esc_html__('Page Not Found','travel-company');?></span></h2>
							<p><?php echo esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted.','travel-company');?></p>
							<div class="button">
								<a href="<?php echo esc_url(home_url());?>" class="btn primary"><?php echo esc_html__('Go Homepage','travel-company');?></a>
							</div>
						</div>
						<!--/ End Error Inner -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Error Page -->
<?php
get_footer();
