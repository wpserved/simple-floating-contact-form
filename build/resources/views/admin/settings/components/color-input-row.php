<tr valign="top">
  <th scope="row">
    <label for="<?php echo esc_attr($id); ?>">
      <?php echo esc_html($label); ?>:
    </label>
  </th>

  <td>
    <fieldset data-color-input>
      <input type="text" class="regular-text sfcf-color" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($id); ?>" value="<?php echo esc_attr($value); ?>" data-default-color="<?php echo esc_attr($default); ?>"/>
    </fieldset>
  </td>
</tr>