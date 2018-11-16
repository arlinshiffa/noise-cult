<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hotel_Pagoda
 */

get_header();
$content_class = '';
$sidebar_class = hotel_pagoda_check_sidebar();
$s_class = '';
if($sidebar_class == 'pull-left'):
    $content_class = 'pull-right';
    $s_class = 'sidebar-page';
elseif($sidebar_class == 'pull-right'):
    $content_class = 'pull-left';
    $s_class = 'sidebar-page';
elseif($sidebar_class == 'no-sidebar'):
    $content_class = 'no-sidebar';
    $s_class = 'no-sidebar';
endif;
$col = 8;
?>
    <div class="section-content section <?php echo esc_attr($s_class); ?>">
        <div class="container">
            <div class="row">

                <?php if($sidebar_class != 'no-sidebar'):?>
                <div class="col-md-<?php echo esc_attr($col); ?> <?php echo esc_html($content_class);?>">
                    <?php endif; ?>
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                            <?php
                            while (have_posts()) : the_post();

                                get_template_part('template-parts/content', 'page');

                                // If comments are open or we have at least one comment, load up the comment template.
                                if (comments_open() || get_comments_number()) :
                                    comments_template();
                                endif;
                            endwhile; // End of the loop.
                            ?>

                        </main><!-- #main -->
                    </div><!-- #primary -->

                    <?php if($sidebar_class != 'no-sidebar'):?>
                </div>
            <?php endif; ?>

                <?php if($sidebar_class != 'no-sidebar'):?>

                    <div class="col-md-4 sidebar <?php echo esc_html($sidebar_class);?>">

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
