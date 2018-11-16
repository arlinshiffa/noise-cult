<?php
$hotel_pagoda_settings 	 = hotel_pagoda_get_theme_options();
$show_hotel            = $hotel_pagoda_settings['room_checkbox'];
$hp_list_page = $hotel_pagoda_settings['room_page'];
$get_featured_posts = '';
$category           = $hotel_pagoda_settings['room_category'];
if($show_hotel) {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'order' => 'desc',
            'orderby' => 'menu_order date',
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => array( $category ),
                ),
            ),
        );
    $query = new WP_Query($args);

    ?>

    <section id="accomodation" class="hp-section section-accomodation">
        <div class="container">
            <?php
            if ($hp_list_page) {
                $get_featured_posts = new WP_Query('page_id=' . $hp_list_page . '');

                $title = '';
                $description = '';
                while ($get_featured_posts->have_posts()):
                    $get_featured_posts->the_post();
                    $title = get_the_title();
                    $description = get_the_content();
                    ?>
                    <?php if ($title || $description):
                    echo '<div class="row">';
                    echo '<div class="section-title">';
                    if ($title)
                        echo '<h2>' . esc_html($title) . '</h2>';
                    if ($description)
                        echo '<p>' . wp_kses_post(hotel_pagoda_post_excerpt($description, 100)). '</p>';

                    echo '</div>';
                    echo '</div>';
                endif;
                    ?>
                <?php endwhile;
                wp_reset_postdata();
            }?>


            <div class="hp-accomodation-wrap" data-aos="fadeinUp">
                <?php while ($query->have_posts()):$query->the_post();
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                    if (!empty($image)) {
                        $image_style = "style='background-image:url(" . esc_url($image[0]) . ")'";
                    } else {
                        $image_style = '';
                    }
                    $description = get_the_content();
                    ?>
                    <div class="accomodation-item-wrap slide1" <?php echo wp_kses_post($image_style); ?>>
                        <a href="<?php echo esc_url(get_the_permalink()); ?>" class="button btn-default">
                            <span><?php echo esc_html__('Book Now','hotel-pagoda-lite'); ?></span></a>
                        <div class="accomodation-footer">
                            <h2><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo get_the_title(); ?></a>
                            </h2>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php
}
