<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        } html {
            min-width: 700px;
        }
        h1, .branch {
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

    </style>

</head>
<body>
<?php

    echo'<div class="headContainer">
    <h1 class="heading">List of Colleges</h1>';


    include('../connect.php');
    
    //echo '<div class="table"></div>';
    $temp = 0;
    echo'
         <div class="listHeading"><div>index</div><div>College Name</div> <div> Category </div> <div> Email </div><div> Contact </div><div> Pincode </div><div> Address </div><div>Show Detail </div>
        ';

    echo'</div></div>';
    echo'<div class="listContainer">';
        $query = "select * from college where deleted=0";
        $rs_college = mysqli_query($con,$query);

    while($row_college = mysqli_fetch_array($rs_college))
    {
        $clgId = $row_college['id'];
        
    
        $temp++;
            echo'<div class="collegeContainer">';
            echo'<div style="text-align:center;">'.$temp.'</div>';  
            echo'<div>'.$row_college['college_name'].'</div>';
            echo'<div>'.$row_college['category'].'</div>';
            echo'<div>'.$row_college['email'].'</div>';
            echo'<div>'.$row_college['phone'].'</div>';
            echo'<div>'.$row_college['pincode'].'</div>';
            echo'<div>'.$row_college['address'].'</div>';
            echo'<div style="text-align:center;"><a href="show_clg_detail.php?cId='.$clgId.'"> Show </a></div>

            </div>';
    }
    echo'</div>';
?>


</body>
</html>
