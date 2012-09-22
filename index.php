<?php


/*
 * Created on 30 Jan 2012
 *
 */

// This page will give instructions to get the data, 
// provide a textbox and upload form
// return the calendar upon submission (using AJAX?)

// URL: https://portal.bris.ac.uk/studenttimetabling/timetable.json?start=1327881600&end=1337558400
ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);
?>
<html>
	<head >
		<title>Bristol University Personalised Timetables</title>
	</head>
	<body style="padding:20px;">
	
		<h1>Bristol University Personalised Timetable &rarr; iCal converter</h1>
		
		<br />
		<br />
		Download your personalised timetable in 3 easy steps.
		<br />
		<br />
		<ol>
			<li>Follow this link and login using your bristol account:<br />
				<a href="https://portal.bris.ac.uk/studenttimetabling/timetable.json?start=1349049600&end=1372636800" target="_blank">Get data</a></li>
			<li>View the page source and copy the whole lot from that page into the textbox below (make sure it's the source and not the formatted stuff... Chrome breaks JSON... nice one, Google)</li>
			<li>Press the button</li>
		</ol>
		
		<form name="form" action="createCal.php" method="post"> 
			<textarea name="calData" rows="10" cols="80" ></textarea><br />
			<input type="submit" value="Get my Calendar!" />
		</form>
		<br />
		Now you can have your calendar where you want!
	</body>
</html>