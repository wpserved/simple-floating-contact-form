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
        background-color: <?php echo $this->notes['color_bg']; ?>;
      }

      #sfcf_contact_popup .sfcf-form__heading h2 {
        color: <?php echo $this->notes['color_text']; ?>;
      }

      #sfcf_contact_popup form input:not([type=checkbox]):not([type=submit]), #sfcf_contact_popup form textarea {
        box-shadow: inset 0 0 0 1px <?php echo $this->notes['color_input_border']; ?>;
        color: <?php echo $this->notes['color_input_text']; ?>;
      }

      #sfcf_contact_popup form input:not([type=checkbox]):not([type=submit]):hover, #sfcf_contact_popup form textarea:hover {
        box-shadow: inset 0 0 0 2px <?php echo $this->notes['color_input_border']; ?>;
        color: <?php echo $this->notes['color_input_text_focus']; ?>;
      }

      #sfcf_contact_popup form input:not([type=checkbox]):not([type=submit]):focus, #sfcf_contact_popup form textarea:focus {
        box-shadow: inset 0 0 0 2px <?php echo $this->notes['color_input_border']; ?>;
        color: <?php echo $this->notes['color_input_text_focus']; ?>;
      }

      #sfcf_contact_popup form input[type=checkbox] {
        border: 1px solid <?php echo $this->notes['color_input_border']; ?>;
      }

      #sfcf_contact_popup form input[type=checkbox]:checked  {
        background-color: <?php echo $this->notes['color_input_border']; ?>;
      }

      span {
        color: <?php echo $this->notes['color_text']; ?>;
      }

      #sfcf_contact_popup .sfcf__form-close a {
        background: <?php echo $this->notes['color_btn']; ?>;
      }

      #sfcf_contact_popup .sfcf__form-close .sfcf-close-logo {
        width: 100%;
        height: 100%;
        background-color: <?php echo $this->notes['color_btn_text']; ?>;
        -webkit-mask: url("<?php echo SIMPLE_FLOATING_CONTACT_FORM_ASSETS_URI . '/images/close.svg'; ?>") no-repeat center;
        mask: url("<?php echo SIMPLE_FLOATING_CONTACT_FORM_ASSETS_URI . '/images/close.svg'; ?>") no-repeat center;
      }

      #sfcf_contact_popup form input[type=submit] {
        background: <?php echo $this->notes['color_btn']; ?>;
        color: <?php echo $this->notes['color_btn_text']; ?>;
      }

      #sfcf_contact_popup .sfcf__toggler {
        background-color: <?php echo $this->notes['color_toggle']; ?>;
      }

      #sfcf_contact_popup .sfcf__toggler .toggler__label {
        color: <?php echo $this->notes['color_text']; ?>;
      }

      #sfcf_contact_popup .sfcf__button {
        background: <?php echo $this->notes['color_btn']; ?>;
        color: <?php echo $this->notes['color_btn_text']; ?>;
      }
    </style>
    <?php endif; ?>
    <?php if($this->notes['no_style'] == "customizer"): ?>
    <style scoped>
      #sfcf_contact_popup #sfcf_form_wrapper {
        background-color: rgba(var(--primary));
      }

      #sfcf_contact_popup .sfcf-form__heading h2 {
        color: rgba(var(--light));
      }

      #sfcf_contact_popup form input:not([type=checkbox]):not([type=submit]), #sfcf_contact_popup form textarea {
        box-shadow: inset 0 0 0 1px rgba(var(--border));
        color: rgba(var(--text-light));
      }

      #sfcf_contact_popup form input:not([type=checkbox]):not([type=submit]):hover, #sfcf_contact_popup form textarea:hover {
        box-shadow: inset 0 0 0 2px rgba(var(--border));
        color: rgba(var(--text-default));
      }

      #sfcf_contact_popup form input:not([type=checkbox]):not([type=submit]):focus, #sfcf_contact_popup form textarea:focus {
        box-shadow: inset 0 0 0 2px rgba(var(--border));
        color: rgba(var(--text-default));
      }

      #sfcf_contact_popup form input[type=checkbox] {
        border: 1px solid rgba(var(--border));
      }

      #sfcf_contact_popup form input[type=checkbox]:checked  {
        background-color: rgba(var(--border));
      }

      span {
        color: rgba(var(--light));
      }

      #sfcf_contact_popup .sfcf__form-close a {
        background: rgba(var(--action-buttons));
      }

      #sfcf_contact_popup .sfcf__form-close .sfcf-close-logo {
        width: 100%;
        height: 100%;
        background-color: rgba(var(--light));
        -webkit-mask: url("<?php echo SIMPLE_FLOATING_CONTACT_FORM_ASSETS_URI . '/images/close.svg'; ?>") no-repeat center;
        mask: url("<?php echo SIMPLE_FLOATING_CONTACT_FORM_ASSETS_URI . '/images/close.svg'; ?>") no-repeat center;
      }

      #sfcf_contact_popup form input[type=submit] {
        background: rgba(var(--action-buttons));
        color: rgba(var(--light));
      }

      #sfcf_contact_popup .sfcf__toggler {
        background-color: rgba(var(--primary));
      }

      #sfcf_contact_popup .sfcf__toggler .toggler__label {
        color: rgba(var(--light));
      }

      #sfcf_contact_popup .sfcf__button {
        background: rgba(var(--action-buttons));
        color: rgba(var(--light));
      }
    </style>
    <?php endif; ?>
    <div class="sfcf__content" data-js="sfcf-content">
      <div id="sfcf_form_wrapper" class="sfcf__form">
        <div class="sfcf-form__heading">
          <h2><?php echo $this->notes['form_title']; ?></h2>
        </div>
        <div class="sfcf-form__wrapper">
          <form id="sfcf_contact_popup_form" class="sfcf-form__form">
            <fieldset>
              <input type="text" name="name" placeholder="<?php echo $this->notes['input_1']; ?>" data-required>
            </fieldset>
            <fieldset>
              <input type="email" name="email" placeholder="<?php echo $this->notes['input_2']; ?>" data-required>
            </fieldset>
            <fieldset>
              <input type="text" name="subject" placeholder="<?php echo $this->notes['input_3']; ?>" data-required>
            </fieldset>
            <fieldset>
              <textarea rows="5" name="message" placeholder="<?php echo $this->notes['input_4']; ?>" data-required></textarea>
            </fieldset>
            <fieldset class="checkboxes">
              <label>
                <input type="checkbox" name="policy" data-required>
                <span class="text"><?php echo $this->notes['checkbox']; ?></span>
              </label>
            </fieldset>
            <fieldset>     
              <input type="submit" value="<?php echo $this->notes['submit']; ?>" />
            </fieldset>
          </form>
        </div>
        <div class="sfcf-form__success sfcf-success">
          <h2><?php echo $this->notes['success_title']; ?></h2>
          <div class="sfcf-success__icon">
            <img src="<?php echo SIMPLE_FLOATING_CONTACT_FORM_ASSETS_URI . '/images/success.svg'; ?>" alt="success" />
          </div>
          <p><?php echo $this->notes['success_note']; ?></p>
          <div class="sfcf-success__btn">
            <a href="<?php echo $this->notes['success_url']; ?>" class="sfcf__button"><?php echo $this->notes['success_btn']; ?></a>
          </div>
        </div>
        <div class="sfcf__form-close">
          <a href="" data-js="sfcf-close">
            <div class="sfcf-close-logo"></div>
          </a>
        </div>
      </div>
    </div>
    <a href="#" class="sfcf__toggler" data-js="sfcf-toggler">
      <span class="toggler__label"><?php echo $this->notes['toggler_btn']; ?></span>
      <span class="toggler__icon">
        <img src="<?php echo $this->notes['icon']; ?>" alt="support-icon"/>
      </span>
    </a>
  </div>
<?php endif; ?>