<?php
$hotel_pagoda_theme_options = hotel_pagoda_get_theme_options();
$show_service = $hotel_pagoda_theme_options['hotel_pagoda_service_show'];

if ($show_service == 1) {
    $title = $hotel_pagoda_theme_options['service_title'];
    $subtitle = $hotel_pagoda_theme_options['service_desc'];
    $count = $hotel_pagoda_theme_options['service_posts'];
    $layout = $hotel_pagoda_theme_options['service_layout1'];
    $image = $hotel_pagoda_theme_options['service_background'];

    $no_of_posts = (!empty($count) ? $count : '6');
    if (!empty($image)) {
        $image_style = "style='background-image:url(" . esc_url($image) . ")'";
    } else {
        $image_style = '';
    }
    $args = array(
        'post_type' => 'amenity',
        'posts_per_page' => $no_of_posts,
        'post_status' => 'publish',
        'order' => 'desc',
        'orderby' => 'menu_order date',
    );
    $recent_query = new WP_Query($args);
    ?>
    <section id="amenities" class="hp-section section-amenities">
        <div class="container">
            <?php if ($title || $subtitle) { ?>
                <div class="col-md-3">
                    <div class="section-title txt-left">
                        <?php
                        if ($title)
                            echo '<h2>' . esc_html($title) . '</h2>';
                        if ($subtitle)
                            echo '<p>' . esc_html($subtitle) . '</p>';
                        ?>
                    </div>
                </div>

            <?php } ?>
            <div class="col-md-9">
                <div class="amentitles-cat-block">
                    <?php
                    while ($recent_query->have_posts()) : $recent_query->the_post();
                        $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                        $image = wp_get_attachment_image_src($post_thumbnail_id, 'full');
                        $content = get_the_content();
                        $id = get_the_ID();
                        $icon = get_post_meta(get_the_ID(), 'hotel_pagoda_base_camp_service_icons', true);
                        ?>
                        <div class="amenities-category-wrap">
                            <div class="amenities-cat-item">
                                <img src="<?php echo $image[0]; ?>" alt="">
                                <h3 class="amenities-title"><?php the_title(); ?></h3>
                            </div>
                        </div>

                        <?php
                    endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}