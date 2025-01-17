<?php
/**
 * Plugin Name: MORKVA Vchasno Kasa Integration
 * Plugin URI: https://kasa.vchasno.com.ua/
 * Description: Інтеграція WooCommerce з пРРО Вчасно.Каса
 * Version: 0.8.2
 * Tested up to: 6.6
 * Requires at least: 5.2
 * Requires PHP: 7.1
 * Author: MORKVA
 * Author URI: https://morkva.co.ua
 * Text Domain: mrkv-vchasno-kasa
 * Domain Path: /languages
 * WC requires at least: 5.4.0
 * WC tested up to: 7.1.0
 */

/**
 * 1. Activation code (Check first register)
 * 2. Setup all part of plugin
 * */

// -----------------------------------------------------------------------//
// -------------------------------1.ACTIVATION----------------------------//
// -----------------------------------------------------------------------//

# This prevents a public user from directly accessing your .php files
if (! defined('ABSPATH')) {
    exit;
}

add_action( 'before_woocommerce_init', function() {
    if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
    }
} );



# Include all needed classes for activate
require_once 'classes/mrkv-activate.php'; 

new MRKV_ACTIVATION(__FILE__);

# Setup all before woo init
add_action( 'before_woocommerce_init', function() {
    // -----------------------------------------------------------------------//
    // -------------------------------2.SETUP---------------------------------//
    // -----------------------------------------------------------------------//

    # Include all needed classes for setup
    require_once 'classes/mrkv-setup.php'; 

    # Setup Plugin
    new MRKV_SETUP(__FILE__);
});

?>