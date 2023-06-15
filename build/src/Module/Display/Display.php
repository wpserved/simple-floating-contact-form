<?php
/**
 * Module: Display
 */
namespace SimpleFloatingContactForm\Module\Display;
use SimpleFloatingContactForm\Module\Shortcode\Shortcode;

class Display
{
  private ?Shortcode $shortcode = null;

  /**
   * @var layout
   */
  private $layout = null;

  /**
   * @var notes
   */
  private $notes = array();

  public function __construct()
  {
    $this->shortcode = new Shortcode();
  }

  public function printData()
  {
    $this->defaultData();

    return $this->notes;
  }

  /**
   * Function display the plugin widget on the page
   *
   * @action wp_footer
   */
  public function showWidget()
  {
    ob_start();
    include SIMPLE_FLOATING_CONTACT_FORM_RESOURCES_PATH . 'views/layouts/main.php';
    $this->layout = ob_get_contents();
    ob_end_clean();

    echo $this->layout;
  }

  /**
   * Function fill content for the widget
   *
   * @action init
   */
  public function defaultData()
  {
    $this->notes['toggler_btn'] = get_option('sfcf-form-toggler') ?: __('Need help?', 'simple-floating-contact-form');
    $this->notes['form_title'] = get_option('sfcf-form-title') ?: __('Contact us to get a quick help.', 'simple-floating-contact-form');
    $this->notes['input_1'] = get_option('sfcf-form-name-input') ?: __('Name & Surname / Company name', 'simple-floating-contact-form');
    $this->notes['input_2'] = get_option('sfcf-form-email-input') ?: __('E-mail adress', 'simple-floating-contact-form');
    $this->notes['input_3'] = get_option('sfcf-form-email-subject') ?: __('Message Subject', 'simple-floating-contact-form');
    $this->notes['input_4'] = get_option('sfcf-form-email-message') ?: __('Your Message', 'simple-floating-contact-form');
    $this->notes['checkbox'] = get_option('sfcf-form-checkbox') ? $this->shortcode->doShortcodesInContent(get_option('sfcf-form-checkbox', '')) : '';
    $this->notes['submit'] = get_option('sfcf-form-submit') ?: __('Send Message', 'simple-floating-contact-form');
    $this->notes['icon'] = get_option('sfcf-form-icon') ?: SIMPLE_FLOATING_CONTACT_FORM_ASSETS_URI . '/images/icon-support.svg';
    $this->notes['success_title'] = get_option('sfcf-success-title') ?: __('Your message was sent.', 'simple-floating-contact-form');
    $this->notes['success_note'] = get_option('sfcf-success-note') ?: __('We will contact you soon!<br><b>In the meantime check out:</b>', 'simple-floating-contact-form');
    $this->notes['success_btn'] = get_option('sfcf-success-button');
    $this->notes['success_url'] = get_option('sfcf-success-link');
    $this->notes['success_icon'] = get_option('sfcf-success-icon');

    $this->notes['no_style'] = get_option('sfcf-no-styling-option') ?: 'false';
    $this->notes['square_corners'] = get_option('sfcf-corners-square') ?: 'false';
    $this->notes['placement_left'] = get_option('sfcf-placement-left') ?: 'false';
    $this->notes['color_toggle'] = get_option('sfcf-color-toggle') ?: '#6835CC';
    $this->notes['color_toggler_text'] = get_option('sfcf-color-toggler-text') ?: '#FFF';
    $this->notes['color_bg'] = get_option('sfcf-color-bg') ?: '#6835CC';
    $this->notes['color_text'] = get_option('sfcf-color-text') ?: '#FFF';
    $this->notes['color_input_placeholder'] = get_option('sfcf-color-input-placeholder') ?: '#AAA';
    $this->notes['color_input_text'] = get_option('sfcf-color-input-text') ?: '#222';
    $this->notes['color_input_text_focus'] = get_option('sfcf-color-input-text-focus') ?: '#6835CC';
    $this->notes['color_input_border'] = get_option('sfcf-color-input-border') ?: '#03E2AB';
    $this->notes['color_terms_link'] = get_option('sfcf-color-terms-link') ?: '#03E2AB';
    $this->notes['color_btn'] = get_option('sfcf-color-btn') ?: '#03E2AB';
    $this->notes['color_btn_text'] = get_option('sfcf-color-btn-text') ?: '#FFF';
    $this->notes['color_success_icon'] = get_option('sfcf-color-success-icon') ?: '#3A1A86';

    $this->notes['display_pages'] = get_option('sfcf-display-pages') ?: '';
    $this->notes['display_posts'] = get_option('sfcf-display-posts') ?: '';
    $this->notes['display_posts-archive'] = get_option('sfcf-display-posts-archive') ?: '';
    $this->notes['display_categories'] = get_option('sfcf-display-categories') ?: '';
    $this->notes['display_tags'] = get_option('sfcf-display-tags') ?: '';

    $this->notes['display'] = array_merge(
      get_option('sfcf-display-custom') ?: array(),
      get_option('sfcf-display-pages') ?: array(),
      get_option('sfcf-display-posts') ?: array(),
      get_option('sfcf-display-posts-archive') ?: array(),
      get_option('sfcf-display-categories') ?: array(),
      get_option('sfcf-display-tags') ?: array()
    );
  }

  public function shouldDisplayPopup()
  {
    if (empty($this->printData()['display'])) {
      return true;
    }

    if (is_404()) {
      return false;
    }

    if (get_option('page_on_front') != 0 || get_option('page_for_posts') != 0 ) {
      if (is_home()) {
        if (array_key_exists('id-'.get_post(get_option('page_for_posts'))->ID, $this->printData()['display'])) {
          return true;
        }
      }
      if (is_front_page()) {
        if (array_key_exists('id-'.get_post(get_option('page_on_front'))->ID, $this->printData()['display'])) {
          return true;
        }
      }
    }

    if (get_option('page_on_front') == 0 && get_option('page_for_posts') == 0 && is_home()) {
      if (array_key_exists('default-home', $this->printData()['display'])) {
        return true;
      }
    }

    if (is_post_type_archive()) {
      if (array_key_exists('archive-'.get_post_type(), $this->printData()['display'])) {
        return true;
      }

      return false;
    }

    if (is_single()) {
      if (array_key_exists(get_post_type(), $this->printData()['display'])) {
        return true;
      }

      return false;
    }

    if (is_category()) {
      if (array_key_exists('id-cat-'.get_post(get_queried_object_id())->ID, $this->printData()['display'])) {
        return true;
      }

      return false;
    }

    if (is_tag()) {
      if (array_key_exists('id-tag-'.get_post(get_queried_object_id())->ID, $this->printData()['display'])) {
        return true;
      }

      return false;
    }

    if (array_key_exists('id-'.get_post(get_queried_object_id())->ID, $this->printData()['display'])) {
      return true;
    }

    return false;
  }
}
