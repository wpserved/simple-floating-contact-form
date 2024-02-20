<?php
/**
 * Module: Mailer
 */
namespace SimpleFloatingContactForm\Module\Mailer;

use SimpleFloatingContactForm\Module\Validator\Validator;

if(!class_exists('Mailer')) {
  class Mailer
  {
    /**
     * @var data
     */
    private $data = null;

    /**
     * @var validator
     */
    public $validator = null;

    /**
     * @var args
     */
    private $args = null;

    /**
     * @var emailRecipent
     */
    private $emailRecipent = null;

    /**
     * @var messageSubject
     */
    private $messageSubject = null;

    /**
     * @var message
     */
    private $message = null;

    public function __construct()
    {
      //
    }

    /**
     * @var headers
     */
    private $headers = null;

    /**
     * Function that handles the AJAX call
     *
     * @action wp_ajax_sfcf_send_form
     * @action wp_ajax_nopriv_sfcf_send_form
     */
    public function handleForm() {
      $this->validator = createClass('SimpleFloatingContactForm\Module\Validator\Validator');

      $this->data = $this->validator->sanitizeAllData($_POST);

      //Validate inputs
      $valid = $this->validator->validate($this->data['inputs']);

      if(is_wp_error($valid)) {
        wp_send_json_error($valid);

        wp_die();
      }

      //populate data for wp_mail function
      $this->populateData($this->data);

      // submit form
      $this->send();
    }

    public function populateData($data)
    {
      //recipent email
      $this->emailRecipent = get_option('sfcf-email-recipent') !== '' ? get_option('sfcf-email-recipent') : get_option('admin_email');

      //get message body
      $messageBody = $this->messageBody();

      $this->fillMessage($messageBody);

      $this->args = array(
        'to'          => $this->emailRecipent,
        'subject'     => $this->messageSubject,
        'message'     => $this->message,
        'headers'     => $this->headers,
        'attachments' => ''
      );
    }

    /**
     * Function which trigger wp_mail
     */
    public function send()
    {
      //hook for before send
      // $this->beforeSend($this->args);

      $sent = wp_mail($this->args['to'], $this->args['subject'], $this->args['message'], $this->args['headers'], $this->args['attachments']);

      //hook for after sent
      // $this->afterSent($sent);

      if($sent) {
        return wp_send_json_success(__('Your message was sent', 'simple-floating-contact-form'));
      } else {
        return wp_send_json_error(__('Ups! Something weng wrong!', 'simple-floating-contact-form'));
      }

      wp_die();
    }

    /**
     * Custom action before email is send
     */
    public function beforeSend($args)
    {
      do_action('sfcf_before_send');
    }

    /**
     * Custom action triggers after mail was sent
     */
    public function afterSent($response)
    {
      do_action('sfcf_afte_sent');
    }

    /**
     * Create message body
     */
    public function messageBody()
    {
      //get custom template for mail
      $messageContent = '';
      if(file_exists(get_stylesheet_directory() . '/simple-floating-contact-form/assets/email.php')) {
        ob_start();
        include get_stylesheet_directory() . '/simple-floating-contact-form/assets/email.php';
        $messageContent = ob_get_contents();
        ob_end_clean();
      }

      if(! empty($messageContent)) {
        return $messageContent;
      } else {
        //set default email message
        $messageContent = 'Hello [sfcf_recipent],

        User name: [sfcf_name],
        User email: [sfcf_email],
        Message: [sfcf_message],

        Site: [sfcf_site]';

        return __( $messageContent, 'simple-floating-contact-form');
      }
    }

    /**
     * Replace tokens from message body with data
     */
    public function fillMessage($body)
    {
      $data = array();

      foreach($this->data['inputs'] as $single)
      {
        $data[$single['name']] = $single['value'];
      }

      $data['page'] = $this->data['page'];
      $tokens = array(
        '[sfcf_recipent]' => $this->emailRecipent,
        '[sfcf_email]' => $data['email'],
        '[sfcf_message]' => $data['message'],
        '[sfcf_name]' => $data['name'],
        '[sfcf_site]' => $data['page']
      );

      foreach($tokens as $key => $value) {
        $body = str_replace($key, $value, $body);
      }

      $this->messageSubject = $data['subject'];
      $this->headers = '';
      $this->message = $body;
    }
  }

}
