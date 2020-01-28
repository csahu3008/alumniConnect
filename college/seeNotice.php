<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/a8180108be.js"></script>
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow|Righteous|Varela+Round&display=swap" rel="stylesheet">
        <link rel = "stylesheet" href = "../assets/css/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="../assets/css/dashboard.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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
            <li><a href="./seeEvents.php">ShowEvents</a></li>
            <li><a href="./approveAlumni.php">ApproveRequest</a></li>
        </ul>
    </div>


<div style="width:50rem;height:40rem;margin-left:250px;margin-top:120px;">
      
        <h2 style="margin-left:17px;font-size:30px;margin-top:10px;"><span style="color:green;">Notices</span></h3>
        <hr><br>
        <?php
    session_start();
    $con=mysqli_connect('localhost','root','','alumniconnect');
    $q="SELECT * from notice where college_id=5";
    $res=mysqli_query($con,$q);
    echo"<div>";
    while($row=mysqli_fetch_array($res))
    {  
        echo"<div style='border:2px solid gray;margin-top:40px;padding:50px;' >";
        echo"<p><span style='font-weight:bold;'>Published On :</span>$row[published_date]</p><br>";
        echo"<h3 style='color:purple;'>$row[title]</h3><br>";
        echo"<p>$row[description]</p>";
        echo"</div>";
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
