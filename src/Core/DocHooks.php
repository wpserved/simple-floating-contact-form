<?php
/**
 * Class responsible for firing DOC Hooks:  @shortcode @action @filter
 *
 * @author PH
 */
namespace SimpleFloatingContactForm\Core;

class DocHooks extends Singleton
{

  /**
   * Required instead of a static variable inside the add_doc_hooks method
   * for the sake of unit testing
   *
   * @var array
   */
  protected $calledDocHooks = array();

  /**
   * Pattern for doc hooks
   *
   * @var string
   */
  protected $docHooksPattern = '#\* @(?P<type>filter|action|shortcode)\s+(?P<name>[a-z0-9\-\.\/_]+)(\s+(?P<priority>\d+))?#';

  /**
   * Hooks a function on to a specific filter
   *
   * @param string $name     The hook name.
   * @param array  $callback The class object and method.
   * @param array  $args     An array with priority and arg_count.
   * @return mixed
   */
  public function addFilter(string $name, array $callback, array $args = array())
  {
    // Merge defaults.
    $args = array_merge(
        [
        'priority' => 10,
        'arg_count' => PHP_INT_MAX
        ],
        $args
    );
    return $this->addHook('filter', $name, $callback, $args);
  }

  /**
   * Hooks a function on to a specific action
   *
   * @param string $name     The hook name.
   * @param array  $callback The class object and method.
   * @param array  $args     An array with priority and arg_count.
   * @return mixed
   */
  public function addAction(string $name, array $callback, array $args = array())
  {
    // Merge defaults.
    $args = array_merge(
        array(
        'priority' => 10,
        'arg_count' => PHP_INT_MAX
        ),
        $args
    );
    return $this->addHook('action', $name, $callback, $args);
  }

  /**
   * Hooks a function on to a specific shortcode
   *
   * @param string $name     The shortcode name.
   * @param array  $callback The class object and method.
   * @return mixed
   */
  public function addShortcode(string $name, array $callback)
  {
    return $this->addHook('shortcode', $name, $callback);
  }

  /**
   * Hooks a function on to a specific action/filter
   *
   * @param string $type     The hook type. Options are action/filter.
   * @param string $name     The hook name.
   * @param array  $callback The class object and method.
   * @param array  $args     An array with priority and arg_count.
   * @return mixed
   */
  protected function addHook(string $type, string $name, array $callback, array $args = array())
  {
    $priority = isset($args['priority']) ? $args['priority'] : 10;
    $arg_count = isset($args['arg_count']) ? $args['arg_count'] : PHP_INT_MAX;

    $function = sprintf('\add_%s', $type);

    $retval = \call_user_func($function, $name, $callback, $priority, $arg_count);
    return $retval;
  }

  /**
   * Add actions/filters/shortcodes from the methods of a class based on DocBlocks
   *
   * @param object $object The class object.
   */
  public function addDocHooks(object $object = null)
  {
    if (is_null($object)) {
      $object = $this;
    }

    $class_name = get_class($object);

    if (isset($this->calledDocHooks[$class_name])) {
      return;
    }

    $this->calledDocHooks[$class_name] = true;
    $reflector = new \ReflectionObject($object);

    foreach ($reflector->getMethods() as $method) {
      $doc = $method->getDocComment();
      $arg_count = $method->getNumberOfParameters();

      if (preg_match_all($this->docHooksPattern, $doc, $matches, PREG_SET_ORDER)) {
        foreach ($matches as $match) {
          $type = ucfirst($match['type']);
          $name = $match['name'];

          $priority = empty($match['priority']) ? 10 : intval($match['priority']);
          $callback = array($object, $method->getName());

          call_user_func(array($this, "add{$type}"), $name, $callback, compact('priority', 'arg_count'));
        }
      }
    }
  }
}
