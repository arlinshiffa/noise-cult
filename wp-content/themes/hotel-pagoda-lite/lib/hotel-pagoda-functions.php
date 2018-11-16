<?php
/**
 * Created by PhpStorm.
 * User: ram
 * Date: 01/03/2018
 * Time: 08:16
 */

if (!function_exists('hotel_pagoda_banner_callback_choice')):
    function hotel_pagoda_banner_callback_choice($control)
    {
        $banner_setting = $control->manager->get_setting('hotel_pagoda_theme_options[banner_picker]')->value();

        $control_id = $control->id;

        if (( $control_id == 'hotel_pagoda_theme_options[featured_page_slider_1]' || $control_id == 'hotel_pagoda_theme_options[featured_page_slider_2]') && $banner_setting == 'banner-slider') {
            return true;
        }

        if (($control_id == 'hotel_pagoda_theme_options[featured_page_slider_1]') && $banner_setting == 'banner-image') {
            return true;
        }

        return false;
    }
endif;

if (!function_exists('hotel_pagoda_stat_callback_choice')):
    function hotel_pagoda_stat_callback_choice($control)
    {
        $banner_setting = $control->manager->get_setting('hotel_pagoda_theme_options[hotel_pagoda_stat_option]')->value();

        $control_id = $control->id;

        if ((($control_id == 'hotel_pagoda_theme_options[hotel_pagoda_stat_icon1]') || ($control_id == 'hotel_pagoda_theme_options[hotel_pagoda_stat_icon2]') || ($control_id == 'hotel_pagoda_theme_options[hotel_pagoda_stat_icon3]') || ($control_id == 'hotel_pagoda_theme_options[hotel_pagoda_stat_icon4]')) && $banner_setting == 'icon-layout') {
            return true;
        }
        if ((($control_id == 'hotel_pagoda_theme_options[hotel_pagoda_stat_image1]') || ($control_id == 'hotel_pagoda_theme_options[hotel_pagoda_stat_image2]') || ($control_id == 'hotel_pagoda_theme_options[hotel_pagoda_stat_image3]') || ($control_id == 'hotel_pagoda_theme_options[hotel_pagoda_stat_image4]')) && $banner_setting == 'image-layout') {
            return true;
        }

        return false;
    }
endif;


if (!function_exists('hotel_pagoda_blank_widget')) {

    function hotel_pagoda_blank_widget()
    {
        $hotel_pagoda_theme_options = hotel_pagoda_get_theme_options();
        $pre_footer_layout = $hotel_pagoda_theme_options['pre_footer_layout'];
        if ($pre_footer_layout == 'prefooter2') {
            echo '<div class="col-md-6 footer-blank-widget">';
        } else {
            echo '<div class="col-md-4">';
        }
        if (is_user_logged_in() && current_user_can('edit_theme_options')) {
            echo '<a href="' . esc_url(admin_url('widgets.php')) . '" target="_blank"><i class="fa fa-plus-circle"></i> ' . esc_html__('Add Footer Widget', 'hotel-pagoda-lite') . '</a>';
        }
        echo '</div>';
    }
}

if (!function_exists('hotel_pagoda_get_excerpt')) :
    function hotel_pagoda_get_excerpt($post_id, $count)
    {
        $content_post = get_post($post_id);
        $excerpt = $content_post->post_content;

        $excerpt = strip_shortcodes($excerpt);
        $excerpt = strip_tags($excerpt);


        $excerpt = preg_replace('/\s\s+/', ' ', $excerpt);
        $excerpt = preg_replace('#\[[^\]]+\]#', ' ', $excerpt);
        $strip = explode(' ', $excerpt);
        foreach ($strip as $key => $single) {
            if (!filter_var($single, FILTER_VALIDATE_URL) === false) {
                unset($strip[$key]);
            }
        }
        $excerpt = implode(' ', $strip);

        $excerpt = substr($excerpt, 0, $count);
        if (strlen($excerpt) >= $count) {
            $excerpt = substr($excerpt, 0, strripos($excerpt, ' '));
            $excerpt = $excerpt . '...';
        }
        return $excerpt;
    }
