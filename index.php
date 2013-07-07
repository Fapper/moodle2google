<?php

require_once(__DIR__.'/intouch-iCalendar/intouch/ical/iCal.php');
use intouch\ical\iCal;
require_once(__DIR__.'/config.php');

$ical = new iCal(
  DOMAIN 
  . '/calendar/export_execute.php'
  . '?preset_what=all&preset_time=recentupcoming&username='
  . urlencode(USERNAME) . '&authtoken='
  . urlencode(AUTHTOKEN)
);

include 'IcalGenerator.php';

$icalGenerator = new IcalGenerator();

$icalGenerator->generate($ical);

