<link rel="icon" type="image/x-icon" href="../assets/img/TitleLogo.PNG" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="../asset/vendor/aos/aos.css" rel="stylesheet">
  <link href="../asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../asset/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../asset/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../asset/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../asset/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../asset/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="../asset/css/style.css" rel="stylesheet">

  

<?php
 include "../db/db.php";


if($_SESSION['Dep'] == 29){}

$sql = "SELECT ID from department where ID LIKE '".$_SESSION['Department']."%'";
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
<div style="  background-image: url'."('../assets/img/avatars/".$row1["ID"].".".$row1["Pic"]."')".'" class="icon-box">      
</br>   </br>   </br> 
<h3 style="margin:45px 0 0 0;font-size: 15px; "><a Style="color:#c7b303;margin: 5px;"  ><strong style="
font-size: x-large;
">'. $row1["rate"].'</strong>✮</a><a >'. $row1["FirstName"]. " " . $row1["LastName"].'</a></h3>
</div>
</div>';
}
}
?>