endif;

if ( ! function_exists( 'hotel_pagoda_blog_post_format' ) ) {
    function hotel_pagoda_blog_post_format( $post_format, $post_id) {
        global $post;

        if ($post_format == 'video') {

            $content = trim(get_post_field('post_content', $post->ID));
            $ori_url = explode("\n", esc_html($content));
            $url = $ori_url[0];
            $url_type = explode(" ", $url);
            $url_type = explode("[", $url_type[0]);

            if (isset($url_type[1])) {
                $url_type_shortcode = $url_type[1];
            }
            $new_content = get_shortcode_regex();
            if (isset($url_type[1])) {
                if (preg_match_all('/' . $new_content . '/s', $post->post_content, $matches)
                    && array_key_exists(2, $matches)
                    && in_array($url_type_shortcode, $matches[2])
                ) {
                    echo do_shortcode($matches[0][0]);
                }
            } else {
                echo wp_oembed_get(hotel_pagoda_the_featured_video($content));
            }

        } elseif ($post_format == 'gallery') {
            add_filter( 'shortcode_atts_gallery', 'hotel_pagoda_shortcode_atts_gallery' );
            $image_url = get_post_gallery_images($post_id);
            $post_thumbnail_id = get_post_thumbnail_id($post_id);
            $attachment = get_post($post_thumbnail_id);
            if ($image_url) {
                ?>

                <div class="post-gallery">

                    <div class="post-format-gallery">
                        <?php foreach ($image_url as $key => $images) { ?>
                            <div class="slider-item" style="background-image: url('<?php echo esc_url($images); ?>');">
                            </div>
                        <?php } ?>
                    </div>

                </div>
            <?php } else {
                if (has_post_thumbnail() && !is_single() && is_page_template('page-templates/template-home.php')) {
                    echo '<div class="featured-image archive-thumb">';
                    echo '<a  href="' . esc_url(get_the_permalink()) . '" class="post-thumbnail">';
                    the_post_thumbnail();
                    echo '<div class="share-mask"><div class="share-wrap"></div></div></a></div>';
                } else {
                    the_post_thumbnail();
                }

            }


        } else {
            if (has_post_thumbnail() && !is_single() && is_page_template('page-templates/template-home.php')) {
                echo '<div class="featured-image archive-thumb">';
                echo '<a  href="' . esc_url(get_the_permalink()) . '" class="post-thumbnail">';

                the_post_thumbnail();
                echo '<div class="share-mask"><div class="share-wrap"></div></div></a></div>';
            } else {
                the_post_thumbnail();
            }

        }


    }
}

if (!function_exists('hotel_pagoda_the_featured_video')) {
    function hotel_pagoda_the_featured_video($content)
    {
        $ori_url = explode("\n", $content);
        $url = $ori_url[0];
        $w = get_option('embed_size_w');
        if (is_single() || is_archive() || is_search() || is_home() || is_page_template('page-templates/template-home.php')) {
            $url = str_replace('448', $w, $url);

            return $url;
        }

        if (0 === strpos($url, 'https://') || 0 == strpos($url, 'http://')) {
            echo esc_url(wp_oembed_get($url));
            $content = trim(str_replace($url, '', $content));
        } elseif (preg_match('#^<(script|iframe|embed|object)#i', $url)) {
            $h = get_option('embed_size_h');
            echo esc_url($url);
            if (!empty($h)) {

                if ($w === $h) $h = ceil($w * 0.75);
                $url = preg_replace(
                    array('#height="[0-9]+?"#i', '#height=[0-9]+?#i'),
                    array(sprintf('height="%d"', $h), sprintf('height=%d', $h)),
                    $url
                );
                echo esc_url($url);
            }


            $content = trim(str_replace($url, '', $content));
        }

    }
}


