
<div class="sfcf-tab__panel-3">
  <h2 class="title">
    <?php echo esc_html(__('Display Settings', 'simple-floating-contact-form')); ?>
  </h2>

  <p class="description">
    <?php echo esc_html(__('Simple Floating Contact Form toggle button is visible on all pages of your website by default. You can change that by selecting one or all of the options below.', 'simple-floating-contact-form')); ?>
  </p>

  <table class="form-table" role="presentation">
    <?php if (get_option('page_on_front') != 0 || get_option('page_for_posts') != 0 ) : ?>
      <tr valign="top">
        <th scope="row">
          <label for="sfcf-color-toggle">
            <?php echo esc_html(__('Display on custom home/front pages', 'simple-floating-contact-form')); ?>:
          </label>
        </th>

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

                <label for="sfcf-display-custom[id-<?php echo esc_attr(get_post(get_option('page_on_front'))->ID); ?>]">
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

                <label for="sfcf-display-custom[id-<?php echo esc_attr(get_post(get_option('page_for_posts'))->ID); ?>]">
                  <?php echo esc_html(get_post(get_option('page_for_posts'))->post_title); ?> <?php _e('(page for posts)', 'simple-floating-contact-form'); ?>
                </label>
              </div>
            <?php endif; ?>
          </fieldset>
        </td>
      </tr>
    <?php else : ?>
      <tr valign="top">
        <th scope="row">
          <label for="sfcf-color-toggle">
            <?php echo esc_html(__('Display on home page', 'simple-floating-contact-form')); ?>:
          </label>
        </th>

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
              <label for="sfcf-display-custom[default-home]">
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
        <th scope="row">
          <label for="sfcf-color-toggle">
            <?php echo esc_html(__('Display on pages', 'simple-floating-contact-form')); ?>:
          </label>
        </th>

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
                <label for="sfcf-display-pages[id-<?php echo esc_attr($page->ID); ?>]">
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
        <th scope="row">
          <label for="sfcf-color-toggle">
            <?php echo esc_html(__('Display on post types (single posts)', 'simple-floating-contact-form')); ?>:
          </label>
        </th>

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

                <label for="sfcf-display-posts[<?php echo esc_attr($post_type); ?>]">
                  <?php echo esc_html(get_post_type_object($post_type)->label); ?>
                </label>
              </div>
            <?php endforeach; ?>
          </fieldset>
        </td>
      </tr>
    <?php if (count($posts_types) > 1) : ?>
      <tr valign="top">
        <th scope="row">
          <label for="sfcf-color-toggle">
            <?php echo esc_html(__('Display on post types (archive pages)', 'simple-floating-contact-form')); ?>:
          </label>
        </th>

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

                <label for="sfcf-display-posts-archive[archive-<?php echo esc_attr($post_type); ?>]">
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
        <th scope="row">
          <label for="sfcf-color-toggle">
            <?php echo esc_html(__('Display on categories (category page)', 'simple-floating-contact-form')); ?>:
          </label>
        </th>

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

                <label for="sfcf-display-categories[id-cat-<?php echo esc_attr($category->term_id); ?>]">
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
        <th scope="row">
          <label for="sfcf-color-toggle">
            <?php echo esc_html(__('Display on tags (tag page)', 'simple-floating-contact-form')); ?>:
          </label>
        </th>

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

                <label for="sfcf-display-tags[id-tag-<?php echo esc_attr($tag->term_id); ?>]">
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