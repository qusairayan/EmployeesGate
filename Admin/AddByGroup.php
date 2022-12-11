<?php
include "../db/db.php"; 


if(isset($_GET['total_chq'])){

$total_chq=$_GET['total_chq'];
for($i=1;$i<= $total_chq; $i++){
    $id=$_GET['ID'.$i];
    $fname=$_GET['first_name'.$i];
    $lname=$_GET['last_name'.$i];
    $dep=$_GET['Department'.$i];
$sql="INSERT INTO employee ID,firstName,LastName , DepID VALUES('".$id."','".$fname."','".$lname."','".$dep."')";
if(mysqli_query($connection,$sql)){
  


}
else{
   if(mysqli_errno($connection) == 1062){
       echo '<script>alert("Duplicated ID ( '.$empID.' ) entred ")</script>';
       $_POST = array();}
   else{
    echo '<script>alert("Employee information update failed  Error ( '.mysqli_errno($connection).' ) ")
    
    </script>';
    $_POST = array();
}

    echo $_GET['ID'.$i].$_GET['first_name'.$i].$_GET['last_name'.$i].$_GET['Department'.$i].'<br>';
}

}
}
