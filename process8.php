<?php 

	ini_set("display_errors", 1);
			require_once('connect.php');
			session_start();
			$StylistID = $_SESSION['ID'];
			
			if(isset($_POST['Book'])){
				if(empty($_POST['ClientFname']) || empty($_POST['ClientLname']) || empty($_POST['ClientID']) || empty($_POST['appointment']) || empty($_POST['DandT']) )
			   {
					header("location:process8.php?Empty= Enter all fields");
			   }
			   if(!preg_match("/^[a-zA-Z]*$/", $_POST['ClientFname']) || !preg_match("/^[a-zA-Z]*$/", $_POST['ClientLname']) || !preg_match("/^[0-9]*$/", $_POST['ClientID']) || !preg_match("/^[a-zA-Z,.\s]*$/",$_POST['appointment']) || !preg_match("/^[\/a-zA-Z0-9,:\s]*$/", $_POST['DandT']))
			   {
				   header("location:process8.php?Invalid= Enter valid information");
			   }
			   else
			   {
					$query="select * from hackClientsRecords where Client_ID ='".$_POST['ClientID']."' and Client_First_Name = '".$_POST['ClientFname']."'and Client_Last_Name = '".$_POST['ClientLname']."'";
					$result=mysqli_query($con,$query);

					if(mysqli_fetch_assoc($result))
					{
						$ApptID = rand();
						$book = "INSERT INTO `hackAppointmentRecords`(`Appointment_Type`, `Date_Time`, `Stylist_ID`, `Client_ID`, `Appointment_ID`) VALUES ('".$_POST['appointment']."', '".$_POST['DandT']."', '{$StylistID}','".$_POST['ClientID']."', '{$ApptID}' )";
						if(mysqli_query($con, $book))
						{
						$alert = "<script>alert('CLIENT APPOINTMENT PLACED');</script>";
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
						$alert = "<script>alert('CLIENT CANNOT BE FOUND. RECHECK DATA ENTERED OTHERWISE YOU NEED TO CREATE AN ACCOUNT FOR CLIENT');</script>";
						echo $alert;
					}
			   }
			}

?>
<?php 
             if(@$_GET['Empty']==true){
        ?>
             <?php echo "<script>alert('You must fill in all fields');</script>"; ?>                               
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
	<title> Book An Appointment </title>
	<meta charset = "utf-8"/> 
		
	<link rel="stylesheet" href="stylesheet2.css" type="text/css"/>
	<style>
		.cal{
		float: right;
		width: 4.4%;
		margin-right: 50px;
		position:  relative;
	}
	.avail{
		color: black;
		font-size: 25px;
		margin-top: 20px
	}
	.link{
		border: solid;
		background-color: white;

	}
	</style>

</head>
 
<body>
	
	
	<div align="center" class = "avail"> <a href = "index.html" target="_blank" class = "link"><strong> CHECK AVAILABILITY </strong></a> </div>
	<div class = "box" position = "absolute">
		<br>
	
	<form method = "post"  action="process8.php">
		<table id = "form">
			<th id="th1">
			<div class = "title"> <h2> Dunder Mifflin: Book An Appointment Form</h2></div>
			<br/>
			
			<label> Customer's First Name 
					<input type = "text" placeholder = "Enter your first name"
							id = "Fname" name = "ClientFname" title = "First name should contain only alphabets"
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
					<input type = "number" placeholder = "Enter your ID number"
							id = "ID"	name = "ClientID" title = "Client ID should contain numeric characters only"
					>
			</label>
			
			<br/><br/>
			
			<label> Appointment Type 
					<input type = "text" placeholder = "Enter the type of your Appointment"
							id = "type"	name = "appointment" title = "Appointments should be separated with commas (,) and cannot contain numeric characters"
					>
					
			</label>
			
			<br/>
			<br/>
			<label> Date and Time
					<input type = "text" placeholder = "Enter the Date and Time of your appointment"
							id = "DandT"	name = "DandT"	title = "Date should in the format 'mm/dd/yyyy'"
					>		
			</label>
			<br/>
			<br/>

				<p id = "sub"> 
					<input type = "submit" value = "Submit"   name = "Book" id = "back"> 
					<button type = 'button' onclick = "document.location.href = 'mainLogin.php'" name = 'SearchAcc' method = 'post' id = "back"> 
          			BACK 
          			</button>

				</p>
			</th>
		</table>
		
	</form>
	</div>
	
</body>
  
 </html>