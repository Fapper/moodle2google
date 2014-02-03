<?php

require_once(__DIR__.'/intouch-iCalendar/intouch/ical/iCal.php');
use intouch\ical\iCal;

define("DOMAIN", $_GET["moodle"]);
define("USERNAME", $_GET["u"]);
define("AUTHTOKEN", $_GET["token"]);

$ical = new iCal(
  DOMAIN 
  . '/calendar/export_execute.php'
  . '?preset_what=all&preset_time=recentupcoming&username='
  . urlencode(USERNAME) . '&authtoken='
  . urlencode(AUTHTOKEN)
);

include 'IcalGenerator.php';

$icalGenerator = new IcalGenerator($_GET["debug"], $_GET["remove"]);
$icalGenerator->generate($ical);
