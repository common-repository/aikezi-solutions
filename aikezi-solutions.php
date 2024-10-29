<?php
/**
 * Plugin Name: Aikezi Solutions
 * Plugin URI: https://aikezi.com/aikezi-solitions-plugin
 * Description: This is the main plugin of the Wordpress website design and marketing toolkit. This plugin is required when using other Aikezi plugins. (Đây là plugin chính và bắt buộc trước khi sử dụng các plugin hỗ trợ thiết hế web hoặc marketing khác của Aikezi.)
 * Version: 2.3
 * Author: Aikezi
 * Author URI: https://aikezi.com
 * Text Domain: Aikezi
 * Domain Path: /languages/
 * @package Aikezi
 * License: GPL2
 */
 
 if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

/**
 * Defining plugin constants.
 *
 * @since 1.0
 */
define('AIKEZI_S_PLUGIN_URL', plugin_dir_url(__FILE__));
define('AIKEZI_S_IMAGE_URL', AIKEZI_S_PLUGIN_URL . '/assets/images');
define('AIKEZI_S_ASSETS_URL', AIKEZI_S_PLUGIN_URL . 'assets/');
define('AIKEZI_S_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('AIKEZI_S_INCLUDE_DIR', AIKEZI_S_PLUGIN_DIR . '/includes');
/**
 * Defining plugin constants.
 *
 * @since 1.0
 */
if ( is_admin() ) {
    require_once AIKEZI_S_INCLUDE_DIR . '/admin.php';
    require_once AIKEZI_S_PLUGIN_DIR . '/database/aikezi-database.php';
    new AikeziSolutionsDatabase();
    new AikeziSoluionsAdmin();
}
require_once AIKEZI_S_INCLUDE_DIR . '/aikezi-shortcode.php';
new AikeziSolutionsCreateShortcode();

