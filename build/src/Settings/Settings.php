<?php
/**
 * Settings
 */
namespace SimpleFloatingContactForm\Settings;

use SimpleFloatingContactForm\Settings\Pages\General;

class Settings
{
  /**
   * @var array
   */
  private $pages = [];

  /**
   * Constructor
   */
  public function __construct()
  {
    $this->pages[] = createClass('SimpleFloatingContactForm\Settings\Pages\General');
  }
}
