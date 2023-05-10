<?php
/**
 *
 * Layout: Main
 */

use SimpleFloatingContactForm\Module\Display\Display;
$displayOptions = new Display();
?>

<?php if($displayOptions->shouldDisplayPopup()): ?>
  <div id="sfcf_contact_popup" class="sfcf__main-widget">
    <?php if($this->notes['no_style'] !== "true" && $this->notes['no_style'] !== "customizer"): ?>
    <style scoped>
      #sfcf_contact_popup #sfcf_form_wrapper {
        background-color: <?php echo esc_html($this->notes['color_bg']); ?>;
      }

      #sfcf_contact_popup .sfcf-form__heading h2 {
        color: <?php echo esc_html($this->notes['color_text']); ?>;
      }

      #sfcf_contact_popup form input:not([type=checkbox]):not([type=submit]), #sfcf_contact_popup form textarea {
        box-shadow: inset 0 0 0 1px <?php echo esc_html($this->notes['color_input_border']); ?>;
        color: <?php echo esc_html($this->notes['color_input_text']); ?>;
      }

      #sfcf_contact_popup form input:not([type=checkbox]):not([type=submit]):hover, #sfcf_contact_popup form textarea:hover {
        box-shadow: inset 0 0 0 2px <?php echo esc_html($this->notes['color_input_border']); ?>;
        color: <?php echo esc_html($this->notes['color_input_text_focus']); ?>;
      }

      #sfcf_contact_popup form input:not([type=checkbox]):not([type=submit]):focus, #sfcf_contact_popup form textarea:focus {
        box-shadow: inset 0 0 0 2px <?php echo esc_html($this->notes['color_input_border']); ?>;
        color: <?php echo esc_html($this->notes['color_input_text_focus']); ?>;
      }

      #sfcf_contact_popup form input[type=checkbox] {
        border: 1px solid <?php echo esc_html($this->notes['color_input_border']); ?>;
      }

      #sfcf_contact_popup form input[type=checkbox]:checked  {
        background-color: <?php echo esc_html($this->notes['color_input_border']); ?>;
      }

      #sfcf_contact_popup form .checkboxes .text a {
        color: <?php echo esc_html($this->notes['color_terms_link']); ?>
      }

      #sfcf_contact_popup form .checkboxes .text a:hover {
        text-decoration: none;
      }

      #sfcf_contact_popup span {
        color: <?php echo esc_html($this->notes['color_text']); ?>;
      }

      #sfcf_contact_popup .sfcf__form-close a {
        background: <?php echo esc_html($this->notes['color_btn']); ?>;
      }

      #sfcf_contact_popup .sfcf__form-close .sfcf-close-logo {
        width: 100%;
        height: 100%;
        background-color: <?php echo esc_html($this->notes['color_btn_text']); ?>;
        -webkit-mask: url("<?php echo esc_html(SIMPLE_FLOATING_CONTACT_FORM_ASSETS_URI . '/images/close.svg'); ?>") no-repeat center;
        mask: url("<?php echo esc_html(SIMPLE_FLOATING_CONTACT_FORM_ASSETS_URI . '/images/close.svg'); ?>") no-repeat center;
      }

      #sfcf_contact_popup form input[type=submit] {
        background: <?php echo esc_html($this->notes['color_btn']); ?>;
        color: <?php echo esc_html($this->notes['color_btn_text']); ?>;
        transition: all .35s ease-in-out;
      }

      #sfcf_contact_popup form input[type=submit]:hover,
      #sfcf_contact_popup form input[type=submit]:focus {
        border-color: <?php echo esc_html($this->notes['color_btn_border_hover']); ?>;
      }

      #sfcf_contact_popup .sfcf__toggler {
        background-color: <?php echo esc_html($this->notes['color_toggle']); ?>;
      }

      #sfcf_contact_popup .sfcf__toggler .toggler__label {
        color: <?php echo esc_html($this->notes['color_toggler_text']); ?>;
      }

      #sfcf_contact_popup .sfcf__button {
        background: <?php echo esc_html($this->notes['color_btn']); ?>;
        color: <?php echo esc_html($this->notes['color_btn_text']); ?>;
      }

      #sfcf_contact_popup .sfcf-form__success h2,
      #sfcf_contact_popup .sfcf-form__success p {
        color: <?php echo esc_html($this->notes['color_text']); ?>;
      }
    </style>
    <?php endif; ?>
    <?php if ($this->notes['no_style'] == "customizer") : ?>
    <style scoped>
      #sfcf_contact_popup #sfcf_form_wrapper {
        background-color: var(--primary);
      }

      #sfcf_contact_popup .sfcf-form__heading h2 {
        color: var(--light);
      }

      #sfcf_contact_popup form input:not([type=checkbox]):not([type=submit]), #sfcf_contact_popup form textarea {
        box-shadow: inset 0 0 0 1px var(--border);
        color: var(--text-light);
      }

      #sfcf_contact_popup form input:not([type=checkbox]):not([type=submit]):hover, #sfcf_contact_popup form textarea:hover {
        box-shadow: inset 0 0 0 2px var(--border);
        color: var(--text-default);
      }

      #sfcf_contact_popup form input:not([type=checkbox]):not([type=submit]):focus, #sfcf_contact_popup form textarea:focus {
        box-shadow: inset 0 0 0 2px var(--border);
        color: var(--text-default);
      }

      #sfcf_contact_popup form input[type=checkbox] {
        border: 1px solid var(--border);
      }

      #sfcf_contact_popup form input[type=checkbox]:checked  {
        background-color: var(--border);
      }

      #sfcf_contact_popup span {
        color: var(--light);
      }

      #sfcf_contact_popup .sfcf__form-close a {
        background: var(--action-buttons);
      }

      #sfcf_contact_popup .sfcf__form-close .sfcf-close-logo {
        width: 100%;
        height: 100%;
        background-color: var(--light);
        -webkit-mask: url("<?php echo esc_html(SIMPLE_FLOATING_CONTACT_FORM_ASSETS_URI . '/images/close.svg'); ?>") no-repeat center;
        mask: url("<?php echo esc_html(SIMPLE_FLOATING_CONTACT_FORM_ASSETS_URI . '/images/close.svg'); ?>") no-repeat center;
      }

      #sfcf_contact_popup form input[type=submit] {
        background: var(--action-buttons);
        color: var(--light);
      }

      #sfcf_contact_popup .sfcf__toggler {
        background-color: var(--primary);
      }

      #sfcf_contact_popup .sfcf__toggler .toggler__label {
        color: var(--light);
      }

      #sfcf_contact_popup .sfcf__button {
        background: var(--action-buttons);
        color: var(--light);
      }
    </style>
    <?php endif; ?>
    <div class="sfcf__content" data-js="sfcf-content">
      <div id="sfcf_form_wrapper" class="sfcf__form">
        <div class="sfcf-form__heading">
          <h2><?php echo esc_html($this->notes['form_title']); ?></h2>
        </div>
        <div class="sfcf-form__wrapper">
          <form id="sfcf_contact_popup_form" class="sfcf-form__form">
            <fieldset>
              <input type="text" name="name" placeholder="<?php echo esc_attr($this->notes['input_1']); ?>" data-required>
            </fieldset>
            <fieldset>
              <input type="email" name="email" placeholder="<?php echo esc_attr($this->notes['input_2']); ?>" data-required>
            </fieldset>
            <fieldset>
              <input type="text" name="subject" placeholder="<?php echo esc_attr($this->notes['input_3']); ?>" data-required>
            </fieldset>
            <fieldset>
              <textarea rows="5" name="message" placeholder="<?php echo esc_attr($this->notes['input_4']); ?>" data-required></textarea>
            </fieldset>

            <?php if (! empty($this->notes['checkbox'])): ?>
              <fieldset class="checkboxes">
                <label>
                  <input type="checkbox" name="policy" data-required>
                  <span class="text"><?php echo wp_kses($this->notes['checkbox'], ['a' => ['href' => [], 'target' => []]]); ?></span>
                </label>
              </fieldset>
            <?php endif; ?>

            <fieldset>
              <input type="submit" value="<?php echo esc_attr($this->notes['submit']); ?>" />
            </fieldset>
          </form>
        </div>
        <div class="sfcf-form__success sfcf-success">
          <h2><?php echo esc_html($this->notes['success_title']); ?></h2>
          <div class="sfcf-success__icon">
            <img src="<?php echo esc_url($this->notes['success_icon']); ?>" alt="success" />
          </div>
          <p><?php echo wp_kses($this->notes['success_note'], ['b' => [], 'br' => []]); ?></p>
          <?php if (! empty($this->notes['success_url']) && ! empty($this->notes['success_btn'])): ?>
            <div class="sfcf-success__btn">
              <a href="<?php echo esc_url($this->notes['success_url']); ?>" class="sfcf__button"><?php echo esc_html($this->notes['success_btn']); ?></a>
            </div>
          <?php endif; ?>
        </div>
        <div class="sfcf__form-close">
          <a href="" data-js="sfcf-close">
            <div class="sfcf-close-logo"></div>
          </a>
        </div>
      </div>
    </div>
    <a href="#" class="sfcf__toggler" data-js="sfcf-toggler">
      <span class="toggler__label"><?php echo esc_html($this->notes['toggler_btn']); ?></span>
      <span class="toggler__icon">
        <img src="<?php echo esc_url($this->notes['icon']); ?>" alt="support-icon"/>
      </span>
    </a>
  </div>
<?php endif; ?>