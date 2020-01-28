<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SeeEvents</title>
</head>
<body>

</body>
</html>
<?php
	session_start();
	if(!(isset($_SESSION['user']))){
		echo "<script>window.location='../login.php'</script>";
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

<body style= "font-family: 'Varela Round', sans-serif;overflow:hidden;">
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
            <li><a href="./showAlumni.php">ShowAlumni</a></li>
            <li><a href="./events.php">AddEvents</a></li>
            <li><a href="./seeNotice.php">ShowNotices</a></li>
            <li><a href="./approveAlumni.php">ApproveRequest</a></li>
        </ul>
    </div>


<div style="width:50rem;height:40rem;margin-left:250px;margin-top:120px;">
      
        <h2 style="margin-left:17px;font-size:30px;margin-top:10px;"><span style="color:green;">Events</span></h3>
        <hr>
        <?php
            $con=mysqli_connect('localhost','root','','alumniconnect');
            $query="select id from college where email='$_SESSION[user]'";
            $res1=mysqli_query($con,$query);
            if($row1=mysqli_fetch_array($res1)) 
            {
            $q="SELECT * from event where college_id=$row1[id]";
            $res=mysqli_query($con,$q);
            echo"<div>";
        while($row=mysqli_fetch_array($res))
        {  
            echo"<div style='border:2px solid gray;margin-top:40px;padding:50px;' >";
            echo"<p><span style='font-weight:bold;'>Published On :</span>$row[published_date]</p>";
            echo "<br>";
            echo"<h3 style = 'color:purple;'>$row[title]</h3>";
            echo "<br>";
            echo"<p><span style='font-weight:bold;'>Published On :</span><span>$row[event_date]<span><span>$row[event_time]<span></p>";
            echo "<br>";
            echo"<p><span style='font-weight:bold;'>Venue :</span> $row[venue] </p>";
            echo "<br>";
            echo"<p>$row[description]</p>";
            echo "<br>";
            echo"</div>";
        }
    }
            echo"</div>";
            echo"<input type = 'button' onClick=reload() value='Back' class='hid-but'>";

        ?>
</div>
</body>
</html>
<script>
    function reload(){
        window.location="./home.php";
    }
</script>
