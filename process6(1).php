<?php 

	ini_set("display_errors", 1);
			require_once('connect.php');
			session_start();
			$StylistID = $_SESSION['ID'];
			$ClientID = $_SESSION['ClientID'];
			$OrderID = $_SESSION['OrderID'];			
					
					$query = "select * from hackOrderRecords where Client_ID ='{$ClientID}' and Order_Number = '{$OrderID}'";
					$result = mysqli_query($con,$query);
					
					if(mysqli_fetch_assoc($result))
					{
						$cancel = "DELETE FROM `hackOrderRecords` WHERE Client_ID = '{$ClientID}' and Order_Number = '{$OrderID}'";
							
						if(mysqli_query($con, $cancel)){
							
							$alert = "<script>alert('ORDER CANCELLED');</script>";
							echo $alert;
							echo "<script> document.location.href = 'process6.php' </script>";
						}
						else
						{
							$alert = "<script>alert('it didn't work');</script>";
							echo $alert;
						}
					}
					else
					{
						$alert = "<script>alert('Order Number Does not Exist For the Client. Please Check and Re-Enter Order Number');</script>";
						echo $alert;
						echo "<script> document.location.href = 'process6.php' </script>";
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