<?php
/**
 * Singleton Base
 *
 * @author PH
 */
namespace SimpleFloatingContactForm\Core;

abstract class Singleton
{
  /**
   * @var array
   */
  public $public = array();

  /**
   * @var array
   */
  public $private = array();

  /**
   * Instances
   *
   * @var array
   */
  protected static $instances = array();

  /**
   * Constructor
   */
  protected function __construct()
  {
  }

  /**
   * __clone
   */
  protected function __clone()
  {
  }

  /**
   * __wakeup function
   * @throws Exception If cannot unserialize singleton.
   */
  public function __wakeup()
  {
    throw new Exception('Cannot unserialize singleton');
  }

  /**
   * Get: Object
   *
   * @return object
   */
  public static function get()
  {
    $class = get_called_class();
    if (!isset(self::$instances[$class])) {
      self::$instances[$class] = new static();
    }
    return self::$instances[$class];
  }

   /**
   * Initializes public module
   *
   * @return void
   */
  public function addPublic(string $name, string $label = '')
  {
    $class = 'SimpleFloatingContactForm\\' . $name;
    $index = !empty($label) ? $label : $name;
    $this->public[$index] = new $class();
    SimpleFloatingContactFormDoc()->addDocHooks($this->public[$index]);
  }

  /**
   * Initializes private module
   *
   * @return void
   */
  public function addPrivate(string $name, string $label = '')
  {
    $class = 'SimpleFloatingContactForm\\' . $name;
    $index = !empty($label) ? $label : $name;
    $this->private[$index] = new $class();
    SimpleFloatingContactFormDoc()->addDocHooks($this->private[$index]);
  }
}
