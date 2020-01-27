<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SeeEvents</title>
</head>
<body>
    <?php
    session_start();
    $con=mysqli_connect('localhost','root','','alumniconnect');
    $q="SELECT * from event where college_id=5";
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
    echo"<input type = 'button' onClick=reload() value='Hide Notices'>";

    ?>
</body>
</html>
<script>
    function reload(){
        window.location="../student/show_alumni_college.php";
    }
</script>