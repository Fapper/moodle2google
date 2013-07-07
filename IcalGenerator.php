<?php

class IcalGenerator {
  private $text = false;
  private $remove = array();

  public function __construct() {
    if (isset($_GET['debug'])) {
      $this->text = true;
    }
    if (isset($_GET['remove'])) {
      $this->remove = str_getcsv($_GET['remove']);
    }
  }
  
  public function generate($ical) {
    if ($this->text) {
      header('Content-Type:text/plain; charset=utf-8');
    }
    else {
      header('Content-Type:text/calendar; charset=utf-8');
    }
    $events = $ical->getEvents();
    if (!is_array($events)) {
      echo 'ERROR';
    }
    else {
      include 'views/vcalendar.php';
    }
  }

  public function viewEvent($event) {
    $summary = $event->getSummary();
    foreach ($this->remove as $needle) {
      if (strpos($summary, $needle) !== false) {
        return;
      }
    }
    $summaryArray = explode(' - ', utf8_decode($event->getSummary()));
    list( , $course) = explode(' ', $summaryArray[0], 2);
    preg_match('/^(.+?) (\(.+?\))/', $course, $matches);
    $course = $matches[1];

    $dtstart = date("Ymd\THis", $event->getProperty('start')) . 'Z';
    $dtend = date("Ymd\THis", $event->getProperty('end')) . 'Z';

    $thing = $matches[2];
    $note = $summaryArray[1];
    list( , $place) = explode(' ', $summaryArray[4], 2);

    $description = "";
    if($note != null)
      $description .= $note . '\n';
    if($thing != null)
      $description .= $thing . '\n';
    $description .= str_replace(array("\r", "\n"), '', utf8_decode($event->getDescription()));

    if($course == null)
      $course = $description;

    include 'views/vevent.php';
  }
}
