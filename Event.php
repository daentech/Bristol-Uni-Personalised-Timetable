<?php
/*
 * Created on 30 Jan 2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 // Event class. This stores all the required details for each event provided
 
 class Event{
 	
 	var $mStart, $mEnd, $mTitle, $mDesc, $mLocation, $mLecturer, $mLon, $mLat, $mType;
 	
 	public function __construct($start, $end, $title, $desc, $location, $lecturer, $lon, $lat, $type){
 		$this->mStart = $start;
 		$this->mEnd = $end;
 		$this->mTitle = $title;
 		$this->mDesc = $desc;
 		$this->mLocation = $location;
 		$this->mLecturer = $lecturer;
 		$this->mLon = $lon;
 		$this->mLat = $lat;
 		$this->mType = $type;
 	}
 }
?>
