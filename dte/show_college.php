<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <h1 class="heading">List of Colleges</h1>

    <?php

    include('../connect.php');
    
    //echo '<div class="table"></div>';
    $temp = 0;
    echo'<table>
         <thead>
         <th>Sno.</th><th>College Name</th> <th> Category </th> <th> Email </th><th> Contact </th><th> Pincode </th><th> Address </th><th>Show Detail </th>
         </thead>
         <tbody>';


        $query = "select * from college where deleted=0";
        $rs_college = mysqli_query($con,$query);

    while($row_college = mysqli_fetch_array($rs_college))
    {
        $clgId = $row_college['id'];
        
    
        $temp++;
    
            echo'<td style="text-align:center;">'.$temp.'</td>';  
            echo'<td>'.$row_college['college_name'].'</td>';
            echo'<td>'.$row_college['category'].'</td>';
            echo'<td>'.$row_college['email'].'</td>';
            echo'<td>'.$row_college['phone'].'</td>';
            echo'<td>'.$row_college['pincode'].'</td>';
            echo'<td>'.$row_college['address'].'</td>';
            echo'<td style="text-align:center;"><a href="show_clg_detail.php?cId='.$clgId.'"> Show </a></td>

            </tbody>
            </table>';
    }
?>


</body>
</html>