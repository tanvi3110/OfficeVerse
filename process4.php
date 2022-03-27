<?php 

	ini_set("display_errors", 1);
			require_once('connect.php');
			session_start();
			//$StylistID = $_SESSION['ID'];
			if($_SERVER['REQUEST_METHOD']=='POST')
			{
			if(isset($_POST['Update'])){
				if(empty($_POST['ClientID']) || empty($_POST['OrderID']) || empty($_POST['order']) )
			   {
					header("location:process4.php?Empty= Enter valid ID");
			   }
			   if(!preg_match("/^[0-9]*$/", $_POST['ClientID']) || !preg_match("/^[0-9]*$/", $_POST['OrderID']) || !preg_match("/^[a-zA-Z,.\s0-9]*$/", $_POST['order']))
			   {
				   header("location:process4.php?Invalid= Enter valid information");
			   }
			   else
			   {
				   $_SESSION['ClientID'] = $_POST['ClientID'];
				   $_SESSION['OrderID'] = $_POST['OrderID'];
				   $_SESSION['newOrder'] = $_POST['order'];
					echo "<script>
					var check = confirm(\"You are about to UPDATE an order. Are you sure you want to update an order?\");
			if(check){
				window.location.href = \"process4(1).php\";
			}
			else{
				window.location.href = \"StylistHome.html\";
			}
			</script>";
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
	<title> Update An Order </title>
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
	<!--onsubmit = "confirmUpdate()" -->
	<form method = "post"  action="process4.php" >
		<table id = "form">
			<th id="th1">
			<div class = "title"> <h2> Dunder Mifflin: Update An Order Form</h2></div>
			<br/>
					
			<label> Customer's ID # 
					<input type = "number" placeholder = "Enter Client's ID number"
							id = "ID"	name = "ClientID" 
					>
			</label>
			
			<br/><br/>
			
			<label> Customer Order # 
					<input type = "number" placeholder = "Enter your Appointment ID number"
							id = "ApptID"	name = "OrderID" 
					>
			</label>
			
			<br/><br/>
			
			<label> Products
					<input type = "text" placeholder = "Enter all the products you might need"
							id = "products"	name = "order" 
					>
			</label>
			
			<br/>
			<br/>

				<p id = "sub"> 
					<input type = "submit" value = "Submit"   name = "Update" > 

				</p>
			</th>
		</table>
		
	</form>
	</div>
	

</body>
  
</html>