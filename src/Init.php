<?php
/**
 * @package SimpleFloatingContactForm
 */
namespace SimpleFloatingContactForm;

use SimpleFloatingContactForm\Core\Singleton;

class Init extends Singleton
{
  /**
   * Constructor
   */
  public function __construct()
  {
    $this->addPrivate('Core\\Config');
    $this->addPrivate('Settings\\Settings');

    $this->addPrivate('Module\\Module');
  }
}
