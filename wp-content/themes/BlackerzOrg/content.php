<?php
/**
 * The template for displaying posts in blog page
 *
 */
?>
	<?php 
		$count_post = 0;		
		global $count_post;		
		$count_post++;
		if( $count_post == 1 ) {
			$article_order = ' post-main';
		} else {
			$article_order = ($count_post % 2 == 0) ? ' post-even post-secondary' : ' post-odd post-secondary';
		}
		
		$post_style = ot_get_option('archive_post_style');
		$article_class = 'archive-style-'. $post_style;
		$article_class .= ' '. ot_get_option('archive_post_layout', 'layout-main');
		
		if( is_category() ){
			$category_styles = ot_get_option( 'category_styles', array() );
			if( ! empty( $category_styles ) ) {
				foreach( $category_styles as $category_style ) {
					if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ){
						if( $category_style['cat_post_style'] != 'default' ) {
							$post_style = $category_style['cat_post_style'];
							$article_class = 'archive-style-'. $category_style['cat_post_style'];
							$article_class .= ' '. $category_style['cat_post_layout'];
						}
					}
				}
			}
		}
		
		
		
		if( ot_get_option( 'post_review_rating' ) != 'off' && get_post_meta( get_the_ID(), 'enable_review', true ) == 'on' ){	
				if ( get_post_meta( get_the_ID(), 'review_breakdown', true ) == 'off' ) {
					$rating = '<div class="mp-rating-wrapper"><div class="mp-rating-stars"><span style="width:'. esc_attr( get_post_meta( get_the_ID(), 'review_overall_rating', true ) * 10 ) .'%"></span></div></div>';
				} else {
					$rating = '<div class="mp-rating-wrapper"><div class="mp-rating-stars"><span style="width:'. esc_attr(mnky_review_sum() * 10 ).'%"></span></div></div>';
				}
		} else {
			$rating = '';
		}
	?>
	
	<article itemtype="http://schema.org/Article" itemscope="" id="post-<?php the_ID(); ?>" <?php post_class('archive-layout clearfix '. esc_html($article_class) . esc_html($article_order) ); ?> >
	
	<?php
	$img_url = $thumbnail = $thumbnail_bg = $image_alt = '';
	
	if( has_post_thumbnail() ){
		$img_url = wp_get_attachment_url( get_post_thumbnail_id(), 'full' );
		$meta_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
		$image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
	} elseif( ot_get_option('default_post_image') ) {
		$img_url = wp_get_attachment_url( ot_get_option('default_post_image'), 'full' );		
		$meta_image = wp_get_attachment_image_src( ot_get_option('default_post_image'), 'full' );
		$image_alt = get_post_meta(ot_get_option('default_post_image'), '_wp_attachment_image_alt', true);
	} else {
		$meta_image = null;
	}
	
	if( $img_url != '' ){
		if( function_exists('aq_resize' ) ){
			if( ot_get_option('srcset_for_images') == 'on' ) {			
				$srcset = 'srcset="'. esc_url( aq_resize( $img_url, 1680, 880, true, true, true ) ) .' 1680w, '. esc_url( aq_resize( $img_url, 840, 440, true, true, true ) ) .' 840w, '. esc_url( aq_resize( $img_url, 420, 220, true, true, true ) ) .' 420w" sizes="(max-width:940px) 100vw, 940px"';
				} else {
				$srcset = '';	
			}
			$thumbnail = '<a class="post-preview" href="'. esc_url(get_the_permalink()) .'" rel="bookmark"><div itemprop="image" itemscope itemtype="https://schema.org/ImageObject"><img alt="'. esc_attr($image_alt) .'" src="'. esc_url( aq_resize( $img_url, 840, 440, true, true, true ) ) .'" '.$srcset.' width="840" height="440"><meta itemprop="url" content="'. esc_url($meta_image[0]) .'"><meta itemprop="width" content="'. esc_attr($meta_image[1]) .'"><meta itemprop="height" content="'. esc_attr($meta_image[2]) .'"></div></a>';
			$thumbnail_bg = esc_url( aq_resize( $img_url, 840, 440, true, true, true ) );			
		} else { 
			$thumbnail = '<a class="post-preview" href="'. esc_url(get_the_permalink()) .'" rel="bookmark">'. get_the_post_thumbnail( null, 'large') .'</a>';
			$thumbnail_bg =	$img_url;
		}
	}
	?>
		
		
		<?php if( $post_style == '2' ) : // Style 2 ?>
		
			<?php echo $thumbnail; ?>
			
			<div class="post-content-wrapper">
				<?php if ( ot_get_option('post_category_blog') != 'off' ) : ?>
					<span class="entry-category"><?php the_category( ', ' ); ?></span>
				<?php endif; ?>
				<header class="post-entry-header">
					<h2 itemprop="headline" class="entry-title"><a itemprop="mainEntityOfPage" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'View %s', 'bitz' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				</header><!-- .entry-header -->

				<?php echo $rating; ?>
				
				
					<?php if ( ot_get_option('content_type') == 'full_content') :
					echo '<div itemprop="articleBody" class="entry-summary">';
						$more_link_text = esc_html__('Read more','bitz');
						the_content($more_link_text);
					echo '</div><!-- .entry-summary -->';	
					elseif ( ot_get_option('content_type') == 'excerpt') :
					echo '<div itemprop="articleBody" class="entry-summary">';
						the_excerpt();
					echo '</div><!-- .entry-summary -->';	
					else :
						// No content
					endif; ?>
						
				<?php mnky_blog_meta(); ?>
			</div><!-- .post-content-wrapper -->		
			
		<?php elseif( $post_style == '3' ) : // Style 3 ?>
			
			<?php echo $thumbnail; ?>
			
			<div class="post-content-wrapper">
				<?php if ( ot_get_option('post_category_blog') != 'off' ) : ?>
					<span class="entry-category"><?php the_category( ', ' ); ?></span>
				<?php endif; ?>
				<header class="post-entry-header">
					<h2 itemprop="headline" class="entry-title"><a itemprop="mainEntityOfPage" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'View %s', 'bitz' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				</header><!-- .entry-header -->

				<?php echo $rating; ?>
				
					<?php if ( ot_get_option('content_type') == 'full_content') :
					echo '<div itemprop="articleBody" class="entry-summary">';
						$more_link_text = esc_html__('Read more','bitz');
						the_content($more_link_text);
					echo '</div><!-- .entry-summary -->';	
					elseif ( ot_get_option('content_type') == 'excerpt') :
					echo '<div itemprop="articleBody" class="entry-summary">';
						the_excerpt();
					echo '</div><!-- .entry-summary -->';	
					else :
						// No content
					endif; ?>
					
				<?php mnky_blog_meta(); ?>
			</div><!-- .post-content-wrapper -->
		
		<?php elseif( $post_style == '4' ) : // Style 4 ?>	
				
			<?php echo $thumbnail; ?>
			
			<?php if ( ot_get_option('post_category_blog') != 'off' ) : ?>
				<span class="entry-category"><?php the_category( ', ' ); ?></span>
			<?php endif; ?>
			<header class="post-entry-header">
				<h2 itemprop="headline" class="entry-title"><a itemprop="mainEntityOfPage" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'View %s', 'bitz' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			</header><!-- .entry-header -->
			
			<?php echo $rating; ?>

					<?php if ( ot_get_option('content_type') == 'full_content') :
					echo '<div itemprop="articleBody" class="entry-summary">';
						$more_link_text = esc_html__('Read more','bitz');
						the_content($more_link_text);
					echo '</div><!-- .entry-summary -->';	
					elseif ( ot_get_option('content_type') == 'excerpt') :
					echo '<div itemprop="articleBody" class="entry-summary">';
						the_excerpt();
					echo '</div><!-- .entry-summary -->';	
					else :
						// No content
					endif; ?>
					
			<?php mnky_blog_meta(); ?>
				
		<?php elseif( $post_style == '5' ) : // Style 5 ?>
		
			<?php echo $thumbnail; ?>
			
			<div class="post-content-wrapper">

				<header class="post-entry-header">
					<h2 itemprop="headline" class="entry-title"><a itemprop="mainEntityOfPage" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'View %s', 'bitz' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				</header><!-- .entry-header -->

				<?php echo $rating; ?>
				
					<?php if ( ot_get_option('content_type') == 'full_content') :
					echo '<div itemprop="articleBody" class="entry-summary">';
						$more_link_text = esc_html__('Read more','bitz');
						the_content($more_link_text);
					echo '</div><!-- .entry-summary -->';	
					elseif ( ot_get_option('content_type') == 'excerpt') :
					echo '<div itemprop="articleBody" class="entry-summary">';
						the_excerpt();
					echo '</div><!-- .entry-summary -->';	
					else :
						// No content
					endif; ?>
					
								<?php if ( ot_get_option('post_category_blog') != 'off' ) : ?>
					<span class="entry-category"><?php the_category( ', ' ); ?></span>
				<?php endif; ?>
				<?php mnky_blog_meta(); ?>
			</div><!-- .post-content-wrapper -->

			
		<?php elseif( $post_style == '6' ) : // Style 6 ?>	
			
			<?php echo $thumbnail; ?>
			
			<div class="post-content-wrapper">

				<header class="post-entry-header">
					<h2 itemprop="headline" class="entry-title"><a itemprop="mainEntityOfPage" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'View %s', 'bitz' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				</header><!-- .entry-header -->

				<?php echo $rating; ?>
				
					<?php if ( ot_get_option('content_type') == 'full_content') :
					echo '<div itemprop="articleBody" class="entry-summary">';
						$more_link_text = esc_html__('Read more','bitz');
						the_content($more_link_text);
					echo '</div><!-- .entry-summary -->';	
					elseif ( ot_get_option('content_type') == 'excerpt') :
					echo '<div itemprop="articleBody" class="entry-summary">';
						the_excerpt();
					echo '</div><!-- .entry-summary -->';	
					else :
						// No content
					endif; ?>
					
								<?php if ( ot_get_option('post_category_blog') != 'off' ) : ?>
					<span class="entry-category"><?php the_category( ', ' ); ?></span>
				<?php endif; ?>
				<?php mnky_blog_meta(); ?>
			</div><!-- .post-content-wrapper -->
			
		<?php elseif( $post_style == '7' ) : // Style 7 ?>	
						
			<div class="post-content-bg" style="background-image:url('<?php echo $thumbnail_bg; ?>');">
				<a class="archive-style-7-bg-url" href="<?php echo esc_url(get_permalink()); ?>"></a>
				<a href="<?php echo esc_url(get_permalink()); ?>" class="format-icon"></a>
				<div class="post-content-wrapper">
					<header class="post-entry-header">
						<h2 itemprop="headline" class="entry-title"><a itemprop="mainEntityOfPage" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'View %s', 'bitz' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					</header><!-- .entry-header -->

					<?php echo $rating; ?>
					
					<?php if ( ot_get_option('content_type') == 'full_content') :
					echo '<div itemprop="articleBody" class="entry-summary">';
						$more_link_text = esc_html__('Read more','bitz');
						the_content($more_link_text);
					echo '</div><!-- .entry-summary -->';	
					elseif ( ot_get_option('content_type') == 'excerpt') :
					echo '<div itemprop="articleBody" class="entry-summary">';
						the_excerpt();
					echo '</div><!-- .entry-summary -->';	
					else :
						// No content
					endif; ?>
					
									<?php if ( ot_get_option('post_category_blog') != 'off' ) : ?>
						<span class="entry-category"><?php the_category( ', ' ); ?></span>
					<?php endif; ?>
					<?php mnky_blog_meta(); ?>
				</div><!-- .post-content-wrapper -->
			</div><!-- .post-content-bg -->
			<div class="hidden-meta" itemprop="image" itemscope itemtype="https://schema.org/ImageObject"><meta itemprop="url" content="<?php echo esc_url($meta_image[0]); ?>"><meta itemprop="width" content="<?php echo esc_attr($meta_image[1]); ?>"><meta itemprop="height" content="<?php echo esc_attr($meta_image[2]); ?>"></div>	

		<?php else : // Style 1 ?>	
			
			<?php echo $thumbnail; ?>
			
			<div class="post-content-wrapper">
				<?php if ( ot_get_option('post_category_blog') != 'off' ) : ?>
					<span class="entry-category"><?php the_category( ', ' ); ?></span>
				<?php endif; ?>
				<header class="post-entry-header">
					<h2 itemprop="headline" class="entry-title"><a itemprop="mainEntityOfPage" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'View %s', 'bitz' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				</header><!-- .entry-header -->
				
				<?php echo $rating; ?>
				
					<?php if ( ot_get_option('content_type') == 'full_content') :
					echo '<div itemprop="articleBody" class="entry-summary">';
						$more_link_text = esc_html__('Read more','bitz');
						the_content($more_link_text);
					echo '</div><!-- .entry-summary -->';	
					elseif ( ot_get_option('content_type') == 'excerpt') :
					echo '<div itemprop="articleBody" class="entry-summary">';
						the_excerpt();
					echo '</div><!-- .entry-summary -->';	
					else :
						// No content
					endif; ?>
					
				<?php mnky_blog_meta(); ?>
			</div><!-- .post-content-wrapper -->

		<?php endif; ?>	

		<?php if( ot_get_option('post_date_blog') == 'off') : ?>
		<time datetime="<?php echo esc_attr(get_the_date( 'c' )) ?>" itemprop="datePublished"></time><time datetime="<?php echo esc_attr(get_the_modified_date( 'c' )) ?>" itemprop="dateModified"></time>
		<?php endif; ?>
		
		<?php if( ot_get_option('post_author_blog') == 'off') : ?>
		<div class="hidden-meta" itemprop="author" itemscope itemtype="http://schema.org/Person"><meta itemprop="name" content="<?php echo esc_html(get_the_author()) ?>"></div>
		<?php endif; ?>
		
		<div class="hidden-meta" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
			<div class="hidden-meta" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
			<meta itemprop="url" content="<?php echo esc_attr(ot_get_option('logo')) ?>">
			<meta itemprop="width" content="<?php echo esc_attr(str_replace( "px", "", ot_get_option('retina_logo_width') )) ?>">
			<meta itemprop="height" content="<?php echo esc_attr(str_replace( "px", "", ot_get_option('retina_logo_height') )) ?>">
			</div>
			<meta itemprop="name" content="<?php echo esc_attr(get_bloginfo('name')) ?>">
		</div>	
	</article><!-- #post-<?php the_ID(); ?> -->