<?php
session_start();
?>

<!DOCTYPE html>
<html lang = "en">
 <head>
 <title> Records </title>
 <meta charset = "utf-8" />
 <link rel="stylesheet" href="stylesheet2.css" type="text/css"/>
 <style type = "text/css">
	table {
	border-collapse: collapse;
	width: 100%;
	font-family: monospace;
	text-align: left;
	font-size: 20px;
	border-style: solid;
	margin-left: auto;
	margin-right: auto;
	}
	th,tr{
		background-color: #686868;
		color:black;
		border-style: solid;
		text-align: center;
	}
	tr:nth-child(even){
		background-color: #ededed;
	}
	body {
		background-image: url(paper.jpg);
		background-size: cover;
		opacity: 0.9;
	}

	.cal{
		float: right;
		width: 4.4%;
		margin-right: 50px;
		position:  relative;
	}
 </style>
 
 
 </head>
 <body>
 <div class = "top">
 	<a href = "index.html" target="_blank"> <img class = "cal" src="cal.jpg"> </a>
	<h3 id = "toolbar" > | <a href="StylistHome.html" > Home </a>| 
						   <a href="EmployeeLogin.php" > Log in </a> |
						   <a href="process1.php" > Search Employee's Records </a> |
						   <a href="process2.php" > Make Appointment </a> |  
						   <a href="process3.php" > Place Order </a> |
						   <a href="process4.php" > Update Order </a> |
						   <a href="process5.php" > Cancel Appointment </a> |
						   <a href="process6.php" > Cancel Order </a> |
						   <a href="process7.php" > Create Customer Account </a> |
	</h3>
	</div>
	
<div class = "box" position = "absolute">

		<table>
			<th id="th2">
			<div class = "title"> <h2> Dunder Mifflin Employee Records </h2></div>
			<br/></th>
		</table>
	</div> 
 
 </br></br>
 
 <?php
		//echo $_SESSION['dropdown'];
		$transac = $_SESSION['dropdown'];
		$StylistID = $_SESSION['ID'];
		ini_set("display_errors", 1);
		include('connect.php');
		
        $q = "SELECT s.Stylist_First_Name, s.Stylist_Last_Name, s.Stylist_ID_Number, s.Stylist_Phone_Number, s.Stylist_Email_Address, 
			c.Client_First_Name, c.Client_Last_Name, c.Client_ID, a.Appointment_Type, 
			a.Date_Time, a.Appointment_ID, 
			o.Products_Quantity, o.Shipping_Address, o.Order_Number
			FROM hackOrderRecords o 
			JOIN hackStylistsRecords s ON o.Stylist_ID = s.Stylist_ID_Number
			JOIN hackClientsRecords c ON o.Client_ID = c.Client_ID
			JOIN hackAppointmentRecords a ON o.Appointment_ID = a.Appointment_ID
			WHERE s.Stylist_ID_Number = '".$StylistID."'";
			
		$r = mysqli_query($con, $q);
		
		echo '<table border=\"1\">';
		echo '<tr><th>' . "Employee First Name" . "</th><th>" . "Employee Last Name" . "</th><th>" . "Employee ID" . "</th><th>" . "Employee Phone Number" . 
		"</th><th>" . "Employee Email" . "</th><th>" . "Customer First Name" . "</th><th>" . "Customer Last Name" . "</th><th>" . "Customer ID" . 
		"</th><th>" . "Appointment Type" . "</th><th>" . "Date and Time" . "</th><th>" . "Appointment ID" . "</th><th>" . "Product" . "</th><th>" . "Shipping Address" . "</th><th>" . "Order Number" . "</th></tr>";
			while ($row = mysqli_fetch_array($r)){
				echo "<tr><td>" . $row["Stylist_First_Name"] . "</td><td>" . $row["Stylist_Last_Name"] . "</td><td>" . $row["Stylist_ID_Number"] . "</td><td>" . $row["Stylist_Phone_Number"] . 
				"</td><td>" . $row["Stylist_Email_Address"] . "</td><td>" . $row["Client_First_Name"] . "</td><td>" . $row["Client_Last_Name"] . "</td><td>" . $row["Client_ID"] . 
				"</td><td>" . $row["Appointment_Type"] . "</td><td>" . $row["Date_Time"] . "</td><td>" . $row["Appointment_ID"] . "</td><td>" . $row["Products_Quantity"] . 
				"</td><td>" . $row["Shipping_Address"] . "</td><td>" . $row["Order_Number"] . "</td></tr>";
		}
		echo '</table>';
   
?>

 
 </body>
</html> 
