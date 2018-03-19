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
      'title' => 'Today\'s Events',
      'reservations' => $Reservations->getCurrentReservations()
    );
  }

  public function summaryAjaxAction()
  {
    $Reservations = new Reservations();
    return array(
      'reservations' => $Reservations->getCurrentReservations()
    );
  }

  public function searchAjaxAction($arg)
  {

    $Reservations = new Reservations();
    return array(
      'reservations' => $Reservations->search($arg['search'])
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
      'title' => 'Welcome',
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
      'title' => $floorTitle,
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
    $title = $roomName;
    $Reservations = new Reservations();

    $currentReservations = $Reservations->getCurrentReservationByRoom($roomName);
    return array(
      'title' => $roomName,
      'reservations' => $currentReservations
    );
  }

  /**
   * 
   * @param type $arg
   * @return type
   */
  public function roomAjaxAction($arg)
  {
    $roomName = str_replace("_", " ", $arg[0]);
    $title = $roomName;
    $Reservations = new Reservations();

    $currentReservations = $Reservations->getCurrentReservationByRoom($roomName);
    return array(
      'title' => $roomName,
      'reservations' => $currentReservations
    );
  }

  /**
   * 
   */
  public function cronAction()
  {
    $Reservations = new Reservations();
    $Reservations->fetchResources();
    $Reservations->fetchReservations();
    return array();
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

  public function sampleAction()
  {
    return array('title' => 'Sample');
  }

  public function importAction()
  {
    global $resources;
    $resourceByName = array();
    foreach ($resources['resources'] as $resource) {
      $resourceByName[$resource['resourceId']] = $resource['name'];
    }

    $row = 1;
    $postReservations = [];
    $reservation = array();
    if (($handle = fopen("data/data.csv", "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        $resourceName = trim($data[0]);
        $reservation['resourceId'] = array_search($resourceName, $resourceByName);
        if (FALSE === $reservation['resourceId']) {
          throw new Exception("Cannot find resource " . $resourceName);
        }
        $reservation['title'] = trim($data[2]);
        if ($reservation['title']) {
          //lets rock and roll
          $reservation['startDateTime'] = "2018-03-19T00:00:00+0200";
          $reservation['endDateTime'] = "2018-04-19T00:00:00+0200";
          $postReservations[] = $reservation;
        }
      }
      fclose($handle);
    }
    $Reservations = new Reservations();
    $Reservations->postResrvations($postReservations);
  }

}
