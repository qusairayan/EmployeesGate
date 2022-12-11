<?php
include '../db/db.php';
ob_start(); 
if(isset($_SESSION['Manager_ID']) && isset($_SESSION['db_user_role'])){

  if($_SESSION['logged_in']==true){

			if ($_SESSION['db_user_role'] == 2) {
				echo '<script type="text/javascript">'; 
				echo 'window.location.href = "../Admin/Admin.php"';
				echo '</script>';
			  ;
				exit;			
			}
			else if ($_SESSION['db_user_role'] == 1) {
				echo '<script type="text/javascript">'; 
				echo 'window.location.href = "../Manager/Home.php"';
				echo '</script>';
							  exit;			
			}
		}
  }
 
if(isset($_GET['firID'])){

  $ID=$_GET['ID'];
  $query="Select * from employee where ID ='$ID'";
  $result = mysqli_query($connection, $query);
  if($row = mysqli_fetch_array($result)){
    $Department=$row['DepID'];
    $_SESSION['Department']=$Department[0];
    $_SESSION['Emp_ID']=$row['ID'];
    $_SESSION['Pic']=$row['Pic'];
    $_SESSION['FirstName']=$row['firstName'];
    $_SESSION['LastName']=$row['LastName'];
    $_SESSION['EmpName']=$row['firstName'].' '.$row['LastName'];
    $_SESSION['Rate']=$row['Rate'];

    header('location: Employee.php');
  }

  else  {
    $query="Select ID,DepID from manager where ID = $ID";
    $result = mysqli_query($connection, $query);
    if($row = mysqli_fetch_array($result)) {
      $Department=$row['DepID'];
      $_SESSION['Department']=$Department[0];
      $_SESSION['Manager_ID']=$row['ID'];
      echo '<script type="text/javascript">'; 
      echo 'window.location.href = "../Manager/Home.php"';
      echo '</script>';
          }
      else  {
        $_SESSION['incorrectID']=true;      }


  
}
}
?>
<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <title>Home </title>

    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="../assets/img/TitleLogo.PNG" />

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

<style>
body{
  
  background: url(../assets/img/backgrounds/background.jpg) no-repeat center center fixed ; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}



$items: 2;
$animation-time: 19s;
$transition-time: 10.5s;
$scale: 20%;

$total-time: ($animation-time * $items);
$scale-base-1: (1 + $scale / 100%);
{
  font-family: sans-serif;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%
}

body { margin: 0 }


/* main css */

.slideshow {
  position: absolute;
  width: 100vw;
  height: 100vh;
  overflow: hidden;
}
@media only screen and (max-width: 640px){
.slideshow {
  background-image: url('../assets/img/backgrounds/background.jpg');
  background-size: cover;
background-position: center;
background-repeat: no-repeat;
}

}

.slideshow-image {
  width: 100%;
  height: 100%;
  background: no-repeat 50% 50%;
  background-size: cover;
  -webkit-animation-name: kenburns;
  animation-name: kenburns;
  -webkit-animation-timing-function: linear;
  animation-timing-function: linear;
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-duration: 10s;
  animation-duration: 10s;
  opacity: 1;
  -webkit-transform: scale(1.2);
  transform: scale(1.2);
}

.slideshow-image:nth-child(1) {
  background-image: url('../asset/img/background1.jpg');
  -webkit-animation-name: kenburns-1;
  animation-name: kenburns-1;
  z-index: 3;
}
@media only screen and (max-width: 640px){

.slideshow-image:nth-child(1) {
  
  background-image: url('../asset/img/background.jpg');
  -webkit-animation-name: kenburns-1;
  animation-name: kenburns-1;
  z-index: 3;
}
}

.slideshow-image:nth-child(2) {
  -webkit-animation-name: kenburns-2;
  animation-name: kenburns-2;
  z-index: 2;
}


 @-webkit-keyframes 
kenburns-1 {  0% {
 opacity: 1;
 -webkit-transform: scale(1.2);
 transform: scale(1.2);
}
 1.5625% {
 opacity: 1;
}
 23.4375% {
 opacity: 1;
}
 26.5625% {
 opacity: 0;
 -webkit-transform: scale(1);
 transform: scale(1);
}
 100% {
 opacity: 0;
 -webkit-transform: scale(1.2);
 transform: scale(1.2);
}
 98.4375% {
 opacity: 0;
 -webkit-transform: scale(1.21176);
 transform: scale(1.21176);
}
 100% {
 opacity: 1;
}
}
 @keyframes 
