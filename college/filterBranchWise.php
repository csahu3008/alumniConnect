<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
            font-size: 16px;

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
<body>
    
</body>
</html>
<h1>
   <?php
      session_start();
        $con=mysqli_connect('localhost','root','','alumniconnect');
       $query = "select college_name from college where deleted=0 and email='$_SESSION[user]'";
       $rs_college = mysqli_query($con,$query);
        if($row= mysqli_fetch_array($rs_college) )
        {
            echo"<h1>$row[college_name]</h1>";
        }
        
    ?>    

<h1>

<span>
       <form action='filterBranchWise.php' method='post'>
           <?php
                    $val=$_REQUEST['college_id'];
                    echo"<select name='branch' >";
                    $con=mysqli_connect('localhost','root','','alumniconnect');
                    $cId = $_REQUEST['college_id'];
                    $query="select * from branch_detail where cid=$cId";
                    $res=mysqli_query($con,$query);
                    while($row=mysqli_fetch_array($res))
                    {
                        echo"<option id='$row[id]' value='$row[name]' name='$row[id]'>$row[name]</option>";
                    }
                                   
                    echo"</select>";
                echo"<input type='hidden' name='college_id' value='$val' >";
                ?>
            <input type='submit' value='filter now'>
    </form>
    <span>

<?php
        echo'<div>
         <div class="listHeading">
         <div>Sno.</div><div>Name</div><div>College Name</div> <div> branch </div> <div> Email </div><div> Contact </div><div> Passing Year </div><div> Designation</div>
         </div>
         <div>';
        $college_id=$_REQUEST['college_id'];
        $con=mysqli_connect('localhost','root','','alumniconnect');
        $query = "select * from college where deleted=0 and id=$college_id ";
        $rs_college = mysqli_query($con,$query);
        $temp=0;
        while($row_college=mysqli_fetch_array($rs_college))
        {
            $query2="select * from alumni_detail where college = '$row_college[college_name]' and branch='$_REQUEST[branch]' ";
            $res_alumni=mysqli_query($con,$query2);
            while($row_alumni = mysqli_fetch_array($res_alumni))
                {
                    $temp++;
                    echo"<div class='collegeContainer'><div>$row_alumni[id]</div><div>$row_alumni[name]</div><div>$row_alumni[college]</div><div>$row_alumni[branch]</div><div>$row_alumni[email]</div><div>$row_alumni[contact]</div><div>$row_alumni[passing_year]</div><div>$row_alumni[designation]</div></div>";
                }
        }
        echo"</div>";
        echo"</div>";

?>