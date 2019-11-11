<?php

/*
 * The following content was designed & implemented under AlexSeif.com
 */

/**
 * Description of AdminApp
 *
 * @author Alex Seif <me@alexseif.com>
 */
class AdminApp
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
    return ($this->request['path']) ? $this->request['path'] : "default";
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
