<?php
 if(isset($_REQUEST['title']))
 {
    session_start();
    $_SESSION['college_id']='5';

    $title=$_REQUEST['title'];
    $description=$_REQUEST['description'];
    $event_date=$_REQUEST['event_date'];
    $event_time=$_REQUEST['event_time'];
    $venue=$_REQUEST['venue'];
    $published_date = date('Y-m-d H:i:s');
    echo"$_SESSION[college_id],$title,$description,$event_date,$event_time,$venue,$published_date";
    $con=mysqli_connect('localhost','root','','alumniconnect');
    $q="insert into event values (null,'$title','$description','$published_date','$event_date','$event_time','$venue',1,'$_SESSION[college_id]',0,0)";
    $res=mysqli_query($con,$q);
    if($res)
    {
        echo"Event Has been Successfully created";
    }
    else{
        echo"database error";
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
</head>
<body>
    <a href='seeEvents.php'> See Previous Events</a>
    <form method='post'>
    <h1>Add Event </h1>
    <div>
        <label>Title</label>
        <input type='text' placeholder="title" name='title'>
    </div>
    <div>
        <label>Description</label>
        <input type='text' name='description' placeholder="description">
    </div>
    <div>
        <label>Event Date</label>
        <input type='date' name='event_date' >
    </div>
    <div>
            <label>Event Time</label>
            <input type='time' name='event_time'>
    </div>
    <div>
        <label>Venue</label>
        <input type='text' name='venue'>
    </div>
    <input type="submit" value='add Event'>
    </form>
</body>
</html>
