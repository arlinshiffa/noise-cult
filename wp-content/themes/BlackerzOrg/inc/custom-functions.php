<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Custom functions
*	--------------------------------------------------------------------- 
*/


/**
 * Numeric pagination
 */
function mnky_numeric_pagination() {
the_posts_pagination( array( 'mid_size' => 6 ) ); 
}

// Replaces "[...]" (appended to automatically generated excerpts) with ...
if ( ! function_exists( 'mnky_excerpt_more' )) {
function mnky_excerpt_more( $more ) {
	return ' &hellip; ';
}
add_filter( 'excerpt_more', 'mnky_excerpt_more' );
}


// Posted time display function
if ( ! function_exists( 'mnky_post_time' )) {
 function mnky_post_time() {
   global $post;
   $date = $post->post_date;
   $time = get_post_time('G', true, $post);
   $mnkytime = time() - $time;
   if($mnkytime < 60){
     $mnkytimestamp = __('Just now', 'bitz');
   }elseif($mnkytime < 604800 ){
     $mnkytimestamp = sprintf(__('%s ago', 'bitz'), human_time_diff($time));
   }else{
     $mnkytimestamp = sprintf( __('%1$s, %2$s', 'bitz'), get_the_date(), get_the_time()); 
   }
   return $mnkytimestamp;
}
add_filter('the_time', 'mnky_post_time');
}

 // Return article labels
if ( ! function_exists( 'mnky_label' )) {
	function mnky_label() {
	$post_labels = get_post_meta( get_the_ID(), 'post_labels', true);
		if( ! empty($post_labels ) ) {
			echo '<div class="article-labels">';
			foreach( $post_labels as $post_label ) {
				echo '<span style="background-color:'. esc_attr($post_label['post_label_color']).'">'. esc_html($post_label['post_label_text']).'</span>';
			}
			echo '</div>';
		}
	}
}

 // Return article reviews
if ( ! function_exists( 'mnky_review' )) {
	function mnky_review() {
	$review_ratings = get_post_meta( get_the_ID(), 'review_ratings', true);
		if( ! empty($review_ratings ) ) {
			echo '<div class="article-review-breakdown">';
			foreach( $review_ratings as $review_rating ) {
				echo '<div class="rating_aspect_item clearfix"><div class="rating_aspect_value"><span class="rating-name">'.esc_html($review_rating['review_aspect_name']).'</span><span class="rating-value">'. esc_html($review_rating['review_aspect_rating']).'</span></div><div class="rating-bar"><span class="rating-bar-value" style="width:'.esc_html($review_rating['review_aspect_rating'] *10).'%"></span></div></div>';
			}
			echo '</div>';
		}
	}
}

 // Return article review breakdown sum
if ( ! function_exists( 'mnky_review_sum' )) {
	function mnky_review_sum() {
	$review_ratings = get_post_meta( get_the_ID(), 'review_ratings', true);
		if( ! empty($review_ratings ) ) {
			$sum = $count = 0;
			foreach( $review_ratings as $review_rating ) {
			$count++;
			$sum+= $review_rating['review_aspect_rating'];
			}
			return round($sum / $count, 1);
		}
	}
}


 // Create post time output for later use
if ( ! function_exists( 'mnky_post_time_output' )) {
	function mnky_post_time_output() {
			return '<time datetime="'. esc_attr(get_the_date( 'c' )) .'" itemprop="datePublished">'. esc_html(mnky_post_time()) .'</time><time class="meta-date-modified" datetime="'. esc_attr(get_the_modified_date( 'c' )) .'" itemprop="dateModified">'. esc_attr(get_the_modified_date()) .'</time>';
	}
}


// Remove hentry class from pages
if ( ! function_exists( 'mnky_remove_hentry' ) ) {
function mnky_remove_hentry( $classes ) {
    if ( is_page() ) {
        $classes = array_diff( $classes, array( 'hentry' ) );
    }
    return $classes;
}
add_filter( 'post_class','mnky_remove_hentry' );
}

 
// Extend author description
remove_filter('pre_user_description', 'wp_filter_kses');
add_filter( 'pre_user_description', 'wp_filter_post_kses' );


