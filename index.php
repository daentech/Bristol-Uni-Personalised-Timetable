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
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
?>
<html>
<body>
<form name="form" action="createCal.php" method="post"> 
<textarea name="calData" ></textarea>
<input type="submit" value="Get my Calendar!" />
</form>
</body>
</html>