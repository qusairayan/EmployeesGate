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
  }
  if(!isset($_SESSION['Emp_ID'])){
header('location: ../index.php');}
?>

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
-->
<!-- beautify ignore:start -->
<html
 lang="en"
 class="light-style layout-menu-fixed"
 dir="ltr"
 data-theme="theme-default"
 data-assets-path="../assets/"
 data-template="vertical-menu-template-free"
>
 <head>
 

   <meta charset="utf-8" />
   <meta
     name="viewport"
     content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
   />

   <title>Rate</title>

   <meta name="description" content="" />

   <!-- Favicon -->
   <link rel="icon" type="image/x-icon" href="../assets/img/TitleLogo.PNG" />

   <!-- Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link
     href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
     rel="stylesheet"
   />

   <!-- Icons. Uncomment required icon fonts -->
   <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

   <!-- Core CSS -->
   <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
   <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
   <link rel="stylesheet" href="../assets/css/demo.css" />

   <!-- Vendors CSS -->
   <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

   <!-- Page CSS -->

   <!-- Helpers -->
   <script src="../assets/vendor/js/helpers.js"></script>

   <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
   <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
   <script src="../assets/js/config.js"></script>




   <style>
   .cross {
   padding: 10px;
   color: black;
   cursor: pointer;
   font-size: 23px;
}

.cross i {
   margin-top: -5px;
   cursor: pointer
}

.comment-box {
   padding: 5px;
   
}


.form-control:focus {

   background-color: #fff;
   border-color: yellow;
   outline: 0;
   box-shadow: 0 0 0 1px #696cff !important
}

.send {
   color: black;
   background-color: rgb(92 184 92);
   border-color:  rgb(92 184 92);
}

.send:hover {
   color: green;
   background-color: rgb(223 200 2);
   border-color: green
}

.rating {
   display: inline-flex;
   margin-top: -10px;
   flex-direction: row-reverse
}

.rating>input {
   display: none
}

.rating>label {
   position: relative;
   width: 28px;
   font-size: 35px;
   color:rgb(231 208 8);
   cursor: pointer;
   opacity: 1 !important;
}

.rating>label::before {
   content: "\2605";
   position: absolute;
   opacity: 0
}



.rating>input:checked~label:before {
   opacity: 1
}

.rating:hover>input:checked~label:before {
   opacity: 0.4
}






   .progress-label-left {
       float: left;
       margin-right: 0.5em;
       line-height: 1em;
   }

   .progress-label-right {
       float: right;
       margin-left: 0.3em;
       line-height: 1em;
   }

   .star-light {
       color: #e9ecef;
   }










   select {
 background-color:rgb(60 65 54 / 48%);
 color: #fff;
 font-size: inherit;
 padding: .5em;
 padding-right: 2.5em; 
 border: 0;
 margin: 0;
 border-radius: 3px;
 text-indent: 0.01px;
 text-overflow: '';
 -webkit-appearance: button; /* hide default arrow in chrome OSX */
 
}

