<?php
/**
 * Module
 */
namespace SimpleFloatingContactForm\Module;

use SimpleFloatingContactForm\Module\Display\Display;
use SimpleFloatingContactForm\Module\Mailer\Mailer;

class Module
{
  /**
   * Constructor
   */
  public function __construct() {
    createClass('SimpleFloatingContactForm\Module\Display\Display');
    createClass('SimpleFloatingContactForm\Module\Mailer\Mailer');
  }
}
