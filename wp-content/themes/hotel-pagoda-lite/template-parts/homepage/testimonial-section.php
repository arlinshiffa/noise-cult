<?php
$hotel_pagoda_settings = hotel_pagoda_get_theme_options();
$show_testimonial = $hotel_pagoda_settings['show_testimonial_section'];
$title = $hotel_pagoda_settings['testimonial_title'];
$description = $hotel_pagoda_settings['testimonial_desc'];
$options = $hotel_pagoda_settings['testimonial_options_column'];
$testimonial_image = $hotel_pagoda_settings['testimonial_image'];
$testimonial_bg_option = $hotel_pagoda_settings['testimonial_bg'];
$testimonial_section_color = $hotel_pagoda_settings['testimonial_section_color'];
$layout = $hotel_pagoda_settings['testimonial_options_column'];
$count = $hotel_pagoda_settings['testimonial_count'];
$no_of_posts = (!empty($count) ? $count : '3');

$args = array(
    'post_type' => 'jetpack-testimonial',
    'posts_per_page' => $no_of_posts,
    'post_status' => 'publish',
    'order' => 'desc',
    'orderby' => 'menu_order date',
);
$testimonial_query = new WP_Query($args);
if (!empty($testimonial_image)) {
    $background_style = "style='background-image:url(" . esc_url($testimonial_image) . ")'";
} else {
    $background_style = '';
}
$class = ($testimonial_bg_option ? $testimonial_bg_option : '');
?>



<?php if ($testimonial_query->have_posts() || $title || $description):?>

    <!-- Start of testimonial section -->
    <section id="testimonial" class="hp-section testimonials-sec" <?php echo wp_kses_post($background_style); ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="section-content">

                        <div class="testimonial-slider text-center">
                            <?php

                            while ($testimonial_query->have_posts()) : $testimonial_query->the_post();
                                global $post;
                                $recent_category = "";
                                $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                $image = wp_get_attachment_image_src($post_thumbnail_id, 'hotel-pagoda-testimonial-image');
                                $designation = get_post_meta(get_the_ID(), 'hotel_pagoda_base_camp_testimonial_designation', true);
                                $content = get_the_content();
                                ?>

                                <div class="testimonial-slide">
                                    <?php
                                    if ($content) {
                                        echo '<div class="client-testimonial">';
                                        echo '<h2>'.esc_html($designation).'</h2><p>';
                                        echo wp_kses_post(hotel_pagoda_post_excerpt($content, 300));
                                        echo '</p></div>';
                                    }
                                    if ($image): ?>
                                        <div class="client-img">
                                            <img src="<?php echo esc_url($image[0]); ?>" alt="">
                                        </div>
                                    <?php endif; ?>
                                    <div class="testimonial-rating">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <h3 class="testimonial-title"><?php the_title(); ?></h3>
                                </div>

                            <?php endwhile;
                            wp_reset_postdata(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
endif; ?>
