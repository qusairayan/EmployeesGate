<?php 
include "../db/db.php"; 


    
if(isset($_SESSION['logged_in'])) {

  if($_SESSION['logged_in'] && $_SESSION['db_user_role']==2){}
  
  
  else if ($_SESSION['db_user_role']==1){
    echo '<script type="text/javascript">'; 
    echo 'window.location.href = "../Manager/Home.php"';
    echo '</script>';
  
  }
  else{
      echo '<script type="text/javascript">'; 
      echo 'window.location.href = "../Login/Login.php"';
      echo '</script>';
  }
  
  }
  else{
    echo '<script type="text/javascript">'; 
    echo 'window.location.href = "../Login/Login.php"';
    echo '</script>';
  }

if(isset($_GET['EmpID']))
{

    $query = 'SELECT * FROM employee WHERE ID='.$_GET["EmpID"];
    $result = $connection->query($query);

    if(mysqli_num_rows($result) > 0){



 $query = 'DELETE FROM employee WHERE ID='.$_GET["EmpID"];
if(isset($_GET['accountActivation'])){

    $result = $connection->query($query);

 if ($result === TRUE) {
    echo '<script type="text/javascript">'; 
    echo 'alert("Employee  Deleted successfully ✓ ");'; 
    echo 'window.location.href = "EditEmployees.php";';
    echo '</script>';  }
     else {
    echo "Error deleting record: " . $connection->error;
  }
  
  $connection->close();
}
else
{
    echo '<script type="text/javascript">'; 
    echo 'alert("Confrim the checkbox of Account deletation !! ");'; 
    echo 'window.location.href = "EmpProfile.php?empIDedit='.$_GET["EmpID"].'";';
    echo '</script>';
}
  
}
else{
    echo '<script type="text/javascript">'; 
    echo 'alert("Employee  id not correct  ");'; 
    echo 'window.location.href = "EditEmployees.php";';
    echo '</script>';

}
}
else
echo'error';
?>
