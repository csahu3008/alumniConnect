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

    <style>
         h1 {
            text-align: center;
        }
        select {
            width: 70%;
            height: 30px;
        }
        #submit 
        {
            padding: 5px;
        } 
        .listHeading, .collegeContainer {
            display: grid;
            grid-template-columns: 2% 14.5% 12.5% 14.5% 18.5% 12.5% 12.5% 12.5%;
            padding: 10px;
            text-align: center;

        } .headContainer {
            background-image: linear-gradient(to right,#710193,#BCA0DC);
        } .collegeContainer {
            border-bottom: 1px solid #999999;
        } .listContainer {
            box-shadow: 0 -3px 15px -4px;
        } .listHeading {
            background: purple;
            margin-top: 20px;
            color: white;
        }


        div::-webkit-scrollbar {
        width: 0px;
        height: 0;
    }
    
    div::-webkit-scrollbar-track {
        background: #00000000; 
    }
    
    /* Handle */
    div::-webkit-scrollbar-thumb {
        background: rgba(0, 0, 0, 0.521); 
        border-radius: 0px;
    }
    
    /* Handle on hover */
    div::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.87); 
    } 



    </style>
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
            <li><a href="./showAlumni.php">ShowAlumni</a></li>
            <li><a href="./seeEvents.php">ShowEvents</a></li>
            <li><a href="./seeNotice.php">ShowNotices</a></li>
            <li><a href="./approveAlumni.php">ApproveRequest</a></li>
        </ul>
    </div>



    <!-- <a href="dashboard.php">
<div class="module" style="margin-left: 350px"> 
	<div class="module_title">
		My Account
	</div>
	<i class="fas fa-plus icon"></i>	
</div>
</a>

<a href="show_college.php">
<div class="module"> 
	<div class="module_title">
		College
	</div>
	
	<i class="fas fa-plus icon"></i> <br>	
	<?php
     
	 	// include("../connect.php");
		// $query = "select * from college where deleted=0";
		// $cat = mysqli_query($con,$query);
		// $num = mysqli_num_rows($cat);
		// echo '<div class="num">'.$num.'</div>';
	 
	 ?>
</div>
</a>

<a href="">
<div class="module"> 
	<div class="module_title">
		Alumni
	</div>
	
	<i class="fas fa-plus icon"></i> <br>	
	<?php
     
		// $query = "select * from alumni_detail where deleted=0";
		// $cat = mysqli_query($con,$query);
		// $num = mysqli_num_rows($cat);
		// echo '<div class="num">'.$num.'</div>';
	 
	 ?>
</div>
</a> -->
<div style="width:50rem;height:10rem;margin-left:250px;margin-top:120px;">




<span>
       <form action='filterBranchWise.php' method='post'>
           <?php   
                    session_start();
                    $_SESSION['user']='principal@gecr.in'; 


                    $con=mysqli_connect('localhost','root','','alumniconnect');
                    $q1="select id from college where email='$_SESSION[user]'";
                    $res1=mysqli_query($con,$q1);  
                    if($rowele=mysqli_fetch_array($res1)){
                  
                        echo"<select name='branch' >";
                        $query="select * from branch_detail where cid=$rowele[id]";
                        $res=mysqli_query($con,$query);
                        while($row=mysqli_fetch_array($res))
                        {
                            echo"<option id='$row[id]' value='$row[name]' name='$row[id]'>$row[name]</option>";
                        }
                        
                        echo"</select>";
                        echo"<input type='hidden' name='college_id' value='$rowele[id]' >";
                    }
                        ?>
            <input id="submit" type='submit' value='filter now'>
        </form>
<span>


<?php

$con=mysqli_connect('localhost','root','','alumniconnect');
$query = "select college_name from college where deleted=0 and email='$_SESSION[user]' ";
$rs_college = mysqli_query($con,$query);
$temp=0;
echo'<div style="width: 1000px;">
<div class="listHeading">
<div>Sno.</div><div>Name</div><div>College Name</div> <div> branch </div> <div> Email </div><div> Contact </div><div> Passing Year </div><div> Designation</div>
</div>
<div>';
while($row= mysqli_fetch_array($rs_college) )
{
    $query2="select * from alumni_detail where college = '$row[college_name]'";
    $res_alumni=mysqli_query($con,$query2);
    while($row_alumni = mysqli_fetch_array($res_alumni))
        {
            $temp++;
            echo"<div class='collegeContainer'><div>$row_alumni[id]</div><div>$row_alumni[name]</div><div>$row_alumni[college]</div><div>$row_alumni[branch]</div><div><a href='emailsending.php?email=$row_alumni[email]&&name=$row_alumni[name]'>$row_alumni[email]</a></div><div>$row_alumni[contact]</div><div>$row_alumni[passing_year]</div><div>$row_alumni[designation]</div></div>";
        }
}
echo"</div>";
echo"</div>";
?> 




</div>
</body>
</html>