<?php 

	ini_set("display_errors", 1);
			require_once('connect.php');
			session_start();
			//$StylistID = $_SESSION['ID'];
			$ClientID = $_SESSION['ClientID'];
			$OrderID = $_SESSION['OrderID'];
			$newOrder = $_SESSION['newOrder'];
					$query = "select * from hackOrderRecords where Client_ID ='{$ClientID}' and Order_Number = '{$OrderID}'";
					$result = mysqli_query($con,$query);
					
					if(mysqli_fetch_assoc($result))
					{
						//write query
						$update = "UPDATE `hackOrderRecords` SET Products_Quantity = '{$newOrder}' WHERE Client_ID = '{$ClientID}' and Order_Number = '{$OrderID}'";
						if(mysqli_query($con, $update))
						{
							$alert = "<script>alert('ORDER UPDATED');</script>";
							echo $alert;
							echo "<script> document.location.href = 'process4.php' </script>";
						}
						else
						{
							$alert = "<script>alert('it didn't work');</script>";
							echo $alert;
						}
					}
					else
					{
						$alert = "<script>alert('Either Data Entered for Client ID or Order Number is Incorrect. Please Check the Client ID and Order Number Entered or that the Order was Placed by Searching Records of the Photographer');</script>";
						echo $alert;
						echo "<script> document.location.href = 'process4.php' </script>";
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
