<?php 

	ini_set("display_errors", 1);
			require_once('connect.php');
			session_start();
			$StylistID = $_SESSION['ID'];
					
			if(isset($_POST['CancelOrder'])){
				if(empty($_POST['ClientID']) || empty($_POST['OrderID']))
			   {
					header("location:process6.php?Empty= Enter valid ID");
					//echo "ENTER";
			   }
			   if(!preg_match("/^[0-9]*$/", $_POST['ClientID']) || !preg_match("/^[0-9]*$/", $_POST['OrderID']))
			   {
				   header("location:process6.php?Invalid= Enter valid information");
			   }
			   else
			   {
					$_SESSION['ClientID'] = $_POST['ClientID'];
					$_SESSION['OrderID'] = $_POST['OrderID'];
				   
					echo "<script>
					var check = confirm(\"You are about to Cancel an order. Are you sure you want to Cancel an order?\");
					if(check == true){
						window.location.href = \"process6(1).php\";
					}
					else{
						window.location.href = \"StylistHome.html\";
					}
					</script>";
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
	<title> Cancel An Order </title>
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
	
	<form method = "post"   action = "process6.php" >
		<table id = "form">
			<th id="th1">
			<div class = "title"> <h2> Dunder Mifflin: Cancel An Order Form</h2></div>
			<br/>
					
			<label> Customer's ID # 
					<input type = "number" placeholder = "Enter Client's ID number"
							id = "ID"	name = "ClientID" 
					>
			</label>
			
			<br/><br/>
			
			<label> Customer Order # 
					<input type = "number" placeholder = "Enter your Order ID number"
							id = "OrderID"	name = "OrderID" 
					>
			</label>
					
			<br/>
			<br/>

				<p id = "sub"> 
					<input type = "submit" value = "Submit"   name = "CancelOrder" > 
				</p>
			</th>
		</table>
		
	</form>
	</div>
	
</body>
  
 </html>