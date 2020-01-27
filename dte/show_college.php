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
            padding-top: 40px;
            padding-bottom: 20px;
            border-radius: 0 0 40px 40px;
            text-align: center;
            color: #999999;
        }
        .listHeading, .collegeContainer {
            display: grid;
            grid-template-columns: 6% 14.5% 12.5% 16.5% 12.5% 12.5% 12.5% 12.5%;
            padding: 10px;
            text-align: center;
        }.listHeading > div, .collegeContainer > div {
            margin: 10px;
            padding: 5px;
            background: #ffffffaa;
            border-radius: 8px;
            overflow: hidden;
            overflow-x: auto;
        } .headContainer {
            background-image: linear-gradient(to right,#710193,#BCA0DC);
        } .collegeContainer {
            border-bottom: 1px solid #999999;
        } .listContainer {
            box-shadow: 0 -3px 15px -4px;
        }
        .btn_show > a{
            background-image: linear-gradient(to right,#710193,#6A0DAD);
            text-decoration: none;
            color: #FFFFFF;
            padding:8px;
            border-radius: 4px
        }
        .btn_show > a :hover{
            background-image: linear-gradient(to right,#710193,#6A0DAD);
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
<?php 
    
    include("../header.php");
    
    include("side_menu.php");

?>
<body>
    <div class="main">
    <h1 class="heading">Colleges</h1><hr>
<?php

    echo'<div class="headContainer">';

    $con=mysqli_connect('localhost','root','','alumniconnect');
    
    $temp = 0;
   echo'
         <div class="listHeading"><div>S.No.</div><div>College Name</div> <div> Category </div> <div> Email </div><div> Contact </div><div> Pincode </div><div> Address </div><div>Show Alumni </div>
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
            if($row_college['category']==0)
            {
                echo'<div>Private</div>';
            }
            else
            {
                echo'<div>Government</div>';
            }
           
            echo'<div>'.$row_college['email'].'</div>';
            echo'<div>'.$row_college['phone'].'</div>';
            echo'<div>'.$row_college['pincode'].'</div>';
            echo'<div>'.$row_college['address'].'</div>';
            echo'<div class="btn_show"><a href="show_clg_detail.php?cId='.$clgId.'"> Show </a></div>

            </div>';
    }
    echo'</div>';
?>
</tbody>
            </table>

</div>

</body>
</html>
