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
    <h2 style="margin-left:17px;font-size:30px;margin-top:10px;"><span style="color:green;">Update Details</span></h3>
    <hr>
    <!-- <h2 style="margin-left:17px;font-size:30px;margin-top:10px;">Welcome To <span style="color:green;">ALUMS</span></h3> -->
</div>
<body>
    <div class="form-updatealum">
    <?php
    // session_start();
    $con=mysqli_connect('localhost','root','','alumniconnect');
    $query = "select * from  alumni_detail where deleted=0 and username='$_SESSION[user]'";
    $res = mysqli_query($con,$query);
    if($row=mysqli_fetch_array($res)){
       echo"<form method='post' class='udt-form'>
       <label for='name' ><span>Name :<span></label>
        <input type='text' name='name' id='name'  value='$row[name]'>
      
        <label for='email' ><span>Email :<span></label>
        <input type='text' name='email' id='email'  value='$row[email]'>
      
        <label for='contact' ><span>Contact :<span></label>
        <input type='text' name='contact' id='contact'  value='$row[contact]'>
      
        <label for='branch' ><span>Branch :<span></label>
        <input type='text' name='branch' id='branch' readonly  value='$row[branch]'>
      

        <label for='college' ><span>College :<span></label>
            <input type='text' name='college' id='college' readonly value='$row[college]'>
                        
        <label for='company_name' ><span>Company name :<span></label>
        <input type='text' name='company_name' id='company_name'  value='$row[company_name]'>
            
        <label for='location' ><span>Location :<span></label>
            <input type='text' name='location' id='location'  value='$row[location]'>
           
        <label for='designation' ><span>Designation :<span></label>
        <input type='text' name='designation' id='designation'  value='$row[designation]'>
              
        <label for='passing_year' ><span>Passing Year :<span></label>
        <input type='text' name='passing_year' id='passing_year' readonly value='$row[passing_year]'>
                   
        <label for='username' ><span>Username :<span></label>
        <input type='text' name='username' id='username' readonly value='$row[username]'>
    
        <input type='submit' id='submit' name='submit' value='Update Details'> 

       </form>";
    ?></div><br><br><?php
    if(isset($_REQUEST['submit']))
    {   
        $deleted_query="update  alumni_detail set deleted=1 where username='$_SESSION[user]'";
        $res=mysqli_query($con,$deleted_query);
        if($res){
         
            $name=$_REQUEST['name'];
            $email=$_REQUEST['email'];
            $contact=$_REQUEST['contact'];
            $college=$_REQUEST['college'];
            $company_name=$_REQUEST['company_name'];
            $branch=$_REQUEST['branch'];
            $location=$_REQUEST['location'];
            $designation=$_REQUEST['designation'];
            $passing_year=$_REQUEST['passing_year'];
            $username=$_REQUEST['username'];
            $name=$_REQUEST['name'];
            $q="insert into alumni_detail values (null,'$name','$email',$contact,'$branch','$college','$company_name','$location','$designation',null,$passing_year,'$username',1,0)";
            $res=mysqli_query($con,$q);
            if($res){
                echo"Database Updated";
            }
            else{
                echo"Database Error";
            }
        }
        else{
            echo"error";
        }
         

    }
    }

    ?>
</body>
</html>