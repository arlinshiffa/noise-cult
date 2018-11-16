<?php
global $post;
global $wp_query;
$hotel_pagoda_theme_options = hotel_pagoda_get_theme_options();
$loop = 0;
$show = $hotel_pagoda_theme_options['show_blog_section'];
if($show) {
    $blog_title = $hotel_pagoda_theme_options['blog_title'];
    $blog_subtitle = $hotel_pagoda_theme_options['blog_desc'];
    $meta = $hotel_pagoda_theme_options['hotel_pagoda_entry_meta_blog'];
    $image = $hotel_pagoda_theme_options['blog_background'];
    $category = $hotel_pagoda_theme_options['blog_category'];

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
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
    if (!empty($image)) {
        $image_style = "style='background-image:url(" . esc_url($image) . ")'";
    } else {
        $image_style = '';
    }
    $loop = 1;
    $featured = new WP_Query($args);
    ?>
    <section id="blog" class="hp-section blog-sec" <?php echo wp_kses_post($image_style); ?>>

        <?php if ($blog_title || $blog_subtitle) { ?>
            <div class="section-title">
                <?php echo (esc_html($blog_title)) ? '<h2>' . esc_html($blog_title) . '</h2>' : ''; ?>
                <?php echo (esc_html($blog_subtitle)) ? '<p>' . esc_html($blog_subtitle) . '</p>' : ''; ?>
            </div>
        <?php } ?>
        <div class="container">
            <div class="row">
                <?php

                while ($featured->have_posts()) : $featured->the_post();
                    $post_format = get_post_format($post->ID);
                    $blog_post_author = get_avatar(get_the_author_meta('ID'), 32);
                    $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                    $image = wp_get_attachment_image_src($post_thumbnail_id, 'full');
                    $author_name = get_the_author_meta('display_name');
                    $category = get_the_category();
                    $id = get_the_ID();
                    if ($loop <= 3):
                        ?>

                        <div class="col-md-4">
                            <div class="post-module" data-aos="fadeinUp">
                                <!-- post-Thumbnail-->
                                <div class="post-thumbnail">
                                    <div class="date">
                                        <div class="day"><?php echo get_the_time('d') ?></div>
                                        <div class="month"><?php echo get_the_time('M') ?></div>
                                    </div>
                                    <?php hotel_pagoda_blog_post_format($post_format, $post->ID); ?>
                                </div>
                                <!-- Post Content-->
                                <div class="post-content">
                                    <?php echo '<h1 class="title"><a href="' . esc_url(get_the_permalink()) . '">' . get_the_title() . '</a></h1>' ?>
                                    <p class="description"><?php echo wp_kses_post(hotel_pagoda_get_excerpt($id, 125)); ?></p>


                                    <?php if ($meta == 'show-meta'): ?>

                                        <div class="post-meta">
                                            <span class="timestamp"><i
                                                        class="fa fa-clock-o"></i>&nbsp;<?php printf(_x('%s ago', '%s = human-readable time difference', 'hotel-pagoda-lite'), human_time_diff(get_the_time('U'), current_time('timestamp'))); ?></span>
                                            <span class="comments"><a
                                                        href="<?php echo esc_url(get_comments_link($post->ID));; ?>"><i
                                                            class="fa fa-comments"></i><?php echo esc_html(get_comments_number()); ?></a></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php $loop++; endif; endwhile; ?>
            </div>
        </div>
    </section>
    <?php
}