// Blog meta
if ( ! function_exists( 'mnky_blog_meta' ) ) {
	function mnky_blog_meta() {
			
		if( ot_get_option('post_date_blog') == 'off' && ot_get_option('post_author_blog') == 'off' && ot_get_option('post_comments_blog') == 'off' && ot_get_option('post_views_counter_blog') == 'off' ) return; 

		echo '<div class="entry-meta-blog">';
			
			if ( ot_get_option('post_author_blog') != 'off' ) {
				if ( ot_get_option('post_date_blog') != 'off' ) { $divider = 'meta-author-divider'; } else { $divider = ''; }
				echo '<a class="meta-author url '. sanitize_html_class($divider) .'" href="'. esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) .'" title="'. esc_attr(sprintf( __( 'View all posts by %s', 'bitz' ), get_the_author() )) .'" rel="author"><span itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name">'. get_the_author() .'</span></span></a>';
			} 
								
			if ( ot_get_option('post_date_blog') != 'off' ) {
				echo '<span class="meta-date"><time class="published" datetime="'. esc_attr(get_the_date( 'c' )) .'" itemprop="datePublished">'. esc_html(mnky_post_time()) .'</time><time class="meta-date-modified updated" datetime="'. esc_attr(get_the_modified_date( 'c' )) .'" itemprop="dateModified">'. esc_attr(get_the_modified_date()) .'</time></span>';
			}
				
			if ( ot_get_option('post_comments_blog') != 'off' ) {
				echo '<span class="meta-comments"><i class="post-icon icon-comments"></i> ', comments_popup_link( '0' , '1' , '%' ) .'</span><meta itemprop="interactionCount" content="UserComments:'. esc_html(get_comments_number()) .'"/>';
			}
				
			if ( ot_get_option('post_views_counter_blog') != 'off' ) {
				echo '<span class="meta-views">'. mnky_getPostViews( get_the_ID() ) .'</span>';
			}
			
		echo '</div>';

	} 
}


// Post meta header
if ( ! function_exists( 'mnky_post_meta' ) ) {
	function mnky_post_meta() {
		
		if( ot_get_option('post_date') == 'off' && ot_get_option('post_author') == 'off' && ot_get_option('post_comments') == 'off' && ot_get_option('post_views_counter') == 'off' ) return; 

		echo '<div class="entry-meta">';
			
			if ( ot_get_option('post_author') != 'off' ) {
				echo '<span class="meta-author-image">'. get_avatar( get_the_author_meta( 'ID' ), 50 ) .'</span>';
				echo '<a class="meta-author url" href="'. esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) .'" title="'. esc_attr(sprintf( __( 'View all posts by %s', 'bitz' ), get_the_author() )) .'" rel="author"><span itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name">'. get_the_author() .'</span></span></a>';
			}
								
			if ( ot_get_option('post_date') != 'off' ) {
				echo '<span class="meta-date"><time class="published" datetime="'. esc_attr(get_the_date( 'c' )) .'" itemprop="datePublished">'. esc_html(mnky_post_time()) .'</time><time class="meta-date-modified updated" datetime="'. esc_attr(get_the_modified_date( 'c' )) .'" itemprop="dateModified">'. esc_attr(get_the_modified_date()) .'</time></span>';
			}
				
			if ( ot_get_option('post_comments') != 'off' ) {
				echo '<span class="meta-comments"><i class="post-icon icon-comments"></i> ', comments_popup_link( '0' , '1' , '%' ) .'</span><meta itemprop="interactionCount" content="UserComments:'. esc_html(get_comments_number()) .'"/>';
			}
				
			if ( ot_get_option('post_views_counter') != 'off' ) {
				echo '<span class="meta-views">'. mnky_getPostViews( get_the_ID() ) .'</span>';
			}

		echo '</div>';
	} 
}

// Post meta footer
if ( ! function_exists( 'mnky_post_meta_footer' ) ) {
	function mnky_post_meta_footer() {
		
		if( ( !has_tag() || ot_get_option('post_tags') == 'off') ) return; 

		if( is_single() ){			
			echo '<div class="entry-meta-footer">';
			
				if ( has_tag() && ot_get_option('post_tags') != 'off' ) {
					the_tags( '<div class="tag-links"><span>','</span><span>','</span></div>' );

			echo '</div>';
		}
	} 
}
}


// Post next/previous links
if ( ! function_exists( 'mnky_post_links' ) ) {
	function mnky_post_links() {
		if( is_single() && ot_get_option('post_links') != 'off' ){
			echo '<div class="mnky-post-links clearfix">';
			previous_post_link('<span class="previous-post-link"><span class="previous-post-title">'. esc_html__( 'Previous Article', 'bitz' ) .'</span>%link</span>'); 
			next_post_link('<span class="next-post-link"><span class="previous-post-title">'. esc_html__( 'Next Article', 'bitz' ) .'</span>%link</span>');
			echo '</div>';
		}
	}
}


// Hex Color to RGB
function mnky_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
}


