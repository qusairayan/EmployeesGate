<?php 
include "../db/db.php"; 

if(isset($_SESSION['logged_in'])) {

  if($_SESSION['logged_in'] && $_SESSION['db_user_role']==1){}
  
  
  else if ($_SESSION['db_user_role']==2){
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

    <title>Employees</title>

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
          <a href="Home.php" class="app-brand-link">
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
              <a href="Home.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-item ">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-group"></i>
                <div data-i18n="Layouts">Rate</div>
              </a>

              <ul class="menu-sub">

                <li class="menu-item ">
                  <a href="Rate.php" class="menu-link">
                    <div data-i18n="Container">Rate Employees</div>
                  </a>
                </li>
              <?php if ($_SESSION['Manager_ID'] == 1704) {
                echo '
                <li class="menu-item ">
                  <a href="RateManager.php" class="menu-link">
                    <div data-i18n="Container">Rate Managers</div>
                  </a>
                </li>
           
            ';}?>     
              </ul>
            </li>
            <?php if ($_SESSION['Manager_ID'] == 1704) {
              echo' <li class="menu-item">
              <a href="MyRates.php" class="menu-link">
                <div data-i18n="Account">My Rates <small class="text-muted"> -Employees</small></div>
              </a>
            </li>
            
            <li class="menu-item">
            <a href="MyRatesManagers.php" class="menu-link">
              <div data-i18n="Account">My Rates <small class="text-muted"> -Managers</small></div>
            </a>
          </li>';
            }

             if($_SESSION['Manager_ID'] != 1704){
              echo' 
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Department</span>
            </li>
            <li class="menu-item ">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user "></i>
                <div data-i18n="Account Settings">My Deparment</div>
              </a>
              <ul class="menu-sub">
             
                <li class="menu-item">
                  <a href="EmployeesRates.php" class="menu-link ">
                    <div data-i18n="Account">My Deparments Employees</div>
                  </a>
                </li>
                
                <li class="menu-item">
                  <a href="MyRates.php" class="menu-link">
                    <div data-i18n="Account">My Rates</div>
                  </a>
                </li>';

$MonthlyRate=FALSE;
                if(date("d") >=25 ){

                  $query="SELECT * FROM rate WHERE ManagID = '".$_SESSION['Manager_ID']."' AND MonthlyRate IS NOT NULL ";
                  $result = mysqli_query($connection, $query);
                  while($row = mysqli_fetch_array($result))
{
  $month=substr($row['MonthlyRate'], 0,7); 
if(date("Y-m") == $month){
  $MonthlyRate=TRUE;
}


}
if(!$MonthlyRate){
echo '   <li class="menu-item">
                  <a href="MonthlyRate.php" class="menu-link">
                    <div data-i18n="Account">Rate my Staff</div>
                  </a>
                </li>
                       </ul></li>';
                }
              }

            


            }
      
if($_SESSION['Manager_ID']  == 1704){
  echo'

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Reports</span>
            </li>
            <li class="menu-item open active ">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user "></i>
                <div data-i18n="Account Settings"> Reports</div>
              </a>
              <ul class="menu-sub ">
                <li class="menu-item active">
                  <a href="Report.php" class="menu-link">
                    <div data-i18n="Account">Report </div>
                  </a>
               ';
          }
        
           ?>  </li>
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
                      <img src="../assets/img/avatars/<?php echo $_SESSION['Manager_ID'];?>.jpeg" alt class="w-px-75 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" style="left: -100px;">
                    <li>
                      <a class="dropdown-item" href="Profile.php">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/<?php echo $_SESSION['Manager_ID'];?>.jpeg"  alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $_SESSION['name']; ?></span>
                            <small class="text-muted">Manager</small>
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
                      <a class="dropdown-item" href="../Login/Logout.php">
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

          
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Layout Demo -->
              <div class="layout-demo-wrapper">
                <div class="layout-demo-placeholder" style="width: 100%;">


                <div class="card">
                <div class="table-responsive text-nowrap">







<form action="Report_Fetch.php" method="get">

                <div class="row" style="--bs-gutter-x: 0;     padding-bottom: 25vh;" >
                    <div class="col-12">
                      <div class="card mb-4">
                        <h5 class="card-header">Status Report</h5>
                        <div class="card-body demo-vertical-spacing demo-only-element">
                          <div class="input-group">
                              
                            <label class="input-group-text" for="inputGroupSelect01">Periods:</label>
                            <select class="form-select" name="period" required="required">
                              <option value="1">Last Month</option>
                              <option value="2">Last 2 Months</option>
                              <option value="3">Last 3 Months</option>
                              <option value="4">Last 4 Months</option>

                            </select>
                          </div>
                          <div class="input-group">
                              
                              <label class="input-group-text" for="inputGroupSelect01">Branch:</label>
                              <select class="form-select" name="Branch" required="required" >
                                <option value="1">Aqaba City</option>
                                <option value="2">Tala Bay</option>
                               
  
                              </select>
                            </div>
                          <button type="submit" style="float: right;" class="btn rounded-pill btn-primary">Submit</button>
</form>
                        </div>
                      </div>
                    </div>
                  </div>
   </div>
  

   <div class="col-lg-4 col-md-3">
                      <!-- Modal -->
                      
                     
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
  </body>
</html>



</script>