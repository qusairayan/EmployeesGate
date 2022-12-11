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

$result = mysqli_query($connection, "SELECT *,employee.ID as empID from employee
INNER JOIN department on department.ID = employee.DepID
      WHERE employee.ID='" . $_SESSION['Emp_ID']. "'");
$row = mysqli_fetch_array($result);

$dep=$row['Name'];
$empID=$row["empID"];
$Pic=$row['Pic'];
$firstname=$row["firstName"];
$lastname=$row["LastName"];


if (isset($_POST['save'])) {



    $managIDS=$_POST['managID'];
    $firstnameS=$_POST['first_name'];  
    $lastnameS=$_POST['last_name'];  

       
    $extension=pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
    $fileName = $_FILES['img']['name'];
    $tempName = $_FILES['img']['tmp_name'];
    
    if(isset($fileName))
    {
        if(!empty($fileName))
        {
            $location = "../assets/img/avatars/";
            if(move_uploaded_file($tempName, $location.$managIDS.'.'.$extension))
            {
                $query="UPDATE `employee` SET 
                firstName = '".$firstnameS."',LastName='".$lastnameS."',Pic='".$extension."'
 WHERE `employee`.`ID` = ".$_SESSION['Emp_ID'].";";
 if(mysqli_query($connection,$query)){
  echo '<script type="text/javascript">'; 
  echo 'alert("Your information updated successfully ✓ ");'; 
  echo 'window.location.href = "Profile.php";';
  echo '</script>';


 $_POST = array();                  
}
else{
 if(mysqli_errno($connection) == 1062){
     echo '<script>alert("Duplicated ID ( '.$managIDS.' ) entred ")</script>';
     $_POST = array();}
 else{
  echo '<script>alert("Employee information update failed  Error ( '.mysqli_errno($connection).' ) ")</script>';
  $_POST = array();
}

}
 }
        
     
    }
    



else{
    
    $query='UPDATE employee SET 
    firstName = "'.$firstnameS.'",LastName="'.$lastnameS.'"
WHERE ID = '.$_SESSION['Emp_ID'].';';


    if(mysqli_query($connection,$query)){
      
        echo '<script type="text/javascript">'; 
        echo 'alert("Your information updated successfully ✓ ");'; 
        echo 'window.location.href = "Profile.php";';
        echo '</script>';
      
       $_POST = array();                  
    }
    else{
       if(mysqli_errno($connection) == 1062){
           echo '<script>alert("Duplicated ID ( '.$managIDS.' ) entred ")</script>';
           $_POST = array();}
       else{
        echo '<script>alert("Employee information update failed  Error ( '.mysqli_errno($connection).' ) ")</script>';
        $_POST = array();
    }

    }
}
    }
}
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
        
           <li class="menu-item "  >
             <a href="Employee.php" class="menu-link">
               <i class="menu-icon tf-icons bx bx-home-circle"></i>
               <div data-i18n="Analytics">Dashboard</div>
             </a>
           </li>

           <!-- Layouts -->
           <li class="menu-item ">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
               <i class="menu-icon tf-icons bx bxs-user"></i>
               <div data-i18n="Layouts">Profile</div>
             </a>

             <ul class="menu-sub">

               <li class="menu-item ">
                 <a href="Profile.php" class="menu-link">
                   <div data-i18n="Container">Edit My Profile</div>
                 </a>
               </li>
               
             </ul>
           </li>

           <li class="menu-item active open">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-group"></i>
                <div data-i18n="Layouts">Rate</div>
              </a>

              <ul class="menu-sub">

                <li class="menu-item active">
                  <a href="Rate.php" class="menu-link">
                    <div data-i18n="Container">Rate Managers</div>
                  </a>
                </li>
                
              </ul>
            </li>
           <li class="menu-header small text-uppercase">
             <span class="menu-header-text">Learn About Mövenpick </span>
           </li>
           <li class="menu-item">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
           <i class="menu-icon tf-icons bx bxs-book-reader"></i>
               <div data-i18n="Account Settings">Mövenpick <?php if( $_SESSION['Department'] == 1 ){ echo' Aqaba City </div> </a>
             <ul class="menu-sub">
               <li class="menu-item">
               <a href=https://www.canva.com/design/DAEghbYC3zA/Vd0SlOs9jwFYjVrgP-_-eQ/view?utm_content=DAEghbYC3zA&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton" target=”_blank” class="menu-link">
                   <div data-i18n="Account">Knowing your MP Aqaba City</div>';} else 
                   {
                    echo' Tala Bay </div>
             </a>
             <ul class="menu-sub">
               <li class="menu-item">
               <a href="https://www.canva.com/design/DAEfZVDCa_o/j5xQjskPrgMaAYsGFEcJow/view?utm_content=DAEfZVDCa_o&utm_campaign=designshare&utm_medium=link&utm_source=publishsharelink" target=”_blank” class="menu-link">
                   <div data-i18n="Account">Knowing your MP TalaBay</div>';}?>
                 </a>
               </li>
               <li class="menu-item">
                 <a href="ACCOR-Ethics-and-Corporate-Social-Responsibility.html" target=”_blank” class="menu-link">
                   <div data-i18n="Account">Ethics and Corporate Social Responsibility</div>
                 </a>
               </li>
               <li class="menu-item">
                 <a href="https://issuu.com/yahya123456789/docs/employee_handbook_-_mp_tala_bay_2022" target=”_blank” class="menu-link">
                   <div data-i18n="Account">Employee Handbook</div>
                 </a>
               </li>
            
             </ul>

           </li>

           <div class="logout">
            
            <a href="../index.php" class="menu-link " style="padding:.6rem">
              <i class="bx bx-power-off me-2"></i>
              <div >Logout</div>
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
        
             <div class="navbar-nav align-items-center"  style="width: 100%;">
                <div class="nav-item d-flex align-items-center" style="width: 100%;">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input type="text" class="form-control border-0 shadow-none" name="search_text" id="search_text" placeholder="Search by Manager Details" aria-label="Search..." style="background:transparent;">


                </div>
              </div>
              <!-- /Search -->

             <ul class="navbar-nav flex-row align-items-center ms-auto">
               <!-- Place this tag where you want the button to render. -->
               

               <!-- User -->
               <li class="nav-item navbar-dropdown dropdown-user dropdown">
                 <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                   <div class="avatar avatar-online">
                     <img src="../assets/img/avatars/<?php echo  $empID.'.'. $Pic;?>" alt class="w-px-75 h-auto rounded-circle" />
                   </div>
                 </a>
                 <ul class="dropdown-menu dropdown-menu-end">
                   <li>
                     <a class="dropdown-item" href="Profile.php">
                       <div class="d-flex">
                         <div class="flex-shrink-0 me-3">
                           <div class="avatar avatar-online">
                             <img src="../assets/img/avatars/<?php echo $empID.'.'. $Pic;?>"  alt class="w-px-40 h-auto rounded-circle" />
                           </div>
                         </div>
                         <div class="flex-grow-1">
                           <span class="fw-semibold d-block"><?php echo $firstname.' ' . $lastname; ?></span>
                           <small class="text-muted"><?php echo $dep;?></small>
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
                       <span class="align-middle">My Profile</span>
                     </a>
                   </li>
                  
                   <li>
                     <div class="dropdown-divider"></div>
                   </li>
                   <li>
                     <a class="dropdown-item" href="../index.php">
                       <i class="bx bx-power-off me-2"></i>
                       <span class="align-middle">Log Out</span>
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


                <div class="card">
                <h5 class="card-header">Search manager to rate</h5>
                <div class="table-responsive text-nowrap">









                <div id="result" class="table-responsive" style="height: 400px">


    </div>
   </div>
  

   <div class="col-lg-4 col-md-3">
                      <!-- Modal -->
                      
                      <!-- Modal -->
                      <div class="modal fade" id="modalScrollable" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                          <div class="modal-content" style="border-radius: 19px;     background-color: #233446;">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalScrollableTitle" style="    font-size: 30px;
    color: #8e91fc;"> <i class="bx bxs-message-alt-add"></i></h5>


                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="  background-color: #233446;">
                            </button>
                            </div>
                            <div class="modal-body">
                             



                           <form action="SubmitRate.php" method="Post" enctype="multipart/form-data" >
                              
                              <h4 id="deleteName" style="color: #8e91fc"></h4>
                              <input type="hidden" name ="ManagerID" id="ManagerID"/>


                              <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="../../assets/img/avatars/0000.jpeg" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                        <div class="button-wrapper">
                       
                    <br>
                    <input type="hidden" name="efirstname" id="eFirstName">
                    <input type="hidden" name="elastname" id="elastname">
                           
                    <div class="rating">
                       <input type="radio" name="Rate" value="5" id="5" onclick="javascript: return false;" >
                    <label for="5">☆</label> <input type="radio" name="Rate" value="4" id="4" onclick="javascript: return false;" >
                    <label for="4">☆</label> <input type="radio" name="Rate" value="3" id="3"onclick="javascript: return false;" >
                    <label for="3">☆</label> <input type="radio" name="Rate" value="2" id="2" onclick="javascript: return false;" >
                    <label for="2">☆</label> <input type="radio" name="Rate" value="1" id="1" onclick="javascript: return false;" >
                    <label for="1">☆</label> </div>
                    <br>
                       
                    <select  name="category" id="category"  onchange="check()" required class="selectNative js-selectNative" 
                    style="width:100%">
                            <option value="" disabled selected hidden>Category..</option>
                          <option value="Supporting the well-being employees">Supporting the well-being employees</option>
                          <option value="Encouraging to learn and grow">Encouraging to learn and grow</option> 
                          <option value="Ensuring the fairness between employees">Ensuring the fairness between employees</option>
                          <option value="Giving opportunity to create HEARTIST">Giving opportunity to create HEARTIST</option>
                          <option value="Appreciation and recognition">Appreciation and recognition</option>
                          <option value="Encouraging diversity">Encouraging diversity</option>
                          <option value="Clear expectations and goals together">Clear expectations and goals together</option>
                          <option value="Positive Orientation">Positive Orientation</option>
                          <option value="Developing an Empowered Team">Developing an Empowered Team</option>
                          <option value="Leading the Team (Encourages and empower)">Leading the Team (Encourages and empower)</option> 
                           <option value="Enabling the Team (manages the performance of the team)">Enabling the Team (manages the performance of the team)</option>
                          <option value="Problem Solving and Decision Making">Problem Solving and Decision Making</option>
                          <option value="Visible and accessible to employees">Visible and accessible to employees</option>
                          <option value="Demonstrating care and concern for employees">Demonstrating care and concern for employees</option>
                          <option value="Welcome to new idea">Welcome to new idea</option>
                          <option value="Open and transparency in communication">Open and transparency in communication</option>
         
                        </select>

                        </div>
                      </div>
                    
                      <br>
                        <hr style="border:1px solid rgb(231 208 8)">
<br>
                        <div class="input-group input-group-merge">
                       
                        <textarea name="user_review" id="user_review"  class="form-control" style="color:white; background: #2f3a3f;"  placeholder="Rate Details..." required></textarea>
                      </div>
                       
                         
                        
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Cancel
                              </button> 


                              <button type="submit" name="addRate" id="addRate" class="btn btn-primary"> Rate</button></form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="demo-inline-spacing">
                        <!-- Button trigger modal -->
                        

                   
                      </div>
                    </div>

<script>


$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"Fetch_Manager.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});

updateList = function() {
  var input = document.getElementById('upload');
  var output = document.getElementById('uploadlist');

    output.innerHTML = input.files.item(0).name ;
  
}



function check(){
 
if(document.getElementById('category').value=='Supporting the well-being employees'){

document.getElementById(2).checked = true;


 
}
else if(document.getElementById('category').value=='Encouraging to learn and grow') { 
   document.getElementById(3).checked = true;

}



else if(document.getElementById('category').value=='Ensuring the fairness between employees') { 
   document.getElementById(2).checked = true;

}


else if(document.getElementById('category').value=='Giving opportunity to create HEARTIST') { 
   document.getElementById(4).checked = true;

}

else if(document.getElementById('category').value=='Appreciation and recognition') { 
   document.getElementById(3).checked = true;

}
else if(document.getElementById('category').value=='Encouraging diversity') { 
   document.getElementById(2).checked = true;

}

else if(document.getElementById('category').value=='Clear expectations and goals together') { 
   document.getElementById(2).checked = true;

}

else if(document.getElementById('category').value=='Positive Orientation') { 
   document.getElementById(3).checked = true;

}
else if(document.getElementById('category').value=='Developing an Empowered Team') { 
   document.getElementById(3).checked = true;

}
else if(document.getElementById('category').value=='Leading the Team (Encourages and empower)') { 
   document.getElementById(3).checked = true;

}
else if(document.getElementById('category').value=='Enabling the Team (manages the performance of the team)') { 
   document.getElementById(3).checked = true;

}else if(document.getElementById('category').value=='Problem Solving and Decision Making') { 
   document.getElementById(4).checked = true;

}else if(document.getElementById('category').value=='Visible and accessible to employees') { 
   document.getElementById(3).checked = true;

}else if(document.getElementById('category').value=='Demonstrating care and concern for employees') { 
   document.getElementById(3).checked = true;

}else if(document.getElementById('category').value=='Welcome to new idea') { 
   document.getElementById(3).checked = true;

}else if(document.getElementById('category').value=='Open and transparency in communication') { 
   document.getElementById(4).checked = true;

}
}





</script>

</div>
           
                    
                   
                     
                 



                  
             
                
              </div>
              <!--/ Layout Demo -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made by
                  <a target="_blank" class="footer-link fw-bolder">QA</a>
                </div>
                
              </div>
            </footer>
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