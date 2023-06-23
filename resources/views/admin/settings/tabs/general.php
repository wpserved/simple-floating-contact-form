<div class="sfcf-tab__panel-1">
  <h2 class="title">
    <?php echo esc_html(__('General Settings', 'simple-floating-contact-form')); ?>
  </h2>

  <p class="description">
    <?php echo esc_html(__('Fill out the form fields below if you need to overwrite default texts or activate some of the non-default features.', 'simple-floating-contact-form')); ?>
  </p>

  <h2 class="title">
    <?php echo esc_html(__('Email settings', 'simple-floating-contact-form')); ?>
  </h2>

  <p></p>

  <table class="form-table" role="presentation">
    <tr valign="top">
      <th scope="row">
        <label for="sfcf-email-recipent">
          <?php echo esc_html(__('Email recipent(s)', 'simple-floating-contact-form')); ?>:
        </label>
      </th>

      <td>
        <fieldset>
          <input type="text" class="regular-text" id="sfcf-email-recipent" name="sfcf-email-recipent" value="<?php echo esc_attr(get_option('sfcf-email-recipent')); ?>" />

          <p class="description">
            <small>
              <?php echo esc_html(__('Enter the email address (or several separated by a comma). If you leave this field empty, emails will be send to your website\'s administrator email address.', 'simple-floating-contact-form')); ?>
            </small>
          </p>
        </fieldset>
      </td>
    </tr>
  </table>

  <h2 class="title">
    <?php echo esc_html(__('Form settings', 'simple-floating-contact-form')); ?>
  </h2>

  <p></p>

  <table class="form-table" role="presentation">
    <tr valign="top">
      <th scope="row">
        <label for="sfcf-form-toggler">
          <?php echo esc_html(__('Toggle button text (on hover)', 'simple-floating-contact-form')); ?>:
        </label>
      </th>

      <td>
        <fieldset>
          <input type="text" class="regular-text" id="sfcf-form-toggler" name="sfcf-form-toggler" value="<?php echo esc_attr(get_option('sfcf-form-toggler')); ?>" />
        </fieldset>
      </td>
    </tr>

    <tr valign="top">
      <th scope="row">
        <label for="sfcf-form-title">
          <?php echo esc_html(__('Form title', 'simple-floating-contact-form')); ?>:
        </label>
      </th>

      <td>
        <fieldset>
          <input type="text" class="regular-text" id="sfcf-form-title" name="sfcf-form-title" value="<?php echo esc_attr(get_option('sfcf-form-title')); ?>" />
        </fieldset>
      </td>
    </tr>

    <tr valign="top">
      <th scope="row">
        <label for="sfcf-form-name-input">
          <?php echo esc_html(__('Name and Surname label', 'simple-floating-contact-form')); ?>:
        </label>
      </th>

      <td>
        <fieldset>
          <input type="text" class="regular-text" id="sfcf-form-name-input" name="sfcf-form-name-input" value="<?php echo esc_attr(get_option('sfcf-form-name-input')); ?>" />
        </fieldset>
      </td>
    </tr>

    <tr valign="top">
      <th scope="row">
        <label for="sfcf-form-email-input">
          <?php echo esc_html(__('Email address label', 'simple-floating-contact-form')); ?>:
        </label>
      </th>

      <td>
        <fieldset>
          <input type="text" class="regular-text" id="sfcf-form-email-input" name="sfcf-form-email-input" value="<?php echo esc_attr(get_option('sfcf-form-email-input')); ?>" />
        </fieldset>
      </td>
    </tr>

    <tr valign="top">
      <th scope="row">
        <label for="sfcf-form-email-subject">
          <?php echo esc_html(__('Email subject label', 'simple-floating-contact-form')); ?>:
        </label>
      </th>

      <td>
        <fieldset>
          <input type="text" class="regular-text" id="sfcf-form-email-subject" name="sfcf-form-email-subject" value="<?php echo esc_attr(get_option('sfcf-form-email-subject')); ?>" />
        </fieldset>
      </td>
    </tr>

    <tr valign="top">
      <th scope="row">
        <label for="sfcf-form-email-message">
          <?php echo esc_html(__('Message label', 'simple-floating-contact-form')); ?>:
        </label>
      </th>

      <td>
        <fieldset>
          <input type="text" class="regular-text" id="sfcf-form-email-message" name="sfcf-form-email-message" value="<?php echo esc_attr(get_option('sfcf-form-email-message')); ?>" />
        </fieldset>
      </td>
    </tr>

    <tr valign="top">
      <th scope="row">
        <label for="sfcf-form-checkbox">
          <?php echo esc_html(__('Checkbox label', 'simple-floating-contact-form')); ?>:
        </label>
      </th>

      <td>
        <fieldset>
          <textarea type="textarea" rows="5" cols="50" id="sfcf-form-checkbox" name="sfcf-form-checkbox" class="large-text code" placeholder="<?php echo __('I have read and accept the Terms of Service & Privacy Policy.', 'simple-floating-contact-form'); ?>"><?php echo esc_textarea(get_option('sfcf-form-checkbox')); ?></textarea>
        </fieldset>

        <p class="description">
          <small>
            <?php echo __('Leave empty to hide this field in the form.', 'simple-floating-contact-form'); ?>
          </small>

          <small>
            <?php echo __('To link something, you can use the shortcode:', 'simple-floating-contact-form'); ?> [sfcf_link url=# title=FooBoo target_blank=1]
          </small>
        </p>
      </td>
    </tr>

    <tr valign="top">
      <th scope="row">
        <label for="sfcf-form-submit">
          <?php echo esc_html(__('Submit label', 'simple-floating-contact-form')); ?>:
        </label>
      </th>

      <td>
        <fieldset>
          <input type="text" class="regular-text" id="sfcf-form-submit" name="sfcf-form-submit" value="<?php echo esc_attr(get_option('sfcf-form-submit')); ?>" />
        </fieldset>
      </td>
    </tr>
  </table>

  <h2 class="title">
    <?php echo esc_html(__('Success page settings', 'simple-floating-contact-form')); ?>
  </h2>
  <p></p>

  <table class="form-table" role="presentation">
    <tr valign="top">
      <th scope="row">
        <label for="sfcf-success-title">
          <?php echo esc_html(__('Success page title', 'simple-floating-contact-form')); ?>:
        </label>
      </th>

      <td>
        <fieldset>
          <input type="text" class="regular-text" id="sfcf-success-title" name="sfcf-success-title" value="<?php echo esc_attr(get_option('sfcf-success-title')); ?>" />
        </fieldset>
      </td>
    </tr>


    <tr valign="top">
      <th scope="row">
        <label for="sfcf-success-note">
          <?php echo esc_html(__('Success page message', 'simple-floating-contact-form')); ?>:
        </label>
      </th>

      <td>
        <fieldset>
          <input type="text" class="regular-text" id="sfcf-success-note" name="sfcf-success-note" value="<?php echo esc_attr(get_option('sfcf-success-note')); ?>" />
        </fieldset>
      </td>
    </tr>

    <tr valign="top">
      <th scope="row">
        <label for="sfcf-success-button">
          <?php echo esc_html(__('Success page button label', 'simple-floating-contact-form')); ?>:
        </label>
      </th>

      <td>
        <fieldset>
          <input type="text" class="regular-text" id="sfcf-success-button" name="sfcf-success-button" value="<?php echo esc_attr(get_option('sfcf-success-button')); ?>" />
        </fieldset>
      </td>
    </tr>

    <tr valign="top">
      <th scope="row">
        <label for="sfcf-success-link">
          <?php echo esc_html(__('Button\'s link', 'simple-floating-contact-form')); ?>:
        </label>
      </th>

      <td>
        <fieldset>
          <input type="text" class="regular-text" id="sfcf-success-link" name="sfcf-success-link" value="<?php echo esc_attr(get_option('sfcf-success-link')); ?>" />
        </fieldset>
      </td>
    </tr>
  </table>
</div>