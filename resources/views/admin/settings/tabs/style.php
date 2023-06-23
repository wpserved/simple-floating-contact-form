<div class="sfcf-tab__panel-2">
  <div class="sfcf-tab__columns sfcf">
    <div class="sfcf-tab__column -left" data-settings>
      <h2 class="title">
        <?php echo esc_html(__('Styling options (optional)', 'simple-floating-contact-form')); ?>
      </h2>

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

        <table class="form-table" role="presentation">
          <tr valign="top">
            <th scope="row">
              <label for="sfcf-corners-square">
                <?php echo esc_html(__('Choose corners style', 'simple-floating-contact-form')); ?>:
              </label>
            </th>

            <td>
              <fieldset data-corners>
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

        <table class="form-table" role="presentation" data-color-inputs>
          <?php
          $label = __('Toggle background color', 'simple-floating-contact-form');
          $id = 'sfcf-color-toggle';
          $value = $display->printData()['color_toggle'];
          $default = '#6835CC';
          include SIMPLE_FLOATING_CONTACT_FORM_RESOURCES_PATH . 'views/admin/settings/components/color-input-row.php';

          $label = __('Toggle text color', 'simple-floating-contact-form');
          $id = 'sfcf-color-toggler-text';
          $value = $display->printData()['color_toggler_text'];
          $default = '#FFF';
          include SIMPLE_FLOATING_CONTACT_FORM_RESOURCES_PATH . 'views/admin/settings/components/color-input-row.php';
          ?>

          <tr valign="top">
            <th scope="row">
              <label for="sfcf-form-icon">
                <?php echo esc_html(__('Toggle icon', 'simple-floating-contact-form')); ?>:
              </label>
            </th>

            <td>
              <fieldset class="sfcf-form-icon__wrapper">
                <input type="hidden" name="sfcf-form-icon" id="sfcf-form-icon" value="<?php echo esc_attr(get_option('sfcf-form-icon')); ?>"/>

                <input type="button" class="button" id="sfcf-form-icon-btn" value="Upload Image" />

                <?php if (! empty(get_option('sfcf-form-icon'))) : ?>
                  <input type="button" class="button --red" id="sfcf-form-icon-clear" value="Clear" />
                <?php endif ?>

                <img class="sfcf-form-icon__img" id="sfcf-form-icon-img" src="<?php echo esc_url(get_option('sfcf-form-icon')); ?>" alt="">
              </fieldset>

              <p class="description">
                <small>
                  <?php echo esc_html(__('Choose the icon which will occur in the pop up activation button (40px on 40px size, .png or .svg preferred)', 'simple-floating-contact-form')); ?>
                </small>
              </p>
            </td>
          </tr>

          <?php
          $label = __('Background color', 'simple-floating-contact-form');
          $id = 'sfcf-color-bg';
          $value = $display->printData()['color_bg'];
          $default = '#6835CC';
          include SIMPLE_FLOATING_CONTACT_FORM_RESOURCES_PATH . 'views/admin/settings/components/color-input-row.php';

          $label = __('Text color', 'simple-floating-contact-form');
          $id = 'sfcf-color-text';
          $value = $display->printData()['color_text'];
          $default = '#FFF';
          include SIMPLE_FLOATING_CONTACT_FORM_RESOURCES_PATH . 'views/admin/settings/components/color-input-row.php';

          $label = __('Form input field placeholder color', 'simple-floating-contact-form');
          $id = 'sfcf-color-input-placeholder';
          $value = $display->printData()['color_input_placeholder'];
          $default = '#AAA';
          include SIMPLE_FLOATING_CONTACT_FORM_RESOURCES_PATH . 'views/admin/settings/components/color-input-row.php';

          $label = __('Form input field text color', 'simple-floating-contact-form');
          $id = 'sfcf-color-input-text';
          $value = $display->printData()['color_input_text'];
          $default = '#222';
          include SIMPLE_FLOATING_CONTACT_FORM_RESOURCES_PATH . 'views/admin/settings/components/color-input-row.php';

          $label = __('Form input field text color (focus)', 'simple-floating-contact-form');
          $id = 'sfcf-color-input-text-focus';
          $value = $display->printData()['color_input_text_focus'];
          $default = '#6835CC';
          include SIMPLE_FLOATING_CONTACT_FORM_RESOURCES_PATH . 'views/admin/settings/components/color-input-row.php';

          $label = __('Form field border color', 'simple-floating-contact-form');
          $id = 'sfcf-color-input-border';
          $value = $display->printData()['color_input_border'];
          $default = '#03E2AB';
          include SIMPLE_FLOATING_CONTACT_FORM_RESOURCES_PATH . 'views/admin/settings/components/color-input-row.php';

          $label = __('Terms link color', 'simple-floating-contact-form');
          $id = 'sfcf-color-terms-link';
          $value = $display->printData()['color_terms_link'];
          $default = '#03E2AB';
          include SIMPLE_FLOATING_CONTACT_FORM_RESOURCES_PATH . 'views/admin/settings/components/color-input-row.php';

          $label = __('Buttons background color', 'simple-floating-contact-form');
          $id = 'sfcf-color-btn';
          $value = $display->printData()['color_btn'];
          $default = '#03E2AB';
          include SIMPLE_FLOATING_CONTACT_FORM_RESOURCES_PATH . 'views/admin/settings/components/color-input-row.php';

          $label = __('Buttons text color', 'simple-floating-contact-form');
          $id = 'sfcf-color-btn-text';
          $value = $display->printData()['color_btn_text'];
          $default = '#FFF';
          include SIMPLE_FLOATING_CONTACT_FORM_RESOURCES_PATH . 'views/admin/settings/components/color-input-row.php';
          ?>

          <tr valign="top">
            <th scope="row">
              <label for="sfcf-success-icon">
                <?php echo esc_html(__('Success icon', 'simple-floating-contact-form')); ?>:
              </label>
            </th>

            <td>
              <fieldset class="sfcf-success-icon__wrapper">
                <input type="hidden" name="sfcf-success-icon" id="sfcf-success-icon" value="<?php echo esc_attr(get_option('sfcf-success-icon')); ?>"/>

                <input type="button" class="button" id="sfcf-success-icon-btn" value="Upload Image" />

                <?php if (! empty(get_option('sfcf-success-icon'))) : ?>
                  <input type="button" class="button --red" id="sfcf-success-icon-clear" value="Clear" />
                <?php endif ?>

                <img class="sfcf-success-icon__img" id="sfcf-success-icon-img" src="<?php echo esc_url(get_option('sfcf-success-icon')); ?>" alt="">
              </fieldset>

              <p class="description">
                <small>
                  <?php echo esc_html(__('Choose the icon which will occur on the success message (324px on 240px size, .png or .svg preferred)', 'simple-floating-contact-form')); ?>
                </small>
              </p>
            </td>
          </tr>

          <?php if (empty(get_option('sfcf-success-icon'))) :
            $label = __('Success icon background color', 'simple-floating-contact-form');
            $id = 'sfcf-color-success-icon';
            $value = $display->printData()['color_success_icon'];
            $default = '#3A1A86';
            include SIMPLE_FLOATING_CONTACT_FORM_RESOURCES_PATH . 'views/admin/settings/components/color-input-row.php';
          endif; ?>
        </table>
      <?php endif; ?>
    </div>

    <?php if (get_option('sfcf-no-styling-option') !== "true" && get_option('sfcf-no-styling-option') !== "customizer"): ?>
      <div class="sfcf-tab__column -right" data-preview>
        <div id="sfcf" class="sfcf -preview" data-sfcf>
          <h2 class="sfcf__preview-header">
            <?php echo esc_html(__('Preview', 'simple-floating-contact-form')); ?>
          </h2>

          <p class="sfcf__preview-info">
            <?php echo esc_html(__('The preview does not reflect changes to the content and custom icons. The preview also does not show all the form fields. This feature shows changes to the selected color and style options.', 'simple-floating-contact-form')); ?>
          </p>

          <button class="sfcf__button -toggler" data-sfcf-toggler>
            <span class="sfcf__button-text">
              <?php echo esc_html(__('Button text', 'simple-floating-contact-form')); ?>
            </span>

            <?php if (! empty(get_option('sfcf-form-icon'))) : ?>
              <img class="sfcf__button-icon" src="<?php echo get_option('sfcf-form-icon'); ?>">
            <?php else : ?>
              <svg class="sfcf__button-icon" width="40px" height="36px" viewBox="0 0 40 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1372.000000, -684.000000)" fill="#fff">
                    <g transform="translate(1360.000000, 672.000000)">
                      <g transform="translate(12.000000, 12.000000)">
                        <path d="M35.1112727,7.07070707 L33.8183434,5.77777778 L32.4850101,4.44444444 C32.0001616,4 31.2320808,3.91919192 30.6668283,4.32323232 L27.6365253,6.50505051 C26.383596,5.77777778 25.0506667,5.21212121 23.6365253,4.84848485 L23.0304646,1.17171717 C22.9092525,0.484848485 22.3031919,-5.74175948e-15 21.6563232,-5.74175948e-15 L19.7981414,-5.74175948e-15 L17.9395556,-5.74175948e-15 C17.2526869,-5.74175948e-15 16.6466263,0.484848485 16.5658182,1.17171717 L15.9193535,4.84848485 C14.5052121,5.21212121 13.1314747,5.77777778 11.8381414,6.54545455 L8.84864646,4.44444444 C8.2829899,4.04040404 7.51531313,4.12121212 7.03046465,4.60606061 L5.73753535,5.8989899 L4.44460606,7.19191919 C3.95935354,7.67676768 3.87894949,8.44444444 4.2829899,9.01010101 L6.46480808,12.0808081 C5.73753535,13.3333333 5.21228283,14.7070707 4.84864646,16.0808081 L1.17187879,16.6464646 C0.485010101,16.7676768 0.000161616162,17.3737374 0.000161616162,18.020202 L0.000161616162,19.8787879 L0.000161616162,21.7373737 C0.000161616162,22.4242424 0.485010101,23.030303 1.17187879,23.1111111 L4.88905051,23.7171717 C5.25268687,25.0909091 5.81834343,26.4242424 6.58561616,27.6767677 L4.44460606,30.7070707 C4.04056566,31.2727273 4.12137374,32.040404 4.60622222,32.5252525 L5.89915152,33.8181818 L7.19167677,35.1111111 C7.67692929,35.5959596 8.44460606,35.6767677 9.00985859,35.2727273 L12.0809697,33.0909091 C12.363798,33.2525253 12.6462222,33.4141414 12.9698586,33.5757576 C13.0502626,33.6161616 13.1314747,33.6565657 13.2122828,33.6969697 C13.454303,33.8181818 13.6971313,33.9393939 13.9395556,34.020202 C13.9799596,34.0606061 14.0603636,34.0606061 14.1011717,34.1010101 C14.424404,34.2222222 14.7072323,34.3434343 15.0304646,34.4242424 L15.0704646,34.4242424 C15.394101,34.5454545 15.7173333,34.6262626 16.0001616,34.7070707 C16.2021818,34.7474747 16.404202,34.7878788 16.6062222,34.8282828 L16.6062222,28.1616162 C16.6062222,26.9494949 16.0805657,25.8181818 15.1516768,25.0505051 C13.6163232,23.7171717 12.6462222,21.7373737 12.6462222,19.5151515 C12.6462222,16.8484848 14.0603636,14.5050505 16.2021818,13.2121212 C16.363798,13.1313131 16.5658182,13.2525253 16.5658182,13.4141414 L16.5658182,17.6161616 C16.5658182,18.8686869 17.5759192,19.8787879 18.8284444,19.8787879 L20.7270303,19.8787879 C21.9799596,19.8787879 22.9900606,18.8686869 22.9900606,17.6161616 L22.9900606,13.2121212 C22.9900606,13.0505051 23.1920808,12.9292929 23.3132929,13.010101 C25.6967273,14.2222222 27.3128889,16.6868687 27.3128889,19.5151515 C27.3128889,21.8181818 26.2223838,23.8787879 24.5654141,25.2525253 C23.5553131,26.0606061 22.9492525,27.2323232 22.9492525,28.5252525 L22.9492525,34.9090909 C23.1920808,34.8686869 23.4745051,34.7878788 23.7173333,34.7070707 C24.0001616,34.6262626 24.3233939,34.5454545 24.6062222,34.4242424 C24.6866263,34.3838384 24.7674343,34.3838384 24.8486465,34.3434343 C25.0506667,34.2626263 25.2526869,34.1818182 25.414303,34.1414141 C25.5755152,34.1010101 25.6967273,34.020202 25.8587475,33.9393939 C25.9395556,33.8989899 26.0607677,33.8585859 26.1415758,33.8181818 C26.343596,33.7373737 26.5456162,33.6161616 26.7476364,33.5353535 C27.0304646,33.4141414 27.2728889,33.2525253 27.5557172,33.0909091 L30.5860202,35.2727273 C31.1512727,35.6767677 31.9193535,35.5959596 32.404202,35.1111111 L33.6971313,33.8181818 L34.9896566,32.5252525 C35.4745051,32.040404 35.5557172,31.2727273 35.1516768,30.7070707 L33.1314747,27.6363636 C33.8583434,26.3838384 34.424404,25.0505051 34.7876364,23.6363636 L38.4648081,22.989899 C39.1516768,22.8686869 39.6361212,22.2626263 39.6361212,21.6161616 L39.6361212,19.7575758 L39.6361212,17.8989899 C39.6361212,17.2121212 39.1516768,16.6060606 38.4648081,16.5252525 L34.7476364,15.9191919 C34.383596,14.5454545 33.8183434,13.2121212 33.0910707,11.9191919 L35.2724848,8.88888889 C35.6765253,8.32323232 35.5957172,7.55555556 35.1112727,7.07070707" id="Fill-1"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            <?php endif; ?>
          </button>

          <main class="sfcf__main">
            <div class="sfcf__step -form" data-sfcf-step="form">
              <button class="sfcf__button -close">
                <span class="sfcf__button-close-icon"></span>
              </button>

              <header class="sfcf__header">
                <h2 class="sfcf__heading">
                  Form title
                </h2>
              </header>

              <div class="sfcf__form">
                <input class="sfcf__form-field" type="text" name="name" placeholder="Placeholder">
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
              <button class="sfcf__button -close">
                <span class="sfcf__button-close-icon"></span>
              </button>

              <header class="sfcf__header -success">
                <h2 class="sfcf__heading -success">
                  <?php echo esc_html(__('Success heading', 'simple-floating-contact-form')); ?>
                </h2>
              </header>

              <figure class="sfcf__success-icon">
                <?php if (! empty(get_option('sfcf-success-icon'))) : ?>
                  <img src="<?php echo get_option('sfcf-success-icon'); ?>">
                <?php else : ?>
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
                <?php endif; ?>
              </figure>

              <footer class="sfcf__footer">
                <p>
                  <?php echo esc_html(__('Success message content.', 'simple-floating-contact-form')); ?>
                </p>

                <a class="sfcf__button" href="#">
                  <?php echo esc_html(__('Success button', 'simple-floating-contact-form')); ?>
                </a>
              </footer>
            </div>
          </main>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>