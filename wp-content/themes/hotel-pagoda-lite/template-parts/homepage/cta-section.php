<?php
$hotel_pagoda_settings 	 = hotel_pagoda_get_theme_options();
$video_option            = $hotel_pagoda_settings['cta_video_radio'];
$home_cta_title		 	 = $hotel_pagoda_settings['home_cta_title'];
$home_cta_description	 = $hotel_pagoda_settings['home_cta_description'];
$cta_video_bg_image		 = $hotel_pagoda_settings['cta_video_bg_image'];
$video_bg_option		 = $hotel_pagoda_settings['video_bg_option'];
$btntext          		 = $hotel_pagoda_settings['cta_button_txt'];
$btnlink          		 = $hotel_pagoda_settings['cta_button_url'];
$default = "";


if(!empty($home_video_bg_image)){
    $background_style = "style='background-image:url(".esc_url($home_video_bg_image).")'";
}
else{
    $background_style = '';
}
 if((empty($default)) && ($home_cta_title||$home_cta_description)):?>
    <div class="hp-section cta-sec-bottom <?php  if ($video_bg_option == 'vid_repeat' ) { echo "background-repeat"; } else { echo "bg-cover"; } ?>" <?php echo wp_kses_post($background_style); ?> style="background-image: url(<?php echo esc_url($cta_video_bg_image); ?>);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="section-content" data-aos="fadeinUp">
                        <h1 class="cta-title"><?php echo esc_html($home_cta_title); ?></h1>
                        <p><?php echo esc_html($home_cta_description); ?></p>
                        <?php  if( $btntext && $btnlink):?>
                            <a href="<?php echo esc_url($btnlink); ?>" class="button"><?php echo esc_html($btntext); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>
