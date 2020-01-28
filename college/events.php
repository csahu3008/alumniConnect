<?php
    include("../header.php");
?>
    <div class="menu">
        <h3> MAIN NAVIGATION </h3>
        <ul>
            <li><a href="./showAlumni.php">ShowAlumni</a></li>
            <li><a href="./seeEvents.php">ShowEvents</a></li>
            <li><a href="./seeNotice.php">ShowNotices</a></li>
            <li><a href="./approveAlumni.php">ApproveRequest</a></li>
        </ul>
    </div>
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


    <title>Events</title>
    <style>
        * {
            margin:0px;
            padding:0px;
            box-sizing: border-box;
        }
        #goBack 
        {
            padding: 20px 30px;
            display: inline-block;
            background: #7C5295;
            border-radius: 0 0 50% 0/0 0 199%;
            box-shadow: inset -6px -6px 14px -6px black;
            text-decoration: none;
            color: white;
            font-weight: bold;
            position: fixed;
            top: 35;
        }
        
        form {
            width: 100%;
            margin: 60px auto;
            max-width: 500px;
            background: #B491C8;
            padding: 20px;  
            border-radius: 20px;
            box-shadow: 0 0 15px -2px;
        }
        form h1 {
            text-align: center;
            border-radius: 20px;
            padding: 10px;
            background: #ffffff44;
            margin: 20px;
        }
        label > span  {
            position: relative;
            top: 40px;
            left: 15px;
            color: gray;
            cursor: text;
            transition: 500ms;
        } form input, #submit 
        {
            width: 100%;
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
            border: none;
        } form #submit 
        {
            width: 100px;
            margin: 10px 0 10px auto;
            background: #b87f00;
            color: white;
        } #eventDateSpan, #eventTimeSpan
        {
            top: 0;
        }
    </style>
</head>
<body  onload="initialCall()">
    <div class="main">
    <a id="goBack" class="heading" href='seeEvents.php'> See Previous Events</a>
    <form method='post' >
    <h1>Add Event </h1>
    <label for="title"><span id="titleSpan">Title</span>
        <input required type="text" name="title" id="title" onfocus="moveUp('title')" onblur="moveDown('title')">
    </label>
    <label for="description"><span id="descriptionSpan">Description</span>
        <input required type="text" name="description" id="description" onfocus="moveUp('description')" onblur="moveDown('description')">
    </label>
    <label for="eventDate"><span id="eventDateSpan">Event Date</span>
        <input required type="date" name="event_date" id="eventDate">
    </label>
    <label for="eventTime"><span id="eventTimeSpan">Event Time</span>
        <input required type="time" name="event_time" id="eventTime">
    </label>
    <label for="venue"><span id="venueSpan">Venue</span>
        <input required type="text" name="venue" id="venue" onfocus="moveUp('venue')" onblur="moveDown('venue')">
    </label>
    <input type="submit" id="submit" value='Add Event' />

    </form>
    <script>
    function initialCall() {
        var user = document.querySelector('#userId');   
            console.log(user.value);
            if(!user.value) {
            moveUp('userId');
            moveUp('password');
            }

        }
        function moveUp(ths) {
            let eleSpan = document.querySelector('#' + ths + 'Span');
            eleSpan.style.top = '0';
            eleSpan.style.color = 'white';
        }
        function moveDown(ths) {
            let ele = document.querySelector('#' + ths);
            let eleSpan = document.querySelector('#' + ths + 'Span');
            if(ele.value == "") {
                eleSpan.style.top = '40px';
                eleSpan.style.color = 'gray';
            }
        }
        function register(ths1, ths2, ths3, form) {
            var a = document.querySelector(form);
            a.scrollIntoView();
            let icon1 = document.querySelector(ths1);
            let icon2 = document.querySelector(ths2);
            let icon3 = document.querySelector(ths3);

            icon1.style.transform = 'scale(1)';

            icon2.style.transform = 'scale(0.5)';
            icon3.style.transform = 'scale(0.5)';
        }
    </script>
</div>
</body>
</html>
