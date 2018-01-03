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
    $this->apiClient = new bookedapiclient($username, $password);
    $this->timezone = new \DateTimeZone(YOURTIMEZONE);
    $this->now = new \DateTime();
  }

  function getApiClient()
  {
    return $this->apiClient;
  }

  function fetchReservations()
  {
    $this->reservations = $this->apiClient->getReservation();
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
    $this->fetchReservations();
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
    $this->fetchReservations();
    if (is_array($this->reservations['reservations'])) {
      foreach ($this->reservations['reservations'] as $reservation) {
        $reservationStart = new \DateTime($reservation['startDate']);
        $reservationEnd = new \DateTime($reservation['endDate']);
        if (($this->now->getTimestamp() >= $reservationStart->getTimestamp()) &&
            ($this->now->getTimestamp() < $reservationEnd->getTimestamp())) {

          $reservation['startDate'] = new \DateTime($reservation['startDate']);
          $reservation['startDate']->setTimezone($this->timezone);
          $reservation['endDate'] = new \DateTime($reservation['endDate']);
          $reservation['endDate']->setTimezone($this->timezone);

          $resource = $this->getApiClient()->getResource(intval($reservation['resourceId']));
          $arrowDirection = NULL;
          foreach ($resource['customAttributes'] as $customAttribute) {
            if ('22' == $customAttribute['id']) {
              $arrowDirection = $customAttribute['value'];
            }
          }
          $reservation['arrowDirection'] = $arrowDirection;
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