if (!function_exists('hotel_pagoda_post_excerpt')) {
    function hotel_pagoda_post_excerpt($post_content, $count)
    {
        $excerpt = $post_content;
        $excerpt = strip_tags($excerpt);
        $excerpt = strip_shortcodes($excerpt);
        $excerpt = preg_replace('/\s\s+/', ' ', $excerpt);
        $strip = explode(' ', $excerpt);
        foreach ($strip as $key => $single) {
            if (!filter_var($single, FILTER_VALIDATE_URL) === false) {
                unset($strip[$key]);
            }
        }
        $excerpt = implode(' ', $strip);
        $excerpt = substr($excerpt, 0, $count);
        if (strlen($excerpt) >= $count) {
            $excerpt = substr($excerpt, 0, strripos($excerpt, ' '));
            $excerpt = $excerpt . '...';
        }
        return $excerpt;
    }
}

if (!function_exists('hotel_pagoda_is_url')):
    function hotel_pagoda_is_url($uri)
    {
        if (preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}' . '((:[0-9]{1,5})?\\/.*)?$/i', $uri)) {
            return $uri;
        } else {
            return false;
        }
    }
endif;

//banner starts
if (!function_exists('hotel_pagoda_lite_slider_default_query')) {
    function hotel_pagoda_lite_slider_default_query()
    {
        global $post;
        $hp_settings = hotel_pagoda_get_theme_options();
        $hp_total_page_no = 0;
        $hp_list_page = array();
        for ($i = 1; $i <= 2; $i++) {
            if (isset ($hp_settings['featured_page_slider_' . $i]) && $hp_settings['featured_page_slider_' . $i] > 0) {
                $hp_total_page_no++;
                $hp_list_page = array_merge($hp_list_page, array(esc_attr($hp_settings['featured_page_slider_' . $i])));
            }
        }
        if (!empty($hp_list_page) && $hp_total_page_no > 0) {
            $get_featured_posts = new WP_Query(array('posts_per_page' => 2, 'post_type' => array('page'), 'post__in' => $hp_list_page, 'orderby' => 'post__in',));
            $i = 0;?>
                <div class="hp-banner-wrapper">
                    <div class="slider-item-wrapper">
                <?php
                while ($get_featured_posts->have_posts()):$get_featured_posts->the_post();
                $image_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                $i++;
                if (!empty($image_src)) {
                    $image_style = "style='background-image:url(" . esc_url($image_src[0]) . ")'";
                } else {
                    $image_style = "";
                }
                    ?>
                        <div class="slider-item slider1" <?php echo wp_kses_post($image_style); ?>">
                            <div class="banner-text-wrap" data-aos="fade-inUp">
                                <h2><?php the_title(); ?></h2>
                                <p><?php echo wp_kses_post(hotel_pagoda_post_excerpt(get_the_content(), 100)); ?></p>
                                <?php
                                        $btnlink = get_the_permalink();
                                    ?>
                                    <div class="btn-wrap">
                                        <a href="<?php echo esc_url($btnlink); ?>"
                                           class="button"><span><?php echo esc_html__('Read More','hotel-pagoda-lite'); ?></span></a>
                                    </div>
                            </div>
                        </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
                    </div>
                </div>


            <?php
        }
    }
}

if (!function_exists('hotel_pagoda_lite_single_image_banner')):
    function hotel_pagoda_lite_single_image_banner()
    {

        global $post;
        $hp_settings = hotel_pagoda_get_theme_options();
        $hp_list_page = $hp_settings['featured_page_slider_1'];
        if ($hp_list_page) {
            $get_featured_posts = new WP_Query( 'page_id='.$hp_list_page.'' );
            $i = 0;
            ?>
            <div class="hp-banner-wrapper">
                <div class="slider-item-wrapper">
                    <?php
                    while ($get_featured_posts->have_posts()):
                    $get_featured_posts->the_post();
                    $image_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                    $i++;
                    if (!empty($image_src)) {
                        $image_style = "style='background-image:url(" . esc_url($image_src[0]) . ")'";
                    } else {
                        $image_style = "";
                    }
                    ?>
                    <div class="slider-item slider1" <?php echo wp_kses_post($image_style); ?>">
                    <div class="banner-text-wrap" data-aos="fade-inUp">
                        <h2><?php the_title(); ?></h2>
                        <p><?php echo wp_kses_post(hotel_pagoda_post_excerpt(get_the_content(), 100)); ?></p>
                        <?php
                        $btnlink = get_the_permalink();
                        ?>
                        <div class="btn-wrap">
                            <a href="<?php echo esc_url($btnlink); ?>"
                               class="button"><span><?php echo esc_html__('Read More', 'hotel-pagoda-lite'); ?></span></a>
                        </div>
                    </div>
                </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
            </div>
            <?php
        }
    }
