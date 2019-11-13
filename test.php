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
// $currentWeekNumber = date('W');
//  echo  $currentWeekNumber;
//  echo "<br \>";
//  $week = DAY($date);
//  echo $week;
?>
<header><h4>Customer Purchase Order</h4></header>
<form action="" method="post" class="form-disable">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="global.js"></script>
<table style="border-collapse:collapse;" width="1400px" height="172px" border="1">
        Delivery Date:&nbsp;&nbsp;<input type="text" name="sdate2" placeholder="yyyy-mm-dd" onkeypress="return noenter()">
        Date:&nbsp;&nbsp;<input type="text" name="sdate" placeholder="yyyy-mm-dd" value="" onkeypress="return noenter()">&nbsp;&nbsp;
        <input type="button" class="but" name="sub" id="sub" value="Submit" formaction="" style="WIDTH: 57px; HEIGHT: 31px;" onkeypress="return noenter()" onclick="myFunction()">
        <input type="button" class="but" name="save" id="save" value="Save" disabled formaction="addorder1.php" style="WIDTH: 57px; HEIGHT: 31px;" onkeypress="return noenter()" onclick="myFunction()"><br><br>


        <script>
            $(myfunction() 
{
  $(".btn-block").on("click", function(e) 
  {
    e.preventDefault(); // not really necessary if buttons
    $(this).prop("disabled", true);    
    if (this.id=="clockin") 
    {
      // do the submit and enable other button
      $("#clockout").prop("disabled", false);
    }
    else 
    {
      // do the save and enable other button
      $("#clockin").prop("disabled", false);
    }
  });
});
        </script>