// Reading config
function mnky_blog_config($query) {
	
	//Determine how many posts per page you want (use WordPress's settings)
    $ppp = get_option('posts_per_page');

	// Exclude category from blog and search view
	$exclude_cat_ids = ot_get_option('exclude_from_blog');
	if ( $exclude_cat_ids != '' && $query->is_main_query() && ( $query->is_posts_page || $query->is_search() ) ) {
		foreach( $exclude_cat_ids as $exclude_cat_id ) {
			$exclude_from_blog[] = '-'. $exclude_cat_id;
		}
		$query->set( 'cat', implode(',', $exclude_from_blog) );
	}
	
	// Set offset for blog
	$blog_offset = ot_get_option('blog_offset', '0');
	if ( $blog_offset != '' && $query->is_posts_page ) {
		if ( $query->is_paged ) {
			$blog_offset = $blog_offset + ( ($query->query_vars['paged']-1) * $ppp );
			$query->set('offset', $blog_offset );
		} else {
			$query->set( 'offset', $blog_offset );
		}		
	}	
	
	// Set offset for category
	if ( $query->is_main_query() && !is_admin() && $query->is_category ) {
		$category_styles = ot_get_option( 'category_styles', array() );
		if( ! empty( $category_styles ) ) {
			foreach( $category_styles as $category_style ) {
				if( $category_style['cs_select'] != '' && $query->is_category( $category_style['cs_select'] ) ){
					if( $category_style['cat_offset'] != '' ){
						if ( $query->is_paged ) {
							$cat_offset = $category_style['cat_offset'] + ( ($query->query_vars['paged']-1) * $ppp );
							$query->set('offset', $cat_offset );
						} else {
							$query->set( 'offset', $category_style['cat_offset'] );
						}
					}
				}
			}
		}		
	}

	// Change post count in search page
	if ( $query->is_main_query() && $query->is_search() ) {
		$query->set( 'posts_per_page', '20' );
	}
		
	return $query;
}
add_filter('pre_get_posts', 'mnky_blog_config', 1);


function mnky_adjust_offset_pagination($found_posts, $query) {

	// Blog offset
	$blog_offset = ot_get_option('blog_offset');
    if ( $blog_offset != '' && $query->is_posts_page) {
        //Reduce WordPress's found_posts count by the offset... 
        return $found_posts - $blog_offset;
    }
	
	// Category offset
	if ( $query->is_main_query() && !is_admin() && $query->is_category ) {
		$category_styles = ot_get_option( 'category_styles', array() );
		if( ! empty( $category_styles ) ) {
			foreach( $category_styles as $category_style ) {
				if( $category_style['cs_select'] != '' && $query->is_category( $category_style['cs_select'] ) ){
					if( $category_style['cat_offset'] != '' ){
						//Reduce WordPress's found_posts count by the offset... 
						return $found_posts - $category_style['cat_offset'];
					}
				}
			}
		}	
	}
	
    return $found_posts;
}
add_filter('found_posts', 'mnky_adjust_offset_pagination', 1, 2 );


// Track post views without a plugin using post meta. 
// Author: Kevin Chard 
// URL: http://wpsnipp.com/index.php/functions-php/track-post-views-without-a-plugin-using-post-meta/
function mnky_getPostViews($postID){
    $count_key = 'mnky_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if( $count == '' ){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '<span class="views-low" title="'. esc_html__('Views' , 'bitz') .'"><i class="post-icon icon-views"></i> 0 <meta itemprop="interactionCount" content="UserPageVisits:0"/></span>';
    }
	if( $count < ot_get_option( 'low_views_count', '100') ){
		$popularity = 'low';
	} elseif ( $count < ot_get_option( 'medium_views_count', '300') )	{
		$popularity = 'mid';
	} else {
		$popularity = 'hot';
	}
	
    return '<span class="views-'. esc_attr($popularity) .'" title="'. esc_html__('Views' , 'bitz') .'"><i class="post-icon icon-views"></i> '. esc_html($count) .'<meta itemprop="interactionCount" content="UserPageVisits:'. esc_html($count) .'"/></span>';
}

function mnky_setPostViews($postID) {
    $count_key = 'mnky_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if( $count=='' ){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); 

// Remove issues with smart quotes in menu description
remove_filter('nav_menu_description', 'wptexturize');

// Enable jetpack infinite scroll
add_theme_support( 'infinite-scroll', array(
    'type'  => 'scroll',
    'container' => 'content',
    'footer' => false
) );

// Limit default excerpt lenght
function mnky_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'mnky_excerpt_length');

// Slider Revolution Theme Mode
if(function_exists( 'set_revslider_as_theme' )){
	add_action( 'init', 'mnky_revslider_theme_mode' );
	function mnky_revslider_theme_mode() {
		set_revslider_as_theme();
	}
}