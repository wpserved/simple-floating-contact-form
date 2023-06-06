<div class="sfcf-tab__panel-2">
  <div class="sfcf-tab__columns">
    <div class="sfcf-tab__column -left" data-settings>
      <h2 class="title">
        <?php echo esc_html(__('Styling options (optional)', 'simple-floating-contact-form')); ?>
      </h2>
      <p></p>

      <table class="form-table" role="presentation">
        <tr valign="top">
          <th scope="row">
            <label for="sfcf-no-styling-option">
              <?php echo esc_html(__('Choose styling option', 'simple-floating-contact-form')); ?>:
            </label>
          </th>

          <td>
            <fieldset>
              <input type="radio" class="regular-text" id="sfcf-no-styling-option-false" name="sfcf-no-styling-option" value="false" <?php if (get_option('sfcf-no-styling-option') == "false" || get_option('sfcf-no-styling-option') == "" ) { echo "checked"; }; ?>>

              <label for="sfcf-no-styling-option-false">
                <?php _e('Default stylesheet (with in-plugin styling option)', 'simple-floating-contact-form'); ?>
              </label>

              <br>

              <input type="radio" class="regular-text" id="sfcf-no-styling-option-true" name="sfcf-no-styling-option" value="true" <?php if (get_option('sfcf-no-styling-option') == "true") { echo "checked"; }; ?>>

              <label for="sfcf-no-styling-option-true">
                <?php _e('Custom stylesheet (prepared by developer, without in-plugin styling option)', 'simple-floating-contact-form'); ?>
              </label>

              <br>

              <?php if (get_option('stylesheet') == 'astratic-child' || get_option('stylesheet') == 'astratic'): ?>
                <input type="radio" class="regular-text" id="sfcf-no-styling-option-customizer" name="sfcf-no-styling-option" value="customizer" <?php if (get_option('sfcf-no-styling-option') == "customizer") { echo "checked"; }; ?>>

                <label for="sfcf-no-styling-option-customizer">
                  <strong>
                    <?php _e('Match colors with the Astratic Theme', 'simple-floating-contact-form'); ?>
                  </strong>
                </label>
              <?php endif; ?>
            </fieldset>
          </td>
        </tr>
      </table>

      <?php if (get_option('sfcf-no-styling-option') !== "true" && get_option('sfcf-no-styling-option') !== "customizer"): ?>
        <h2 class="title">
          <?php echo esc_html(__('Rounded corners and rounded form fields', 'simple-floating-contact-form')); ?>
        </h2>
        <p></p>

        <table class="form-table" role="presentation">
          <tr valign="top">
            <th scope="row">
              <label for="sfcf-corners-square">
                <?php echo esc_html(__('Choose corners style', 'simple-floating-contact-form')); ?>:
              </label>
            </th>

            <td>
              <fieldset>
                <input type="radio" class="regular-text" id="sfcf-corners-square" name="sfcf-corners-square" value="false" <?php if (get_option('sfcf-corners-square') == "false" || get_option('sfcf-corners-square') == "" ) { echo "checked"; }; ?>>

                <label for="sfcf-corners-square">
                  <?php _e('Rounded corners (default)', 'simple-floating-contact-form'); ?>
                </label>

                <br>

                <input type="radio" class="regular-text" id="sfcf-corners-square-true" name="sfcf-corners-square" value="true" <?php if (get_option('sfcf-corners-square') == "true") { echo "checked"; }; ?>>

                <label for="sfcf-corners-square-true">
                  <?php _e('Square corners', 'simple-floating-contact-form'); ?>
                </label>
              </fieldset>
            </td>
          </tr>
        </table>

        <h2 class="title">
          <?php echo esc_html(__('Where to display the icon and the form', 'simple-floating-contact-form')); ?>
        </h2>
        <p></p>

        <table class="form-table" role="presentation">
          <tr valign="top">
            <th scope="row">
              <label for="sfcf-placement-left">
                <?php echo esc_html(__('Choose placement', 'simple-floating-contact-form')); ?>:
              </label>
            </th>

            <td>
              <fieldset>
                <input type="radio" class="regular-text" id="sfcf-placement-left" name="sfcf-placement-left" value="false" <?php if (get_option('sfcf-placement-left') == "false" || get_option('sfcf-placement-left') == "" ) { echo "checked"; }; ?>>

                <label for="sfcf-placement-left">
                  <?php _e('Bottom Right', 'simple-floating-contact-form'); ?>
                </label>

                <br>

                <input type="radio" class="regular-text" id="sfcf-placement-left-true" name="sfcf-placement-left" value="true" <?php if (get_option('sfcf-placement-left') == "true") { echo "checked"; }; ?>>

                <label for="sfcf-placement-left-true">
                  <?php _e('Bottom Left', 'simple-floating-contact-form'); ?>
                </label>
              </fieldset>
            </td>
          </tr>
        </table>

        <h2 class="title">
          <?php echo esc_html(__('Color Settings', 'simple-floating-contact-form')); ?>
        </h2>
        <p></p>

        <table class="form-table" role="presentation">
          <tr valign="top">
            <th scope="row">
              <label for="sfcf-color-toggle">
                <?php echo esc_html(__('Toggle background color', 'simple-floating-contact-form')); ?>:
              </label>
            </th>

            <td>
              <fieldset>
                <input type="text" class="regular-text sfcf-color" id="sfcf-color-toggle" name="sfcf-color-toggle" value="<?php echo esc_attr($display->printData()['color_toggle']); ?>" data-default-color="#6835CC"/>
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row">
              <label for="sfcf-color-toggler-text">
                <?php echo esc_html(__('Toggle form text color', 'simple-floating-contact-form')); ?>:
              </label>
            </th>

            <td>
              <fieldset>
                <input type="text" class="regular-text sfcf-color" id="sfcf-color-toggler-text" name="sfcf-color-toggler-text" value="<?php echo esc_attr($display->printData()['color_toggler_text']); ?>" data-default-color="#FFF"/>
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row">
              <label for="sfcf-color-bg">
                <?php echo esc_html(__('Background color', 'simple-floating-contact-form')); ?>:
              </label>
            </th>

            <td>
              <fieldset>
                <input type="text" class="regular-text sfcf-color" id="sfcf-color-bg" name="sfcf-color-bg" value="<?php echo esc_attr($display->printData()['color_bg']); ?>" data-default-color="#6835CC"/>
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row">
              <label for="sfcf-color-text">
                <?php echo esc_html(__('Text color', 'simple-floating-contact-form')); ?>:
              </label>
            </th>

            <td>
              <fieldset>
                <input type="text" class="regular-text sfcf-color" id="sfcf-color-text" name="sfcf-color-text" value="<?php echo esc_attr($display->printData()['color_text']); ?>" data-default-color="#FFF"/>
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row">
              <label for="sfcf-color-input-placeholder">
                <?php echo esc_html(__('Form input field placeholder color', 'simple-floating-contact-form')); ?>:
              </label>
            </th>

            <td>
              <fieldset>
                <input type="text" class="regular-text sfcf-color" id="sfcf-color-input-placeholder" name="sfcf-color-input-placeholder" value="<?php echo esc_attr($display->printData()['color_input_placeholder']); ?>" data-default-color="#AAA"/>
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row">
              <label for="sfcf-color-input-text">
                <?php echo esc_html(__('Form input field text color', 'simple-floating-contact-form')); ?>:
              </label>
            </th>

            <td>
              <fieldset>
                <input type="text" class="regular-text sfcf-color" id="sfcf-color-input-text" name="sfcf-color-input-text" value="<?php echo esc_attr($display->printData()['color_input_text']); ?>" data-default-color="#222"/>
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row">
              <label for="sfcf-color-input-text-focus">
                <?php echo esc_html(__('Form input field text color (focus)', 'simple-floating-contact-form')); ?>:
              </label>
            </th>

            <td>
              <fieldset>
                <input type="text" class="regular-text sfcf-color" id="sfcf-color-input-text-focus" name="sfcf-color-input-text-focus" value="<?php echo esc_attr($display->printData()['color_input_text_focus']); ?>" data-default-color="#6835CC"/>
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row">
              <label for="sfcf-color-input-border">
                <?php echo esc_html(__('Form field border color', 'simple-floating-contact-form')); ?>:
              </label>
            </th>

            <td>
              <fieldset>
                <input type="text" class="regular-text sfcf-color" id="sfcf-color-input-border" name="sfcf-color-input-border" value="<?php echo esc_attr($display->printData()['color_input_border']); ?>" data-default-color="#03E2AB"/>
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row">
              <label for="sfcf-color-terms-link">
                <?php echo esc_html(__('Terms link color', 'simple-floating-contact-form')); ?>:
              </label>
            </th>

            <td>
              <fieldset>
                <input type="text" class="regular-text sfcf-color" id="sfcf-color-terms-link" name="sfcf-color-terms-link" value="<?php echo esc_attr($display->printData()['color_terms_link']); ?>" data-default-color="#03E2AB"/>
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row">
              <label for="sfcf-color-btn">
                <?php echo esc_html(__('Buttons background color', 'simple-floating-contact-form')); ?>:
              </label>
            </th>

            <td>
              <fieldset>
                <input type="text" class="regular-text sfcf-color" id="sfcf-color-btn" name="sfcf-color-btn" value="<?php echo esc_attr($display->printData()['color_btn']); ?>" data-default-color="#03E2AB"/>
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row">
              <label for="sfcf-color-btn-text">
                <?php echo esc_html(__('Buttons text color', 'simple-floating-contact-form')); ?>:
              </label>
            </th>

            <td>
              <fieldset>
                <input type="text" class="regular-text sfcf-color" id="sfcf-color-btn-text" name="sfcf-color-btn-text" value="<?php echo esc_attr($display->printData()['color_btn_text']); ?>" data-default-color="#FFF"/>
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row">
              <label for="sfcf-color-success-icon">
                <?php echo esc_html(__('Success icon background color', 'simple-floating-contact-form')); ?>:
              </label>
            </th>

            <td>
              <fieldset>
                <input type="text" class="regular-text sfcf-color" id="sfcf-color-success-icon" name="sfcf-color-success-icon" value="<?php echo esc_attr($display->printData()['color_success_icon']); ?>" data-default-color="#3A1A86"/>
              </fieldset>
            </td>
          </tr>
        </table>
      <?php endif; ?>
    </div>

    <div class="sfcf-tab__column -right" data-preview>
      <div id="sfcf" class="sfcf -preview" data-sfcf>
        <button class="sfcf__button -toggler" data-sfcf-toggler>
          <span class="sfcf__button-text">
            Button text
          </span>

          <img class="sfcf__button-icon" src="" alt="support-icon"/>
        </button>

        <main class="sfcf__main">
          <button class="sfcf__button -close">
            <span class="sfcf__button-close-icon"></span>
          </button>

          <div class="sfcf__step -form" data-sfcf-step="form">
            <header class="sfcf__header">
              <h2 class="sfcf__heading">
                Form title
              </h2>
            </header>

            <div class="sfcf__form">
              <input class="sfcf__form-field" type="text" name="name" placeholder="Placeholder">
              <input class="sfcf__form-field" type="email" name="email" placeholder="Placeholder">
              <input class="sfcf__form-field" type="text" name="subject" placeholder="Placeholder">
              <textarea class="sfcf__form-field -textarea" rows="5" name="message" placeholder="Placeholder"></textarea>

              <fieldset class="sfcf__form-consent">
                <label class="sfcf__form-field -checkbox">
                  <input type="checkbox" name="policy">

                  <span class="sfcf__form-field-text">
                    Checkbox content with <a href="#">link</a>.
                  </span>
                </label>
              </fieldset>

              <input class="sfcf__button -submit" type="submit" value="Submit" />
            </div>
          </div>

          <div class="sfcf__step -success" data-sfcf-step="success">
            <header class="sfcf__header -success">
              <h2 class="sfcf__heading -success">
                Success heading
              </h2>
            </header>

            <figure class="sfcf__success-icon">
              <svg width="324px" height="240px" viewBox="0 0 324 240" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                  <polygon id="path-1" points="0 0.0002 85.0109788 0.0002 85.0109788 85.0002 0 85.0002"></polygon>
                </defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="Wiadomość-wysłana" transform="translate(-989.000000, -286.000000)">
                    <g id="Widget-send" transform="translate(874.000000, 117.000000)">
                      <g id="Ilustracja-wyslanej-wiadomosci" transform="translate(115.000000, 169.000000)">
                        <circle id="Oval" class="oval" fill="#3A1A86" cx="160" cy="123" r="117"></circle>
                        <g id="Group-3" transform="translate(112.000000, 78.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <g id="Clip-2"></g>
                          <path d="M84.9641,3.56 L72.8141,76.41 C72.5721,77.873 71.2971,78.939 69.8141,78.92 C69.4231,78.911 69.0361,78.829 68.6741,78.68 L47.2041,69.91 L35.7241,83.91 C35.1581,84.609 34.3031,85.011 33.4041,85 C33.0621,85 32.7221,84.935 32.4041,84.81 C31.1981,84.384 30.3951,83.239 30.4041,81.96 L30.4041,65.41 L71.4041,15.18 L20.6441,59.05 L1.9041,51.37 C0.8171,50.944 0.0751,49.926 0.0041,48.76 C-0.0549,47.621 0.5231,46.542 1.5041,45.96 L80.5041,0.43 C80.9631,0.153 81.4881,0.005 82.0241,0 C82.6141,-0.001 83.1921,0.174 83.6841,0.5 C84.6721,1.182 85.1731,2.377 84.9641,3.56" id="Fill-1" fill="#FFFFFF" mask="url(#mask-2)"></path>
                        </g>
                        <circle id="Oval-Copy" fill="#FFFFFF" cx="254" cy="50" r="29"></circle>
                        <circle id="Oval-Copy-2" class="oval" fill="#3A1A86" opacity="0.300000012" cx="15" cy="171" r="15"></circle>
                        <circle id="Oval-Copy-3" class="oval" fill="#3A1A86" opacity="0.300000012" cx="309" cy="78" r="15"></circle>
                        <circle id="Oval-Copy-4" class="oval" fill="#3A1A86" opacity="0.300000012" cx="43.5" cy="200.5" r="6.5"></circle>
                        <circle id="Oval-Copy-5" class="oval" fill="#3A1A86" opacity="0.300000012" cx="238.5" cy="6.5" r="6.5"></circle>
                        <polyline id="Path-2" class="check" stroke="#02E18C" stroke-width="8" points="241 48.5453289 251.454671 59 269.454671 41"></polyline>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </figure>

            <footer class="sfcf__footer">
              <p>
                Success message
              </p>

              <a class="sfcf__button" href="#">
                Success button
              </a>
            </footer>
          </div>
        </main>
      </div>
    </div>
  </div>
</div>