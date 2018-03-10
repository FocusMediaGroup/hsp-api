<?php

/*
 * The following content was designed & implemented under AlexSeif.com
 */
include('bookedapi.php');

/**
 * Description of Reservations
 *
 * @author Alex Seif <me@alexseif.com>
 */
class Reservations
{

  /**
   *
   * @var bookedAPIclient
   */
  private $apiClient;

  /**
   *
   * @var array
   */
  private $reservations;

  /**
   *
   * @var \DateTimeZone
   */
  private $timezone;

  /**
   *
   * @var \DateTime
   */
  private $now;

  /**
   *
   * @var string
   */
  private $floorTitle;

  function __construct()
  {
    $username = 'api';
    $password = 'api$api';
    $username = 'api';
    $password = 'api$api';
    $this->apiClient = new bookedapiclient($username, $password);
    $this->timezone = new \DateTimeZone(YOURTIMEZONE);
    $this->now = new \DateTime();
  }

  function fetchData()
  {

    $this->apiClient = new bookedapiclient($username, $password);
    $this->fetchResources();
    $this->fetchReservations();
  }

  function getApiClient()
  {
    return $this->apiClient;
  }

  function fetchReservations()
  {
    $this->reservations = $this->apiClient->getReservation();
    //Clean up before save
    $reservationsFile = fopen("reservations.json", "w") or die("Unable to open file!");
    fwrite($reservationsFile, json_encode($this->reservations));
    fclose($reservationsFile);
  }

  function getReservations()
  {
    $str = file_get_contents('reservations.json');
    $reservations = json_decode($str, true); // decode the JSON into an associative array
    $this->reservations = $reservations['reservations'];
    return $this->reservations;
  }

  function fetchResources()
  {
    $resources = $this->apiClient->getResource();
    //Clean up before save
    $resourcesFile = fopen("resources.json", "w") or die("Unable to open file!");
    fwrite($resourcesFile, json_encode($resources));
    fclose($resourcesFile);
  }

  function getTimezone()
  {
    return $this->timezone;
  }

  function getNow()
  {
    return $this->now;
  }

  function getFloorTitle()
  {
    return $this->floorTitle;
  }

  function setFloorTitle($floorTitle)
  {
    $this->floorTitle = $floorTitle;
  }

  function getCurrentReservationByRoom($roomName)
  {
    $currentReservations = null;
    if (is_array($this->reservations['reservations'])) {
      foreach ($this->reservations['reservations'] as $reservation) {
        if ($reservation['resourceName'] == $roomName) {
          $reservationStart = new \DateTime($reservation['startDate']);
          $reservationEnd = new \DateTime($reservation['endDate']);
          if (($this->now->getTimestamp() >= $reservationStart->getTimestamp()) &&
              ($this->now->getTimestamp() < $reservationEnd->getTimestamp())) {

            $reservation['startDate'] = new \DateTime($reservation['startDate']);
            $reservation['startDate']->setTimezone($this->timezone);
            $reservation['endDate'] = new \DateTime($reservation['endDate']);
            $reservation['endDate']->setTimezone($this->timezone);
//            $reservation['startDate'] = $reservation['startDate']->format('h:i A');
//            $reservation['endDate'] = $reservation['endDate']->format('h:i A');

            $currentReservations[] = $reservation;
          }
        }
      }
    }
    return $currentReservations;
  }

  function getCurrentReservations()
  {
    $currentReservations = null;
    $reservationByFloorNo = null;
    $this->getReservations();
    if (is_array($this->reservations['reservations'])) {
      foreach ($this->reservations['reservations'] as $reservation) {
        $reservationStart = new \DateTime($reservation['startDate']);
        $reservationEnd = new \DateTime($reservation['endDate']);

//        if (($this->now->getTimestamp() >= $reservationStart->getTimestamp()) &&
//            ($this->now->getTimestamp() < $reservationEnd->getTimestamp())) {

        $reservation['startDate'] = new \DateTime($reservation['startDate']);
        $reservation['startDate']->setTimezone($this->timezone);
        $reservation['endDate'] = new \DateTime($reservation['endDate']);
        $reservation['endDate']->setTimezone($this->timezone);

        $resource = $this->getApiClient()->getResource(intval($reservation['resourceId']));
        $arrowDirection = NULL;

        foreach ($resource['customAttributes'] as $customAttribute) {
          switch ($customAttribute['id']) {
            case 3:
              $reservation['floorTitle'] = $customAttribute['value'];
              break;
            case 5:
              $reservation['floorNo'] = $customAttribute['value'];
              break;
            case 22:
              $reservation['arrowDirection'] = $customAttribute['value'];
              break;
          }
        }
        $reservationByFloorNo[$reservation['floorNo']][] = $reservation;
//          $currentReservations[] = $reservation;
//        }
      }
      krsort($reservationByFloorNo);
      foreach ($reservationByFloorNo as $floorNo => $reservations) {
        foreach ($reservations as $reservation) {
          $currentReservations[] = $reservation;
        }
      }
    }
    return $currentReservations;
  }

  function getCurrentReservationsByFloor($floor)
  {
    $currentReservations = null;
    $this->fetchReservations();
    if (is_array($this->reservations['reservations'])) {
      foreach ($this->reservations['reservations'] as $reservation) {
        $reservationStart = new \DateTime($reservation['startDate']);
        $reservationEnd = new \DateTime($reservation['endDate']);
        if (($this->now->getTimestamp() >= $reservationStart->getTimestamp()) &&
            ($this->now->getTimestamp() < $reservationEnd->getTimestamp())) {
          $resource = $this->getApiClient()->getResource(intval($reservation['resourceId']));
          $arrowDirection = NULL;
          $inFloor = FALSE;
          foreach ($resource['customAttributes'] as $customAttribute) {
            switch ($customAttribute['id']) {
              case 3:
                $tmpFloorTitle = $customAttribute['value'];
                break;
              case 5:
                if ($floor == $customAttribute['value']) {
                  $inFloor = TRUE;
                }
                break;
              case 9:
                if (FALSE !== strpos($customAttribute['value'], 'left-arrow')) {
                  $arrowDirection = 'left';
                }
                break;
              case 10:
                if (FALSE !== strpos($customAttribute['value'], 'right-arrow')) {
                  $arrowDirection = 'right';
                }
                break;
            }
          }
          if ($inFloor) {
            $this->setFloorTitle($tmpFloorTitle);
            $reservation['startDate'] = new \DateTime($reservation['startDate']);
            $reservation['startDate']->setTimezone($this->timezone);
            $reservation['endDate'] = new \DateTime($reservation['endDate']);
            $reservation['endDate']->setTimezone($this->timezone);
            $reservation['arrowDirection'] = $arrowDirection;
            $currentReservations[] = $reservation;
          }
        }
      }
    }
    return $currentReservations;
  }

}
