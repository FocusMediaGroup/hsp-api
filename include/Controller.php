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
   * Default action
   */
  public function defaultAction()
  {
    var_dump("I am default");
  }

  /**
   * 
   * @param array $arg
   * @return array
   */
  public function summaryAction($arg)
  {
    $Reservations = new Reservations();
    $htmlTitle = "Summary";
    return array(
      'htmlTitle' => 'Summary',
      'title' => 'Events',
      'reservations' => $Reservations->getCurrentReservations()
    );
  }

  /**
   * Controller function for Summary Ajax request
   * path /summaryAjax
   * 
   * @return array
   */
  public function summaryAjaxAction()
  {
    $Reservations = new Reservations();
    return array(
      'reservations' => $Reservations->getCurrentReservations()
    );
  }

  /**
   * Controller function for Search Ajax request
   * path /searchAjax
   * 
   * @param array $arg
   * @return array
   */
  public function searchAjaxAction($arg)
  {
    //TODO: Sanatize search 

    $Reservations = new Reservations();
    return array(
      'reservations' => $Reservations->search($arg['search'])
    );
  }

  /**
   * Controller function for Touch Request
   * path /touch
   * 
   * @return array
   */
  public function touchAction()
  {
    return array(
      'title' => 'Welcome',
      'reservations' => $currentReservations
    );
  }

  /**
   * Controller function for Floor Request
   * path /floor
   * 
   * $arg['floor'] should hold the value of the floor number being requested
   * this should be passed through the URL query parameter 'floor'
   * eg. /floor?floor=1 will return reservations of the 1st floor
   *
   * @param array $arg
   * @return array
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
   * Controller function for Room Request
   * path /room
   * 
   * $arg[0] should hold the name of the room being requested
   * this should be passed the the URL query with the room name as the parameter name
   * eg. /room?Room_Name will return reservations for Room_Name
   * 
   * @param array $arg
   * @return array
   */
  public function roomAction($arg)
  {
    $roomName = str_replace("_", " ", $arg[0]);
    $Reservations = new Reservations();

    $currentReservations = $Reservations->getCurrentReservationByRoom($roomName);
    return array(
      'title' => $roomName,
      'reservations' => $currentReservations
    );
  }

  /**
   * Controller function for Room Ajax Request
   * path /roomAjax
   * 
   *  * $arg[0] should hold the name of the room being requested
   * this should be passed the the URL query with the room name as the parameter name
   * eg. /roomAjax?Room_Name will return reservations for Room_Name
   * 
   * @param type $arg
   * @return type
   */
  public function roomAjaxAction($arg)
  {
    $roomName = str_replace("_", " ", $arg[0]);
    $Reservations = new Reservations();

    $currentReservations = $Reservations->getCurrentReservationByRoom($roomName);
    return array(
      'title' => $roomName,
      'reservations' => $currentReservations
    );
  }

  /**
   * Controller function for Cron request
   */
  public function cronAction()
  {
    $Reservations = new Reservations();
    $Reservations->fetchResources();
    $Reservations->fetchReservations();
    return array();
  }

  /**
   * Controller function for Import request
   * path /import
   * 
   * @global type $resources
   * @throws Exception
   */
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
          $reservation['endDateTime'] = "2018-12-31T00:00:00+0200";
          $postReservations[] = $reservation;
        }
      }
      fclose($handle);
    }
    $Reservations = new Reservations();
    $Reservations->postResrvations($postReservations);
  }

  /**
   * This function parses the route it's given and attempts to run it's respective controller function if exists
   * 
   * @param string $route Route from request
   * @param array $arg arguments to the route
   * @return array|string Returns an array from the relative controller function
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
