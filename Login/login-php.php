


<?php include "../db/db.php"; ob_start(); 

if (isset($_POST['login']) ) {
	$username = $_POST['ID'];
	$password = md5($_POST['password']);

	$query = "SELECT login.Manager_ID,login.password,login.RoleID,manager.DepID,manager.FirstName,manager.LastName,manager.Pic,manager.Position
	 FROM login
	INNER JOIN manager ON manager.ID=login.Manager_ID
	 WHERE Manager_ID = '$username '";
	$select_user = mysqli_query($connection,$query);

	if (!$select_user) {
		die("Query Failed" . mysqli_error($connection));
	}
if ($row = mysqli_fetch_assoc($select_user)) {
	

	$Department=$row['DepID'];
	$_SESSION['Dep']=$Department;
	$_SESSION['Position']=$row['Position'];
    $_SESSION['Department']=$Department[0];
		$db_username = $row['Manager_ID'];
		$db_name = $row['FirstName']." ".$row['LastName'];
		$db_Pic = $row['Pic'];
		$db_user_password = $row['password'];
		$db_user_role = $row['RoleID'];
		$_SESSION['db_user_role']= $row['RoleID'];
		
		if($username === $db_username && $password === $db_user_password) {

			$_SESSION['Manager_ID'] = $db_username;
			$_SESSION['name']=$db_name;
			$_SESSION['Pic']=$db_Pic;
			$_SESSION['logged_in']=true;

			if ($db_user_role == 2) {
				echo '<script type="text/javascript">'; 
				echo 'window.location.href = "../Admin/Admin.php"';
				echo '</script>';
			  ;
				exit;			
			}
			else if ($db_user_role == 1) {
				echo '<script type="text/javascript">'; 
				echo 'window.location.href = "../Manager/Home.php"';
				echo '</script>';
							  exit;			
			}
		}
		else {
			header("Location: Login.php");
			$_SESSION['incorecct']=true;
			exit;
		}
		
	}
	else {
		header("Location: Login.php");
		$_SESSION['incorecct']=true;
		exit;
	}
}
?>