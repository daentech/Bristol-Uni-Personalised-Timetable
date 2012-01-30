<?php

/*
 * Created on 30 Jan 2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

// Parse the provided JSON from the uni calendar into php objects

require_once('pear/JSON.php');
require_once('Event.php');

class parseJSON {

	//var $mJSON;

	function parse($json) {
		
		$badjson = new Services_JSON();
	$data = $badjson->decode($json); 
    
    $loc = $data[0]->{'locs'}[0]->{'loc'}; // Location Short code
    $locdesc =  $data[0]->{'locs'}[0]->{'locdesc'}; // Location full name
    $title = $data[0]->{'title'}; // Unit code
    $name = $data[0]->{'desc'}; // Unit title
    $staff = $data[0]->{'allStaff'}[0]->{'staffName'}; // Lecturer name
    $type = $data[0]->{'type'}; // Event type
    $start = $data[0]->{'start'}; // Start date and time
    $end = $data[0]->{'end'}; // End date and time
    $lng = $data[0]->{'sites'}[0]->{'lng'}; // Longitude
    $lat = $data[0]->{'sites'}[0]->{'lat'}; // Latitude
    
    $eventArr[] = new Event($start, $end, $title, $name, $loc, $locdesc, $staff, $lng, $lat, $type);
	
	var_dump($eventArr);
	return $eventArr;	
	}

}
?>
