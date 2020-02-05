<?php
include_once("config.php");
session_start();
//$id=$_SESSION['facultyID'];
//$sqlEvents = "SELECT eventID, facultyID, eventTitle, fromDate, toDate FROM eventschedule LIMIT 20";
$sqlEvents = "SELECT * FROM eventschedule";
$resultset = mysqli_query($mysqli, $sqlEvents) or die("database error:". mysqli_error($mysqli));
$calendar = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
// convert date to milliseconds
$start = strtotime($rows['fromDate']) * 1000;
$end = strtotime($rows['toDate']) * 1000;
$calendar[] = array(
'eventID' =>$rows['eventID'],
'title' => $rows['eventTitle'],
'url' => "#",
"class" => 'event-important',
'start' => "$start",
'end' => "$end"
);
}
$calendarData = array(
"success" => 1,
"result"=>$calendar);
echo json_encode($calendarData);
?>