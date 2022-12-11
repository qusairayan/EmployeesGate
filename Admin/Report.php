<style>@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600);

*, *:before, *:after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  background: #105469;
  font-family: 'Open Sans', sans-serif;
}
table {
  background: #012B39;
  border-radius: 0.25em;
  border-collapse: collapse;
  margin: auto;
}
th {
  border-bottom: 1px solid #364043;
  color: #E2B842;
  font-size: 0.85em;
  font-weight: 600;
  padding: 0.5em 1em;
  text-align: left;
}
td {
  color: #fff;
  font-weight: 400;
  padding: 0.65em 1em;
}
.disabled td {
  color: #4F5F64;
}
tbody tr {
  transition: background 0.25s ease;
}
tbody tr:hover {
  background: #014055;
}
a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}

a:hover {
  background-color: #ddd;
  color: black;
}

.previous {
  background-color: #012b39;;
  color: white;
  border-radius: 50px;
  margin: 0.2rem;
}

</style>
<body>
  <div>
<a style="
    float: right;
"  class="previous" onclick="window.print()">Print this page</a>
<a href="index.php" class="previous">&laquo; Back</a>
</div>
<table>
  <thead>
    <tr>
      <th>#
      <th>ID
      <th>Name
      <th>Deparment
      <th>Rate
     
    
  </thead>
  <tbody>

<?php include "../db/db.php"; 
if(isset($_SESSION['logged_in'])) {

  if($_SESSION['logged_in'] && $_SESSION['db_user_role']==2){



if(isset($_GET['period'])){
  $myDate = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-".$_GET['period']." month" ) );
  $query="SELECT  employee.ID AS 'emplID', employee.firstName,employee.LastName ,department.Name FROM employee 
INNER JOIN department ON department.ID = employee.DepID
WHERE DepID LIKE '".$_GET['Branch']."%'
"  ;
$result = $connection ->query($query);
$i=1;
                              while($row = mysqli_fetch_array($result))
                             {
                              $query1="SELECT * from rate WHERE date_time <= CURDATE() AND
                               date_time >='" . $myDate . "' AND EmpID ='".$row['emplID']."'";
                              $result1 = $connection ->query($query1);

                                $x=0;
                                while($row1 = mysqli_fetch_array($result1)){

                                  $x=$x + $row1['Rate'];
                                }



                                echo '

    <tr>
      <td>'.$i++.'
      <td>'.$row['emplID'].'
      <td>'.$row['firstName'].' '.$row['LastName'].'
      <td>'.$row['Name'].'
      <td>'.$x.'
    
     
 
 ';
}
echo ' </tbody>
</table>';
}
  }
  else{
    echo '<script type="text/javascript">'; 
    echo 'window.location.href = "../Login/Login.php"';
    echo '</script>';
  }
  }
  else{
    echo '<script type="text/javascript">'; 
    echo 'window.location.href = "../Login/Login.php"';
    echo '</script>';
  }
  
  ?>