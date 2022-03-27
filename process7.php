<?php 

	ini_set("display_errors", 1);
			require_once('connect.php');
			session_start();
			$StylistID = $_SESSION['ID'];
			
			if(isset($_POST['Create'])){
				if(empty($_POST['ClientFname']) || empty($_POST['ClientLname']) || empty($_POST['ClientID']))
			   {
					header("location:process7.php?Empty= Enter valid ID");
					//echo "ENTER";
			   }
			   if(!preg_match("/^[a-zA-Z]*$/", $_POST['ClientFname']) || !preg_match("/^[a-zA-Z]*$/", $_POST['ClientLname']) || !preg_match("/^[0-9]*$/", $_POST['ClientID']))
			   {
				   header("location:process7.php?Invalid= Enter valid information");
			   }
			   else
			   {
					$query = "select * from hackClientsRecords where Client_ID ='".$_POST['ClientID']."' and Client_First_Name = '".$_POST['ClientFname']."'and Client_Last_Name = '".$_POST['ClientLname']."'";
					$result = mysqli_query($con,$query);
					
					if(mysqli_fetch_assoc($result))
					{
			
						$alert = "<script>alert('CLIENT ALREADY HAS AN ACCOUNT');</script>";
						echo $alert;
					}
					else
					{
						//put query here
						$create = "INSERT INTO hackClientsRecords(Client_First_Name, Client_Last_Name, Client_ID) VALUES ('".$_POST['ClientFname']."','".$_POST['ClientLname']."','".$_POST['ClientID']."')";
						if(mysqli_query($con, $create)){
							//new account created
							$alert = "<script>alert('CLIENT ACCOUNT CREATED');</script>";
							echo $alert;
						}
						else{
							$alert = "<script>alert('it didn't work');</script>";
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
	<title> Create a new Account </title>
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
	<form method = "post"  action="process7.php">
		<table id = "form">
			<th id="th1">
			<div class = "title"> <h2> Dunder Mifflin: Create An Account Form</h2></div>
			<br/>
			
			<label> Customer's First Name 
					<input type = "text" placeholder = "Enter your first name"
							id = "Fname" name = "ClientFname" 
					>
			</label>
			
			<br/><br/>
			
			<label> Customer's Last Name 
					<input type = "text" placeholder = "Enter your last name"
							id = "Lname" name = "ClientLname"
					>	
			</label>
			
			<br/><br/>
			
			<label> Customer's ID # 
					<input type = "number" placeholder = "Enter Client's ID number"
							id = "ID"	name = "ClientID" 
					>
			</label>
			
			<br/><br/>
			
				<p id = "sub"> 
					<input type = "submit" value = "Submit"   name = "Create" > 

				</p>
			</th>
		</table>
		
</body>
  
 </html>