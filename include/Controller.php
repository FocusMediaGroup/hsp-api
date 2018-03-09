<?php

/*
 * The following content was designed & implemented under AlexSeif.com
 */

/**
 * Description of Controller
 *
 * @author Alex Seif <me@alexseif.com>
 */
class Controller
{

  /**
   * 
   */
  public function defaultAction()
  {
    var_dump("I am default");
  }

  /**
   * 
   * @param type $arg
   * @return type
   */
  public function summaryAction($arg)
  {
    $Reservations = new Reservations();
    $htmlTitle = "Summary";
    return array(
      'htmlTitle' => 'Summary',
      'reservations' => $Reservations->getReservations()
    );
  }

  /**
   * 
   * @param type $arg
   * @return type
   */
  public function touchAction($arg)
  {
    return array(
      'htmlTitle' => 'The Greek Campus',
      'reservations' => $currentReservations
    );
  }

  /**
   * 
   * @param type $arg
   * @return type
   */
  public function floorAction($arg)
  {
    $current_floor = '0';
    $floorTitle = 'Ground Floor';

    if (isset($arg['floor'])) {
      $current_floor = $arg['floor'];
    }

    $Reservations = new Reservations();

    $currentReservations = $Reservations->getCurrentReservationsByFloor($current_floor);
    $floorTitle = $htmlTitle = $Reservations->getFloorTitle();
    return array(
      'htmlTitle' => $floorTitle,
      'floorTitle' => $floorTitle,
      'reservations' => $currentReservations
    );
  }

  /**
   * 
   * @param type $arg
   * @return type
   */
  public function roomAction($arg)
  {
    $roomName = str_replace("_", " ", $arg[0]);
    $htmlTitle = $roomName;
    $Reservations = new Reservations();

    $currentReservations = $Reservations->getCurrentReservationByRoom($roomName);
    return array(
      'htmlTitle' => $roomName,
      'roomName' => $roomName,
      'reservations' => $currentReservations
    );
  }

  /**
   * 
   */
  public function dataAction()
  {
    $Reservations = new Reservations();
    $Reservations->fetchResources();
    $Reservations->fetchReservations();
  }

  /**
   * 
   * @param type $route
   * @param type $arg
   * @return type
   */
  public function run($route, $arg)
  {

    $action = $route . "Action";
    if (method_exists($this, $action)) {
      return $this->$action($arg);
    } else {
      echo "No Action to run";
    }
  }

}
