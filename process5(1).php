<?php 

	ini_set("display_errors", 1);
			require_once('connect.php');
			session_start();
			$StylistID = $_SESSION['ID'];
			$ClientID = $_SESSION['ClientID'];
			$ApptID = $_SESSION['ApptID'];
			
					$query = "select * from hackAppointmentRecords where Client_ID ='{$ClientID}' and Appointment_ID = '{$ApptID}'";
					$result = mysqli_query($con,$query);
					
					if(mysqli_fetch_assoc($result))
					{
						$cancel = "DELETE FROM `hackAppointmentRecords` WHERE Client_ID = '{$ClientID}' and Appointment_ID = '{$ApptID}'";
							
						if(mysqli_query($con, $cancel)){
							$alert = "<script>alert('CLIENT APPOINTMENT CANCELLED');</script>";
							echo $alert;
							echo "<script> document.location.href = 'process5.php' </script>";
						}
						else
						{
							$alert = "<script>alert('it didn't work');</script>";
							echo $alert;
						}
					}
					else
					{
						$alert = "<script>alert('Either Appointment ID or Client ID Does Not Exist. Please Check and Re-Enter Order Number');</script>";
						echo $alert;
						echo "<script> document.location.href = 'process5.php' </script>";
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