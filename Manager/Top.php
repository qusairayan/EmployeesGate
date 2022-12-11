

<?php include "../db/db.php";
 
 if (!isset($_SESSION['Manager_ID']) || !isset($_SESSION['logged_in'])) {
     
        
 echo '<script type="text/javascript">'; 
 echo 'window.location.href = "../Login/login.php"';
 echo '</script>';
         exit();
     
     if ($_SESSION['db_user_role'] != 2) {
         echo '<script type="text/javascript">'; 
         echo 'window.location.href = "../Login/login.php"';
         echo '</script>';
                       exit;			
     }
     }
 ?>
 
 <!DOCTYPE html>
 <html lang="en">
 
 <head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
 
   <title>Employee Gate</title>
   <meta content="" name="description">
   <meta content="" name="keywords">
 
   <!-- Favicons -->
   <link rel="icon" type="image/x-icon" href="../assets/img/TitleLogo.PNG" />
   <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
   <link rel="stylesheet" href="style.css">
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
 
   
 
 </head>
 
 <body>
 
   <!-- ======= Header ======= -->
   <!-- End Header -->
 
   <!-- ======= Hero Section ======= -->
 
 <!-- The Modal -->
 
   <!-- Modal content -->
 
 
 
 
 
 

   <div class="col-xl-6" >
                  <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                      <li class="nav-item">
                        <button type="button" onclick="Show()" id="EmpButton" style="font-size: larger;" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home" aria-selected="true">
                        Employees 
                        </button>
                      </li>
                      <li class="nav-item">
                        <button type="button" onclick="Hide()" id="HODButton"style="font-size: larger;" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile" aria-selected="false">
                        HODS
                        </button>
                       
                      </li>
                     
                    </ul>
                    <form method="Post" style="height:auto"><select id="LastMonths"   onchange="this.form.submit()" class="form-select" name="period"
                     style="
    background-color: #532836;
    padding: 0.1rem 1.875rem 0.1rem 0.875rem;
    font-size: 0.8rem;
    width: auto;
    border: 1px solid #ffffff30;
    margin: -0.7rem  1rem;
    color: #fefefe;">
                              <option value="total">Total rate</option>
                              <option <?php if(isset($_POST['period']))if($_POST['period']==0.5)echo'selected="selected"';?>value="0.5">This Month</option>
                              <option <?php if(isset($_POST['period']))if($_POST['period']==1)echo'selected="selected"';?>value="1">From Last Month</option>
                              <option  <?php if(isset($_POST['period']))if($_POST['period']==2)echo'selected="selected"';?>  value="2">From Last 2 Months</option>
                              <option  <?php if(isset($_POST['period']))if($_POST['period']==3)echo'selected="selected"';?> value="3">From Last 3 Months</option>
                              <option  <?php if(isset($_POST['period']))if($_POST['period']==4)echo'selected="selected"';?> value="4">From Last 4 Months</option>
                              <option  <?php if(isset($_POST['period']))if($_POST['period']==5)echo'selected="selected"';?> value="5">From Last 5 Months</option>
                              <option  <?php if(isset($_POST['period']))if($_POST['period']==6)echo'selected="selected"';?> value="6">From Last 6 Months</option>
                              <option  <?php if(isset($_POST['period']))if($_POST['period']==7)echo'selected="selected"';?> value="7">From Last 7 Months</option>         
                              <option  <?php if(isset($_POST['period']))if($_POST['period']==8)echo'selected="selected"';?> value="8">From Last 8 Months</option>
                              <option  <?php if(isset($_POST['period']))if($_POST['period']==9)echo'selected="selected"';?> value="9">From Last 9 Months</option>
                              <option  <?php if(isset($_POST['period']))if($_POST['period']==10)echo'selected="selected"';?> value="10">From Last 10 Months</option>         
                              <option  <?php if(isset($_POST['period']))if($_POST['period']==11)echo'selected="selected"';?> value="11">From Last 11 Months</option>
                              <option  <?php if(isset($_POST['period']))if($_POST['period']==12)echo'selected="selected"';?> value="12">From Last 12 Months</option>

                            </select></form>
                    <div class="tab-content">
                      <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                          
                      <section id="hero" class="d-flex align-items-center justify-content-center" >
     <div class="container" data-aos="fade-up">
 
       <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
     
 
 
     
         <div class="col-xl-6 col-lg-8">


         <?php 
         if($_SESSION['Position'] == 'GM' || ( ($_SESSION['Dep']==210 || $_SESSION['Dep']==212 || $_SESSION['Dep']==213|| $_SESSION['Dep']==216  ) && $_SESSION['Position'] == 'Manager') ){
         
         echo' <h1 >Top Rated Heartsits at Aqaba City </h1>
           <h2 style="margin: 25px;font-size: x-large;">✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮</h1>
         </div>
       </div>
 
 
 
 
 
 
       
       <div class="row gy-4  justify-content-center" data-aos="zoom-in" data-aos-delay="250">';
       
        
$sql = "SELECT ID from department where ID LIKE '1%' " ;
$result = $connection ->query($sql); 


while($row = $result->fetch_assoc()){
$bran=$row['ID']; 

$sql1 = "SELECT Rate as total,employee.ID as EmpID ,FirstName,LastName,Pic,rate,DepID,Name
FROM employee
INNER JOIN department ON department.ID=employee.DepID
WHERE DepID = ".$row['ID']."
ORDER BY Rate DESC 
LIMIT 1
";
if(isset($_POST['period'])){
  if(13 > $_POST['period'] && $_POST['period'] > 0 ){
    if($_POST['period'] == 0.5 ){

    $sql1 = "SELECT *,FirstName,LastName,employee.Pic,employee.DepID,Name,SUM(rate.Rate) as total
    FROM `rate`
   INNER JOIN employee ON employee.ID=rate.EmpID 
   INNER JOIN department ON department.ID=rate.DepID 
   WHERE rate.DepID=".$row['ID']." AND  MONTH(date_time)= MONTH(CURRENT_TIMESTAMP) AND  Year(date_time)= Year(CURRENT_TIMESTAMP)
   GROUP by EmpID
   ORDER BY total DESC 
   LIMIT 1
   ";
  } 
  else{
$sql1 = "SELECT *,FirstName,LastName,employee.Pic,employee.DepID,Name,SUM(rate.Rate) as total
FROM `rate`
INNER JOIN employee ON employee.ID=rate.EmpID 
INNER JOIN department ON department.ID=rate.DepID 
WHERE rate.DepID=".$row['ID']." AND date_time >= now()-interval ".$_POST['period']."+1 month
GROUP by EmpID
ORDER BY total DESC 
LIMIT 1
";}

  }
  if($_POST['period'] == 'total' ){
    $sql1 = "SELECT Rate as total,employee.ID as EmpID ,FirstName,LastName,Pic,rate,DepID,Name
    FROM employee
    INNER JOIN department ON department.ID=employee.DepID
    WHERE DepID = ".$row['ID']."
    ORDER BY Rate DESC 
    LIMIT 1
    ";
  }
}
$result1 = $connection ->query($sql1);
if($row1 = $result1->fetch_assoc()) {


        
        echo '
        <div class="col-xl-2 col-md-4" style="--bs-gutter-y: 4.5rem; ">
        <h3 Style="color:white; font-size:20px; margin:10px">'. $row1["Name"].'</h3>
        <div class="icon-box "';
        if ($row1['total']>0){
          echo'style="  background-image: url'."('../assets/img/avatars/".$row1["EmpID"].".".$row1["Pic"]."')".' ">      
        </br>   </br>   </br> 
           <h3 style="margin:55px 0 0 0;font-size: 15px; "><a Style="color:white;margin: 5px;"  ><strong style="
           font-size: x-large;
       ">'. $row1["total"].'</strong>✮</a><a >'. $row1["FirstName"]. " " . $row1["LastName"].'</a></h3>
        </div>';
      }
      else echo'></div>';
      echo' </div>';
        }
}


echo'
         
         
       </br>  </br>
        
       </div></div>
      </section>

      
      
   <section id="hero" class="d-flex align-items-center justify-content-center" >
     <div class="container" data-aos="fade-up">
 
       <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
     
 
 
 <br>
 
     
         <div class="col-xl-6 col-lg-8">
           <h1>Top Rated Heartsits at Tala Bay </h1>
           <h2 style="margin: 25px;font-size: x-large;">✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮</h1>
         </div>
       </div>
 
 
 
 
 
 
       
       <div class="row gy-4  justify-content-center" data-aos="zoom-in" data-aos-delay="250">';
        
        $sql = "SELECT ID from department where ID LIKE '2%' " ;
        $result = $connection ->query($sql); 
        
        
        while($row = $result->fetch_assoc()){
          $bran=$row['ID']; 
          
          $sql1 = "SELECT Rate as total,employee.ID as EmpID ,FirstName,LastName,Pic,rate,DepID,Name
          FROM employee
          INNER JOIN department ON department.ID=employee.DepID
          WHERE DepID = ".$row['ID']."
          ORDER BY Rate DESC 
          LIMIT 1
          ";
          if(isset($_POST['period'])){
            if(13 > $_POST['period'] && $_POST['period'] > 0 ){
              if($_POST['period'] == 0.5 ){
          
              $sql1 = "SELECT *,FirstName,LastName,employee.Pic,employee.DepID,Name,SUM(rate.Rate) as total
              FROM `rate`
             INNER JOIN employee ON employee.ID=rate.EmpID 
             INNER JOIN department ON department.ID=rate.DepID 
             WHERE rate.DepID=".$row['ID']." AND  MONTH(date_time)= MONTH(CURRENT_TIMESTAMP) AND  Year(date_time)= Year(CURRENT_TIMESTAMP)
             GROUP by EmpID
             ORDER BY total DESC 
             LIMIT 1
             ";
            } 
            else{
          $sql1 = "SELECT *,FirstName,LastName,employee.Pic,employee.DepID,Name,SUM(rate.Rate) as total
          FROM `rate`
          INNER JOIN employee ON employee.ID=rate.EmpID 
          INNER JOIN department ON department.ID=rate.DepID 
          WHERE rate.DepID=".$row['ID']." AND date_time >= now()-interval ".$_POST['period']."+1 month
          GROUP by EmpID
          ORDER BY total DESC 
          LIMIT 1
          ";}
          
            }
            if($_POST['period'] == 'total' ){
              $sql1 = "SELECT Rate as total,employee.ID as EmpID ,FirstName,LastName,Pic,rate,DepID,Name
              FROM employee
              INNER JOIN department ON department.ID=employee.DepID
              WHERE DepID = ".$row['ID']."
              ORDER BY Rate DESC 
              LIMIT 1
              ";
            }
          }
          $result1 = $connection ->query($sql1);
          if($row1 = $result1->fetch_assoc()) {
         
        
        echo '
        <div class="col-xl-2 col-md-4" style="--bs-gutter-y: 4.5rem; ">
        <h3 Style="color:white; font-size:20px; margin:10px">'. $row1["Name"].'</h3>
        <div class="icon-box "';
        if ($row1['total']>0){
          echo'style="  background-image: url'."('../assets/img/avatars/".$row1["EmpID"].".".$row1["Pic"]."')".' ">      
        </br>   </br>   </br> 
           <h3 style="margin:55px 0 0 0;font-size: 15px; "><a Style="color:white;margin: 5px;"  ><strong style="
           font-size: x-large;
       ">'. $row1["total"].'</strong>✮</a><a >'. $row1["FirstName"]. " " . $row1["LastName"].'</a></h3>
        </div>';
      }
      else echo'></div>';
      echo' </div>';
        }
          }
       echo'
           
         
       </br>  </br>
        
       </div></div>
      </section></div>



      <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                         
                         <section id="hero" class="d-flex align-items-center justify-content-center" >
        <div class="container" data-aos="fade-up">
    
          <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">




     
         <div class="col-xl-6 col-lg-8">
           <h1 >Top Rated HODS at Aqaba City </h1>
           <h2 style="margin: 25px;font-size: x-large;">✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮</h1>
         </div>
       </div>
 
 
 
       
       <div class="row gy-4  justify-content-center" data-aos="zoom-in" data-aos-delay="250">';
$sql = "SELECT ID from department where ID LIKE '1%' " ;
$result = $connection ->query($sql); 


while($row = $result->fetch_assoc()){
$bran=$row['ID']; 
$sql1 = "SELECT Rate,manager.ID,FirstName,LastName,Pic,rate,DepID,Name
FROM manager
INNER JOIN department ON department.ID=manager.DepID
WHERE DepID = ".$row['ID']." AND Position='Manager'
ORDER BY Rate DESC 
LIMIT 1
";
$result1 = $connection ->query($sql1);
if($row1 = $result1->fetch_assoc()) {

        
  echo '
  <div class="col-xl-2 col-md-4" style="--bs-gutter-y: 4.5rem; ">
  <h3 Style="color:white; font-size:20px; margin:10px">'. $row1["Name"].'</h3>
  <div class="icon-box "';
  if ($row1['rate']>0){
    echo'style="  background-image: url'."('../assets/img/avatars/".$row1["ID"].".".$row1["Pic"]."')".' ">      
  </br>   </br>   </br> 
     <h3 style="margin:55px 0 0 0;font-size: 15px; "><a Style="color:white;margin: 5px;"  ><strong style="
     font-size: x-large;
 ">'. $row1["rate"].'</strong>✮</a><a >'. $row1["FirstName"]. " " . $row1["LastName"].'</a></h3>
  </div>';
}
else echo'></div>';
echo' </div>';
  }
}
    
         
       echo' </br>  </br>
        
       </div></div>
      </section>
      
   <section id="hero" class="d-flex align-items-center justify-content-center" >
     <div class="container" data-aos="fade-up">
 
       <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
     
 
 
 <br>


     

         <div class="col-xl-6 col-lg-8">
           <h1>Top Rated HODS at Tala Bay </h1>
           <h2 style="margin: 25px;font-size: x-large;">✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮</h1>
         </div>
       </div>
 
 
 
 
 
 
       
       <div class="row gy-4  justify-content-center" data-aos="zoom-in" data-aos-delay="250">
        ';
        $sql = "SELECT ID from department where ID LIKE '2%' " ;
        $result = $connection ->query($sql); 
        
        
        while($row = $result->fetch_assoc()){
        $bran=$row['ID']; 
        $sql1 = "SELECT Rate,manager.ID,FirstName,LastName,Pic,rate,DepID,Name
        FROM manager
        INNER JOIN department ON department.ID=manager.DepID
        WHERE DepID = ".$row['ID']." AND Position='Manager'
        ORDER BY Rate DESC 
        LIMIT 1
        ";
        $result1 = $connection ->query($sql1);
        if($row1 = $result1->fetch_assoc()) {
        
      
        
          echo '
          <div class="col-xl-2 col-md-4" style="--bs-gutter-y: 4.5rem; ">
          <h3 Style="color:white; font-size:20px; margin:10px">'. $row1["Name"].'</h3>
          <div class="icon-box "';
          if ($row1['rate']>0){
            echo'style="  background-image: url'."('../assets/img/avatars/".$row1["ID"].".".$row1["Pic"]."')".' ">      
          </br>   </br>   </br> 
             <h3 style="margin:55px 0 0 0;font-size: 15px; "><a Style="color:white;margin: 5px;"  ><strong style="
             font-size: x-large;
         ">'. $row1["rate
         "].'</strong>✮</a><a >'. $row1["FirstName"]. " " . $row1["LastName"].'</a></h3>
          </div>';
        }
        else echo'></div>';
        echo' </div>';
          }
        }
      

  echo'
           
         
       </br>  </br>
        
       </div></div>      </section>
                 
                </div>';


      }
    

      else  {
    echo' <h1 >Top Rated Heartsits </h1>
    <h2 style="margin: 25px;font-size: x-large;">✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮</h1>
  </div>
</div>

<div class="row gy-4  justify-content-center" data-aos="zoom-in" data-aos-delay="250">';

 
$sql = "SELECT ID from department where ID LIKE '".$_SESSION['Department']."%' " ;
$result = $connection ->query($sql); 


while($row = $result->fetch_assoc()){
$bran=$row['ID']; 

if(isset($_POST['period'])){
  if(13 > $_POST['period'] && $_POST['period'] > 0 ){

    if($_POST['period'] == 0.5 ){
      $sql1 = "SELECT *,FirstName,LastName,employee.Pic,employee.DepID,Name,SUM(rate.Rate) as total
      FROM `rate`
     INNER JOIN employee ON employee.ID=rate.EmpID 
     INNER JOIN department ON department.ID=rate.DepID 
     WHERE rate.DepID=".$row['ID']." AND  MONTH(date_time)= MONTH(CURRENT_TIMESTAMP) AND  Year(date_time)= Year(CURRENT_TIMESTAMP)
     GROUP by EmpID
     ORDER BY total DESC 
     LIMIT 1
     ";
    } 
    else{
$sql1 = "SELECT *,FirstName,LastName,employee.Pic,employee.DepID,Name,SUM(rate.Rate) as total
 FROM `rate`
INNER JOIN employee ON employee.ID=rate.EmpID 
INNER JOIN department ON department.ID=rate.DepID 
WHERE rate.DepID=".$row['ID']." AND date_time >= now()-interval ".$_POST['period']."+1 month
GROUP by EmpID
ORDER BY total DESC 
LIMIT 1
";}
$result1 = $connection ->query($sql1);
if($row1 = $result1->fetch_assoc()) {

echo '
<div class="col-xl-2 col-md-4" style="--bs-gutter-y: 4.5rem; ">
<h3 Style="color:white;margin:10px">'. $row1["Name"].'</h3>
<div style="  background-image: url'."('../assets/img/avatars/".$row1["EmpID"].".".$row1["Pic"]."')".'" class="icon-box">      
</br>   </br>   </br> 
<h3 style="margin:55px 0 0 0;font-size: 15px; "><a Style="color:white;margin: 5px;"  ><strong style="
font-size: x-large;
">'. $row1["total"].'</strong>✮</a><a >'. $row1["FirstName"]. " " . $row1["LastName"].'</a></h3>
</div>
</div>';
}
}}
if(!isset($_POST['period']) || !(13 > $_POST['period'] && $_POST['period'] > 0 )){
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
        <div class="icon-box "';
        if ($row1['Rate']>0){
          echo'style="  background-image: url'."('../assets/img/avatars/".$row1["ID"].".".$row1["Pic"]."')".' ">      
        </br>   </br>   </br> 
           <h3 style="margin:55px 0 0 0;font-size: 15px; "><a Style="color:white;margin: 5px;"  ><strong style="
           font-size: x-large;
       ">'. $row1["Rate"].'</strong>✮</a><a >'. $row1["FirstName"]. " " . $row1["LastName"].'</a></h3>
        </div>';
      }
      else echo'></div>';
      echo' </div>';
        }
  
}
}
echo'
  
  
</br>  </br>
 
</div></div>
</section>


</div>



<div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                  
                  <section id="hero" class="d-flex align-items-center justify-content-center" >
 <div class="container" data-aos="fade-up">

   <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">





  <div class="col-xl-6 col-lg-8">
    <h1 >Top Rated HODS</h1>
    <h2 style="margin: 25px;font-size: x-large;">✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮</h1>
  </div>
</div>




<div class="row gy-4  justify-content-center" data-aos="zoom-in" data-aos-delay="250">';
$sql = "SELECT ID from department where ID LIKE '".$_SESSION['Department']."%' " ;
$result = $connection ->query($sql); 


while($row = $result->fetch_assoc()){
$bran=$row['ID']; 
$sql1 = "SELECT Rate,manager.ID,FirstName,LastName,Pic,rate,DepID,Name
FROM manager
INNER JOIN department ON department.ID=manager.DepID
WHERE DepID = ".$row['ID']." AND Position='Manager'
ORDER BY Rate DESC 
LIMIT 1
";
$result1 = $connection ->query($sql1);
if($row1 = $result1->fetch_assoc()) {

echo '
<div class="col-xl-2 col-md-4" style="--bs-gutter-y: 4.5rem; ">
<h3 Style="color:white; margin:10px">'. $row1["Name"].'</h3>
<div class="icon-box"';
if($row1['Rate'] > 0){
echo'style="  background-image: url'."('../assets/img/avatars/".$row1["ID"].".".$row1["Pic"]."')".'" >      
</br>   </br>   </br> 
<h3 style="margin:55px 0 0 0;font-size: 15px; "><a Style="color:white;margin: 5px;"  ><strong style="
font-size: x-large;
">'. $row1["rate"].'</strong>✮</a><a >'. $row1["FirstName"]. " " . $row1["LastName"].'</a></h3> </div>
</div>';
    
}
else{
echo'> </div>
</div>';}
}
}

  
echo' </br>  </br>
 
</div></div>
</section>


          
         </div>';




}
?>

<script>
  function Hide() {

   var x = document.getElementById("LastMonths");


    x.style.display = "none";
}
function Show() {
  var x = document.getElementById("LastMonths");

    x.style.display = "block";
}
</script>


       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
     
   <!-- Vendor JS Files -->
   <script src="../asset/vendor/purecounter/purecounter.js"></script>
   <script src="../asset/vendor/aos/aos.js"></script>
   <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="../asset/vendor/glightbox/js/glightbox.min.js"></script>
   <script src="../asset/vendor/isotope-layout/isotope.pkgd.min.js"></script>
   <script src="../asset/vendor/swiper/swiper-bundle.min.js"></script>
   <script src="../asset/vendor/php-email-form/validate.js"></script>
 
   <!-- Template Main JS File -->
   <script src="../asset/js/main.js"></script>
 
 </body>
 
 </html>
 
 