endif;

if (!function_exists('hotel_pagoda_breadcrumb')) {

    function hotel_pagoda_breadcrumb()
    {
        $header_image = get_header_image();
        if ((get_post_type() == 'portfolio') && !is_archive()) {
            $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
            $image = wp_get_attachment_image_src($post_thumbnail_id, 'full');
            $header_image = $image[0];
        }
        $customizer = hotel_pagoda_get_theme_options();
        $header_layout = $customizer['header_layout'];
        $addClass = '';
        if($header_layout=='header-3')
            $addClass = ' header-extended-breadcrumb';
        ?>
        <div class="inner-banner-wrap<?php echo esc_attr($addClass); ?>" <?php if ($header_image) { ?>style="background-image:url(<?php echo esc_url($header_image); ?>)"<?php } ?>>
            <div class="container">
                <div class="row">
                    <div class="inner-banner-content">
                        <?php
                        if (is_archive()) {
                            the_archive_title('<h2>', '</h2>');
                        }
                        if (is_search()) {
                            echo ('<h2>'.esc_html__('Search Page','hotel-pagoda-lite').'</h2>');
                        }
                        if (is_single()) {
                            the_title('<h2>', '</h2>');
                        }
                        if(is_page() && !is_page_template('page-templates/template-home.php')){
                            the_title('<h2>', '</h2>');
                        }
                        ?>
                        <div class="header-breadcrumb">
                            <?php

                            if (is_page_template('page-templates/template-home.php')) {

                            } else {

                                $delimiter = '';
                                if(is_home())
                                    $home = '<h2>'.esc_html__('Blog', 'hotel-pagoda-lite').'</h2>'; // text for the 'Home' link
                                else
                                    $home =esc_html__('Home', 'hotel-pagoda-lite'); // text for the 'Home' link

                                $before = '<li>'; // tag before the current crumb
                                $after = '</li>'; // tag after the current crumb
                                echo '<ul class="breadcrumb">';
                                global $post;
                                $homeLink = home_url();
                                echo '<li><a href="' . esc_url($homeLink) . '">' . wp_kses_post($home) . '</a></li>' . wp_kses_post($delimiter) . ' ';
                                if (is_category()) {
                                    global $wp_query;
                                    $cat_obj = $wp_query->get_queried_object();
                                    $thisCat = $cat_obj->term_id;
                                    $thisCat = get_category($thisCat);
                                    $parentCat = get_category($thisCat->parent);
                                    if ($thisCat->parent != 0)
                                        echo(get_category_parents(esc_html($parentCat), TRUE, ' ' . wp_kses_post($delimiter) . ' '));
                                    echo wp_kses_post($before) . single_cat_title('', false) . wp_kses_post($after);
                                } elseif (is_day()) {
                                    echo '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_attr(get_the_time('Y')) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                                    echo '<li><a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '">' . esc_attr(get_the_time('F')) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                                    echo wp_kses_post($before) . esc_attr(get_the_time('d')) . wp_kses_post($after);
                                } elseif (is_month()) {
                                    echo '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_attr(get_the_time('Y')) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                                    echo wp_kses_post($before) . esc_attr(get_the_time('F')) . wp_kses_post($after);
                                } elseif (is_year()) {
                                    echo wp_kses_post($before) . esc_attr(get_the_time('Y')) . wp_kses_post($after);
                                } elseif (is_single() && !is_attachment()) {
                                    if (get_post_type() != 'post') {
                                        $post_type = get_post_type_object(get_post_type());
                                        $slug = $post_type->rewrite;
                                        echo '<li><a href="' . esc_url($homeLink) . '/' . esc_attr($slug['slug']) . '/">' . esc_html($post_type->labels->singular_name) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                                        echo wp_kses_post($before) . esc_html(get_the_title()) . wp_kses_post($after);
                                    } else {
                                        $cat = get_the_category();
                                        $cat = $cat[0];
                                        echo wp_kses_post($before) . esc_html(get_the_title()) . wp_kses_post($after);
                                    }

                                } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
                                    $post_type = get_post_type_object(get_post_type());
                                    if (!empty($post_type)) {
                                        echo wp_kses_post($before) . esc_html($post_type->labels->singular_name) . wp_kses_post($after);
                                    }
                                } elseif (is_attachment()) {
                                    $parent = get_post($post->post_parent);
                                    $cat = get_the_category($parent->ID);
                                    echo '<li><a href="' . esc_url(get_permalink($parent)) . '">' . esc_html($parent->post_title) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                                    echo wp_kses_post($before) . esc_attr(get_the_title()) . wp_kses_post($after);
                                } elseif (is_page() && !$post->post_parent) {
                                    echo wp_kses_post($before) . esc_attr(get_the_title()) . wp_kses_post($after);
                                } elseif (is_page() && $post->post_parent) {
                                    $parent_id = $post->post_parent;
                                    $breadcrumbs = array();
                                    while ($parent_id) {
                                        $page = get_post($parent_id);
                                        $breadcrumbs[] = '<li><a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_html(get_the_title($page->ID)) . '</a></li>';
                                        $parent_id = $page->post_parent;
                                    }
                                    $breadcrumbs = array_reverse($breadcrumbs);
                                    foreach ($breadcrumbs as $crumb)
                                        echo wp_kses_post($crumb) . ' ' . wp_kses_post($delimiter) . ' ';
                                    echo wp_kses_post($before) . esc_html(get_the_title()) . wp_kses_post($after);
                                } elseif (is_search()) {
                                    echo wp_kses_post($before) . esc_html__("Search results for: ", "hotel-pagoda-lite") . esc_html(get_search_query()) . '' . wp_kses_post($after);
                                } elseif (is_tag()) {
                                    echo wp_kses_post($before) . esc_html__('Tag', 'hotel-pagoda-lite') . single_tag_title('', false) . wp_kses_post($after);
                                } elseif (is_author()) {
                                    global $author;
                                    $userdata = get_userdata($author);
                                    echo wp_kses_post($before) . esc_html__("Articles posted by", "hotel-pagoda-lite") . ' ' . esc_html($userdata->display_name) . wp_kses_post($after);
                                } elseif (is_404()) {
                                    echo wp_kses_post($before) . esc_html__("Error 404", "hotel-pagoda-lite") . wp_kses_post($after);
                                } elseif (is_page_template('page-templates/template-contact.php')) {
                                    echo wp_kses_post($before) . esc_attr(get_the_title()) . wp_kses_post($after);
                                }
                            }
                            echo '</ul>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

if (!function_exists('hotel_pagoda_check_sidebar')) {
    function hotel_pagoda_check_sidebar()
    {

        $hotel_pagoda_theme_options = hotel_pagoda_get_theme_options();
        $sidebar_layout = $hotel_pagoda_theme_options['sidebar_layout_picker'];
        if ($sidebar_layout == '1') {
            $sidebar_class = 'no-sidebar';
        } else if ($sidebar_layout == '3' && is_active_sidebar('hotel_pagoda_main_sidebar')) {
            $sidebar_class = 'pull-right';
        } else if ($sidebar_layout == '2' && is_active_sidebar('hotel_pagoda_main_sidebar')) {
            $sidebar_class = 'pull-left';
        } else {
            $sidebar_class = 'no-selection';
        }
        return $sidebar_class;
    }
}

if ( ! function_exists( 'hotel_pagoda_lite_archive_link' ) ) {
    function hotel_pagoda_lite_archive_link( $post ){
        $year = date('Y',strtotime($post->post_date));
        $month = date('m',strtotime($post->post_date));
        $day = date('d',strtotime($post->post_date));
        $link = site_url('') . '/' . $year . '/' . $month . '?day=' . $day;
        return $link;
    }
}
