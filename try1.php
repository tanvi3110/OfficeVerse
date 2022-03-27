	<?php
			//echo "hello";
			ini_set("display_errors", 1);
			require_once('connect.php');
			session_start();
			
			$SFname = $SLname = $SPW = $SID = $SPNum = $SEmail = '';
			
			if(isset($_POST['Login'])){
				if(empty($_POST['StylistFname']) || empty($_POST['StylistLname']) || empty($_POST['StylistPW']) || empty($_POST['StylistID']) || empty($_POST['StylistphoneN']) )
			   {
					header("location:customerLogin.php?Empty= Enter valid ID");
			   }
			   else
			   {
				   $SFname = $_POST['StylistFname'];
				   $SLname = $_POST['StylistLname'];
				   $SPW = $_POST['StylistPW'];
				   $SID = $_POST['StylistID'];
				   $SPNum = $_POST['StylistphoneN'];
				   $trans = $_POST['dropdown'];
				   //$SEmail = $_POST[''];
				   
					$query="select * from hackStylistsRecords where Stylist_ID_Number ='".$_POST['StylistID']."' and Stylist_First_Name = '".$_POST['StylistFname']."'and Stylist_Last_Name = '".$_POST['StylistLname']."'and Stylist_Password = '".$_POST['StylistPW']."'";
					//$query="select * from StylistsRecords where Stylist_ID_Number ='".$_POST['StylistID']."'";
					$result=mysqli_query($con,$query);

					if(mysqli_fetch_assoc($result))
					{
						$_SESSION['ID'] = $_POST['StylistID'];
						$_SESSION['dropdown']=$_POST['dropdown'];
						if($trans == "Employee Account Information"){
							header("location:process1.php");
						}
						else if($trans == "Book a Customer's Appointment" || $trans == "Book an Appointment"){
							header("location:process2.php");
						}
						else if($trans == "Place a Customer's Order" ){
							header("location:ConfirmAppointment.html");
						}
						else if($trans == "Update a Customer's Order" ){
							header("location:process4.php");
						}
						else if($trans == "Cancel a Customer's Appointment" || $trans == "Cancel an Appointment"){
							header("location:process5.php");
						}
						else if($trans == "Cancel a Customer's Order" ){
							header("location:process6.php");
						}
						else if($trans == "Create a New Customer Account" ){
							header("location:process7.php");
						}
					}
					else
					{
						header("location:customerLogin.php?Invalid= Please Enter Correct Information");
					}
			   }
			}
		?>
		<?php 
             if(@$_GET['Empty']==true){
        ?>
             <?php echo $_GET['Empty'] ?>                               
        <?php
             }
        ?>
        <?php 
             if(@$_GET['Invalid']==true){
        ?>
             <?php echo $_GET['Invalid'] ?>
        <?php
             }
        ?>