

<?php include "../db/db.php";

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







  <section id="hero" class="d-flex align-items-center justify-content-center" style="padding:0px;">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
    




    
        <div class="col-xl-6 col-lg-8">
          <h1>Top Employees  </h1>
          <h2 style="font-size:40px;">✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮</h1>
        </div>
      </div>






      
      <div class="row gy-4  justify-content-center" id="top" data-aos="zoom-in" data-aos-delay="250">
        

        
      </br>  </br>
       
      </div></div>
   
      
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
