<?php
 include ('include/autoload.php');
//Our YYYY-MM-DD date string.
$date = date('y-m-d');
 
//Convert the date string into a unix timestamp.
$unixTimestamp = strtotime($date);
 
//Get the day of the week using PHP's date function.
$dayOfWeek = date("l", $unixTimestamp);
 
//Print out the day that our date fell on.
echo $date . ' fell on a ' . $dayOfWeek;
echo "<br \>";
//Geting today days of the week

$todaydays = date("l");
echo $todaydays;

//  $admin = new Admin;
//  echo "<br \>";
//  echo  $admin->loginAdmin();
echo "<br \>";
$MONTH = date('m');
echo $MONTH;
echo "<br \>";
$time = date("H:i:s");
echo $time;
echo "<br \>";
// $clockin_date = date("Y-m-d");
// $date = date("Y-m-d");
// $clockin_date = date('Y-m-d', strtotime($date));
$date =date("Y-m-d");
echo $date;
echo "<br \>";
$currentWeekNumber = date('W');
 echo  $currentWeekNumber;
 echo "<br \>";
 $week = DAY($date);
 echo $week;
?>