<?php
 include "../db/db.php";




$sql = "SELECT ID from department where ID LIKE '".$_SESSION['Department']."%' " ;
$result = $connection ->query($sql); 


while($row = $result->fetch_assoc()){
$bran=$row['ID']; 
$sql1 = "SELECT Rate,employee.ID,FirstName,LastName,Pic,rate,DepID,Name
FROM employee
INNER JOIN department ON department.ID=employee.DepID
WHERE DepID = ".$row['ID']."
ORDER BY Rate DESC 
LIMIT 1
";
$result1 = $connection ->query($sql1);
if($row1 = $result1->fetch_assoc()) {

echo '
<div class="col-xl-2 col-md-4" style="--bs-gutter-y: 4.5rem; ">
<h3 Style="color:white; font-size:20px; margin:10px">'. $row1["Name"].'</h3>
<div style="  background-image: url'."('assets/img/avatars/".$row1["ID"].".".$row1["Pic"]."')".'" class="icon-box">      
</br>   </br>   </br> 
<h3 style="margin:55px 0 0 0;font-size: 15px; "><a Style="color:#c7b303;margin: 5px;"  ><strong style="
font-size: x-large;
">'. $row1["rate"].'</strong>✮</a><a >'. $row1["FirstName"]. " " . $row1["LastName"].'</a></h3>
</div>
</div>';
}
}
?>

