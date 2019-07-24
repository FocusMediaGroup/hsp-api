<?php

/*
 * The following content was designed & implemented under AlexSeif.com
 */

/**
 * Description of App
 *
 * @author Alex Seif <me@alexseif.com>
 */
class App
{

  /**
   * Holds request parameters
   * 
   * @var Array $request
   */
  private $request;

  /**
   * 
   */
  public function __construct()
  {
    $this->processRequest();
    $this->backwardCompatibility();
  }

  /**
   * 
   * @return Array $request
   */
  public function getRequest()
  {
    return $this->request;
  }

  /**
   * 
   * @return string
   */
  public function getPath()
  {
    return $this->request['path'];
  }

  /**
   * 
   * @param string $path
   * @return string
   */
  public function setPath($path)
  {
    return $this->request['path'] = $path;
  }

  /**
   * 
   * @return Array
   */
  public function getArg()
  {
    return $this->request['arg'];
  }

  /**
   * Backward compatibility with the initial system
   * This function detects old paths and loads the appropriate template
   */
  public function backwardCompatibility()
  {
    switch ($this->getPath()) {
      case "summury_1":
        $this->setPath('summary');
        break;
      case "zone_1":
        $this->setPath('floor');
        break;
      case "room_1":
        $this->setPath('room');
        break;
    }
  }

  /**
   * This function populates the request variable and stash the _GET variables
   * in 'arg'
   */
  public function processRequest()
  {
    $this->request['GET'] = $_GET;
    $this->request['POST'] = $_POST;
    $this->request['arg'] = array();
    $this->request['path'] = null;
    foreach ($_GET as $key => $value) {
      if ("q" == $key) {
        $this->request['path'] = $value;
      } else {
        if ($value) {
          $this->request['arg'][$key] = $value;
        } else {
          $this->request['arg'][] = $key;
        }
        if ("touch" == $key) {
          global $config;
          $config['touch'] = $value;
        }
      }
    }
  }

}
