<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Template part: page title
*	--------------------------------------------------------------------- 
*/
?>

<?php 
if ( is_page() ) :  // Page header options  ?>

	<?php if ( get_post_meta( get_the_ID(), 'page_title', true ) == 'on' ) : ?>
		<div class="page-header">
				<h1><?php the_title(); ?></h1>
		</div><!-- .page-header -->
	<?php endif; ?>
	
<?php elseif ( is_single() ) : // If is post ?>
<?php else : // If not page ?>
	
	<?php if ( is_home() ) : // If is blog ?>		
		<?php if( ot_get_option('blog_title', 'on') == 'on' ) : ?>
			<div class="page-header">	
				<h1>
					<?php if ( is_front_page() ) {
						bloginfo('name');
					} else {
						global $wp_query;						
						$home_page = get_page( $wp_query->get_queried_object_id() );
						echo esc_html(get_the_title( $home_page->ID ));
					} ?>
				</h1>	
			</div><!-- .page-header -->
		<?php endif; ?>
					
	<?php elseif ( class_exists( 'Woocommerce' ) && is_woocommerce() ) : // If is WooComerce product page ?>	
		
		<?php if( is_shop() && ot_get_option('woo_title', 'on') == 'on' ) : ?>
			<div class="page-header">
					<h1><?php echo woocommerce_page_title(); ?>	</h1>
			</div><!-- .page-header -->
		<?php endif; ?>
						
	<?php elseif ( is_author()  ) : // If is author page ?>	

	<div class="author-wrapper">
		<div class="author vcard clearfix">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 150 ); ?>
			<h1 class="fn">
				<?php echo get_the_author(); ?>
			</h1>	
			<div class="author-info description note">
				<?php the_author_meta( 'description' ); ?>
			</div>
		</div> 
	</div>
						
	<?php elseif ( is_category()  ) : // If is category ?>
		
		<?php 
		$category_title = 'on';
		$category_styles = ot_get_option( 'category_styles', array() );
		if( ! empty( $category_styles ) ) {
			foreach( $category_styles as $category_style ) {
				if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ){					
					if( $category_style['category_title'] == 'off' ) {
						$category_title = 'off';
					}
				}
			} 
		} 
		?>

		<?php if( $category_title != 'off' ) : ?>
			<header class="page-header">
				<h1>
					<?php if ( is_category() || is_tax() ) : // Category title
						echo single_cat_title( '', false );
					endif; ?>				
				</h1>	
				<?php if ( is_category() ) : // Category description
					the_archive_description();				
				endif; ?>				
			</header><!-- .page-header -->
		<?php endif; ?>
	
	<?php else : // Taxonomies ?>	
	
		<header class="page-header">
			<h1>
				<?php if ( is_front_page() ) : // Home title
					bloginfo('name');
						
				elseif ( is_search() ) : // Search title
					printf( esc_html__( 'Search Results for: %s', 'bitz' ), '<span>' . get_search_query() . '</span>' );
						
				elseif ( is_404() ) :
					echo esc_html__( 'Oops, page not found', 'bitz' );
												
				elseif ( is_tax() ) : // Taxanomy title
					echo single_cat_title( '', false );
						
				elseif ( is_tag() ) : // Tag title
					echo single_tag_title( '', false );
						
				elseif ( is_archive() ) : // Archive title
					if ( is_day() ) :
						the_date();
					elseif ( is_month() ) :
						the_date( 'F Y' ); 
					elseif ( is_year() ) :
						the_date( 'Y' );					
					else :
						the_archive_title();
					endif; 
				endif; ?>				
			</h1>	
			<?php if ( is_tag() ) : // Tag description
				the_archive_description();						
			endif; ?>				
		</header><!-- .page-header -->
	<?php endif; ?>
<?php endif; ?>