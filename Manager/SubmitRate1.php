<?php

include "../db/db.php"; 

    $today=true;

if(isset($_POST['ManagerID']))
{
   
    
    $ManagID=$_POST["ManagerID"];
    $emp_id=$_SESSION['Manager_ID'];
    $review=$_POST["user_review"];
    $Rate=$_POST["Rate"];
    $Category=$_POST["category"];

  
    
     $sql="select * from manager_rate where date_time like '".date("Y-m-d")."%' AND manager_rate.To='".$ManagID."'";
    $result = mysqli_query($connection, $sql);
                      while($row = mysqli_fetch_array($result))
    {
    if($row['Category'] == $Category && $row['From'] == $emp_id ){
    $today=false;
    }
    }

    if($today){
	$query1 = "
	INSERT INTO manager_rate 
	(manager_rate.To, manager_rate.From,date_time,review,Rate,Category) 
	VALUES ('".$ManagID."','". $emp_id."',now(),'".$review."',".$Rate.",'".$Category."')";

$query2="UPDATE manager SET Rate=Rate+ $Rate WHERE ID='$ManagID'";

    if ($connection->query($query1 ) === TRUE && $connection->query($query2 ) === TRUE) {
        $_SESSION['inserted']=true;
        $_SESSION['ename']=$_POST["efirstname"]." ".$_POST["elastname"];
        echo '<script type="text/javascript">'; 
        echo 'alert("Manager Rated succefully ");';
        echo 'window.location.href = "RateManager.php";';
 
        echo '</script>';
    

    } 
    else {
      echo "Error: " . $query1 . "<br>" . $connection->error;
    }
    
    $connection->close();
}
else {
    echo '<script type="text/javascript">'; 
        echo 'alert("You have already Rated Manager with '.$Category.' fot today! ");';
        echo 'window.location.href = "RateManager.php";';
 
        echo '</script>';
}


	
}
?>