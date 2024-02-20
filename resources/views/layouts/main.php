<?php
/**
 *
 * Layout: Main
 */

use SimpleFloatingContactForm\Module\Display\Display;
$displayOptions = new Display();
?>

<?php if ($displayOptions->shouldDisplayPopup()) : ?>
  <?php if ($this->notes['no_style'] !== "true" && $this->notes['no_style'] !== "customizer") : ?>
    <style scoped>
      .sfcf {
        --sfcf-main-text: <?php echo esc_html($this->notes['color_text']); ?>;
        --sfcf-main-background: <?php echo esc_html($this->notes['color_bg']); ?>;
        --sfcf-toggler-background: <?php echo esc_html($this->notes['color_toggle']); ?>;
        --sfcf-toggler-color: <?php echo esc_html($this->notes['color_toggler_text']); ?>;
        --sfcf-form-field-placeholder: <?php echo esc_html($this->notes['color_input_placeholder']); ?>;
        --sfcf-form-field-text:  <?php echo esc_html($this->notes['color_input_text']); ?>;
        --sfcf-form-field-text-focus: <?php echo esc_html($this->notes['color_input_text_focus']); ?>;
        --sfcf-form-field-border: <?php echo esc_html($this->notes['color_input_border']); ?>;
        --sfcf-term-link: <?php echo esc_html($this->notes['color_terms_link']); ?>;
        --sfcf-button-background: <?php echo esc_html($this->notes['color_btn']); ?>;
        --sfcf-button-text: <?php echo esc_html($this->notes['color_btn_text']); ?>;
        --sfcf-success-icon: <?php echo esc_html($this->notes['color_success_icon']); ?>;
      }
    </style>
  <?php endif; ?>

  <?php if ($this->notes['no_style'] == "customizer") : ?>
    <style scoped>
      .sfcf {
        --sfcf-primary: var(--primary);
        --sfcf-secondary: var(--action-buttons);
        --sfcf-main-text: var(--light);
        --sfcf-main-background: var(--primary);
        --sfcf-toggler-background: var(--primary);
        --sfcf-toggler-color: var(--light);
        --sfcf-form-field-text: var(--text-default);
        --sfcf-form-field-placeholder: var(--text-light);
        --sfcf-button-text: var(--light);
        --sfcf-form-field-text-focus: var(--sfcf-primary);
        --sfcf-form-field-border: var(--sfcf-secondary);
        --sfcf-term-link: var(--sfcf-secondary);
        --sfcf-button-background: var(--sfcf-secondary);
        --sfcf-button-text: var(--sfcf-white);
      }
    </style>
  <?php endif; ?>

  <?php if ($this->notes['square_corners'] == "true") : ?>
    <style scoped>
      .sfcf {
        --sfcf-radius-huge: 0px;
        --sfcf-radius-big: 0px;
        --sfcf-radius-medium: 0px;
        --sfcf-radius-small: 0px;
      }

      body #sfcf .sfcf__form-field:not(.-checkbox) {
        padding-left: 14px;
        padding-right: 14px;
      }
    </style>
  <?php endif; ?>

  <?php if ($this->notes['placement_left'] == "true") : ?>
    <style scoped>
      body #sfcf {
        left: 16px;
        right: unset;
      }

      body #sfcf .sfcf__button.-toggler {
        left: 0;
        right: unset;
      }

      body #sfcf .sfcf__main {
        transform: translateX(-100%);
      }

      @media screen and (min-width: 992px) {
        body #sfcf .sfcf__main {
          left: 0;
          right: unset;
          transform: translateX(calc(-100% - 16px));
        }
      }
    </style>
  <?php endif; ?>

  <div id="sfcf" class="sfcf" data-sfcf>
    <button class="sfcf__button -toggler" data-sfcf-toggler>
      <span class="sfcf__button-text">
        <?php echo esc_html($this->notes['toggler_btn']); ?>
      </span>

      <img class="sfcf__button-icon" src="<?php echo esc_url($this->notes['icon']); ?>" alt="support-icon"/>
    </button>

    <main class="sfcf__main" data-sfcf-main>
      <button class="sfcf__button -close" data-sfcf-close>
        <span class="sfcf__button-close-icon"></span>
      </button>

      <div class="sfcf__step -form" data-sfcf-step="form">
        <header class="sfcf__header">
          <h2 class="sfcf__heading">
            <?php echo esc_html($this->notes['form_title']); ?>
          </h2>
        </header>

        <form class="sfcf__form" data-sfcf-form>
          <input class="sfcf__form-field" type="text" name="name" placeholder="<?php echo esc_attr($this->notes['input_1']); ?>" data-required>
          <input class="sfcf__form-field" type="email" name="email" placeholder="<?php echo esc_attr($this->notes['input_2']); ?>" data-required>
          <input class="sfcf__form-field" type="text" name="subject" placeholder="<?php echo esc_attr($this->notes['input_3']); ?>" data-required>
          <textarea class="sfcf__form-field -textarea" rows="5" name="message" placeholder="<?php echo esc_attr($this->notes['input_4']); ?>" data-required></textarea>

          <?php if (! empty($this->notes['checkbox'])): ?>
            <fieldset class="sfcf__form-consent">
              <label class="sfcf__form-field -checkbox">
                <input type="checkbox" name="policy" data-required>

                <span class="sfcf__form-field-text">
                  <?php echo wp_kses($this->notes['checkbox'], ['a' => ['href' => [], 'target' => []]]); ?>
                </span>
              </label>
            </fieldset>
          <?php endif; ?>

          <button class="sfcf__button -submit" type="submit">
            <?php echo esc_attr($this->notes['submit']); ?>
          </button>
        </form>
      </div>

      <div class="sfcf__step -success" data-sfcf-step="success">
        <header class="sfcf__header -success">
          <h2 class="sfcf__heading -success">
            <?php echo esc_html($this->notes['success_title']); ?>
          </h2>
        </header>

        <figure class="sfcf__success-icon">
          <?php if (! empty($this->notes['success_icon'])): ?>
            <img src="<?php echo esc_url($this->notes['success_icon']); ?>" alt="success" />
          <?php else :?>
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
            <?php echo wp_kses($this->notes['success_note'], ['b' => [], 'br' => []]); ?>
          </p>

          <?php if (! empty($this->notes['success_btn']) && ! empty($this->notes['success_url'])) : ?>
            <a class="sfcf__button" href="<?php echo esc_url($this->notes['success_url']); ?>">
              <?php echo esc_html($this->notes['success_btn']); ?>
            </a>
          <?php endif; ?>
        </footer>
      </div>
    </main>
  </div>
<?php endif; ?>