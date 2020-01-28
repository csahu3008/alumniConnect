<?php


	include("../connect.php");

	$title = $_REQUEST['title'];
	$des=$_REQUEST['des'];
	$date=$_REQUEST['event_date'];
	$time=$_REQUEST['event_time'];
	//$published_date = date();

	session_start();
	$user=$_SESSION['user'];

	$q1 = "SELECT college from alumni_detail where username=$user";
	$res1=mysqli_query($con,$q1);
	if($row1=mysqli_fetch_array($res1)){
		$clg=$row1['college'];
		echo "$clg ";
		$q1="select id from  college where college_name='$clg'";
        $res1=mysqli_query($con,$q1);
        if($row2=mysqli_fetch_array($res1))
        {
			$clg_id=$row2['id'];
		}
	}
	//$n=$_SESSION['farmer'];

	
	$query = "insert into event values(null,'$title','$des',now(),'$date','$time','venue','0','$clg_id','$user','0')";
	
	mysqli_query($con,$query);

	//echo $_REQUEST['rate'];

	// header("location:alumniEvent.php?ok=1");
?>