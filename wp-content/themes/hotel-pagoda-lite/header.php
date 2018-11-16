<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hotel_Pagoda
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
$hotel_pagoda_options = hotel_pagoda_get_theme_options();
$head_fb = $hotel_pagoda_options['contact_fblink'];
$head_tw = $hotel_pagoda_options['contact_tlink'];
$head_ins = $hotel_pagoda_options['contact_ins'];
$head_phone = $hotel_pagoda_options['header_phone'];
?>
<header class="header hp-hero header-slider">
    <?php
    $video_youtube = $hotel_pagoda_options['youtube_video'];
    $mute_sound = $hotel_pagoda_options['banner_video_audio'];
    $mute_sound = ($mute_sound)?'true':'false';
    if($video_youtube)
    echo "<div class=\"bgndVideo player\" data-property=\"{videoURL:'".esc_url($video_youtube)."',containment:'.hp-hero',autoPlay:true, showControls:false, mute:".esc_attr($mute_sound).", startAt:0, opacity:1}\"></div>";?>

    <div class="nav-wrapper header-default navbar-transparent">
        <div class="container-fluid">
            <div class="col-md-2">
                <?php
                $description = get_bloginfo('description', 'display');
                if ((function_exists('the_custom_logo') && has_custom_logo())) {
                    the_custom_logo();
                } else {
                    ?>
                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                        <h3 class="site-title"><?php bloginfo('name'); ?></h3>

                        <p class="site-description"><?php echo esc_html($description) ?></p>
                    </a>
                    <?php
                }
                ?>
            </div>

            <div class="col-md-10">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                        <span class="sr-only"><?php echo esc_html__('Toggle navigation','hotel-pagoda-lite'); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Start of Naviation -->
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => '',
                        'menu_class' => 'nav navbar-nav navbar-left',
                        'walker' => new hotel_pagoda_nav_walker(),
                        'fallback_cb' => 'hotel_pagoda_nav_walker::fallback',
                    ));
                    ?>
                    <?php
                    if($head_fb || $head_ins || $head_tw || $head_phone){
                        echo '<ul class="nav navbar-nav navbar-right">';
                        if($head_fb)
                            echo '<li class="header-icon header-social-icon"><a href="'.esc_attr($head_fb).'"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';
                        if($head_tw)
                            echo '<li class="header-icon header-social-icon"><a href="'.esc_attr($head_tw).'"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
                        if($head_ins)
                            echo '<li class="header-icon header-social-icon"><a href="'.esc_attr($head_ins).'"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>';
                        if($head_phone)
                            echo '<li class="header-icon header-contact"><a href="tel:'.esc_attr($head_phone).'"><span>Phone: '.esc_html($head_phone).'</span></a></li>';
                        if($head_fb || $head_ins || $head_tw || $head_phone)
                            echo '</ul>';
                        ?>
                    <?php } ?>
                </div><!-- End navbar-collapse -->
            </div>
        </div>
    </div>
    <!-- End of Navigation -->

    <!-- Start of header banner -->

    <?php
    $hp_settings = hotel_pagoda_get_theme_options();

    if (is_page_template('page-templates/template-home.php')) {
        $banner_choice = sanitize_text_field($hotel_pagoda_options['banner_picker']);
        $banner_post_type = $hotel_pagoda_options['banner_post_type'];

        switch ($banner_choice) {
            case "banner-slider":
                if (function_exists('hotel_pagoda_lite_slider_default_query')) :
                    wp_kses_post(hotel_pagoda_lite_slider_default_query());

                endif;
                break;
            case "banner-image":
                if (function_exists('hotel_pagoda_lite_single_image_banner')) :
                     wp_kses_post(hotel_pagoda_lite_single_image_banner());
                endif;
                break;
        }


    } else {
            hotel_pagoda_breadcrumb();
    }
    ?>

</header>
