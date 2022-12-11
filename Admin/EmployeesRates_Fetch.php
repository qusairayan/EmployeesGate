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
 SELECT employee.firstName,employee.LastName,employee.Rate,employee.ID AS empID, Name FROM employee
 INNER JOIN department ON department.ID = employee.DepID
   ORDER BY employee.ID";
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
        <img src="../assets/img/avatars/'.$row["empID"].'.jpeg" alt="Avatar" class="rounded-circle">
      </li>
     
    </ul>
  </td>
  <td> <strong id="firstName'.$row["empID"].'">'.$row["firstName"]
  .' '.$row["LastName"].'</strong></td>
  <td> <strong id="id'.$row["empID"].'">'.$row["empID"].'</strong></td>
  <td> <strong id="Department'.$row["empID"].'">'.$row["Name"].'</strong></td>


  <td><span class="badge bg-label-primary me-1">'
  
  

    .$row["Rate"].'✮

  </span></td>

  <td>
  
<form method="get" action="empRateReview.php">
<input type="hidden" name="empRevID" id="empRevID" value="'.$row["empID"].'"/>
<input type="hidden" name="empRevFirstName" id="empRevFirstName" value="'.$row["firstName"].'"/>
<input type="hidden"  id="empRevLastName"name="empRevLastName" value="'.$row["LastName"].'"/>

  <button type="submit" name="empRevButt" class="btn rounded-pill btn-primary")>
  <span class="tf-icons bx bxs-message-alt-add"></span>View Rates
</button>
      </form>
        
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

?>

<script>





</script>