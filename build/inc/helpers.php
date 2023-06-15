<?php
namespace SimpleFloatingContactForm;

use SimpleFloatingContactForm\Init;
use SimpleFloatingContactForm\Core\DocHooks;

if (!function_exists('SimpleFloatingContactForm\\SimpleFloatingContactFormDoc')) {
  function SimpleFloatingContactFormDoc()
  {
    return DocHooks::get();
  }
}

if (!function_exists('SimpleFloatingContactForm\\SimpleFloatingContactForm')) {
  function SimpleFloatingContactForm(string $moduleName = '')
  {
    $modules = Init::get();
    if ('' === $moduleName) {
      return $modules;
    }
    if (!array_key_exists($moduleName, $modules->public)) {
      throw new \Exception(sprintf(__('Module %1$s doesn\'t exists!', 'SimpleFloatingContactForm'), $moduleName));
    }
    return $modules->public[$moduleName];
  }
}

if (!function_exists('SimpleFloatingContactForm\\createClass')) {
  /**
   * Create instance of Class
   *
   * @see https://gist.github.com/nikic/6390366
   *
   * @param string $class
   * @param array $params
   * @return object
   */
  function createClass(string $class, array $params = array()): object
  {
    $object = new $class(...$params);
    SimpleFloatingContactFormDoc()->addDocHooks($object);
    return $object;
  }
}
