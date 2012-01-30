<?php

/*
 * Created on 30 Jan 2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

// Event class. This stores all the required details for each event provided

class Event {

	public $mStart, $mEnd, $mTitle, $mDesc, $mLocation, $mLocationDesc, $mLecturer, $mLon, $mLat, $mType;

	public function __construct($start, $end, $title, $desc, $location, $locationDesc, $lecturer, $lon, $lat, $type) {
		$this->mStart = $start;
		$this->mEnd = $end;
		$this->mTitle = $title;
		$this->mDesc = $desc;
		$this->mLocation = $location;
		$this->mLocationdesc = $locationDesc;
		$this->mLecturer = $lecturer;
		$this->mLon = $lon;
		$this->mLat = $lat;
		$this->mType = $type;
	}
}
?>
