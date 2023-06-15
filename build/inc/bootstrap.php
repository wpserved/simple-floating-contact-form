<?php
require SIMPLE_FLOATING_CONTACT_FORM_PLUGIN_PATH . '/vendor/autoload.php';

if (!function_exists('SimpleFloatingContactFormDoc') && function_exists('SimpleFloatingContactForm\\SimpleFloatingContactFormDoc')) {
  /**
   * Initialize SimpleFloatingContactFormDoc() function.
   *
   * @return object
   */
  function SimpleFloatingContactFormDoc(): object
  {
    return SimpleFloatingContactForm\SimpleFloatingContactFormDoc();
  }
}

if (!function_exists('SimpleFloatingContactForm') && function_exists('SimpleFloatingContactForm\\SimpleFloatingContactForm')) {
  /**
   * Initialize SimpleFloatingContactForm() function.
   *
   * @param string $moduleName
   * @return object
   */
  function SimpleFloatingContactForm(string $moduleName = ''): object
  {
    return SimpleFloatingContactForm\SimpleFloatingContactForm($moduleName);
  }
}

if (!function_exists('createClass') && function_exists('SimpleFloatingContactForm\\createClass')) {
  /**
   * Initialize createClass() function.
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

SimpleFloatingContactFormDoc();
SimpleFloatingContactForm();
