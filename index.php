<?php

require_once(__DIR__.'/intouch-iCalendar/intouch/ical/iCal.php');
use intouch\ical\iCal;

define("DOMAIN", $_GET["moodle"]);
define("USER", $_GET["u"]);
define("AUTHTOKEN", $_GET["token"]);

# Noob, should set dynamically according to server
date_default_timezone_set('UTC');

$ical = new iCal(
  DOMAIN 
  . '/calendar/export_execute.php'
  . '?preset_what=all&preset_time=recentupcoming'
  . '&userid='  . urlencode(USER)
  . '&authtoken=' . urlencode(AUTHTOKEN)
);

include 'IcalGenerator.php';

$icalGenerator = new IcalGenerator($_GET["debug"], str_getcsv($_GET["remove"]));
$icalGenerator->generate($ical);
