<tr valign="top">
  <th scope="row">
    <label for="<?php echo esc_attr($id); ?>">
      <?php echo esc_html($label); ?>:
    </label>
  </th>

  <td>
    <fieldset data-radius-input>
      <input type="number" class="number" min="0" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($id); ?>" value="<?php echo esc_attr($value); ?>" data-default-value="<?php echo esc_attr($default); ?>"/>
    </fieldset>
  </td>
</tr>