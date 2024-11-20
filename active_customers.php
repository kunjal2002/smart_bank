<!-- this is a file to view the pending customers -->
<html>
<head><title>Pending Customers</title>
</head>
<link rel="stylesheet" type="text/css" href="css/active_customers.css"/>
<body>

<?php  

	include 'header.php' ;
	include 'staff_profile_header.php' ;
	include 'db_connect.php';


?>
<div class="active_customers_container">

<table border="1px" cellpadding="10">
			   <th>#</th>
			   <th>Application No.</th>
			   <th>Name</th>
			   <th>Gender</th>
			   <th>Mobile</th>
			   <th>Email</th>
			   <th>Landline</th>
			   <th>DOB</th>
			   <th>PAN</th>
			   <th>Citizenship</th>
			   <th>Home Address</th>
			   <th>Office Address</th>
			   <th>Country</th>
			   <th>State</th>
			   <th>City</th>
			   <th>Pin</th>
			   <th>Area Loc.</th>
			   <th>Nominee Name</th>
			   <th>Nominee A/c no</th>
			   <th>Accoount Type</th>
			   <th>Application Date</th>


<?php

	
	
	$sql = "SELECT * from pending_accounts";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {   
		$Sl_no = 1; 
// output data of each row
  while($row = $result->fetch_assoc()) {
	  
  echo '
	  <tr>
	  <td>'.$Sl_no++.'</td>
	  <td>'.$row['Application_no'].'</td>
	  <td>'.$row['Name'].'</td>
	  <td>'.$row['Gender'].'</td>
	  <td>'.$row['Mobile_no'].'</td>
	  <td>'.$row['Email_id'].'</td>
	  <td>'.$row['Landline_no'].'</td>
	  <td>'.$row['DOB'].'</td>
	  <td>'.$row['PAN'].'</td>
	  <td>'.$row['CITIZENSHIP'].'</td>
	  <td>'.$row['Home_Addr'].'</td>
	  <td>'.$row['Office_Addr'].'</td>
	  <td>'.$row['Country'].'</td>
	  <td>'.$row['State'].'</td>
	  <td>'.$row['City'].'</td>
	  <td>'.$row['Pin'].'</td>
	  <td>'.$row['Area_Loc'].'</td>
	  <td>'.$row['Nominee_name'].'</td>
	  <td>'.$row['Nominee_ac_no'].'</td>
	  <td>'.$row['Account_type'].'</td>
	  <td>'.$row['Application_Date'].'</td>
	  </tr>';
}


}

?>


<!-- if we want to view the active customers -->
<!-- <table border="1px" cellpadding="10">
			   <th>#</th>
			   <th>Username</th>
			   <th>Customer ID</th>
			   <th>Account No.</th>
			   <th>Mobile No.</th>
			   <th>Email ID</th>
			   <th>DOB</th>
			   <th>Current Balance</th>
			   <th>PAN</th>
			   <th>Citizenship</th>
			   <th>Debit Card No.</th>
			   <th>CVV</th>
			   <th>Last_Login</th>
			   <th>LastTransaction</th>
			   <th>Account Status</th> -->


<!-- <?php

	
	
	// $sql = "SELECT * from bank_customers";
	// $result = $conn->query($sql);
	
// 	if ($result->num_rows > 0) {	   
// 			  $Sl_no = 1; 
//     // output data of each row
// 		while($row = $result->fetch_assoc()) {
			
// 		echo '
// 			<tr>
// 			<td>'.$Sl_no++.'</td>
// 			<td>'.$row['Username'].'</td>
// 			<td>'.$row['Customer_ID'].'</td>
// 			<td>'.$row['Account_no'].'</td>
// 			<td>'.$row['Mobile_no'].'</td>
// 			<td>'.$row['Email_ID'].'</td>
// 			<td>'.$row['DOB'].'</td>
// 			<td>$'.$row['Current_Balance'].'</td>
// 			<td>'.$row['PAN'].'</td>
// 			<td>'.$row['CITIZENSHIP'].'</td>
// 			<td>'.$row['Debit_Card_No'].'</td>
// 			<td>'.$row['CVV'].'</td>
// 			<td>'.$row['Last_Login'].'</td>
// 			<td>$'.$row['LastTransaction'].'</td>
// 			<td>'.$row['Account_Status'].'</td>
// 			</tr>';
// 	}
	
	
// }

?> -->

</table>
</div>

<?php include 'footer.php'; ?> 
</body>
</html>




