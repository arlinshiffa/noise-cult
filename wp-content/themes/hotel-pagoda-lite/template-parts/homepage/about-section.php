<?php
$hotel_pagoda_theme_options = hotel_pagoda_get_theme_options();
$intro_pages = $hotel_pagoda_theme_options['intro_pages'];
$intro_title = $hotel_pagoda_theme_options['intro_title'];
$mid_bg_image = $hotel_pagoda_theme_options['mid_bg_image'];
$show_stats_section = $hotel_pagoda_theme_options['show_stats_section'];
$mid_bg_option = $hotel_pagoda_theme_options['mid_bg_option'];
$choice = $hotel_pagoda_theme_options['hotel_pagoda_stat_option'];
$content_length = '250';

if (!empty($intro_pages)):
    $intro_pages_arg = array(
        'post_type' => 'page',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        'page_id' => $intro_pages);
    $intro_pages_query = new WP_Query($intro_pages_arg);
    if ($intro_pages_query->have_posts()): ?>

        <section id="about" class="hp-section section-about">
            <div class="container">
                <div class="row">
                    <?php
                    while ($intro_pages_query->have_posts()):
                        $intro_pages_query->the_post();
                        $image_style = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                        ?>
                        <div class="col-md-6">
                            <div class="about-wrap" data-aos="fadeinUp">
                                <div class="section-title">
                                    <h2><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <?php echo ($intro_title) ? '<p>' . esc_html($intro_title) . '</p>' : ''; ?>
                                </div>
                                <p><?php echo wp_kses_post(hotel_pagoda_get_excerpt($intro_pages_query->post->ID, $content_length)); ?></p>
                                <?php
                                if ($show_stats_section == 1) {
                                    ?>
                                    <div class="counter-wrap">
                                        <?php for ($i = 1; $i <= 3; $i++) {
                                            $stat_title = $hotel_pagoda_theme_options['hotel_pagoda_stat_title' . $i . ''];
                                            $stat_number = $hotel_pagoda_theme_options['hotel_pagoda_stat_number' . $i . ''];
                                            if ($stat_title || $stat_number): ?>
                                                <div class="counter-item">
                                        <span class="timer" data-from="0"
                                              data-to="<?php echo esc_html($stat_number); ?>" data-speed="2000"
                                              data-refresh-interval="50"></span>
                                                    <div class="counter-info">
                                                        <h3><?php echo esc_html($stat_title); ?></h3>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php if ($image_style[0]): ?>
                                <div class="about-img" data-aos="fadeinUp">
                                    <div class="hp-about-slider">
                                        <div class="about-slider-item">
                                            <img src="<?php echo esc_url($image_style[0]) ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php
                    endwhile;
                    ?>
                </div>
        </section>

    <?php endif;
endif;