</style>

 </head>

 <body>
   <!-- Layout wrapper -->
   <div class="layout-wrapper layout-content-navbar">
     <div class="layout-container">
       <!-- Menu -->

       <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
         <div class="app-brand demo">
           <a href="Employee.php" class="app-brand-link">
      <img src="../assets/img/logo.png"   style="width:12rem;">

           </a>

           <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
             <i class="bx bx-chevron-left bx-sm align-middle"></i>
           </a>
         </div>

         <div class="menu-inner-shadow"></div>

         <ul class="menu-inner py-1">
           <!-- Dashboard -->
           <li class="menu-item active open"  >
             <a href="Employee.php" class="menu-link">
               <i class="menu-icon tf-icons bx bx-home-circle"></i>
               <div data-i18n="Analytics">الرئيسية</div>
             </a>
           </li>

           <!-- Layouts -->
           <li class="menu-item">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
               <i class="menu-icon tf-icons bx bxs-user"></i>
               <div data-i18n="Layouts">الملف الشخصي</div>
             </a>

             <ul class="menu-sub">

               <li class="menu-item ">
                 <a href="Profile.php" class="menu-link">
                   <div data-i18n="Container">تعديل ملفي الشخصي</div>
                 </a>
               </li>
               
             </ul>
           </li>
           <li class="menu-item  ">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-group"></i>
                <div data-i18n="Layouts">التقييم</div>
              </a>

              <ul class="menu-sub">

                <li class="menu-item ">
                  <a href="Rate.php" class="menu-link">
                    <div data-i18n="Container">تقيم المدراء</div>
                  </a>
                </li>
                
              </ul>
            </li>
        
           <li class="menu-header small text-uppercase">
             <span class="menu-header-text">معرفة المزيد عن موفنبيك  </span>
           </li>
           <li class="menu-item">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
           <i class="menu-icon tf-icons bx bxs-book-reader"></i>
               <div data-i18n="Account Settings">موفنبيك <?php if( $_SESSION['Department'] == 1 ){ echo'العقبة </div> </a>
             <ul class="menu-sub">
               <li class="menu-item">
               <a href=https://www.canva.com/design/DAEghbYC3zA/Vd0SlOs9jwFYjVrgP-_-eQ/view?utm_content=DAEghbYC3zA&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton" target=”_blank” class="menu-link">
                   <div data-i18n="Account">أعرف منتجك</div>';} else 
                   {
                    echo' تالابيه </div>
             </a>
             <ul class="menu-sub">
               <li class="menu-item">
               <a href="https://www.canva.com/design/DAEfZVDCa_o/j5xQjskPrgMaAYsGFEcJow/view?utm_content=DAEfZVDCa_o&utm_campaign=designshare&utm_medium=link&utm_source=publishsharelink" target=”_blank” class="menu-link">
                   <div data-i18n="Account">أعرف منتجك</div>';}?>
                 </a>
               </li>
               <li class="menu-item">
                 <a href="ACCOR-Ethics-and-Corporate-Social-Responsibility.html" target=”_blank” class="menu-link">
                   <div data-i18n="Account">ميثاق الأخلاق والمسؤولية الأجتماعية لشركة أكور</div>
                 </a> 
               </li>
               <li class="menu-item">
                 <a href="https://issuu.com/yahya123456789/docs/employee_handbook_-_mp_tala_bay_2022" target=”_blank” class="menu-link">
                   <div data-i18n="Account"> دليل الموظف</div>
                 </a> 
               </li>
            
             </ul>


           </li>

           <div class="logout">
            
            <a href="../index.php" class="menu-link " style="padding:.6rem">
              <i class="bx bx-power-off me-2"></i>
              <div >الخروج</div>
            </a>

          
                 </div>
       </aside>
       <!-- / Menu -->

       <!-- Layout container -->
       <div class="layout-page">
         <!-- Navbar -->

         <nav
           class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
           id="layout-navbar"
         >
           <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
             <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
               <i class="bx bx-menu bx-sm"></i>
             </a>
           </div>

           <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse" >
             <!-- Search -->
             <div class="navbar-nav align-items-center" style="
    display: flex;
    flex-direction: row;
">
                <span>تقيمي:<?php echo ' '. $_SESSION['Rate'];?> </span><div style="color:gold; font-size:large">✮</div> 
              </div>
             <!-- /Search -->

             <ul class="navbar-nav flex-row align-items-center ms-auto">
               <!-- Place this tag where you want the button to render. -->
               

               <!-- User -->
               <li class="nav-item navbar-dropdown dropdown-user dropdown">
                 <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                   <div class="avatar avatar-online">
                     <img src="../assets/img/avatars/<?php echo  $_SESSION['Emp_ID'].'.'. $_SESSION['Pic'];?>" alt class="w-px-40 h-auto rounded-circle" />
                   </div>
                 </a>
                 <ul class="dropdown-menu dropdown-menu-end">
                   <li>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex">
                         <div class="flex-shrink-0 me-3">
                           <div class="avatar avatar-online">
                             <img src="../assets/img/avatars/<?php echo  $_SESSION['Emp_ID'].'.'. $_SESSION['Pic'];?>"  alt class="w-px-40 h-auto rounded-circle" />
                           </div>
                         </div>
                         <div class="flex-grow-1">
                           <span class="fw-semibold d-block"><?php echo $_SESSION['EmpName']; ?></span>
                           <small class="text-muted">موظف</small>
                         </div>
                       </div>
                     </a>
                   </li>
                   <li>
                     <div class="dropdown-divider" ></div>
                   </li>
                   <li>
                     <a class="dropdown-item" href="Profile.php">
                       <i class="bx bx-user me-2"></i>
                       <span class="align-middle">ملفي الشخصي</span>
                     </a>
                   </li>
                  
                   <li>
                     <div class="dropdown-divider"></div>
                   </li>
                   <li>
                     <a class="dropdown-item" href="index.php">
                       <i class="bx bx-power-off me-2"></i>
                       <span class="align-middle">الخروج</span>
                     </a>
                   </li>
                 </ul>
               </li>
               <!--/ User -->
             </ul>
           </div>
         </nav>

         
         <!-- / Navbar -->

         <!-- Content wrapper -->
         <div class="content-wrapper">
           <!-- Content -->

           <div class="container-xxl flex-grow-1 container-p-y">
             <!-- Layout Demo -->
             <div class="layout-demo-wrapper">
               <div class="layout-demo-placeholder" style="width: 100%;">


               <div>
            












<head>

  <link href="../asset/css/style.css" rel="stylesheet">

  

</head>


  <!-- ======= Header ======= -->
  
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->

<!-- The Modal -->

  <!-- Modal content -->







  <section id="hero" class="d-flex align-items-center justify-content-center" >
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
    




    
        <div class="col-xl-6 col-lg-8">
          <h1>أفضل الموظفين  </h1>
          <h2 style="margin: 25px;font-size: x-large;">✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮ ✮</h1>
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
   </div>
 

  <div class="col-lg-4 col-md-3">
                     <!-- Modal -->
         
                   
                  
                    
                



                 
            
               
             </div>
             <!--/ Layout Demo -->
           </div>
           <!-- / Content -->

           <!-- Footer -->
           
           <!-- / Footer -->

           <div class="content-backdrop fade"></div>
         </div>
         <!-- Content wrapper -->
       </div>
       <!-- / Layout page -->
     </div>

     <!-- Overlay -->
     <div class="layout-overlay layout-menu-toggle"></div>
   </div>
  
   <!-- Core JS -->
   <!-- build:js assets/vendor/js/core.js -->
   <script src="../assets/vendor/libs/jquery/jquery.js"></script>
   <script src="../assets/vendor/libs/popper/popper.js"></script>
   <script src="../assets/vendor/js/bootstrap.js"></script>
   <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

   <script src="../assets/vendor/js/menu.js"></script>
   <!-- endbuild -->

   <!-- Vendors JS -->

   <!-- Main JS -->
   <script src="../assets/js/main.js"></script>

   <!-- Page JS -->

   <!-- Place this tag in your head or just before your close body tag. -->
   <script async defer src="https://buttons.github.io/buttons.js"></script>
 </body>
</html>



</script>