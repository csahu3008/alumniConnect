<?php
	include("../connect.php");

	$title = $_REQUEST['title'];
	$des=$_REQUEST['des'];
	$date=$_REQUEST['event_date'];
	$time=$_REQUEST['event_time'];
	//$published_date = date();

	session_start();

	$_SESSION['alumni_id']='5';

	//$n=$_SESSION['farmer'];

	
	$query = "insert into event values(null,'$title','$des',now(),'$date','$time','venue','0',null,'$_SESSION[alumni_id]','0')";
	
	mysqli_query($con,$query);

	//echo $_REQUEST['rate'];

	header("location:alumniEvent.php?ok=1");
?>