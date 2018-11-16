<?php
if( ! class_exists('WP_Customize_Control') ){
  return NULL;
}


class Hotel_Pagoda_checkbox_Customize_Controls extends WP_Customize_Control
{
    public function render_content()
    {
        ?>
        <h2><?php echo esc_html($this->label); ?></h2>
        <label class="switch">
            <input type="checkbox" value="<?php echo esc_attr($this->value()); ?>" <?php $this->link();
            checked($this->value()); ?> />

            <span class="slider"></span>
        </label>
        <p><?php echo esc_html($this->description)  ; ?></p>

        <?php
    }
}

if(!function_exists('hotel_pagoda_video_select')):
    function hotel_pagoda_video_select($control){
        $social_header_footer_radio = $control->manager->get_setting('hotel_pagoda_theme_options[cta_video_radio]')->value();
        $control_id = $control->id;
        if ($control_id == 'hotel_pagoda_theme_options[cta_upload_video]' &&  ($social_header_footer_radio == 'video_upload' )){
            return true;
        }
        if ( $social_header_footer_radio == 'video_link' && ($control_id == 'hotel_pagoda_theme_options[youtube_vemeo_link]' )){
            return true;
        }
        return false;
    }
endif;
class Hotel_Pagoda_Section_Info extends WP_Customize_Control {
    public $type = 'info';
    public $label = '';
    public function render_content() {
        ?>
        <h3><?php echo '<strong>'. esc_html( $this->label ) . '</strong>'; ?></h3>
        <?php
    }
}

class Hotel_Pagoda_Top_Dropdown_Customize_Control extends WP_Customize_Control
{
    public $type = 'select';

    public function render_content()
    {
        $terms = get_terms('category');
        ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <p class="customize-control-description"><?php esc_html_e('You may add the posts category from backend','hotel-pagoda-lite') ?></p>
                <select <?php $this->link(); ?>>
                    <?php
                    foreach ($terms as $t)
                        echo '<option value="' . esc_attr($t->slug) . '"' . selected($this->value(), esc_attr($t->name), false) . '>' . esc_attr($t->name) . '</option>';
                    ?>
                </select>
        </label>

        <?php
    }
}
/**
 * Adds textarea support to the theme customizer
 */
class Hotel_Pagoda_Woo_Dropdown_Customize_Control extends WP_Customize_Control
{
    public $type = 'select';

    public function render_content()
    {
        $terms = get_terms('product_cat');
        ?>
        <label>
            <span class="customize-control-title city-product-cat"><?php echo esc_html($this->label); ?></span>
            <?php if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
                <select <?php $this->link(); ?> class="city-product-cat">
                    <?php
                    echo '<option value="' . esc_attr('none') . '"' . selected($this->value(), esc_attr('none'), false) . '>' . esc_attr('None') . '</option>';

                    foreach ($terms as $t)
                        echo '<option value="' . esc_attr($t->slug) . '"' . selected($this->value(), esc_attr($t->name), false) . '>' . esc_attr($t->name) . '</option>';
                    ?>
                </select>
            <?php } else {
                ?>
                <p class="customize-control-description city-product-cat"><?php echo esc_html__('Please Install Woocommerce Plugin and Assign Product To Woocommerce Category', 'hotel-pagoda-lite') ?></p>
            <?php }
            ?>
        </label>

        <?php
    }
}

class Hotel_Pagoda_Callout_Dropdown_Customize_Control extends WP_Customize_Control
{
    public $type = 'select';

    public function render_content()
    {
        $terms = get_terms('service_category');
        ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <p class="customize-control-description"><?php esc_html_e('You may add the service category from backend','hotel-pagoda-lite') ?></p>
            <?php if (in_array('hotel-pagoda-base-camp/hotel-pagoda-base-camp.php', apply_filters('active_plugins', get_option('active_plugins')))){?>
                <select <?php $this->link(); ?>>
                    <option value="none"><?php echo esc_html__('None','hotel-pagoda-lite'); ?></option>
                    <?php
                    foreach ($terms as $t)
                        echo '<option value="' . esc_attr($t->slug) . '"' . selected($this->value(), esc_attr($t->name), false) . '>' . esc_attr($t->name) . '</option>';
                    ?>
                </select>
            <?php }
            else{
                ?>
                <p class="customize-control-description"><?php esc_html_e('Please Install Hotel Pagoda Base Camp Plugin and Assign Posts To Portfolio Category','hotel-pagoda-lite') ?></p>
            <?php }
            ?>
        </label>

        <?php
    }
}

