<?php

/*
 * The following content was designed & implemented under AlexSeif.com
 */

/**
 * Description of Controller
 *
 * @author Alex Seif <me@alexseif.com>
 */
class AdminController
{

  /**
   * Default action
   * 
   * @param array $arg arguments to the request
   */
  public function defaultAction($arg)
  {
    return [
      'htmlTitle' => 'Dashboard',
      'title' => 'Dashboard'
    ];
  }

  /**
   * This function passes the route and request parameters it's given and 
   * attempts to run it's respective controller function if exists
   * 
   * 
   * @param string $route Route from request
   * @param array $arg arguments to the request
   * @return array|string Returns an array from the relative controller function
   */
  public function run($route, $arg)
  {

    $action = $route . "Action";
    if (method_exists($this, $action)) {
      return $this->$action($arg);
    } else {
      return $this->defaultAction($arg);
    }
  }

}
