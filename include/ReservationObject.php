<?php

/*
 * The following content was designed & implemented under AlexSeif.com
 */

/**
 * Description of ReservationObject
 *
 * @author Alex Seif <me@alexseif.com>
 */
class ReservationObject
{

  public $title;
  public $resourceId;
  public $resources;
  public $startDateTime;
  public $endDateTime;
  public $recurrenceRule;
  public $invitedGuests;
  public $participatingGuests;
  public $participants;
  public $invitees;
  public $accessories = [];
  public $customAttributes;
  public $description;
  public $userId = 3;
  public $startReminder;
  public $endReminder = null;
  public $allowParticipation;
  public $retryParameters;

  public function __construct($title, $resourceId, $startDateTime, $endDateTime)
  {
    $this->title = $title;
    $this->resourceId = $resourceId;
//    $this->resources[] = $this->resourceId;
    $this->startDateTime = $startDateTime;
    $this->endDateTime = $endDateTime;
  }

}
