<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
<<<<<<< HEAD
    // $_SESSION['user']='alumni3';
=======
>>>>>>> 72dc246b7de0c9f108c23fe85e4e9acdf195efd4
    $con=mysqli_connect('localhost','root','','alumniconnect');
    $q1="select college from  alumni_detail where username='$_SESSION[user]'";
    $res1=mysqli_query($con,$q1);
    if($row1=mysqli_fetch_array($res1))
    {    
        $q1="select id from  college where college_name='$row1[college]'";
        $res1=mysqli_query($con,$q1);
        if($row2=mysqli_fetch_array($res1))
        {
            $q="select * from event where college_id='$row2[id]'";
            $res=mysqli_query($con,$q);
            echo"<div>";
            while($row=mysqli_fetch_array($res))
            {  
                echo"<div style='border:2px solid red;' >";
                echo"<p>$row[published_date]</p>";
                echo"<h3>$row[title]</h3>";
                echo"<p><span>$row[event_date]<span><span>$row[event_time]<span></p>";
                echo"<p>Venue - $row[venue] </p>";
                echo"<p>$row[description]</p>";
                echo"</div>";
            }
            echo"</div>";
        }
        }
        ?>
</body>
</html>