<?php 

include "../db/db.php"; 




if(isset($_SESSION['logged_in'])) {

  if($_SESSION['logged_in'] && $_SESSION['db_user_role']==2){
  

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
 SELECT employee.firstName,employee.LastName,employee.Rate,employee.ID AS empID,employee.Pic, department.Name,manager.DepID AS mangDep  FROM employee
  INNER JOIN department ON department.ID = employee.DepID
  INNER JOIN manager ON manager.ID =".$_SESSION['Manager_ID']." 
 WHERE employee.DepID != 'mangDep'
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
     <th>ID</th>
     <th>Name</th>
     <th>Department</th>
     

   </tr>
 </thead>
 <tbody class="table-border-bottom-0">
                    
';
 while($row = mysqli_fetch_array($result))

 {
  echo'<tr><td><label class="list-group-item">
  <input name="checkbox[]" id="checkbox[]" class="form-check-input me-1" type="checkbox" value="'.$row["empID"].'"></td>
  <td>
  '.$row["empID"].'

</td>

<td>
'.$row["firstName"]
  .' '.$row["LastName"].'
</td>


<td>
'.$row["Name"].'

</td>

</label></tr>';
 }
 echo ' </tbody>
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
echo'';
?>
   