<?php

/**
 * Module: Validator
 */

namespace SimpleFloatingContactForm\Module\Validator;

class Validator
{
  /**
   * @var error
   */
  private $error = null;
  public function __construct()
  {
    //
  }

  public function sanitizeAllData(array $data): array
  {
    $sanitized = [];

    try {
      $sanitized['action'] = $this->sanitize($data['action'] ?? '');
      $sanitized['page'] = $this->sanitize($data['page'] ?? '', 'url');

      $sanitized['inputs'] = array_map( function($field) {
        $name = $this->sanitize($field['name']);
        $value = '';
        $dataType = 'text';

        if ('email' === $field['name']) {
          $dataType = 'email';
        } elseif ('message' === $field['name']) {
          $dataType = 'textarea';
        }

        $value = $this->sanitize($field['value'], $dataType);

        return [
          'name' => $name,
          'value' => $value
        ];
      }, $data['inputs']);

    } catch (\Exception $e) {
      error_log($e->getMessage());
    }

    return $sanitized;
  }

  private function sanitize($data, $type = 'text')
  {
    if (is_array($data)) {
      return array_map(function ($dataEl) {
        return $this->sanitize($dataEl);
      }, $data);
    }

    switch ($type) {
      case 'textarea':
          return sanitize_textarea_field($data);
      case 'email':
          return sanitize_email($data);
      case 'url':
          return esc_url_raw($data);
      default:
          return sanitize_text_field($data);
    }
  }

  public function validate($data)
  {
    // do your validation, nonce and stuffs here

    // Instantiate the WP_Error object
    $this->error = new \WP_Error();
    foreach ($data as $single) {
      switch ($single['name']) {
        case 'email':
          if (empty($single['value'])) {
            $this->error->add($single['name'], __('This field is required', 'simple-floating-contact-form'));
          } elseif (! is_email($single['value'])) {
            $this->error->add($single['name'], __('Email address must be valid', 'simple-floating-contact-form'));
          }

            break;
        default:
          if (empty($single['value'])) {
            $this->error->add($single['name'], __('This field is required', 'simple-floating-contact-form'));
          }
      }
    }

    // Send the result
    if (! empty($this->error->get_error_codes())) {
      return $this->error;
    }

    return true;
  }
}
