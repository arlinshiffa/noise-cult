<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hotel_Pagoda
 */

get_header();
$content_class = '';
$sidebar_class = hotel_pagoda_check_sidebar();
if ($sidebar_class == 'pull-left'):
    $content_class = 'pull-right';
elseif ($sidebar_class == 'pull-right'):
    $content_class = 'pull-left';
endif;

    ?>
    <div class="section-content section">
        <div class="container">
            <div class="row">
                <?php if ($sidebar_class != 'no-sidebar'): ?>
                <div class="col-md-8 <?php echo esc_html($content_class); ?>">
                    <?php endif; ?>
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main clearfix" role="main">

                            <?php
                            if (have_posts()) : ?>

                                <header class="page-header">
                                    <?php
                                    if (is_author()) {
                                        ?>
                                        <div class="author-img">
                                            <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
                                        </div>

                                        <?php
                                        $author_name = get_the_author_meta('display_name');
                                        $author_firstname = get_the_author_meta('first_name');
                                        $author_lastname = get_the_author_meta('last_name');
                                        if ($author_firstname && $author_lastname) {
                                            $title = esc_attr($author_firstname) . ' ' . esc_attr($author_lastname);
                                        } else {
                                            $title = esc_attr($author_name);
                                        }
                                        echo '<h1 class="page-title">' . esc_html($title) . '</h1>';
                                        echo wp_kses_post(get_the_author_meta('description'));
                                    }
                                    else{
                                        the_archive_title('<h1 class="page-title">', '</h1>');
                                        the_archive_description('<div class="archive-description">', '</div>');

                                    }
                                    ?>
                                </header><!-- .page-header -->

                                <?php
                                /* Start the Loop */
                                while (have_posts()) : the_post();

                                    /*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
                                    get_template_part('template-parts/content', get_post_format());
                                endwhile;

                                the_posts_pagination( array(
                                    'mid_size' => 2,
                                    'prev_text' => __( '<i class="fa fa-angle-left"></i>', 'hotel-pagoda-lite' ),
                                    'next_text' => __( '<i class="fa fa-angle-right"></i>', 'hotel-pagoda-lite' ),
                                ) );

                            else :

                                get_template_part('template-parts/content', 'none');

                            endif; ?>

                        </main><!-- #main -->
                    </div><!-- #primary -->
                    <?php if ($sidebar_class != 'no-sidebar'): ?>
                </div>
            <?php endif; ?>

                <?php if ($sidebar_class != 'no-sidebar'): ?>


                    <div class="col-md-4 sidebar <?php echo esc_html($sidebar_class); ?>">

                        <div id="secondary">
                            <?php if (is_active_sidebar('hotel_pagoda_main_sidebar')) {
                                dynamic_sidebar('hotel_pagoda_main_sidebar');
                            } ?>
                        </div>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php
get_footer();
