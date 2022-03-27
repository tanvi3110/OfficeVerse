<?php 

	ini_set("display_errors", 1);
			require_once('connect.php');
			session_start();
			$StylistID = $_SESSION['ID'];
			
			if(isset($_POST['Place']))
			{
				if(empty($_POST['ClientFname']) || empty($_POST['ClientLname']) || empty($_POST['ClientID']) || empty($_POST['AppointmentID']) || empty($_POST['products']) || empty($_POST['address']))
			   {
					header("location:process3.php?Empty= Enter valid ID");
					//echo "ENTER";
			   }
			   if(!preg_match("/^[a-zA-Z]*$/", $_POST['ClientFname']) || !preg_match("/^[a-zA-Z]*$/", $_POST['ClientLname']) || !preg_match("/^[0-9]*$/", $_POST['ClientID'])  || !preg_match("/^[0-9]*$/", $_POST['AppointmentID']) || !preg_match("/^[a-zA-Z,.\s0-9]*$/",$_POST['products']) || !preg_match("/^[a-zA-Z,.\s0-9#-]*$/", $_POST['address']))
			   {
				   header("location:process3.php?Invalid= Enter valid information");
			   }
			   else
			   {
					$query1 = "select * from hackClientsRecords where Client_ID ='".$_POST['ClientID']."' and Client_First_Name = '".$_POST['ClientFname']."'and Client_Last_Name = '".$_POST['ClientLname']."'";
					$result1 = mysqli_query($con,$query1);
					
					$query2 = "select * from hackAppointmentRecords where Client_ID ='".$_POST['ClientID']."' and Appointment_ID = '".$_POST['AppointmentID']."'"; 
					$result2 = mysqli_query($con,$query2);

					if(mysqli_fetch_assoc($result1) && mysqli_fetch_assoc($result2))
					{
						$OrderN = rand();
						$place = "INSERT INTO `hackOrderRecords`(`Products_Quantity`, `Shipping_Address`, `Order_Number`, `Stylist_ID`, `Client_ID`, `Appointment_ID`) VALUES ('".$_POST['products']."','".$_POST['address']."','{$OrderN}','{$StylistID}','".$_POST['ClientID']."', '".$_POST['AppointmentID']."')";
						if(mysqli_query($con, $place))
						{
						$alert = "<script>alert('CLIENT ORDER PLACED');</script>";
						echo $alert;
						}
						else
						{
							$alert = "<script>alert('it didn't work');</script>";
							echo $alert;
						}
					}
					else
					{
						if(mysqli_fetch_assoc($result1))
						{
							$alert = "<script>alert('CLIENT FOUND!);</script>";
							echo $alert;
						}
						else
						{
							$alert = "<script>alert('CLIENT CANNOT BE FOUND. RECHECK DATA ENTERED OTHERWISE YOU NEED TO CREATE AN ACCOUNT FOR CLIENT');</script>";
							echo $alert;
						}
						if(mysqli_fetch_assoc($result2))
						{
							
						}
						else
						{
							$alert = "<script>alert('APPOINTMENT ID NOT FOUND. RECHECK DATA ENTERED FOR ERRORS OTHERWISE YOU NEED TO BOOK AN APPOINTMENT FOR CLIENT BEFORE PLACING AN ORDER.');</script>";
							echo $alert;
						}
					}
			   }
			}

?>
		<?php 
             if(@$_GET['Empty']==true){
        ?>
             <?php echo"<script>alert('You must fill in all fields');</script>"; ?>                               
        <?php
             }
        ?>
        <?php 
             if(@$_GET['Invalid']==true){
        ?>
             <?php echo "<script>alert('Enter valid information.');</script>"; ?>
        <?php
             }
        ?>
<!DOCTYPE html>
 
<html lang = "en">

<head> 
	<title> Place An Order </title>
	<meta charset = "utf-8"/> 
		
	<link rel="stylesheet" href="stylesheet2.css" type="text/css"/>
	<style>
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
		<a href = "index.html" > <img class = "cal" src="cal.jpg"> </a>
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
	<form method = "post"  action="process3.php">
		<table id = "form">
			<th id="th1">
			<div class = "title"> <h2> Dunder Mifflin: Place An Order Form</h2></div>
			<br/>
			
			<label> Customer's First Name 
					<input type = "text" placeholder = "Enter your first name"
							id = "Fname" name = "ClientFname"  title = "First name should contain only alphabets"
					>
			</label>
			
			<br/><br/>
			
			<label> Customer's Last Name 
					<input type = "text" placeholder = "Enter your last name"
							id = "Lname" name = "ClientLname" title = "Last name should contain only alphabets"
					>	
			</label>
			
			<br/><br/>
			
			<label> Customer's ID # 
					<input type = "number" placeholder = "Enter Client's ID number"
							id = "ID"	name = "ClientID"  title = "Client ID should contain numeric characters only"
					>
			</label>
			
			<br/><br/>
			
			<label> Customer Appointment ID # 
					<input type = "number" placeholder = "Enter your Appointment ID number"
							id = "ApptID"	name = "AppointmentID"  title = "Appointment ID should contain numeric characters only"
					>
			</label>
			
			<br/><br/>
			
			<label> Product Order
					<input type = "text" placeholder = "Enter all the products you might need"
							id = "products"	name = "products"  title = "All the products should be separated with commas (,) and cannot contain numeric characters"
					>
			</label>
			
			<br/>
			<br/>
			<label> Shipping Address
					<input type = "text" placeholder = "Enter the shipping address"
							id = "address"	name = "address"	title = "Shipping Address should be in the format 'house number, street address'"
					>		
			</label>
			<br/>
			<br/>

				<p id = "sub"> 
					<input type = "submit" value = "Submit"   name = "Place" > 

				</p>
			</th>
		</table>
		
</body>
  
 </html>