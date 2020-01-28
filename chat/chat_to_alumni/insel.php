<?php
    session_start();

    //INSERTING MESSAGES TO DATABASE

    if(isset($_REQUEST['key']))
    {   
        $msg = $_REQUEST['key'];
        $sendby = $_REQUEST['sender'];
        // echo $sendby;
        $sendto = $_REQUEST['key2'];
        // $sendto='12';

        $timestamp = time();
        date_default_timezone_set('Asia/Kolkata');                          //For setting timezone of my Country
        $time = date('g:i a',$timestamp); 

        $con = mysqli_connect('localhost' , 'root' , '' , 'alumniconnect');
        $q2 = "SELECT name FROM alumni_detail where username='$sendby'";
        $res = mysqli_query($con,$q2);
        if($row=mysqli_fetch_array($res)){
            $sendby=$row['name'];
            echo $sendby;
        }
        $q = "INSERT into chats values(NULL ,'$msg' , '$sendby' , '$sendto' , '$time')";
        
        $rs = mysqli_query($con , $q);

        if($rs)
        {
            echo "Message Sent";
        }
        else{
            echo "Sending Error";
        }
    }

    //FOR KNOWING WHO IS ALUMNI

    else if(isset($_REQUEST['k']))
    {
        $user = $_SESSION['user'];

        $con = mysqli_connect('localhost' , 'root' , '' , 'alumniconnect');
        

        $arr = array();
        $q = "SELECT * from alumni_detail where college='GEC Raipur' and username!='$user'";
        $rs = mysqli_query($con , $q);
        while($row = mysqli_fetch_array($rs))
        {
             echo "<li><button class = 'peopleon'>$row[name]</button>";           
        }
    }

    //FOR PRINTING MESSAGES or CHATS

    else
    {
        $sendto = $_REQUEST['hii'];
        $person =$_REQUEST['p'];
        
        
        $con = mysqli_connect('localhost' , 'root' , '' , 'alumniconnect');
        $q2 = "SELECT name FROM alumni_detail where username='$person'";
        $res = mysqli_query($con,$q2);
        if($row=mysqli_fetch_array($res)){
            $person=$row['name'];
        }

        if($sendto == "Group"){
            $q = "SELECT * from chats where SendTo='$sendto'";
            $rs = mysqli_query($con , $q);
        }else{

            $q = "SELECT*FROM chats where (SendTo = '$person' and SendBy = '$sendto')or(SendBy = '$person' and SendTo = '$sendto')";
            $rs = mysqli_query($con , $q);
        }

        while($row = mysqli_fetch_array($rs))
        {   
            if($person == $row['SendBy'])
            {
                echo "<div class = 'receivediv'><div class = 'senddiv1'><p class = 'usrh'>$row[SendBy] </p><p class = 'usrm'> $row[Message]</p><span class = 'timeby'>$row[Time]</span></div></div>";
            }
            else{
                echo "<div class = 'senddiv'><div class = 'receiverdiv1'><p class = 'usr2h'>$row[SendBy] </p> <span class = 'timeto'>$row[Time]</span><p class = 'usr2m'>$row[Message]</p></div></div>";
            }
        }
        
    }
?>
