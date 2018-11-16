<?php
/*
if( function_exists( 'bp_is_user' ) && bp_is_user() ){
	return;
}
*/


# Page Title ----------
if( ! jannah_get_postdata( 'tie_hide_title' ) ){
	$title_tag = is_front_page() ? 'h2' : 'h1'; ?>

	<header class="entry-header-outer">
		<?php jannah_breadcrumbs() ?>
		<div class="entry-header">
			<<?php echo esc_attr( $title_tag ) ?> class="post-title entry-title"><?php the_title(); ?></<?php echo esc_attr( $title_tag ) ?>>
		</div><!-- .entry-header /-->
	</header><!-- .entry-header-outer /-->

	<?php
}


# Page Feature Image ----------
if( has_post_thumbnail() ){

	# Get the post thumbnail size ----------
	$size = ( jannah_get_object_option( 'sidebar_pos', '', 'tie_sidebar_pos' ) == 'full' ) ? 'jannah-image-full' : 'jannah-image-post';

	# Display the featured image ----------
	echo '
		<div class="featured-area">
			<figure class="single-featured-image">';

				the_post_thumbnail( $size );

				# Featured image caption ----------
				$thumb_caption = get_post( get_post_thumbnail_id() );
				if( ! empty( $thumb_caption->post_excerpt )){
					echo '
						<figcaption class="single-caption-text">
							<span class="fa fa-camera" aria-hidden="true"></span> '.
							$thumb_caption->post_excerpt .'
						</figcaption>
					';
				}

				echo '
			</figure>
		</div><!-- .featured-area /-->
	';
}
