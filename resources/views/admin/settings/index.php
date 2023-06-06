<?php
/**
 *
 * Admin: Main panel
 */

use SimpleFloatingContactForm\Module\Display\Display;
$display = new Display();
?>
<div class="wrap">
  <?php if (get_option('stylesheet') !== 'astratic-child' && get_option('stylesheet') !== 'astratic'):
    if(get_option('sfcf-no-styling-option') == "customizer"):?>
      <div class="error notice-error">
        <h3>
          <?php _e('ERROR', 'simple-floating-contact-form'); ?>
        </h3>

        <p>
          <strong>
            <?php _e('Astratic Theme not detected - choose style option', 'simple-floating-contact-form'); ?>
          </strong>
        </p>
      </div>
    <?php endif;
  endif; ?>

  <h1 class="wp-heading-inline">
    <?php echo esc_html(__('Simple Floating Contact Form', 'simple-floating-contact-form')); ?>
  </h1>

  <form method="post" action="options.php">
    <?php settings_fields('SIMPLE_FLOATING_CONTACT_FORM_group'); ?>

    <div class="sfcf-tab">
      <input checked="checked" id="option-tab1" type="radio" name="option-tabs"/>
      <input id="option-tab2" type="radio" name="option-tabs"/>
      <input id="option-tab3" type="radio" name="option-tabs"/>

      <nav class="sfcf-tab__nav">
        <ul>
          <li class="sfcf-tab__button-1">
            <label for="option-tab1">
              <?php _e('General', 'simple-floating-contact-form'); ?>
            </label>
          </li>
          <li class="sfcf-tab__button-2">
            <label for="option-tab2">
              <?php _e('Style', 'simple-floating-contact-form'); ?>
            </label>
          </li>
          <li class="sfcf-tab__button-3">
            <label for="option-tab3">
              <?php _e('Display', 'simple-floating-contact-form'); ?>
            </label>
          </li>
        </ul>
      </nav>

      <?php
      include SIMPLE_FLOATING_CONTACT_FORM_RESOURCES_PATH . 'views/admin/settings/tabs/general.php';
      include SIMPLE_FLOATING_CONTACT_FORM_RESOURCES_PATH . 'views/admin/settings/tabs/style.php';
      include SIMPLE_FLOATING_CONTACT_FORM_RESOURCES_PATH . 'views/admin/settings/tabs/display.php';
      ?>
    </div>

    <?php submit_button(); ?>
  </form>
</div>
