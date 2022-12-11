<?php 
include "../db/db.php"; 
if(isset($_SESSION['logged_in'])) {

if($_SESSION['logged_in'] && $_SESSION['db_user_role']==2){



if(isset($_GET["deleteBut"]))
{
if(isset($_GET["managID"]))
{
    $query = 'SELECT * FROM manager WHERE ID='.$_GET["managID"];
    $result = $connection->query($query);

    if(mysqli_num_rows($result) > 0){



 $query = 'DELETE FROM manager WHERE ID='.$_GET["managID"];
if(isset($_GET['accountActivation'])){

    $result = $connection->query($query);

 if ($result === TRUE) {
    echo '<script type="text/javascript">'; 
    echo 'alert("Manager  Deleted successfully ✓ ");'; 
    echo 'window.location.href = "EditManagers.php";';
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
    echo 'window.location.href = "ManagerProfile.php?empIDedit='.$_GET["EmpID"].'";';
    echo '</script>';
}
  
}
else{
    echo '<script type="text/javascript">'; 
    echo 'alert("Employee  id not correct  ");'; 
    echo 'window.location.href = "EditManagers.php";';
    echo '</script>';

}
}
}
}
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
?>
