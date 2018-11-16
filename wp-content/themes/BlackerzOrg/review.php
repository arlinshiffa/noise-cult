<?php
/*	
*	---------------------------------------------------------------------
*	Template for displaying reviews
*	--------------------------------------------------------------------- 
*/
?>

<?php if ( get_post_meta( get_the_ID(), 'enable_review', true ) == 'on' ) : ?>
<div class="review_wrapper" itemscope itemtype="http://schema.org/Review">

	<?php if ( get_post_meta( get_the_ID(), 'review_title', true ) != '' ) : ?>
	<h3 itemprop="itemReviewed" itemscope itemtype="http://schema.org/Thing">
		<span itemprop="name"><?php echo esc_html( get_post_meta( get_the_ID(), 'review_title', true ) ); ?></span>
	</h3>
	<?php endif; ?>
	
	<div class="review_rating_wrapper clearfix" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
		<?php if ( get_post_meta( get_the_ID(), 'review_breakdown', true ) == 'off' ) : ?>
			<div class="rating_summary">
			<span itemprop="ratingValue" class="manual_rating_value"><?php echo esc_html( get_post_meta( get_the_ID(), 'review_overall_rating', true ) ); ?></span> out of <span itemprop="bestRating">10</span><meta content="0" itemprop="worstRating">
			</div>
		<?php else: ?>
			<div class="rating_breakdown">
				<?php mnky_review(); ?>
				<div class="rating_summary"><span class="rating_summary_value" itemprop="ratingValue"><?php echo esc_html( mnky_review_sum() ); ?></span> out of <span itemprop="bestRating">10</span><meta content="0" itemprop="worstRating"></div>
			</div>
		<?php endif; ?>
	
	<div class="rating-stars-wrapper">	
		<div class="rating-stars">
		<?php if ( get_post_meta( get_the_ID(), 'review_breakdown', true ) == 'off' ) : ?>
		<span style="width:<?php echo esc_attr( get_post_meta( get_the_ID(), 'review_overall_rating', true ) * 10 ); ?>%"></span>
		<?php else : ?>
		<span style="width:<?php echo esc_attr(mnky_review_sum() * 10); ?>%"></span>
		<?php endif; ?>
		</div>
		</div>
	</div>
	
	<div class="review_body" itemprop="reviewBody">
		<span class="review_body_title"><?php echo esc_html( get_post_meta( get_the_ID(), 'review_good_title', true ) ); ?></span>
		<span class="review_body_content"><?php echo esc_html( get_post_meta( get_the_ID(), 'review_good', true ) ); ?></span>
		<span class="review_body_title"><?php echo esc_html( get_post_meta( get_the_ID(), 'review_bad_title', true ) ); ?></span>
		<span class="review_body_content"><?php echo esc_html( get_post_meta( get_the_ID(), 'review_bad', true ) ); ?></span>
		<span class="review_body_title"><?php echo esc_html( get_post_meta( get_the_ID(), 'review_bottomline_title', true ) ); ?></span>
		<span class="review_body_content"><?php echo esc_html( get_post_meta( get_the_ID(), 'review_bottomline', true ) ); ?></span>
	</div>
	
	<?php if ( get_post_meta( get_the_ID(), 'review_custom_field', true ) != '' ) : ?>
	<span class="review_custom_content"><?php echo do_shortcode(wp_kses_post( get_post_meta( get_the_ID(), 'review_custom_field', true ) )); ?></span>
	<?php endif; ?>
	
	<span class="review_author" itemprop="author" itemscope itemtype="http://schema.org/Person">
		<a itemprop="url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>" title="<?php echo esc_attr(sprintf( __( 'View all posts by %s', 'bitz' ), get_the_author() )) ?>">
			<span itemprop="name"><?php echo esc_html(get_the_author()) ?></span>
		</a>
	</span>
	
</div>
<?php endif; ?>