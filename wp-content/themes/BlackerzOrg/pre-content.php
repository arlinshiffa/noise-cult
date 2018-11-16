<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Template part: before content area
*	--------------------------------------------------------------------- 
*/
?>

<?php 
if ( is_page() ) :  // Page  ?>
	
	<?php if ( get_post_meta( get_the_ID(), 'pre_content_activation', true ) == 'on' ) : ?>

		<div class="pre-content" <?php if ( get_post_meta( get_the_ID(), 'pre_content_height', true ) ) { echo 'style="height:'. esc_attr( get_post_meta( get_the_ID(), 'pre_content_height', true ) ) .'"'; } ?>>
			
			<?php if ( get_post_meta( get_the_ID(), 'pre_content_html', true ) ) : ?>
				<div class="pre-content-html"  <?php if ( get_post_meta( get_the_ID(), 'pre_content_width', true ) ) { echo 'style="max-width:'. esc_attr( get_post_meta( get_the_ID(), 'pre_content_width', true ) ) .'; margin:0 auto; padding:0px 30px;"'; } ?>><?php echo do_shortcode( wp_kses_post (get_post_meta( get_the_ID(), 'pre_content_html', true ) ) ); ?></div>
			<?php endif; ?>
			
		</div><!-- .pre-content -->
		
	<?php endif; ?>
	
<?php elseif ( is_single() && !is_singular('product') ) :  // Single post ?>

	<?php 
		$post_header_style = ot_get_option('post_header_style_opt', 'style_deafault');
		if( get_post_meta( get_the_ID(), 'post_header_style', true ) && get_post_meta( get_the_ID(), 'post_header_style', true ) != 'opt_default') {
			$post_header_style = get_post_meta( get_the_ID(), 'post_header_style', true );
		}
	?>

	<?php if( $post_header_style != 'style_deafault' || get_post_meta( get_the_ID(), 'pre_content_activation', true ) == 'on' ) : ?>
		<?php 
			$style = '';
			if ( has_post_thumbnail() && get_post_meta( get_the_ID(), 'post_header_style', true ) != 'style_deafault' && get_post_meta( get_the_ID(), 'pre_content_bg', true) == '' ) {	
				$img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				$style = 'background-image:url('. $img_url .'); background-size:cover; background-repeat:no-repeat; background-position:center;'; 
			}
			if ( get_post_meta( get_the_ID(), 'pre_content_height', true ) ) { $style .= 'height:'. get_post_meta( get_the_ID(), 'pre_content_height', true ) .';'; } else { $style .= 'height:450px;'; }
		?>

		<div class="pre-content" style="<?php echo esc_attr($style); ?>">
			<?php if ( get_post_meta( get_the_ID(), 'pre_content_html', true ) ) : ?>
				<div class="pre-content-html" <?php if ( get_post_meta( get_the_ID(), 'pre_content_width', true ) ) { echo 'style="max-width:'. esc_attr( get_post_meta( get_the_ID(), 'pre_content_width', true ) ) .'; margin:0 auto; padding:0px 30px;"'; } ?>><?php echo do_shortcode( wp_kses_post( get_post_meta( get_the_ID(), 'pre_content_html', true ) ) ); ?></div>
			<?php endif; ?>
		</div>
		
	<?php endif; ?>
	
<?php elseif ( is_category() ) : // If is category 
	
	$category_styles = ot_get_option( 'category_styles', array() );
	if( ! empty( $category_styles ) ) :
		foreach( $category_styles as $category_style ) :
			if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ) :
			
				if ( $category_style['cat_pre_content_area'] == 'on' ) : ?>
					<div class="pre-content" <?php if (  $category_style['cat_pre_content_height'] != '' ) { echo 'style="height:'. esc_attr( $category_style['cat_pre_content_height'] ) .'"'; } ?>>
								
						<?php if ( $category_style['cat_pre_content_html'] != '' ) : ?>
							<div class="pre-content-html" <?php if ( $category_style['cat_pre_content_width'] != '' ) { echo 'style="max-width:'. esc_attr($category_style['cat_pre_content_width'] ) .'; margin:0 auto; padding:0px 30px;"'; } ?>><?php echo do_shortcode( wp_kses_post( $category_style['cat_pre_content_html'] ) ); ?></div>
						<?php endif; ?>	
							
					</div><!-- .pre-content -->
				<?php 
				endif;
			endif;
		endforeach;
	endif;
	
elseif ( is_home() ) : // If is blog ?>
	
	<?php if ( ot_get_option('blog_pre_content_area') == 'on' ) : ?>
		
		<div class="pre-content" <?php if (  ot_get_option('blog_pre_content_height') != '' ) { echo 'style="height:'. esc_attr( ot_get_option('blog_pre_content_height') ) .'"'; } ?>>
				
			<?php if ( ot_get_option('blog_pre_content_html') != '' ) : ?>
				<div class="pre-content-html" <?php if ( ot_get_option('blog_pre_content_width') != '' ) { echo 'style="max-width:'. esc_attr( ot_get_option('blog_pre_content_width') ) .'; margin:0 auto; padding:0px 30px;"'; } ?>><?php echo do_shortcode( wp_kses_post ( ot_get_option('blog_pre_content_html') ) ); ?></div>
			<?php endif; ?>
				
		
		</div><!-- .pre-content -->
	<?php endif; ?>
					
<?php elseif ( class_exists( 'Woocommerce' ) && is_woocommerce() ) : // If is WooComerce product page ?>	

	<?php if( ot_get_option('woo_custom_header') != '' ) : ?>
		<div class="pre-content">
			<div class="pre-content-html"><?php echo do_shortcode( wp_kses_post ( ot_get_option('woo_custom_header') ) ); ?></div>
		</div><!-- .pre-content -->
	<?php endif; ?>	
	
<?php endif; ?>
