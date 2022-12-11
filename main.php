

<?php include "db/db.php";

if(isset($_SESSION['Manager_ID']) && isset($_SESSION['db_user_role'])){

  if($_SESSION['logged_in']==true){

			if ($_SESSION['db_user_role'] == 2) {
				echo '<script type="text/javascript">'; 
				echo 'window.location.href = "Admin/Admin.php"';
				echo '</script>';
			  ;
				exit;			
			}
			else if ($_SESSION['db_user_role'] == 1) {
				echo '<script type="text/javascript">'; 
				echo 'window.location.href = "Manager/Home.php"';
				echo '</script>';
							  exit;			
			}
		}
  }?>

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
  <link href="asset/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="asset/vendor/aos/aos.css" rel="stylesheet">
  <link href="asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="asset/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="asset/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="asset/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="asset/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="asset/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="asset/css/style.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <style>
  
  .btn{ 
    display: inline-block;
    font-weight: 400;
    line-height: 1.53;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
        border: 1px solid transparent;
        padding: 4px;
   
        font-size: 1.3vw;
    transition: all 0.2s ease-in-out;
      background:#383a3c;
      color:white;
}
  .btn-group {
    margin: auto;
    position: relative;
    display: inline-flex;
    vertical-align: middle;

}
  </style>

</head>

<body >

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="main.php"><img src="assets/img/logo.png" ></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="asset/img/logo.png" alt="" class="img-fluid"></a>-->

    <!-- .navbar -->
    <div  class="btn-group" role="group" >
                              <button style="background:#696dff;" type="button" class="btn ">EN</button>
                             <a href="Ar/main.php"><button  type="button" class="btn">عربي</button></a>
                            </div>
      <a id="myBtn"  class="get-started-btn scrollto"style="
    display: flex;
    flex-direction: row-reverse;
"><?php


if(isset($_SESSION['Emp_ID'])){
    $query="SELECT employee.firstName,employee.LastName,employee.DepID,employee.Rate,department.Name FROM employee 
    INNER JOIN department ON department.ID =employee.DepID 
    WHERE employee.ID =".$_SESSION['Emp_ID'];
    $result = mysqli_query($connection, $query);
    if($row = mysqli_fetch_array($result)){
      $Name=$row['firstName'].' '.$row['LastName'];
      $department=$row['Name'];
      $Rate=$row['Rate'];
    

  echo'
  
      <img src="assets/img/avatars/'.$_SESSION['Emp_ID'].'.'.$_SESSION['Pic'].'" class="rateImg" style="
      width: 50px;
      height: 50px;
  " ><div>
  <div class="rateText" >'.$Name. ' </div>  
  <div class="rateText" >'.$Rate.'&#9733</div></div>
';
    

    }
  }
else
header('location: index.php');



?> </a>

    </div>
  </header><!-- End Header -->
 <!-- ======= Hero Section ======= -->

<!-- The Modal -->

  <!-- Modal content -->
  



  <a href="index.php" style="" class="xx d-flex align-items-center justify-content-center"><i class='fas fa-arrow-left zz' > </i>
 Another ID</i></a>

  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">
  <?php if($_SESSION['Department'] ==2 ){
   echo '<a target="_blank" href="https://www.canva.com/design/DAEfZVDCa_o/j5xQjskPrgMaAYsGFEcJow/view?utm_content=DAEfZVDCa_o&amp;utm_campaign=designshare&amp;utm_medium=link&amp;utm_source=publishsharelink" style="color: #fff7fb;border: 1px solid #7d0303;border-radius: 50px;padding: 10px;background: linear-gradient(274deg, rgb(120 53 53) 35%, rgb(180 107 31 / 65%) 100%);margin: 1rem auto;width: max-content;position: inherit;display: block;font-size: large;font-weight: bold;box-shadow: rgb(86 59 59 / 25%) 0px 54px 55px, rgb(0 0 0 / 12%) 0px -12px 30px, rgb(0 0 0 / 12%) 0px 4px 6px, rgb(0 0 0 / 17%) 0px 12px 13px, rgb(0 0 0 / 9%) 0px -3px 5px;">Learn more about Movenppick <img src="asset/img/click-here.jpg"  style="
   width: 27px;
">
</a>'; }
else if ($_SESSION['Department']==1){

  echo   '<a target="_blank" href="https://www.canva.com/design/DAEghbYC3zA/Vd0SlOs9jwFYjVrgP-_-eQ/view?utm_content=DAEghbYC3zA&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton" style="color: #fff7fb;border: 1px solid #7d0303;border-radius: 50px;padding: 10px;background: linear-gradient(274deg, rgb(120 53 53) 35%, rgb(180 107 31 / 65%) 100%);margin: 1rem auto;width: max-content;position: inherit;display: block;font-size: large;font-weight: bold;box-shadow: rgb(86 59 59 / 25%) 0px 54px 55px, rgb(0 0 0 / 12%) 0px -12px 30px, rgb(0 0 0 / 12%) 0px 4px 6px, rgb(0 0 0 / 17%) 0px 12px 13px, rgb(0 0 0 / 9%) 0px -3px 5px;">Learn more about Movenppick <img src="asset/img/click-here.jpg" id="cpimg" style="
  width: 27px;
">
</a>';
}
?>
      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
    




    
        <div class="col-xl-6 col-lg-8">
          <h1>Top Employees  </h1>
          <h2>&#9733; &#9733; &#9733; &#9733; &#9733; &#9733; &#9733; &#9733; &#9733;</h1>
        </div>
      </div>






      
      <div class="row gy-4  justify-content-center" id="top" data-aos="zoom-in" data-aos-delay="250">
        

       
        
        
      </br>  </br>
       
      </div></div>
   
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    
  <!-- Vendor JS Files -->
  <script src="asset/vendor/purecounter/purecounter.js"></script>
  <script src="asset/vendor/aos/aos.js"></script>
  <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="asset/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="asset/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="asset/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="asset/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="asset/js/main.js"></script>
  <script>
	$.ajax({
		url: "View_ajax.php",
		type: "POST",
		cache: false,
		success: function(data){
			$('#top').html(data); 
		}
	});
</script>
</body>

</html>

