<?php


/*
 * Created on 30 Jan 2012
 *
 */
require_once ('parseJSON.php');
require_once ('Event.php');
require_once ('iCalcreator-2.10.23/iCalcreator.class.php');

// Receive the JSON file, and parse it using the parseJSON class.
$mJSON = $_POST['calData'];

$events = parseJSON :: parse($mJSON);

// Start calendar output
$config = array (
	'unique_id' => 'bristolUniCalendar'
);
// set Your unique id
$v = new vcalendar($config);
// create a new calendar instance

$v->setProperty('method', 'PUBLISH');
// required of some calendar software
$v->setProperty("x-wr-calname", "Personalised Timetable");
// required of some calendar software
$v->setProperty("X-WR-CALDESC", "Personalised Timetable for lectures");
// required of some calendar software
$v->setProperty("X-WR-TIMEZONE", "Europe/London");
// required of some calendar software

for ($i = 0; $i < sizeof($events); $i++) {
	$vevent = & $v->newComponent('vevent');
	// create an event calendar component
	$eventStart = date_parse($events[$i]->mStart);
	$start = array (
		'year' => $eventStart["year"],
		'month' => $eventStart["month"],
		'day' => $eventStart["day"],
		'hour' => $eventStart["hour"],
		'min' => $eventStart["minute"],
		'sec' => 0
	);
	$vevent->setProperty('dtstart', $start);
	$eventEnd = date_parse($events[$i]->mEnd);
	$end = array (
		'year' => $eventEnd["year"],
		'month' => $eventEnd["month"],
		'day' => $eventEnd["day"],
		'hour' => $eventEnd["hour"],
		'min' => $eventEnd["minute"],
		'sec' => 0
	);
	$vevent->setProperty('dtend', $end);
	$vevent->setProperty('LOCATION', $events[$i]->mLocationDesc);
	// property name - case independent
	$vevent->setProperty('summary', $events[$i]->mTitle);
	$vevent->setProperty('description', $events[$i]->mDesc . "<br />" . $events[$i]->mLecturer);
}

$v->returnCalendar();
// redirect calendar file to browser
?>
