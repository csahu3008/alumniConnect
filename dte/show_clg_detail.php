<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <script  src='../jquery-3-4-1.min.js'></script>
    <title></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        } html {
            min-width: 700px;
        }
        h1{
            background: cadetblue;
            padding: 20px;
            border-radius: 0 0 40px 40px;
            text-align: center;
        }
        .listHeading, .collegeContainer {
            display: grid;
            grid-template-columns: 12.5% 12.5% 12.5% 12.5% 12.5% 12.5% 12.5% 12.5%;
            padding: 10px;
        }.listHeading > div, .collegeContainer > div {
            margin: 10px;
            padding: 5px;
            background: #ffffffaa;
            border-radius: 10px;
            overflow: hidden;
            overflow-x: auto;
        } .headContainer {
            background: darkcyan;
        } .collegeContainer {
            border-bottom: 2px dashed blue;
        } .listContainer {
            box-shadow: 0 -3px 15px -4px;
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
    #filter 
    {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #filter > select 
    {
        width: 50%;
        height: 50px;
        margin: 20px;
        border-radius: 20px;
    }
    #submit
    {
        padding: 10px;
        border-radius: 20px;
        background: #ffffffaa;
        border: none;
        box-shadow: 0 4px 19px -9px black;
    }
    #submit::after 
    {
    content: "";
    background: #714c0d;
    border-radius: 50%;
    position: absolute;
    width: 100px;
    height: 100px;
    display: block;
    opacity: 0;
    transition: all 0.4s;
    } 
    /* #submit:active:after 
    {
        width: 0;
        height: 0;
        margin: 0;
        opacity: 1;
        transition: 0s;
    }  */
    </style>
</head>
<body>
   <div class="headContainer">
   <?php
       $con=mysqli_connect('localhost','root','','alumniconnect');
       $cId = $_REQUEST['cId'];
       $query = "select college_name from college where deleted=0 and id=$cId";
       $rs_college = mysqli_query($con,$query);
        if($row= mysqli_fetch_array($rs_college) )
        {
            echo"<h1>$row[college_name]</h1>";
        }


   ?>    
   <span>
       <form id="filter">
           <?php
                    $val=$_REQUEST['cId'];
                    echo"<select name='branch' >";
                    echo"<option></option>";
                    $con=mysqli_connect('localhost','root','','alumniconnect');
                    $cId = $_REQUEST['cId'];
                    $query="select * from branch_detail where cid=$cId";
                    $res=mysqli_query($con,$query);
                    while($row=mysqli_fetch_array($res))
                    {
                        echo"<option id='$row[id]' value='$row[name]' name='$row[id]'>$row[name]</option>";
                    }
                                   
                    echo"</select>";
                echo"<input type='hidden' name='college_id' value='$val' >";
                ?>
            <input id='submit' type='submit' value='filter now'>
    </form>
    <span>
    <?php
    $con=mysqli_connect('localhost','root','','alumniconnect');

    $cId = $_REQUEST['cId'];
    
    $temp = 0;

    echo'
         <div class="listHeading"><div>index</div><div>College Name</div> <div> Category </div> <div> Email </div><div> Contact </div><div> Pincode </div><div> Address </div><div>Show Detail </div>
        ';

        echo'</div></div></div>';
        echo'<div class="collegeContainer">';
         $query = "select * from college where deleted=0 and id=$cId";
        $rs_college = mysqli_query($con,$query);
        while($row_college=mysqli_fetch_array($rs_college))
        {
            $query2="select * from alumni_detail where college = '$row_college[college_name]'";
            $res_alumni=mysqli_query($con,$query2);
            while($row_alumni = mysqli_fetch_array($res_alumni))
                {
                    $temp++;
                    echo"<div>$row_alumni[id]</div><div>$row_alumni[name]</div><div>$row_alumni[college]</div><div>$row_alumni[branch]</div><div>$row_alumni[email]</div><div>$row_alumni[contact]</div><div>$row_alumni[passing_year]</div><div>$row_alumni[designation]</div>";
                }
        }
    echo"</div>";
    echo"</div>";
?>


</body>
</html>
