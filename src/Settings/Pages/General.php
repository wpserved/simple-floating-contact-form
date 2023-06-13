<?php
/**
 * Settings: Pages: General
 */
namespace SimpleFloatingContactForm\Settings\Pages;

class General
{
  /**
   * Function adds the general settings page.
   *
   * @action admin_menu
   * @author PH
   */
  public function addPage()
  {
    add_options_page(__('Settings', 'simple-floating-contact-form'), __('Simple Floating Contact Form', 'simple-floating-contact-form'), 'manage_options', 'simple-floating-contact-form-general', function () {
      include SIMPLE_FLOATING_CONTACT_FORM_RESOURCES_PATH . 'views/admin/settings/index.php';
    });
  }

  	/**
	 * This function register settings for Options Page
	 *
   * @action init
	 * @since 1.0.0
	 */
  public function registerSettings()
  {
    add_option('sfcf-email-recipent', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-email-recipent');

    add_option('sfcf-form-toggler', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-form-toggler');

    add_option('sfcf-form-title', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-form-title');

    add_option('sfcf-form-name-input', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-form-name-input');

    add_option('sfcf-form-email-input', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-form-email-input');

    add_option('sfcf-form-email-subject', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-form-email-subject');

    add_option('sfcf-form-email-message', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-form-email-message');

    add_option('sfcf-form-checkbox', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-form-checkbox');

    add_option('sfcf-form-submit', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-form-submit');

    add_option('sfcf-form-icon', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-form-icon');

    add_option('sfcf-success-title', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-success-title');

    add_option('sfcf-success-note', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-success-note');

    add_option('sfcf-success-button', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-success-button');

    add_option('sfcf-success-link', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-success-link');

    add_option('sfcf-success-icon', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-success-icon');

    add_option('sfcf-no-styling-option', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-no-styling-option');

    add_option('sfcf-corners-square', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-corners-square');

    add_option('sfcf-placement-left', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-placement-left');

    add_option('sfcf-color-toggle', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-color-toggle');

    add_option('sfcf-color-toggler-text', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-color-toggler-text');

    add_option('sfcf-color-bg', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-color-bg');

    add_option('sfcf-color-text', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-color-text');

    add_option('sfcf-color-input-text', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-color-input-text');

    add_option('sfcf-color-input-placeholder', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-color-input-placeholder');

    add_option('sfcf-color-input-text-focus', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-color-input-text-focus');

    add_option('sfcf-color-input-border', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-color-input-border');

    add_option('sfcf-color-terms-link', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-color-terms-link');

    add_option('sfcf-color-btn', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-color-btn');

    add_option('sfcf-color-btn-text', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-color-btn-text');

    add_option('sfcf-color-success-icon', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-color-success-icon');

    add_option('sfcf-display-custom', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-display-custom',);

    add_option('sfcf-display-pages', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-display-pages',);

    add_option('sfcf-display-posts', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-display-posts',);

    add_option('sfcf-display-posts-archive', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-display-posts-archive',);

    add_option('sfcf-display-categories', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-display-categories',);

    add_option('sfcf-display-tags', '');
    register_setting('SIMPLE_FLOATING_CONTACT_FORM_group', 'sfcf-display-tags',);
  }
}
