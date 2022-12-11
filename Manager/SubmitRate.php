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
    $today=true;
    
if(isset($_POST['EmpID']))
{
    
    $ManagID=$_SESSION['Manager_ID'];
    $emp_id=$_POST["EmpID"];
    $user_review=$_POST["user_review"];
    $Rate=$_POST["Rate"];
    $Category=$_POST["category"];
    $depID=$_POST['depID'];
            
    $extension=pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
    $fileName = $_FILES['img']['name'];
    $tempName = $_FILES['img']['tmp_name'];
    
    if(isset($fileName))
    {
        if(!empty($fileName))
        {
            if(file_exists("Rates/".$emp_id)){
            $location = "Rates/".$emp_id."/";
            if(move_uploaded_file($tempName, $location.$id.'.'.$extension))
            {
                echo 'File Uploaded'.$id.$extension;
            }
        }
        else{
            mkdir("Rates/".$emp_id,0777,true);
            $location = "Rates/".$emp_id."/";
            if(move_uploaded_file($tempName, $location.$id.'.'.$extension))
            {
                echo 'folder Uploaded'.$id.$extension;
            } 
        }
    }
    }
     $sql="select * from rate where date_time like '".date("Y-m-d")."%' AND EmpID='".$emp_id."'";
    $result = mysqli_query($connection, $sql);
                      while($row = mysqli_fetch_array($result))
    {
    if($row['Category'] == $Category && $row['ManagID'] == $_SESSION['Manager_ID'] ){
    $today=false;
    }
    }

    if($today){
	$query1 = "
	INSERT INTO rate 
	(ManagID, EmpID,date_time,user_review,Rate,Category,Pic,DepID) 
	VALUES ('".$ManagID."','". $emp_id."',now(),'".$user_review."',".$Rate.",'".$Category."','".$extension."',".$depID.")";

$query2="UPDATE employee SET Rate=Rate+ $Rate WHERE ID='$emp_id'";

    if ($connection->query($query1 ) === TRUE && $connection->query($query2 ) === TRUE) {
        $_SESSION['inserted']=true;
        $_SESSION['ename']=$_POST["efirstname"]." ".$_POST["elastname"];
        echo '<script type="text/javascript">'; 
        echo 'alert("Employee Rated succefully ");';
        echo 'window.location.href = "Rate.php";';
 
        echo '</script>';
    

    } 
    else {
      echo "Error: " . $query1 . "<br>" . $connection->error;
    }
    
    $connection->close();
}
else {
    echo '<script type="text/javascript">'; 
        echo 'alert("You have already Rated Employee with '.$Category.' fot today! ");';
        echo 'window.location.href = "Rate.php";';
 
        echo '</script>';
}


	
}
?>