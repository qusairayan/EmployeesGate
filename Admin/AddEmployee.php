<?php 


include "../db/db.php"; 
if(isset($_SESSION['logged_in'])) {
  
if($_SESSION['logged_in'] && $_SESSION['db_user_role']==2){

  
if(isset($_POST['total_chq'])){

  $total_chq=$_POST['total_chq'];
  for($i=1;$i<= $total_chq; $i++){
      $id=$_POST['ID'.$i];
      $fname=$_POST['first_name'.$i];
      $lname=$_POST['last_name'.$i];
      $dep=$_POST['Department'.$i];
  $sql="INSERT INTO employee (ID,firstName,LastName , DepID) VALUES(".$id.",'".$fname."','".$lname."','".$dep."')";
  if(mysqli_query($connection,$sql)){
    echo '<script>alert("Added '.$fname.' ' .$lname.'  successfully ✓ entred ")</script>';

  
  
  }
  else{
     if(mysqli_errno($connection) == 1062){
         echo '<script>alert("Failed to add '.$fname.' ' .$lname.'  . Duplicated ID ( '.$id.' ) entred ")</script>';
         $_POST = array();}
     else{
      echo '<script>alert("Add  employee failed. Error ( '.mysqli_errno($connection).' ) ")
      
      </script>';
  }
  
  }
  
  }      $_POST = array();

  }

if (isset($_POST['Add'])) {



    $empID=$_POST['empID'];
    $firstname=$_POST['first_name'];  
    $lastname=$_POST['last_name'];  
    $department=$_POST['Department'];



    $extension=pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
    $fileName = $_FILES['img']['name'];
    $tempName = $_FILES['img']['tmp_name'];
    
   
        if(!empty($fileName))
        {
            $location = "../assets/img/avatars/";
            if(move_uploaded_file($tempName, $location.$empID.'.'.$extension))
            {

              $query=" INSERT INTO employee (ID,firstName,LastName,DepID,Pic)  VALUES ( ".$empID.",  '".$firstname."','".$lastname."','".$department."','".$extension."')";

    

              if(mysqli_query($connection,$query)){
                  echo '<script type="text/javascript">'; 
                  echo 'alert("Employee Added successfully ✓ ");'; 
                  echo 'window.location.href = "EmpProfile.php?empIDedit='.$empID.'"';
                  echo '</script>';
          
          
                 $_POST = array();                  
              }
              else{
                 if(mysqli_errno($connection) == 1062){
                     echo '<script>alert("Duplicated ID ( '.$empID.' ) entred ")</script>';
                     $_POST = array();}
                 else{
                  echo '<script>alert("Employee add failed  Error ( '.mysqli_errno($connection).' ) ")</script>';
                  $_POST = array();
              }
          
              }

          }
        
    
    
    }
else {
 
$query="INSERT INTO employee (ID,firstName,LastName,DepID)  VALUES ( ".$empID.",  '".$firstname."','".$lastname."','".$department."')";
    

    if(mysqli_query($connection,$query)){
        echo '<script type="text/javascript">'; 
        echo 'alert("Employee Added successfully ✓ ");'; 
        echo 'window.location.href = "EmpProfile.php?empIDedit='.$empID.'"';
        echo '</script>';


       $_POST = array();                  
    }
    else{
       if(mysqli_errno($connection) == 1062){
           echo '<script>alert("Duplicated ID ( '.$empID.' ) entred ")</script>';
           $_POST = array();}
       else{
        echo '<script>alert("Employee  add failed  Error ( '.mysqli_errno($connection).$query.' ) ")</script>';
        $_POST = array();
    }

    }
}
}
}
 else if ($_SESSION['db_user_role']==1){
  echo '<script type="text/javascript">'; 
  echo 'window.location.href = "../Manager/Home.php"';
  echo '</script>';

}
else{
    echo '<script type="text/javascript">'; 
    echo 'window.location.href = "../Login/login.php"';
    echo '</script>';
}

}
else{
  echo '<script type="text/javascript">'; 
  echo 'window.location.href = "../Login/login.php"';
  echo '</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>

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

    <title>Add Employee</title>

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
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
          <a href="Admin.php" class="app-brand-link">
       <img src="../assets/img/logo.png" style="width:12rem;">

            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="Admin.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-item active open">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-group"></i>
                <div data-i18n="Layouts">Employees</div>
              </a>

              <ul class="menu-sub">

                <li class="menu-item active">
                  <a href="AddEmployee.php" class="menu-link">
                    <div data-i18n="Without navbar"> Add Employee</div>
                  </a>
                </li>
                <li class="menu-item ">
                  <a href="EditEmployees.php" class="menu-link">
                    <div data-i18n="Container">Edit Employees</div>
                  </a>
                </li>
                <li class="menu-item ">
                  <a href="DeleteGroup.php" class="menu-link">
                    <div data-i18n="Account">Delete Employees</div>
                  </a>
                </li>
                <li class="menu-item ">
                  <a href="EmployeesRates.php" class="menu-link">
                    <div data-i18n="Container">Employees' Rates</div>
                  </a>
                </li>
              </ul>
            </li>
            
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Managers</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user "></i>
                <div data-i18n="Account Settings"> Managers</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="AddManager.php" class="menu-link">
                    <div data-i18n="Account">Add Manager</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="EditManagers.php" class="menu-link">
                    <div data-i18n="Account">Edit Managers</div>
                  </a>
                </li>
                <li class="menu-item ">
                  <a href="ManagersRates.php" class="menu-link">
                    <div data-i18n="Container">Mangers Rates</div>
                  </a>
                </li>
              </ul>


            </li>

            
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Reports</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user "></i>
                <div data-i18n="Account Settings"> Reports</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="index.php" class="menu-link">
                    <div data-i18n="Account">Report </div>
                  </a>
                </li>
                   
              </ul>


</li>

<div class="logout">
            
            <a href="../Login/Logout.php" class="menu-link " style="padding:.6rem">
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

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
             
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/<?php echo $_SESSION['Manager_ID'].'.'.$_SESSION['Pic']; ?>" alt class="w-px-75 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/<?php echo $_SESSION['Manager_ID'].'.'.$_SESSION['Pic']; ?>"  alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $_SESSION['name']; ?></span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
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
                      <a href="../Login/Logout.php" class="dropdown-item" href="auth-login-basic.html">
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
                <h5 class="card-header">Add Employee </h5>
           



                <div class="col-xl-6" style="width: 95%;">
                  <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                      <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home" aria-selected="true">
                        <i class="tf-icons bx bx-user"></i>Add employee
                        </button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile" aria-selected="false">
                        <i class="bx bx-group"></i>Add employee by group
                        </button>
                      </li>
                     
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                          
                      <form method="post" action="" enctype="multipart/form-data"  >

                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="../assets/img/TitleLogo.PNG" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" name ="img" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                          </label>
                        

                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                      </div>

                 
<hr>
                        <br>
                        

                        <div class="row mb-3">


                        
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                          <div class="col-sm-10">
                           

<div class="input-group">
                        <span class="input-group-text"><i class="bx bx-user"> </i>  Frist & Last </span>
                        <input type="text" aria-label="First name" class="form-control"  name="first_name" id="first_name" required placeholder="Enter Employee's Firstname" >
                        <input type="text" aria-label="Last name" class="form-control"  name="last_name" id="last_name" required required placeholder="Enter Employee's Lastname" >
                      </div>
                                  </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="empID">ID</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text">#</span>
                              <input type="number" name="empID" id="empID" class="form-control"  required placeholder="Enter Employee's ID"  >
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" >Department</label>
                          <div class="col-sm-10">
                            
                            <div class="input-group">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            <select class="form-select" name="Department" id="Department"   required  >
                                <option disabled selected hidden value="">Enter Employee's Department</option>
                            <?php 

$result = mysqli_query($connection,  " SELECT department.ID,department.Name,department.BranchID,branch.Name AS BranName
from department INNER JOIN branch ON branch.ID=department.BranchID");

                              while($row = mysqli_fetch_array($result))
 {
  echo '<option value="'.$row["ID"].'">'.$row["Name"].' - '.$row["BranName"].'</option>';
 }
 ?>
                            </select>
                          </div>
                            <div class="form-text">Each department has different branch</div>
                          </div>
                        </div>
                   
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" name="Add" class="btn btn-primary"> Add  <i class="fas fa-check-circle"></i></button>

                        </div>
                        </div>
                     
                        </form>


                      </div>
                      <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
       
                <div class="card-body demo-vertical-spacing demo-only-element" style="
    display: flex;flex-direction: column;   justify-content: center;align-content: space-between;">
               

            <button style="background: #040032;float: right;" class="btn btn-primary" onclick="add()"><i class="bx bx-user-plus"></i></button>

<form method="post"  >
 <div class="row mb-3 table-responsive" style=" height: 55vh; " id="new_chq">
      

<label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Employee #1</label>

<div class="col-sm-10">
 

<div class="input-group">
<span class="input-group-text"><i class="bx bx-user"> </i>  Frist &amp; Last </span>
<input type="text" aria-label="First name" class="form-control" name="first_name1" id="first_name1" required="" placeholder="Enter Employee's Firstname">
<input type="text" aria-label="Last name" class="form-control" name="last_name1" id="last_name1" required="" placeholder="Enter Employee's Lastname">
</div>
<div class="input-group"><span class="input-group-text"><i class="bx bx-hash"> </i> ID </span><input type="number" aria-label="Last name" class="form-control" name="ID1" id="ID1" required="" placeholder="Enter Employee's Lastname">
</div>
<div class="input-group"><span class="input-group-text"><i class="bx bx-network-chart"> </i> Deparment </span><select class="form-select" name="Department1" id="Department1" required=""><option disabled="" selected="" hidden="" value="">Select Employee's Department</option><option value="10">Front Office - Aqaba City</option><option value="11">Housekeeping - Aqaba City</option><option value="12">Kitche - Aqaba City</option><option value="13">Stewarding - Aqaba City</option><option value="14">F&amp;B  - Aqaba City</option><option value="16">SPA - Aqaba City</option><option value="17">Recreations - Aqaba City</option><option value="18">Transportatio - Aqaba City</option><option value="19">GM Office  - Aqaba City</option><option value="110">Accounting - Aqaba City</option><option value="111">Human Resource - Aqaba City</option><option value="112">Security - Aqaba City</option><option value="113">IT - Aqaba City</option><option value="114">Laundry - Aqaba City</option><option value="115">Restaurant - Aqaba City</option><option value="116">Engineering - Aqaba City</option><option value="117">Sales - Aqaba City</option><option value="20">FRONT OFFICE - Tala Bay</option><option value="21">HOUSEKEEPING - Tala Bay</option><option value="22">KITCHEN - Tala Bay</option><option value="23">STEWARDING - Tala Bay</option><option value="24">F&amp;B - Tala Bay</option><option value="26">SPA - Tala Bay</option><option value="27">RECREATIONS - Tala Bay</option><option value="28"> - Tala Bay</option><option value="29">GM's Office  - Tala Bay</option><option value="210">ACCOUNTING - Tala Bay</option><option value="211">HUMAN RESOURCES - Tala Bay</option><option value="212">SECURITY - Tala Bay</option><option value="213">IT - Tala Bay</option><option value="216">ENGINEERING - Tala Bay</option><option value="30">L&amp;D - Managment</option></select>
</div>
  <hr>      </div>
</div>



                      <div class="col-sm-10">
                        <button type="submit" name="addEmp" class="btn btn-primary"> Add Employees  <i class="fas fa-check-circle" aria-hidden="true"></i></button>
                         <input type="hidden" value="1" id="total_chq" name="total_chq">
  <div ></div>
                    </div>
              </div>
                  

              </div>
                  </div>
                </div>
              </div>
            </div>



                    </div>
                  </div>
                </div>



</form> 

              <!--/ Layout Demo -->
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
                  <a  target="_blank" class="footer-link fw-bolder">QA</a>
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
  
    <script src="../assets/js/pages-account-settings-account.js"></script>

</body>
</html>



</script>
<?php 
       $value ='"';
$query = " SELECT department.ID,department.Name,department.BranchID,branch.Name AS BranName
from department INNER JOIN branch ON branch.ID=department.BranchID";
?>
<script>
function add(){
      var new_chq_no = parseInt($('#total_chq').val())+1;




      var new_input="<div class='row mb-3'><label class='col-sm-2 col-form-label' for='basic-icon-default-fullname'> Employee #"  + new_chq_no +"</label><div class='col-sm-10'><div class='input-group'><span class='input-group-text'><i class='bx bx-user'> </i>  Frist &amp; Last </span><input type='text' aria-label='First name' class='form-control' name='first_name"  + new_chq_no +"' id='first_name' required='' placeholder='Enter Employees Firstname'><input type='text' aria-label='Last name' class='form-control' name='last_name"  + new_chq_no +"' id='last_name"  + new_chq_no +"' required='' placeholder='Enter Employees Lastname'></div><div class='input-group'><span class='input-group-text'><i class='bx bx-hash'> </i> ID </span><input type='text' aria-label=' ID' class='form-control' name='ID"  + new_chq_no +"' id='ID"  + new_chq_no +"' required='' placeholder='Enter Employees ID'></div>      <div class='input-group'><label class='input-group-text' for='inputGroupSelect01'><i class='bx bx-network-chart'> </i> Deparment </label><select class='form-select' name='Department"  + new_chq_no +"' id='Department"  + new_chq_no +"' required=''><option disabled='' selected='' hidden='' value=''>Select Employee's Department</option><option value='10'>Front Office - Aqaba City</option><option value='11'>Housekeeping - Aqaba City</option><option value='12'>Kitche - Aqaba City</option><option value='13'>Stewarding - Aqaba City</option><option value='14'>F&amp;B  - Aqaba City</option><option value='16'>SPA - Aqaba City</option><option value='17'>Recreations - Aqaba City</option><option value='18'>Transportatio - Aqaba City</option><option value='19'>GM Office  - Aqaba City</option><option value='110'>Accounting - Aqaba City</option><option value='111'>Human Resource - Aqaba City</option><option value='112'>Security - Aqaba City</option><option value='113'>IT - Aqaba City</option><option value='114'>Laundry - Aqaba City</option><option value='115'>Restaurant - Aqaba City</option><option value='116'>Engineering - Aqaba City</option><option value='117'>Sales - Aqaba City</option><option value='20'>FRONT OFFICE - Tala Bay</option><option value='21'>HOUSEKEEPING - Tala Bay</option><option value='22'>KITCHEN - Tala Bay</option><option value='23'>STEWARDING - Tala Bay</option><option value='24'>F&amp;B - Tala Bay</option><option value='26'>SPA - Tala Bay</option><option value='27'>RECREATIONS - Tala Bay</option><option value='28'> - Tala Bay</option><option value='29'>GM's Office  - Tala Bay</option><option value='210'>ACCOUNTING - Tala Bay</option><option value='211'>HUMAN RESOURCES - Tala Bay</option><option value='212'>SECURITY - Tala Bay</option><option value='213'>IT - Tala Bay</option><option value='216'>ENGINEERING - Tala Bay</option><option value='30'>L&amp;D - Managment</option></select></div><hr></div></div></div>'";
     
     
     
                                                                                      
     
      $('#new_chq').append(new_input);
      $('#total_chq').val(new_chq_no)
    }
 
    </script>