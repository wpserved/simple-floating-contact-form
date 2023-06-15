<?php
/**
 * Core: Config
 *
 * @author PH
 */
namespace SimpleFloatingContactForm\Core;

class Config
{
  /**
   * Function initializes plugin config.
   *
   * @action plugins_loaded
   * @author PH
   */
  public function initConfig(): void
  {
    load_textdomain('simple-floating-contact-form', SIMPLE_FLOATING_CONTACT_FORM_RESOURCES_PATH . '/lang/' . get_locale() . '.mo');
  }

  /**
   * Register admin backend dependencies.
   *
   * @action admin_enqueue_scripts
   * @author PH
   */
  public function adminDependencies(): void
  {
    $version = time();

    wp_enqueue_media();
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_style('SIMPLE_FLOATING_CONTACT_FORM/admin.css', SIMPLE_FLOATING_CONTACT_FORM_ASSETS_URI . '/styles/admin.css', false, $version);
    wp_enqueue_script('SIMPLE_FLOATING_CONTACT_FORM/manifest.js', SIMPLE_FLOATING_CONTACT_FORM_ASSETS_URI . '/scripts/manifest.js', ['jquery'], $version, true);
    wp_enqueue_script('SIMPLE_FLOATING_CONTACT_FORM/vendor.js', SIMPLE_FLOATING_CONTACT_FORM_ASSETS_URI . '/scripts/vendor.js', ['SIMPLE_FLOATING_CONTACT_FORM/manifest.js'], $version, true);
    wp_enqueue_script('SIMPLE_FLOATING_CONTACT_FORM/admin.js', SIMPLE_FLOATING_CONTACT_FORM_ASSETS_URI . '/scripts/admin.js', ['SIMPLE_FLOATING_CONTACT_FORM/manifest.js'], $version, true);
  }

  /**
   * Register front page dependencies.
   *
   * @action wp_enqueue_scripts
   * @author AS
   */
  public function frontDependencies(): void
  {
    $version = time();

    wp_enqueue_style('SIMPLE_FLOATING_CONTACT_FORM/main.css', SIMPLE_FLOATING_CONTACT_FORM_ASSETS_URI . '/styles/main.css', false, $version);
    wp_enqueue_script('SIMPLE_FLOATING_CONTACT_FORM/manifest.js', SIMPLE_FLOATING_CONTACT_FORM_ASSETS_URI . '/scripts/manifest.js', ['jquery'], $version, true);
    wp_enqueue_script('SIMPLE_FLOATING_CONTACT_FORM/vendor.js', SIMPLE_FLOATING_CONTACT_FORM_ASSETS_URI . '/scripts/vendor.js', ['SIMPLE_FLOATING_CONTACT_FORM/manifest.js'], $version, true);
    wp_enqueue_script('SIMPLE_FLOATING_CONTACT_FORM/main.js', SIMPLE_FLOATING_CONTACT_FORM_ASSETS_URI . '/scripts/main.js', ['SIMPLE_FLOATING_CONTACT_FORM/manifest.js'], $version, true);
    wp_localize_script('SIMPLE_FLOATING_CONTACT_FORM/main.js', 'Ajax', array('url' => admin_url('admin-ajax.php')));
  }

  /**
   * Deregister front page CSSif option for custom styling is true.
   *
   * @action wp_enqueue_scripts
   * @author MŚ
   */
  public function customStylingOn(): void
  {
    if (get_option('sfcf-no-styling-option') == "true") {
      wp_dequeue_style('SIMPLE_FLOATING_CONTACT_FORM/main.css');
    }
  }

  /**
   * Add Settings link on the plugin list
   *
   * @filter plugin_action_links_simple-floating-contact-form/simple-floating-contact-form.php
   */
  function settingsLink($links) {
    $url = admin_url('options-general.php?page=simple-floating-contact-form-general');
    $settings_link = '<a href="'.$url.'">'. __('Settings', 'simple-floating-contact-form') .'</a>';
    array_unshift($links, $settings_link);

    return $links;
  }
}
