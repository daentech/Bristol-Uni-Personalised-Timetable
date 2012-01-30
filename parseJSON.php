<?php


/*
 * Created on 30 Jan 2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

// Parse the provided JSON from the uni calendar into php objects

require_once ('pear/JSON.php');
require_once ('Event.php');

class parseJSON {

	function parse($json) {

		$badjson = new Services_JSON();
		$data = $badjson->decode($json);
		$size = sizeof($data);
		$eventArr = array();
		for ($i = 0; $i < $size; $i++) {

			$loc = $data[$i]-> {
				'locs' }
			[0]-> {
				'loc' }; // Location Short code
			$locdesc = $data[$i]-> {
				'locs' }
			[0]-> {
				'locdesc' }; // Location full name
			$title = $data[$i]-> {
				'title' }; // Unit code
			$name = $data[$i]-> {
				'desc' }; // Unit title
			$staff = $data[$i]-> {
				'allStaff' }
			[0]-> {
				'staffName' }; // Lecturer name
			$type = $data[$i]-> {
				'type' }; // Event type
			$start = $data[$i]-> {
				'start' }; // Start date and time
			$end = $data[$i]-> {
				'end' }; // End date and time
			$lng = $data[$i]-> {
				'sites' }
			[0]-> {
				'lng' }; // Longitude
			$lat = $data[$i]-> {
				'sites' }
			[0]-> {
				'lat' }; // Latitude

			$eventArr[] = new Event($start, $end, $title, $name, $loc, $locdesc, $staff, $lng, $lat, $type);
		}
		return $eventArr;
	}

}
