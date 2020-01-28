<?php
	session_start();
	if(!(isset($_SESSION['user']))){
		echo "<script>window.location='../login.php'</script>";
	}else{
		$user=$_SESSION['user'];
		if(!($user[0]=='a')){
			echo "<script>alert('Only Alumni can enter..')</script>";
			echo "<script>window.location='../login.php'</script>";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<head>
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow|Righteous|Varela+Round&display=swap" rel="stylesheet">
        <link rel = "stylesheet" href = "../assets/css/fontawesome/css/all.min.css">
        <script src="https://kit.fontawesome.com/a8180108be.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="../assets/css/dashboard.css">


</head>

<body style= "font-family: 'Varela Round', sans-serif;">
	<div class="header"> 
    
    	<h1 class="title"> ALUMS  </h1>
        
        <a href="#" onClick="return confirm('Are You Sure??')" title="Logout">
       
		<i class="fas fa-sign-out-alt" style="font-size: 18px"></i>
        </a>
         
        <a href="../index.php"><h4 class="home">Home</h4> </a>
        
    </div>
    <div class="menu">
        <h3> MAIN NAVIGATION </h3>
        <ul>
        <li><a href="./home.php" style="font-weight:bold;">Dashboard</a></li>
            <li><a href="./change_pass.php">Change_password</a></li>
            <li><a href="./updateDetail.php">Update_Details</a></li>
            <li><a href="./alumniEvent.php">Event_submit</a></li>
            <li><a href="./allEvents.php">All_Events</a></li>
            <li><a href="../chat/chat_to_alumni/home.php">Chat</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </div>
    <div style="width:50rem;height:10rem;margin-left:250px;margin-top:120px;">
    <h2 style="margin-left:17px;font-size:30px;margin-top:10px;"><span style="color:green;">Request for conduct event</span></h3>
    <hr>
    <!-- <h2 style="margin-left:17px;font-size:30px;margin-top:10px;">Welcome To <span style="color:green;">ALUMS</span></h3> -->
</div>
<body>
    <?php 
        // if($_GET['ok']){
        //     echo "<script>alert('Event Requested to the college')</script>";
        // }
    ?>

    <form method="post" action="event_submit.php" name="f1" class="reqevent-form">

    <div>

        <div class="fields"><div  class="insertText"> Title :</div>
        <input type="text" name="title" required>
        </div>
        <div class="fields"><div  class="insertText"> Date :</div>
        <input type="date" name="event_date" required>
        </div>
        <div class="fields"><div  class="insertText"> Time :</div>
        <input type="time" name="event_time" required>
        </div>
        <div class="fields"><div  class="insertText"> Description :</div>
        <textarea rows="5" cols="69" style="resize: none;" name="des" required> </textarea>
        </div>
        <div class="fields">
            <input type="submit" value="Submit">
        </div>
    </div>
    </form>
    <?php 
        //require_once('../assets/partials/footer.php');
    ?>
</body>
</html>