class Hotel_Pagoda_Hotel_Dropdown_Customize_Control extends WP_Customize_Control
{
    public $type = 'select';

    public function render_content()
    {
        $terms = get_terms('hotel_category');
        ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <p class="customize-control-description"><?php esc_html_e('You may add the Hotel category from backend','hotel-pagoda-lite') ?></p>
            <?php if (in_array('hotel-pagoda-base-camp/hotel-pagoda-base-camp.php', apply_filters('active_plugins', get_option('active_plugins')))){?>
                <select <?php $this->link(); ?>>
                    <option value="none" selected><?php echo esc_html__('None','hotel-pagoda-lite'); ?></option>
                    <?php
                    foreach ($terms as $t)
                        echo '<option value="' . esc_attr($t->slug) . '"' . selected($this->value(), esc_attr($t->name), false) . '>' . esc_attr($t->name) . '</option>';
                    ?>
                </select>
            <?php }
            else{
                ?>
                <p class="customize-control-description"><?php esc_html_e('Please Install Hotel Pagoda Base Camp Plugin and Assign Posts To Portfolio Category','hotel-pagoda-lite') ?></p>
            <?php }
            ?>
        </label>

        <?php
    }
}

if(!function_exists('hotel_pagoda_sortable')) {

    function hotel_pagoda_sortable()
    {

        $services = array();

        $services['intro'] = array(
            'id' => 'intro',
            'label' => esc_html__('Introduction 1', 'hotel-pagoda-lite'),
        );
        $services['intro1'] = array(
            'id' => 'intro1',
            'label' => esc_html__('Introduction 2', 'hotel-pagoda-lite'),
        );

        $services['callout'] = array(
            'id' => 'topcallout',
            'label' => esc_html__('Top Callout', 'hotel-pagoda-lite'),
        );

        $services['top_shortcode'] = array(
            'id' => 'topshortcode',
            'label' => esc_html__('Top Shortcode', 'hotel-pagoda-lite'),
        );
        $services['product_category'] = array(
            'id' => 'productcategory',
            'label' => esc_html__('Product Category', 'hotel-pagoda-lite'),
        );
        $services['service'] = array(
            'id' => 'service',
            'label' => esc_html__('Service', 'hotel-pagoda-lite'),
        );

        /* Call To Action */
        $services['cta'] = array(
            'id' => 'cta',
            'label' => esc_html__('CTA', 'hotel-pagoda-lite'),
        );

        $services['event'] = array(
            'id' => 'event',
            'label' => esc_html__('Event', 'hotel-pagoda-lite'),
        );
        $services['portfolio'] = array(
            'id' => 'portfolio',
            'label' => esc_html__('Portfolio', 'hotel-pagoda-lite'),
        );

        /* Call To Action */
        $services['stat'] = array(
            'id' => 'stat',
            'label' => esc_html__('Stats', 'hotel-pagoda-lite'),
        );
        $services['product_section'] = array(
            'id' => 'productsection',
            'label' => esc_html__('Product Section', 'hotel-pagoda-lite'),
        );

        $services['team'] = array(
            'id' => 'team',
            'label' => esc_html__('Team', 'hotel-pagoda-lite'),
        );
        $services['testimonial'] = array(
            'id' => 'testimonial',
            'label' => esc_html__('Testimonial', 'hotel-pagoda-lite'),
        );

        $services['bottomcallout'] = array(
            'id' => 'bottomcallout',
            'label' => esc_html__('Bottom Callout', 'hotel-pagoda-lite'),
        );

        $services['client'] = array(
            'id' => 'client',
            'label' => esc_html__('Client', 'hotel-pagoda-lite'),
        );
        $services['plan'] = array(
            'id' => 'plan',
            'label' => esc_html__('Plan/Price', 'hotel-pagoda-lite'),
        );
        /* Blog */
        $services['blog'] = array(
            'id' => 'blog',
            'label' => esc_html__('Blog', 'hotel-pagoda-lite'),
        );
        $services['bottomcta'] = array(
            'id' => 'bottomcta',
            'label' => esc_html__('Bottom CTA', 'hotel-pagoda-lite'),
        );

        $services['subscribe'] = array(
            'id' => 'subscribe',
            'label' => esc_html__('Subscribe', 'hotel-pagoda-lite'),
        );

        return apply_filters('hotel_pagoda_sort', $services);
    }
}