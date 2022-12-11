<?php 

include "../db/db.php"; 
if(isset($_SESSION['logged_in'])) {

  if($_SESSION['logged_in'] && $_SESSION['db_user_role']==2){
  

$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connection, $_POST["query"]);
 $query = "
 SELECT *,employee.ID as empID FROM employee INNER JOIN department ON department.ID =employee.DepID
  WHERE employee.ID LIKE '%".$search."%'
   OR firstName LIKE '%".$search."%'
  OR LastName LIKE '%".$search."%' 
  OR Name LIKE '%".$search."%' 
  
 ";
}
else
{
 $query = "
 SELECT employee.firstName,employee.LastName,employee.Rate,employee.ID AS empID, employee.Pic, department.Name  FROM employee INNER JOIN department ON department.ID =employee.DepID
 ORDER BY employee.ID
 ";
}
$result = mysqli_query($connection, $query);
if(mysqli_num_rows($result) > 0)
{
 echo'



    <table class="table">
    <thead class="table-dark">
      <tr>
        <th></th>
        <th>Name</th>
        <th>ID</th>
        <th>Department</th>
        <th>Rate</th>
        <th></th>

      </tr>
    </thead>
    <tbody class="table-border-bottom-0">
 ';
 while($row = mysqli_fetch_array($result))

 {
  echo'
  <tr>
  <td>
    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
      <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" >
        <img src="../assets/img/avatars/'.$row["empID"].'.'.$row["Pic"].'" alt="Avatar" class="rounded-circle">
      </li>
     
    </ul>
  </td>
  <td> <strong id="firstName'.$row["empID"].'">'.$row["firstName"]
  .' '.$row["LastName"].'</strong></td>
  <td> <strong id="id'.$row["empID"].'">'.$row["empID"].'</strong></td>
  
  <td> <strong id="id'.$row["empID"].'">'.$row["Name"].'</strong></td>

  <td><span class="badge bg-label-primary me-1">'
  
.$row["Rate"].'✮
  
</span></td>

  <td>
  

    <div class="dropdown">
      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
        <i class="bx bx-dots-vertical-rounded"></i>
      </button>
      <div class="dropdown-menu">
        <form method="get" action="EmpProfile.php">
      <input type="hidden" id="empIDedit" name="empIDedit" value="'.$row["empID"].'"/>
        <a class="dropdown-item" ;"><button type="submit" style="border:none; background:none"><i class="bx bx-edit-alt me-1"></i> Edit</button></a>
    </form>
        <a class="dropdown-item" "><button type="button"';

        echo' onClick=" DeleteEmp( ';
        echo"'";
        echo $row["empID"]."','".$row["firstName"]."','".$row["LastName"]."'";
        echo ')"'; 
      
        
         echo 'style="border:none; background:none">
        <i class="bx bx-trash me-1"></i> Delete</button></a></a>
      </div>
    </div>
  </td>
</tr>
  ';
 }
 echo '   </tbody>
 </table>
</div>
</div>';
}
else
{
 echo 'Data Not Found    </tbody>
 </table>
</div>
</div>';
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

<script>

function DeleteEmp(id,first,last){

    $('#modalScrollable').modal('show');

    document.getElementById("deleteName").innerHTML="Are you deleting"+first+" "+last+"?";
    document.getElementById("EmpID").value=id;

    
    
}

</script>