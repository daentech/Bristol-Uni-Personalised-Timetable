<?php

/*
 * Created on 30 Jan 2012
 *
 */
require_once ('parseJSON.php');

// Receive the JSON file, and parse it using the parseJSON class.
$mJSON = $_POST['calData'];

parseJSON :: parse($mJSON);

/* 
 require_once( 'iCalcreator-2.10.23/iCalcreator.class.php' );
$config = array( 'unique_id' => 'bristolUniCalendar' );
  // set Your unique id
$v = new vcalendar( $config );
  // create a new calendar instance

$v->setProperty( 'method', 'PUBLISH' );
  // required of some calendar software
$v->setProperty( "x-wr-calname", "Personalised Timetable" );
  // required of some calendar software
$v->setProperty( "X-WR-CALDESC", "Personalised Timetable for lectures" );
  // required of some calendar software
$v->setProperty( "X-WR-TIMEZONE", "Europe/London" );
  // required of some calendar software

$vevent = & $v->newComponent( 'vevent' );
  // create an event calendar component
$start = array( 'year'=>2007, 'month'=>4, 'day'=>1, 'hour'=>19, 'min'=>0, 'sec'=>0 );
$vevent->setProperty( 'dtstart', $start );
$end = array( 'year'=>2007, 'month'=>4, 'day'=>1, 'hour'=>22, 'min'=>30, 'sec'=>0 );
$vevent->setProperty( 'dtend', $end );
$vevent->setProperty( 'LOCATION', 'Central Placa' );
  // property name - case independent
$vevent->setProperty( 'summary', 'PHP summit' );
$vevent->setProperty( 'description', 'This is a description' );
$vevent->setProperty( 'comment', 'This is a comment' );
$vevent->setProperty( 'attendee', 'attendee1@icaldomain.net' );

$vevent = & $v->newComponent( 'vevent' );
  // create next event calendar component
$vevent->setProperty( 'dtstart', '20070401', array('VALUE' => 'DATE'));
  // alt. date format, now for an all-day event
$vevent->setProperty( "organizer" , 'boss@icaldomain.com' );
$vevent->setProperty( 'summary', 'ALL-DAY event' );
$vevent->setProperty( 'description', 'This is a description for an all-day event' );
$vevent->setProperty( 'resources', 'COMPUTER PROJECTOR' );
$vevent->setProperty( 'rrule', array( 'FREQ' => 'WEEKLY', 'count' => 4));
  // weekly, four occasions
$vevent->parse( 'LOCATION:1CP Conference Room 4350' );
  // supporting parse of strict rfc2445 formatted text

  // all calendar components are described in rfc2445
  // a complete iCalcreator function list (ex. setProperty) in iCalcreator manual

$v->returnCalendar();
  // redirect calendar file to browser
*/
?>
