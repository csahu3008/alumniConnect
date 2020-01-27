<h1>
   <?php
       $con=mysqli_connect('localhost','root','','alumniconnect');
       $cId = $_REQUEST['college_id'];
       $query = "select college_name from college where deleted=0 and id=$cId";
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
        echo'<table>
         <thead>
         <th>Sno.</th><th>Name</th><th>College Name</th> <th> branch </th> <th> Email </th><th> Contact </th><th> Passing Year </th><th> Designation</th>
         </thead>
         <tbody>';
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
                    echo"<tr><th>$row_alumni[id]</th><th>$row_alumni[name]</th><th>$row_alumni[college]</th><th>$row_alumni[branch]</th><th>$row_alumni[email]</th><th>$row_alumni[contact]</th><th>$row_alumni[passing_year]</th><th>$row_alumni[designation]</th></tr>";
                }
        }
        echo"</tbody>";
        echo"</table>";

?>