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
    <h3><?php _e('ERROR', 'simple-floating-contact-form'); ?></h3>
    <p><strong><?php _e('Astratic Theme not detected - choose style option', 'simple-floating-contact-form'); ?></strong></p>
    </div>
  <?php endif;
  endif; ?>
  <h1 class="wp-heading-inline"><?php echo esc_html(__('Simple Floating Contact Form', 'simple-floating-contact-form')); ?></h1>
  <form method="post" action="options.php">
    <?php settings_fields('SIMPLE_FLOATING_CONTACT_FORM_group'); ?>

    <div class="sfcf-tab">
      <input checked="checked" id="option-tab1" type="radio" name="option-tabs"/>
      <input id="option-tab2" type="radio" name="option-tabs"/>
      <input id="option-tab3" type="radio" name="option-tabs"/>
      <nav class="sfcf-tab__nav">
        <ul>
          <li class="sfcf-tab__button-1">
            <label for="option-tab1"><?php _e('General', 'simple-floating-contact-form'); ?></label>
          </li>
          <li class="sfcf-tab__button-2">
            <label for="option-tab2"><?php _e('Style', 'simple-floating-contact-form'); ?></label>
          </li>
          <li class="sfcf-tab__button-3">
            <label for="option-tab3"><?php _e('Display', 'simple-floating-contact-form'); ?></label>
          </li>
        </ul>
      </nav>

      <div class="sfcf-tab__panel-1">
        <h2 class="title"><?php echo esc_html(__('Email settings', 'simple-floating-contact-form')); ?></h2>
        <p></p>

        <table class="form-table" role="presentation">
          <tr valign="top">
            <th scope="row"><label for="sfcf-email-recipent"><?php echo esc_html(__('Email recipent(s)', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <input type="text" class="regular-text" id="sfcf-email-recipent" name="sfcf-email-recipent" value="<?php echo esc_attr(get_option('sfcf-email-recipent')); ?>" />
                <p class="description"><?php echo esc_html(__('Enter the email address (or several separated by a comma). If you leave this field empty, emails will be send to your website\'s administrator email address.', 'simple-floating-contact-form')); ?>
              </fieldset>
            </td>
          </tr>
        </table>

        <h2 class="title"><?php echo esc_html(__('Form settings', 'simple-floating-contact-form')); ?></h2>
        <p></p>

        <table class="form-table" role="presentation">
          <tr valign="top">
            <th scope="row"><label for="sfcf-form-toggler"><?php echo esc_html(__('Toggle button text (on hover)', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <input type="text" class="regular-text" id="sfcf-form-toggler" name="sfcf-form-toggler" value="<?php echo esc_attr(get_option('sfcf-form-toggler')); ?>" />
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row"><label for="sfcf-form-title"><?php echo esc_html(__('Form title', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <input type="text" class="regular-text" id="sfcf-form-title" name="sfcf-form-title" value="<?php echo esc_attr(get_option('sfcf-form-title')); ?>" />
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row"><label for="sfcf-form-name-input"><?php echo esc_html(__('Name and Surname label', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <input type="text" class="regular-text" id="sfcf-form-name-input" name="sfcf-form-name-input" value="<?php echo esc_attr(get_option('sfcf-form-name-input')); ?>" />
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row"><label for="sfcf-form-email-input"><?php echo esc_html(__('Email address label', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <input type="text" class="regular-text" id="sfcf-form-email-input" name="sfcf-form-email-input" value="<?php echo esc_attr(get_option('sfcf-form-email-input')); ?>" />
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row"><label for="sfcf-form-email-subject"><?php echo esc_html(__('Email subject label', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <input type="text" class="regular-text" id="sfcf-form-email-subject" name="sfcf-form-email-subject" value="<?php echo esc_attr(get_option('sfcf-form-email-subject')); ?>" />
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row"><label for="sfcf-form-email-message"><?php echo esc_html(__('Message label', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <input type="text" class="regular-text" id="sfcf-form-email-message" name="sfcf-form-email-message" value="<?php echo esc_attr(get_option('sfcf-form-email-message')); ?>" />
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row"><label for="sfcf-form-checkbox"><?php echo esc_html(__('Checkbox label', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <textarea type="textarea" rows="5" cols="50" id="sfcf-form-checkbox" name="sfcf-form-checkbox" class="large-text code" placeholder="<?php echo __('I have read and accept the Terms of Service & Privacy Policy.', 'simple-floating-contact-form'); ?>"><?php echo esc_textarea(get_option('sfcf-form-checkbox')); ?></textarea>
              </fieldset>
              <p class="description">
                <small><?php echo __('Leave empty to hide this field in the form.', 'simple-floating-contact-form'); ?></small>
                <small><?php echo __('To link something, you can use the shortcode:', 'simple-floating-contact-form'); ?> [sfcf_link url=# title=FooBoo target_blank=1]</small>
              </p>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row"><label for="sfcf-form-submit"><?php echo esc_html(__('Submit label', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <input type="text" class="regular-text" id="sfcf-form-submit" name="sfcf-form-submit" value="<?php echo esc_attr(get_option('sfcf-form-submit')); ?>" />
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row"><label for="sfcf-form-icon"><?php echo esc_html(__('Form icon', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset class="sfcf-form-icon__wrapper">
                <input type="hidden" name="sfcf-form-icon" id="sfcf-form-icon" value="<?php echo esc_attr(get_option('sfcf-form-icon')); ?>"/>
                <input type="button" class="button" id="sfcf-form-icon-btn" value="Upload Image" />
                <?php if (! empty(get_option('sfcf-form-icon'))) : ?>
                  <input type="button" class="button --red" id="sfcf-form-icon-clear" value="Clear" />
                <?php endif ?>
                <img class="sfcf-form-icon__img" id="sfcf-form-icon-img" src="<?php echo esc_url(get_option('sfcf-form-icon')); ?>" alt="">
              </fieldset>
              <p class="description"><small><?php echo esc_html(__('Choose the icon which will occur in the pop up activation button (40px on 40px size, .png or .svg preferred)', 'simple-floating-contact-form')); ?></small></p>
            </td>
          </tr>
        </table>

        <h2 class="title"><?php echo esc_html(__('Success page settings', 'simple-floating-contact-form')); ?></h2>
        <p></p>

        <table class="form-table" role="presentation">
          <tr valign="top">
            <th scope="row"><label for="sfcf-success-title"><?php echo esc_html(__('Success page title', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <input type="text" class="regular-text" id="sfcf-success-title" name="sfcf-success-title" value="<?php echo esc_attr(get_option('sfcf-success-title')); ?>" />
              </fieldset>
            </td>
          </tr>


          <tr valign="top">
            <th scope="row"><label for="sfcf-success-note"><?php echo esc_html(__('Success page message', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <input type="text" class="regular-text" id="sfcf-success-note" name="sfcf-success-note" value="<?php echo esc_attr(get_option('sfcf-success-note')); ?>" />
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row"><label for="sfcf-success-button"><?php echo esc_html(__('Success page button label', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <input type="text" class="regular-text" id="sfcf-success-button" name="sfcf-success-button" value="<?php echo esc_attr(get_option('sfcf-success-button')); ?>" />
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row"><label for="sfcf-success-link"><?php echo esc_html(__('Button\'s link', 'simple-floating-contact-form')); ?>:</label></th>
            <td><input type="text" class="regular-text" id="sfcf-success-link" name="sfcf-success-link" value="<?php echo esc_attr(get_option('sfcf-success-link')); ?>" /></td>
          </tr>
        </table>
      </div>

      <div class="sfcf-tab__panel-2">
        <h2 class="title"><?php echo esc_html(__('Styling options (optional)', 'simple-floating-contact-form')); ?></h2>
        <p></p>

        <table class="form-table" role="presentation">
          <tr valign="top">
            <th scope="row"><label for="sfcf-no-styling-option"><?php echo esc_html(__('Choose styling option', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <input type="radio" class="regular-text" id="sfcf-no-styling-option-false" name="sfcf-no-styling-option" value="false" <?php if (get_option('sfcf-no-styling-option') == "false" || get_option('sfcf-no-styling-option') == "" ) { echo "checked"; }; ?>>
                <label for="sfcf-no-styling-option-false"><?php _e('Default stylesheet (with in-plugin styling option)', 'simple-floating-contact-form'); ?></label><br>
                <input type="radio" class="regular-text" id="sfcf-no-styling-option-true" name="sfcf-no-styling-option" value="true" <?php if (get_option('sfcf-no-styling-option') == "true") { echo "checked"; }; ?>>
                <label for="sfcf-no-styling-option-true"><?php _e('Custom stylesheet (prepared by developer, without in-plugin styling option)', 'simple-floating-contact-form'); ?></label><br>
                <?php if (get_option('stylesheet') == 'astratic-child' || get_option('stylesheet') == 'astratic'): ?>
                  <input type="radio" class="regular-text" id="sfcf-no-styling-option-customizer" name="sfcf-no-styling-option" value="customizer" <?php if (get_option('sfcf-no-styling-option') == "customizer") { echo "checked"; }; ?>>
                  <label for="sfcf-no-styling-option-customizer"><strong><?php _e('Match colors with the Astratic Theme', 'simple-floating-contact-form'); ?></strong></label>
                <?php endif; ?>
              </fieldset>
            </td>
          </tr>
        </table>

        <?php if(get_option('sfcf-no-styling-option') !== "true" && get_option('sfcf-no-styling-option') !== "customizer"): ?>
        <h2 class="title"><?php echo esc_html(__('Color Settings', 'simple-floating-contact-form')); ?></h2>
        <p></p>

        <table class="form-table" role="presentation">
          <tr valign="top">
            <th scope="row"><label for="sfcf-color-toggle"><?php echo esc_html(__('Toggle color', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <input type="text" class="regular-text sfcf-color" id="sfcf-color-toggle" name="sfcf-color-toggle" value="<?php echo esc_attr($display->printData()['color_toggle']); ?>" data-default-color="#6835CC"/>
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row"><label for="sfcf-color-bg"><?php echo esc_html(__('Background color', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <input type="text" class="regular-text sfcf-color" id="sfcf-color-bg" name="sfcf-color-bg" value="<?php echo esc_attr($display->printData()['color_bg']); ?>" data-default-color="#6835CC"/>
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row"><label for="sfcf-color-text"><?php echo esc_html(__('Text color', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <input type="text" class="regular-text sfcf-color" id="sfcf-color-text" name="sfcf-color-text" value="<?php echo esc_attr($display->printData()['color_text']); ?>" data-default-color="#FFF"/>
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row"><label for="sfcf-color-input-text"><?php echo esc_html(__('Input text color', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <input type="text" class="regular-text sfcf-color" id="sfcf-color-input-text" name="sfcf-color-input-text" value="<?php echo esc_attr($display->printData()['color_input_text']); ?>" data-default-color="#222"/>
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row"><label for="sfcf-color-input-text-focus"><?php echo esc_html(__('Input text color (on focus)', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <input type="text" class="regular-text sfcf-color" id="sfcf-color-input-text-focus" name="sfcf-color-input-text-focus" value="<?php echo esc_attr($display->printData()['color_input_text_focus']); ?>" data-default-color="#6835CC"/>
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row"><label for="sfcf-color-input-border"><?php echo esc_html(__('Input border color', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <input type="text" class="regular-text sfcf-color" id="sfcf-color-input-border" name="sfcf-color-input-border" value="<?php echo esc_attr($display->printData()['color_input_border']); ?>" data-default-color="#03E2AB"/>
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row"><label for="sfcf-color-btn"><?php echo esc_html(__('Buttons color', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <input type="text" class="regular-text sfcf-color" id="sfcf-color-btn" name="sfcf-color-btn" value="<?php echo esc_attr($display->printData()['color_btn']); ?>" data-default-color="#03E2AB"/>
              </fieldset>
            </td>
          </tr>

          <tr valign="top">
            <th scope="row"><label for="sfcf-color-btn-text"><?php echo esc_html(__('Buttons text color', 'simple-floating-contact-form')); ?>:</label></th>
            <td>
              <fieldset>
                <input type="text" class="regular-text sfcf-color" id="sfcf-color-btn-text" name="sfcf-color-btn-text" value="<?php echo esc_attr($display->printData()['color_btn_text']); ?>" data-default-color="#FFF"/>
              </fieldset>
            </td>
          </tr>
        </table>
        <?php endif; ?>
      </div>

      <div class="sfcf-tab__panel-3">
        <h2 class="title"><?php echo esc_html(__('Display Settings', 'simple-floating-contact-form')); ?></h2>
        <p></p>

        <table class="form-table" role="presentation">
          <?php if (get_option('page_on_front') != 0 || get_option('page_for_posts') != 0 ) : ?>
            <tr valign="top">
              <th scope="row"><label for="sfcf-color-toggle"><?php echo esc_html(__('Display on custom home/front pages', 'simple-floating-contact-form')); ?>:</label></th>
              <td>
                <fieldset>
                  <?php if (get_option('page_on_front') != 0) : ?>
                    <div>
                      <input
                        type="checkbox"
                        class="regular-text"
                        id="sfcf-display-custom-[id-<?php echo esc_attr(get_post(get_option('page_on_front'))->ID); ?>]"
                        name="sfcf-display-custom[id-<?php echo esc_attr(get_post(get_option('page_on_front'))->ID); ?>]"
                        <?php
                          if(! empty(get_option('sfcf-display-custom')) && array_key_exists('id-'.get_post(get_option('page_on_front'))->ID, get_option('sfcf-display-custom'))) {
                            echo "checked";
                          } elseif(! empty(get_option('sfcf-display-pages')) && array_key_exists('id-'.get_post(get_option('page_on_front'))->ID, get_option('sfcf-display-pages'))) {
                            echo "checked";
                          };
                        ?>
                      />
                      <label
                        for="sfcf-display-custom[id-<?php echo esc_attr(get_post(get_option('page_on_front'))->ID); ?>]"
                      >
                        <?php echo esc_html(get_post(get_option('page_on_front'))->post_title); ?> <?php _e('(front page)', 'simple-floating-contact-form'); ?>
                      </label>
                    </div>
                  <?php endif; ?>
                  <?php if (get_option('page_for_posts') != 0) : ?>
                    <div>
                      <input
                        type="checkbox"
                        class="regular-text"
                        id="sfcf-display-custom-[id-<?php echo esc_attr(get_post(get_option('page_for_posts'))->ID); ?>]"
                        name="sfcf-display-custom[id-<?php echo esc_attr(get_post(get_option('page_for_posts'))->ID); ?>]"
                        <?php
                          if(! empty(get_option('sfcf-display-custom')) && array_key_exists('id-'.get_post(get_option('page_for_posts'))->ID, get_option('sfcf-display-custom'))) {
                            echo "checked";
                          } elseif(! empty(get_option('sfcf-display-pages')) && array_key_exists('id-'.get_post(get_option('page_for_posts'))->ID, get_option('sfcf-display-pages'))) {
                            echo "checked";
                          };
                        ?>
                      />
                      <label
                        for="sfcf-display-custom[id-<?php echo esc_attr(get_post(get_option('page_for_posts'))->ID); ?>]"
                      >
                        <?php echo esc_html(get_post(get_option('page_for_posts'))->post_title); ?> <?php _e('(page for posts)', 'simple-floating-contact-form'); ?>
                      </label>
                    </div>
                  <?php endif; ?>
                </fieldset>
              </td>
            </tr>
          <?php else : ?>
            <tr valign="top">
              <th scope="row"><label for="sfcf-color-toggle"><?php echo esc_html(__('Display on home page', 'simple-floating-contact-form')); ?>:</label></th>
              <td>
                <fieldset>
                  <div>
                    <input
                      type="checkbox"
                      class="regular-text"
                      id="sfcf-display-custom[default-home]"
                      name="sfcf-display-custom[default-home]"
                      <?php
                        if(! empty(get_option('sfcf-display-custom')) && array_key_exists('default-home', get_option('sfcf-display-custom'))) {
                          echo "checked";
                        };
                      ?>
                    />
                    <label
                      for="sfcf-display-custom[default-home]"
                    >
                      <?php _e('Default home page', 'simple-floating-contact-form'); ?>
                    </label>
                  </div>
                </fieldset>
              </td>
            </tr>
          <?php endif;
            if (!empty(get_pages())) :
          ?>
            <tr valign="top">
              <th scope="row"><label for="sfcf-color-toggle"><?php echo esc_html(__('Display on pages', 'simple-floating-contact-form')); ?>:</label></th>
              <td>
                <fieldset>
                  <?php foreach (get_pages() as $page): ?>
                    <div>
                      <input
                        type="checkbox"
                        class="regular-text"
                        id="sfcf-display-pages[id-<?php echo esc_attr($page->ID); ?>]"
                        name="sfcf-display-pages[id-<?php echo esc_attr($page->ID); ?>]"
                        <?php
                          if(!empty(get_option('sfcf-display-pages')) && array_key_exists('id-'.$page->ID, get_option('sfcf-display-pages'))) {
                            echo "checked";
                          } elseif(!empty(get_option('sfcf-display-custom')) && array_key_exists('id-'.$page->ID, get_option('sfcf-display-custom'))) {
                            echo "checked";
                          };
                        ?>
                      />
                      <label
                        for="sfcf-display-pages[id-<?php echo esc_attr($page->ID); ?>]"
                      >
                        <?php echo esc_html($page->post_title); ?>
                      </label>
                    </div>
                  <?php endforeach; ?>
                </fieldset>
              </td>
            </tr>
          <?php endif;
            $posts_types = get_post_types($args = array(
              'public'   => true,
              '_builtin' => false
            ));
            $posts_types['post'] = 'post';
          ?>
            <tr valign="top">
              <th scope="row"><label for="sfcf-color-toggle"><?php echo esc_html(__('Display on post types (single posts)', 'simple-floating-contact-form')); ?>:</label></th>
              <td>
                <fieldset>
                  <?php foreach ($posts_types as $post_type): ?>
                    <div>
                      <input
                        type="checkbox"
                        class="regular-text"
                        id="sfcf-display-posts[<?php echo esc_attr($post_type); ?>]"
                        name="sfcf-display-posts[<?php echo esc_attr($post_type); ?>]"
                        <?php
                          if(!empty(get_option('sfcf-display-posts')) && array_key_exists($post_type, get_option('sfcf-display-posts'))) {
                            echo "checked";
                          };
                        ?>
                      />
                      <label
                        for="sfcf-display-posts[<?php echo esc_attr($post_type); ?>]"
                      >
                        <?php echo esc_html(get_post_type_object($post_type)->label); ?>
                      </label>
                    </div>
                  <?php endforeach; ?>
                </fieldset>
              </td>
            </tr>
          <?php if (count($posts_types) > 1) : ?>
            <tr valign="top">
              <th scope="row"><label for="sfcf-color-toggle"><?php echo esc_html(__('Display on post types (archive pages)', 'simple-floating-contact-form')); ?>:</label></th>
              <td>
                <fieldset>
                  <?php foreach ($posts_types as $post_type):
                    if ($post_type != 'post') :?>
                    <div>
                      <input
                        type="checkbox"
                        class="regular-text"
                        id="sfcf-display-posts-archive[archive-<?php echo esc_attr($post_type); ?>]"
                        name="sfcf-display-posts-archive[archive-<?php echo esc_attr($post_type); ?>]"
                        <?php
                          if(!empty(get_option('sfcf-display-posts-archive')) && array_key_exists('archive-'.$post_type, get_option('sfcf-display-posts-archive'))) {
                            echo "checked";
                          };
                        ?>
                      />
                      <label
                        for="sfcf-display-posts-archive[archive-<?php echo esc_attr($post_type); ?>]"
                      >
                        <?php echo esc_html(get_post_type_object($post_type)->label); ?>
                      </label>
                    </div>
                  <?php
                    endif;
                  endforeach; ?>
                </fieldset>
              </td>
            </tr>
          <?php endif;
            $category_args = array(
              'hide_empty' => 0,
              'orderby'   => 'name',
              'order'     => 'ASC'
            );
            $category_types = get_categories($category_args);

            if (! empty($category_types)) :
          ?>
            <tr valign="top">
              <th scope="row"><label for="sfcf-color-toggle"><?php echo esc_html(__('Display on categories (category page)', 'simple-floating-contact-form')); ?>:</label></th>
              <td>
                <fieldset>
                  <?php foreach ($category_types as $category): ?>
                    <div>
                      <input
                        type="checkbox"
                        class="regular-text"
                        id="sfcf-display-categories[id-cat-<?php echo esc_attr($category->term_id); ?>]"
                        name="sfcf-display-categories[id-cat-<?php echo esc_attr($category->term_id); ?>]"
                        <?php
                          if(! empty(get_option('sfcf-display-categories')) && array_key_exists('id-cat-'.$category->term_id, get_option('sfcf-display-categories'))) {
                            echo "checked";
                          };
                        ?>
                      />
                      <label
                        for="sfcf-display-categories[id-cat-<?php echo esc_attr($category->term_id); ?>]"
                      >
                        <?php echo esc_html($category->name); ?>
                      </label>
                    </div>
                  <?php endforeach; ?>
                </fieldset>
              </td>
            </tr>
          <?php endif;

            $tags_args = array(
              'hide_empty' => 0,
              'orderby'   => 'name',
              'order'     => 'ASC'
            );
            $tags_types = get_tags($tags_args);

            if (! empty($tags_types)) :
          ?>
            <tr valign="top">
              <th scope="row"><label for="sfcf-color-toggle"><?php echo esc_html(__('Display on tags (tag page)', 'simple-floating-contact-form')); ?>:</label></th>
              <td>
                <fieldset>
                  <?php foreach ($tags_types as $tag): ?>
                    <div>
                      <input
                        type="checkbox"
                        class="regular-text"
                        id="sfcf-display-tags[id-tag-<?php echo esc_attr($tag->term_id); ?>]"
                        name="sfcf-display-tags[id-tag-<?php echo esc_attr($tag->term_id); ?>]"
                        <?php
                          if(! empty(get_option('sfcf-display-tags')) && array_key_exists('id-tag-'.$tag->term_id, get_option('sfcf-display-tags'))) {
                            echo "checked";
                          };
                        ?>
                      />
                      <label
                        for="sfcf-display-tags[id-tag-<?php echo esc_attr($tag->term_id); ?>]"
                      >
                        <?php echo esc_html($tag->name); ?>
                      </label>
                    </div>
                  <?php endforeach; ?>
                </fieldset>
              </td>
            </tr>
          <?php endif; ?>

        </table>
      </div>
    </div>

    <?php  submit_button(); ?>
  </form>
</div>
