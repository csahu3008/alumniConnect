<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <script  src='../jquery-3-4-1.min.js'></script>
    <title></title>
</head>
<body>

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
            <input type='submit' value='filter now'>
        </form>
<span>


<?php

$con=mysqli_connect('localhost','root','','alumniconnect');
$query = "select college_name from college where deleted=0 and email='$_SESSION[user]' ";
$rs_college = mysqli_query($con,$query);
$temp=0;
echo'<table>
<thead>
<th>Sno.</th><th>Name</th><th>College Name</th> <th> branch </th> <th> Email </th><th> Contact </th><th> Passing Year </th><th> Designation</th>
</thead>
<tbody>';
while($row= mysqli_fetch_array($rs_college) )
{
    $query2="select * from alumni_detail where college = '$row[college_name]'";
    $res_alumni=mysqli_query($con,$query2);
    while($row_alumni = mysqli_fetch_array($res_alumni))
        {
            $temp++;
            echo"<tr><th>$row_alumni[id]</th><th>$row_alumni[name]</th><th>$row_alumni[college]</th><th>$row_alumni[branch]</th><th><a href='emailsending.php?email=$row_alumni[email]&&name=$row_alumni[name]'>$row_alumni[email]</a></th><th>$row_alumni[contact]</th><th>$row_alumni[passing_year]</th><th>$row_alumni[designation]</th></tr>";
        }
}
echo"</tbody>";
echo"</table>";
?> 

</body>
</html>
