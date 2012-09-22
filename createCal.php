<?php


/*
 * Created on 30 Jan 2012
 *
 */
 
require_once ('iCalcreator-2.10.23/iCalcreator.class.php');
require_once('termdates.php');

// Receive the JSON file, and parse it using the parseJSON class.
$mJSON = $_POST['calData'];

$events = json_decode($mJSON);

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

error_log("Calendar Creator was called");

foreach ($events as $event) {

	// For each week it is set, add an event
	//error_log(json_encode($event->weeks));
	$week_array = parseWeeksToArray($event->weeks);
	$weekday = date('N', strtotime($event->start));
	foreach($week_array as $week){
	
		$vevent = & $v->newComponent('vevent');
		// create an event calendar component
		$eventStart = getEventDate($event->start, $week, $weekday);
		//error_log("Adding event on: ". $eventStart);
		$start = array (
			'year' => $eventStart["year"],
			'month' => $eventStart["month"],
			'day' => $eventStart["mday"],
			'hour' => $eventStart["hours"] - 1,
			'min' => $eventStart["minutes"],
			'sec' => 0
		);
		$vevent->setProperty('dtstart', $start);
		$eventEnd = getEventDate($event->end, $week, $weekday);
		$end = array (
			'year' => $eventEnd["year"],
			'month' => $eventEnd["month"],
			'day' => $eventEnd["mday"],
			'hour' => $eventEnd["hours"] - 1,
			'min' => $eventEnd["minutes"],
			'sec' => 0
		);
		$vevent->setProperty('dtend', $end);
		if(isset($event->locs)){
			$vevent->setProperty('location', $event->locs[0]->loc);		
		} else if (isset($event->sites)){
			$vevent->setProperty('location', $event->sites[0]->title);
		}
		// property name - case independent
		$vevent->setProperty('summary', $event->title." - ".$event->desc);
		if(isset($event->allStaff[0])){
			$staff = $event->allStaff[0]->staffName;
		}
		$vevent->setProperty('description', $event->desc . (isset($staff) ? "\n" . $staff : '')."\n".$event->type);
	}
}
error_log("Calendar creator finished");
$v->returnCalendar();
// redirect calendar file to browser
?>
