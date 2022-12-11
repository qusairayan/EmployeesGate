<?php

include "../db/db.php"; 
if (!isset($_SESSION['Manager_ID']) || !isset($_SESSION['logged_in'])) {
    if(!$_SESSION['logged_in']) {
      echo '<script type="text/javascript">'; 
      echo 'window.location.href = "../Login/Login.php"';
      echo '</script>';
              exit();
    }
    if ($_SESSION['db_user_role'] != 1) {
      echo '<script type="text/javascript">'; 
      echo 'window.location.href = "../Login/Login.php"';
      echo '</script>';
                    exit;			
    }
    }
if(isset($_POST['EmpID']))
{
    $query="SELECT ID FROM rate ORDER BY ID DESC LIMIT 1";
    $result = mysqli_query($connection, $query);
    if ($row = mysqli_fetch_array($result))
    {
    $id=++$row['ID'];
    }
    $ManagID=$_SESSION['Manager_ID'];
    $emp_id=$_POST["EmpID"];
    $user_review=$_POST["user_review"];
    $Rate=$_POST["Rate"];

    

	$query1 = "
	INSERT INTO rate 
	(ID,ManagID, EmpID,date_time,user_review,Rate,MonthlyRate,Category) 
	VALUES (".$id.",'".$ManagID."','". $emp_id."',now(),'".$user_review."',5.5,curdate(),'Manger Rate')";

$query2="UPDATE employee SET Rate=Rate+ 5.5 WHERE ID='$emp_id'";

    if ($connection->query($query1 ) === TRUE && $connection->query($query2 ) === TRUE) {
        $_SESSION['inserted']=true;
        $_SESSION['ename']=$_POST["efirstname"]." ".$_POST["elastname"];
        echo '<script type="text/javascript">'; 
        echo 'alert("Your monthly  rate for your deparment Employee done succefully ");';
        echo 'window.location.href = "Rate.php";';

        echo '</script>';
    

    } 
    else {
      echo "Error: " . $query1 . "<br>" . $connection->error;
    }
    
    $connection->close();
	
}
?>