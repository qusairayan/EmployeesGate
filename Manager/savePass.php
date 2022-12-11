<?php
include('../db/db.php');
if(isset($_SESSION['logged_in'])) {

    if($_SESSION['logged_in'] && $_SESSION['db_user_role']==1){
    
  
if(isset($_POST['newPass'])){
  
    $managID=$_POST['managID'];
    echo $_POST['newPass'];
        
        $query="  UPDATE `login` SET `password` = '".md5($_POST['newPass'])."'
        WHERE `Manager_ID` = '".$managID."';";
           
        
           if(mysqli_query($connection,$query)){
               echo '<script type="text/javascript">'; 
               echo 'alert("Manager Password updated successfully ✓ ");'; 
               echo 'window.location.href = "Profile.php";';
               echo '</script>';
        
        
              $_POST = array();                  
           }
           else{
              if(mysqli_errno($connection) == 1062){
                  echo '<script>alert("Update failed Error ( )  ")</script>';
                  $_POST = array();}
        }
    }
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
