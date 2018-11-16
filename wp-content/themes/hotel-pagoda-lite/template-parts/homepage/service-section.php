<?php
$hotel_pagoda_settings = hotel_pagoda_get_theme_options();
$show_recent = $hotel_pagoda_settings['hotel_pagoda_top_callout_show'];
$title = $hotel_pagoda_settings['callout_title'];
$description = $hotel_pagoda_settings['callout_desc'];
$category = $hotel_pagoda_settings['callout_category'];
$count = $hotel_pagoda_settings['recent_number'];
$recent_box_layout = $hotel_pagoda_settings['recent_box'];
$layout = $hotel_pagoda_settings['recent_layout'];
$image = $hotel_pagoda_settings['recent_background'];
$recent_layout = ($recent_box_layout=='container')?'container':'container-fluid';
if($show_recent) {
    if (!empty($image)) {
        $image_style = "style='background-image:url(" . esc_url($image) . ")'";
    } else {
        $image_style = '';
    }
    if (1 == $show_recent):
        if ($category == 'none') {
            $args = array(
                'post_type' => 'service',
                'posts_per_page' => 4,
                'post_status' => 'publish',
                'order' => 'desc',
                'orderby' => 'menu_order date',
            );
        } else {
            $args = array(
                'post_type' => 'service',
                'posts_per_page' => 4,
                'post_status' => 'publish',
                'order' => 'desc',
                'orderby' => 'menu_order date',
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'service_category',
                        'field' => 'slug',
                        'terms' => array($category),
                        'include_children' => true,
                        'operator' => 'IN'
                    ),
                )
            );
        }

        $recent_query = new WP_Query($args);
        if ($recent_query->have_posts() || $title || $description) :
        ?>
        <section id="services" class="hp-section features-sec">
            <div class="container">
                <div class="row">
                    <?php if ($title || $description): ?>
                        <div class="section-title">
                            <?php
                            if ($title)
                                echo '<h2>' . esc_html($title) . '</h2>';
                            if ($description)
                                echo '<p>' . esc_html($description) . '</p>';
                            ?>
                        </div>
                    <?php endif; ?>
                    <div class="features-slider">
                        <?php
                        while ($recent_query->have_posts()) : $recent_query->the_post();
                            $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                            $image = wp_get_attachment_image_src($post_thumbnail_id, 'full');
                            $content = get_the_content();
                            $shortdescription = get_post_meta(get_the_ID(), 'hotel_pagoda_base_camp_service_icons', true);
                            $id = get_the_ID();
                            $category = get_the_terms($id, 'service_category');
                            $type = '';
                            if (!empty($category[0]->name)) {
                                $type = $category[0]->name;
                            }
                            if (!empty($image)) {
                                $image_style = "style='background-image:url(" . esc_url($image[0]) . ")'";
                            } else {
                                $image_style = '';
                            }
                            ?>
                            <div class="col-md-3">
                                <a href="<?php echo esc_url(get_the_permalink()); ?>"
                                   class="tilter tilter--7 slider1" <?php echo wp_kses_post($image_style); ?>>
                                    <div class="tilter__figure">
                                        <div class="tilter__deco tilter__deco--shine">
                                            <div></div>
                                        </div>
                                        <div class="tilter__caption">
                                            <h3 class="tilter__title"><?php the_title(); ?></h3>
                                            <p class="tilter__description"><?php echo esc_html($shortdescription); ?></p>
                                        </div>
                                        <svg class="tilter__deco tilter__deco--lines" viewBox="0 0 300 415">
                                            <path d="M20.5,20.5h260v375h-260V20.5z"/>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                        ?>

                    </div>
                </div>
            </div>
        </section>
        <?php
        endif;
    endif;
}