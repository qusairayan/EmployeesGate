<?php 

include "../db/db.php"; ob_start();






if(isset($_POST["query"]))
{




 $search = mysqli_real_escape_string($connection, $_POST["query"]);
 $query = "
 SELECT *, manager.FirstName,manager.LastName,manager.Pic,manager.ID AS managerID, department.Name
 FROM manager
INNER JOIN department ON department.ID = manager.DepID
WHERE( manager.Position='Manager'
 AND
 (manager.ID LIKE '%".$search."%'
   OR FirstName LIKE '%".$search."%'
  OR LastName LIKE '%".$search."%' 
  OR Name LIKE '%".$search."%'
  ))
  
 ";
}
else
{



 $query = "
 SELECT manager.FirstName,manager.LastName,manager.Pic,manager.ID AS managerID, department.Name, department.BranchID,branch.Name as branName,branch.ID
 FROM manager
INNER JOIN department ON department.ID = manager.DepID
INNER JOIN branch ON branch.ID = department.BranchID
WHERE manager.Position='Manager'
 ORDER BY manager.FirstName DESC
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
        <th>Department</th>
        
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
        <img src="../assets/img/avatars/'.$row["managerID"].'.'.$row["Pic"].'" alt="Avatar" class="rounded-circle">
      </li>
     
    </ul>
  </td>
  <td> <strong id="FirstName'.$row["managerID"].'">'.$row["FirstName"]
  .' '.$row["LastName"].'</strong></td>
  
  <td> <strong id="id'.$row["managerID"].'">'.$row["Name"].'</strong></td>



  <td>
  

  <button type="button" class="btn rounded-pill btn-primary"';
  echo' onClick=" rate( ';
  echo"'";
  echo $row["managerID"]."','".$row["FirstName"]."','".$row["LastName"]."','".$row["Pic"]."'";
  echo ')"'; 
  
  echo '>
  <span class="tf-icons bx bxs-message-alt-add"></span> Rate
</button>
      
        
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

function rate(id,first,last,pic){

    $('#modalScrollable').modal('show');

    document.getElementById("deleteName").innerHTML=first+id+last+"...";
    document.getElementById("ManagerID").value=id;
    document.getElementById("eFirstName").value=first;
    document.getElementById("elastname").value=last;

    $('#uploadedAvatar').attr("src", "../assets/img/avatars/"+id+"."+ pic);

    
}




</script>