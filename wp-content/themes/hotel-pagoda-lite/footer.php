<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hotel_Pagoda
 */

$hotel_pagoda_options = hotel_pagoda_get_theme_options();
$pre_footer_layout = $hotel_pagoda_options['pre_footer_layout'];
$class = '';
if (!empty($contact_bg)) {
    $image_style = "style='background-image:url(" . esc_url($contact_bg) . ")'";
} else {
    $image_style = '';
}
?>
<!-- End of contact section -->

<!-- Footer -->
<footer>
    <div class="widget-area footer-widgets footer-widget-area-top">
        <div class="container">
            <div class="row">
                <?php
                if ($pre_footer_layout == 'prefooter1') {
                    if (($pre_footer_layout == 'prefooter1' || is_active_sidebar('hotel_pagoda_footer_1') || is_active_sidebar('hotel_pagoda_footer_2') || is_active_sidebar('hotel_pagoda_footer_3') || is_active_sidebar('hotel_pagoda_footer_4'))) { ?>

                        <?php if (is_active_sidebar('hotel_pagoda_footer_1')) : ?>
                            <div class="col-md-4 col-sm-12">
                                <?php dynamic_sidebar('hotel_pagoda_footer_1') ?>
                            </div>
                            <?php
                        else: hotel_pagoda_blank_widget();
                        endif; ?>

                        <?php if (is_active_sidebar('hotel_pagoda_footer_2')) : ?>
                            <div class="col-md-4 col-sm-12">
                                <?php dynamic_sidebar('hotel_pagoda_footer_2') ?>
                            </div>
                            <?php
                        else: hotel_pagoda_blank_widget();
                        endif; ?>
                        <?php if (is_active_sidebar('hotel_pagoda_footer_3')) : ?>
                            <div class="col-md-4 col-sm-12">
                                <?php dynamic_sidebar('hotel_pagoda_footer_3') ?>
                            </div>
                            <?php
                        else: hotel_pagoda_blank_widget();
                        endif; ?>
                    <?php }
                } else {
                    if (($pre_footer_layout == 'prefooter2' || is_active_sidebar('hotel_pagoda_footer_1') || is_active_sidebar('hotel_pagoda_footer_2'))) { ?>

                        <?php if (is_active_sidebar('hotel_pagoda_footer_1')) : ?>
                            <div class="col-md-6 col-sm-6">
                                <?php dynamic_sidebar('hotel_pagoda_footer_1') ?>
                            </div>
                            <?php
                        else: hotel_pagoda_blank_widget();
                        endif; ?>

                        <?php if (is_active_sidebar('hotel_pagoda_footer_2')) : ?>
                            <div class="col-md-6 col-sm-6">
                                <?php dynamic_sidebar('hotel_pagoda_footer_2') ?>
                            </div>
                            <?php
                        else: hotel_pagoda_blank_widget();
                        endif; ?>
                    <?php }

                }
                ?>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Container -->
    </div>
    <!-- Footer Widgets -->

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 txt-center">
                        <div class="copyright">
                            <p><?php echo esc_html__('Powered By WordPress', 'hotel-pagoda-lite');
                                echo esc_html__(' | ', 'hotel-pagoda-lite') ?>
                                <a target="_blank" rel="nofollow"
                                   href="<?php echo esc_url('https://www.pridethemes.com/product/hotel-pagoda-lite/'); ?>"><?php echo 'Hotel Pagoda Lite'; ?></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</footer>
<?php wp_footer(); ?>

</body>
</html>
