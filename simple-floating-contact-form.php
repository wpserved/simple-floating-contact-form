<?php
/**
 * Plugin Name: Simple Floating Contact Form
 * Plugin URI: https://wpserved.com/plugins/simple-floating-contact-form/
 * Description: Show the contact popup on your website.
 * Author: wpserved
 * Author URI: https://wpserved.com/
 * Text Domain: simple-floating-contact-form
 * Domain Path: /resources/lang
 * Version: 1.4.1
 * Requires at least: 5.4
 * Requires PHP: 7.2
 */

define('SIMPLE_FLOATING_CONTACT_FORM_BASENAME', plugin_basename(__FILE__));
define('SIMPLE_FLOATING_CONTACT_FORM_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('SIMPLE_FLOATING_CONTACT_FORM_ASSETS_PATH', plugin_dir_path(__FILE__) . 'dist/');
define('SIMPLE_FLOATING_CONTACT_FORM_RESOURCES_PATH', plugin_dir_path(__FILE__) . 'resources/');
define('SIMPLE_FLOATING_CONTACT_FORM_CUSTOM_PATH', plugin_dir_path(__FILE__) . 'custom/');
define('SIMPLE_FLOATING_CONTACT_FORM_ASSETS_URI', plugins_url(basename(plugin_dir_path(__FILE__))) . '/dist/');
define('SIMPLE_FLOATING_CONTACT_FORM_RESOURCES_URI', plugins_url(basename(plugin_dir_path(__FILE__))) . '/resources/');

require SIMPLE_FLOATING_CONTACT_FORM_PLUGIN_PATH . '/inc/bootstrap.php';
