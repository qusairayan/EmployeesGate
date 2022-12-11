
    

<?php 
include "../db/db.php"; 

if(!empty($_POST['checkbox'])) {
        foreach($_POST['checkbox'] as $check) {
        

            $query = 'DELETE FROM employee WHERE ID='.$check;
            
                $result = $connection->query($query);
            
            
            
                } if ($result === TRUE) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Employees Deleted successfully ✓ ");'; 
                echo 'window.location.href = "DeleteGroup.php";';
                echo '</script>';  }
                 else {
                echo "Error deleting record: " . $connection->error;
              }
              
              $connection->close();
            }
?>
