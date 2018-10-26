<?php
/**
 * Load the plugin integrations functions
 *
 * @package Jannah
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


$plugin_file_path = 'framework/plugin-integrations/';



/*
 * AMP
 *
 * By: Automattic
 * https://wordpress.org/plugins/amp/
 */
 locate_template( $plugin_file_path . 'amp.php', true, true );


/*
 * WooCommerce
 *
 * By: Automattic
 * https://wordpress.org/plugins/woocommerce/
 */
 locate_template( $plugin_file_path . 'woocommerce.php', true, true );


/*
 * Sensei
 *
 * By: Automattic
 * https://woocommerce.com/products/sensei/
 */
 locate_template( $plugin_file_path . 'sensei.php', true, true );


/*
 * BuddyPress
 *
 * By: Multiple Authors
 * https://wordpress.org/plugins/buddypress/
 */
 locate_template( $plugin_file_path . 'buddypress.php', true, true );
