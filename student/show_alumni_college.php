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
    <div class="alumini-details">
<?php
session_start();
$_SESSION['user']='student2';
$con=mysqli_connect('localhost','root','','alumniconnect');
$query = "select college from student where deleted=0 and username='$_SESSION[user]' ";
$rs_student = mysqli_query($con,$query);
$temp=0;
echo'<table>
<thead>
<th>Sno.</th><th>Name</th><th>College Name</th> <th> branch </th> <th> Email </th><th> Contact </th><th> Passing Year </th><th> Designation</th>
</thead>
<tbody>';
while($row= mysqli_fetch_array($rs_student) )
{
    $query2="select * from alumni_detail where college = '$row[college]'";
    $res_alumni=mysqli_query($con,$query2);
    while($row_alumni = mysqli_fetch_array($res_alumni))
        {
            $temp++;
            echo"<tr><th>$row_alumni[id]</th><th>$row_alumni[name]</th><th>$row_alumni[college]</th><th>$row_alumni[branch]</th><th>$row_alumni[email]</th><th>$row_alumni[contact]</th><th>$row_alumni[passing_year]</th><th>$row_alumni[designation]</th></tr>";
        }
}
echo"</tbody>";
echo"</table>";
?> 
</div>
<div class="notices">
    <input type="button" id = "seenotices" value="See Notices">
    <input type="button" id = "seeevents" value="See Events">
    <p id="showDetail"></p>
</div>    
</body>
</html>

<script>
        $(document).ready(function(){
    
        $("#seenotices").click(function(){
          
                $("#seenotices").css({"display":"hidden"});
                $.post('../college/seeNotice.php' , {} , function(data){
                    $("#showDetail").html(data);
                });
            
        });
        $("#seeevents").click(function(){
          
          $("#seeevents").css({"display":"hidden"});
          $.post('../college/seeEvents.php' , {} , function(data){
              $("#showDetail").html(data);
          });
      
  });
        
    });
</script>