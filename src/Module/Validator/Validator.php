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

  public function validate($data)
  {
    // do your validation, nonce and stuffs here

    // Instantiate the WP_Error object
    $this->error = new \WP_Error();

    foreach($data as $single)
    {
      switch($single['name']) {
        case 'email':
          if (empty($single['value'])) {
            $this->error->add($single['name'], __('This field is required', 'simple-floating-contact-form'));
          } elseif (!is_email($single['value'])) {
            $this->error->add($single['name'], __('Email address must be valid', 'simple-floating-contact-form'));
          }
        break;
        default:
          if(empty($single['value'])) {
            $this->error->add($single['name'], __('This field is required', 'simple-floating-contact-form'));
          }
      }
    }

    // Send the result
    if (!empty( $this->error->get_error_codes())) {
      return $this->error;
    }

    return true;
  }
}