kenburns-1 {  0% {
 opacity: 1;
 -webkit-transform: scale(1.2);
 transform: scale(1.2);
}
 1.5625% {
 opacity: 1;
}
 23.4375% {
 opacity: 1;
}
 26.5625% {
 opacity: 0;
 -webkit-transform: scale(1);
 transform: scale(1);
}
 100% {
 opacity: 0;
 -webkit-transform: scale(1.2);
 transform: scale(1.2);
}
 98.4375% {
 opacity: 0;
 -webkit-transform: scale(1.21176);
 transform: scale(1.21176);
}
 100% {
 opacity: 1;
}
}
@-webkit-keyframes 
kenburns-2 {  23.4375% {
 opacity: 1;
 -webkit-transform: scale(1.2);
 transform: scale(1.2);
}
 26.5625% {
 opacity: 1;
}
 48.4375% {
 opacity: 1;
}
 51.5625% {
 opacity: 0;
 -webkit-transform: scale(1);
 transform: scale(1);
}
 100% {
 opacity: 0;
 -webkit-transform: scale(1.2);
 transform: scale(1.2);
}
}
@keyframes 
kenburns-2 {  23.4375% {
 opacity: 1;
 -webkit-transform: scale(1.2);
 transform: scale(1.2);
}
 26.5625% {
 opacity: 1;
}
 48.4375% {
 opacity: 1;
}
 51.5625% {
 opacity: 0;
 -webkit-transform: scale(1);
 transform: scale(1);
}
 100% {
 opacity: 0;
 -webkit-transform: scale(1.2);
 transform: scale(1.2);
}
}
.styles{
    width: 100%;
   -moz-border-radius: 4px;
   -webkit-border-radius: 4px;
   border-radius: 4px;
   -moz-background-clip: padding;
   -webkit-background-clip: padding-box;
   background-clip: padding-box;
   background-color: ##10101026;
   color:#BFBFBF;
   outline: none;
   input-align: center;
  
}

.abs-centered {
  height: 50%;
  text-align: center;
  margin-top: auto;
    margin-right: 0;
    margin-bottom: auto;
    margin-left: auto;
        position: absolute;
    bottom: 0;
    left: 0;
    top: 0;
    right: 0;
    display: flex;
    flex-direction: column;
    align-items: center;

}
.inp {

  background: #282828;
  width:70%;
  height:3.3rem;
  border-radius: 20px;

  text-align: center;
  margin: auto;
 
    bottom: 0;
    left: 0;
    top: 0;
    right: 0;
    display: flex;    
    flex-direction: row;
    align-items: center;

    }
    input{
      outline:none;
      border:0;
  background: #282828;
  color:#bfbfbf;
  text-align: center;
  border-radius: 20px;
    font-size: larger;
    font-family: ui-monospace;
      height:2.80rem;
      width:96%;
      margin:auto;
    }
    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.butt{ 
   color:#bfbfbf;
  cursor:pointer;
  background:none;
  border:none;
  }
  .btn{ color:white;
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
    padding: 0.4375rem 1.25rem;
    font-size: 0.9375rem;
    border-radius: 0.375rem;
    transition: all 0.2s ease-in-out;
    background: center;

  }
  .btn-group {
    margin: auto;
    position: relative;
    display: inline-flex;
    vertical-align: middle;

}

.alert {
  font-weight: 100;
    font-family: "Sofia", sans-serif;
    line-height: 1.8rem;
    font-size: xx-large;
    top: 65vh;
    position: relative;
    background-color: #10101099;
    color: white;
    text-align: center;
    border-radius: 10px;
     }

     .hide {
       display: none;
     }
    
</style>

<body>




<div class="slideshow">
  <div class="slideshow-image " style="  "></div>

</div>




<div >
<div style="display: flex;width:100%;     height: 13vh;
text-align: center; background: #282828cf;position: relative;align-items: center;">
<div>
<a href="index.php">       <img src="../assets/img/logo.png" style="width:12rem;">
</a></div>
<div class="btn-group" role="group">
<a href="../index.php"> <button type="button" class="btn ">EN</button></a>
                             <button style="background:#696dff;" type="button" class="btn">عربي</button>
                            </div>
    </div>                      </div>

                             
<div style="
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: center;
">

<Form>
<div class="styles abs-centered">

<div class="inp">
<input  name="ID" type="number" placeholder="أدخل رقمك الوظيفي" />
<button class="butt" type="submit" name="firID">
<i style="color: #a8aaac;font-size: 3.0rem;" class='bx bxs-right-arrow-circle'></i></button>

</div>
<?php
if(isset($_SESSION['incorrectID'])){
if($_SESSION['incorrectID']){
echo'
<h2 style="margin: 0 0 50px 0;text-align: center;color: #ff1515">
*** Incorrect ID ***</h2>
';
$_SESSION['incorrectID']=false;
}}
?>
</div></Form>


 <div class='alert'>مرحبًا بك في بوابة الموظفين اليومية لتقييم أدائك ومهاراتك إتجاه كل ضيف
  </div>

  </div>

  </body>
</html>


