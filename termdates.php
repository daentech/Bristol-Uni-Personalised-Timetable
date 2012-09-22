<?

function parseWeeksToArray($weeks){
	$exploded_weeks = explode(',',$weeks);
	$weeks_array = array();
	//error_log("New one to parse");
	foreach($exploded_weeks as $week_entry){
		if(strstr($week_entry, '-')){
			// We have a range
			$explode_dash = explode('-', $week_entry);
			for($i = intval($explode_dash[0]); $i <= intval($explode_dash[1]); $i++){
				$weeks_array []= $i;
			}
		} else {
			$weeks_array []= $week_entry;
		}
	}
	
	//error_log(json_encode($weeks_array));
	return $weeks_array;
}

function getEventDate($eventdate, $week_number, $weekday){

	$week = array(25);
	
	$week[0] = '2012-10-01';
	$week[1] = '2012-10-08';
	$week[2] = '2012-10-15';
	$week[3] = '2012-10-22';
	$week[4] = '2012-10-29';
	$week[5] = '2012-11-05';
	$week[6] = '2012-11-12';
	$week[7] = '2012-11-19';
	$week[8] = '2012-11-26';
	$week[9] = '2012-12-03';
	$week[10] = '2012-12-10';
	$week[11] = '2013-01-14';
	$week[12] = '2013-01-21';
	$week[13] = '2013-01-28';
	$week[14] = '2013-02-04';
	$week[15] = '2013-02-11';
	$week[16] = '2013-02-18';
	$week[17] = '2013-02-25';
	$week[18] = '2013-03-04';
	$week[19] = '2013-02-11';
	$week[20] = '2013-03-18';
	$week[21] = '2013-04-22';
	$week[22] = '2013-04-29';
	$week[23] = '2013-04-06';
	$week[24] = '2013-05-13';

	
	$date = getdate(strtotime($eventdate));
	
	$new_date = getdate(strtotime(date("Y-m-d", strtotime($week[$week_number])) . " +".($weekday - 1)." day"));
	$date["year"] = $new_date["year"];
	$date["month"] = date("m", strtotime($new_date["month"]."-2012"));
	$date["mday"] = $new_date["mday"];
	
	return $date;
}