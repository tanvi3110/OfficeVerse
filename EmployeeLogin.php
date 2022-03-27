<!DOCTYPE html>
 
<html lang = "en">

<head> 
	<title> Dunder Mifflin </title>
	<meta charset = "utf-8"/> 
		
	<link rel="stylesheet" href="stylesheet2.css" type="text/css"/>

</head>
 
<body>

	<div class = "box" position = "absolute">
	<form method = "post" onsubmit = "required()" action="try1.php">
		<table id = "form">
			<th id="th1">
			<div class = "title"> <h2> Dunder Mifflin </h2></div>
			<br/>
			
			<label> Employee's First Name 
					<input type = "text" placeholder = "Enter your first name"
							id = "Fname" name = "StylistFname" 
					>

			</label>
			
			<br/><br/>
			
			<label> Employee's Last Name 
					<input type = "text" placeholder = "Enter your last name"
							id = "Lname" name = "StylistLname"	
					>
					
			</label>
			
			<br/><br/>
			
			<label> Employee's Password 
					<input type = "password" placeholder = "Enter your Password"
							id = "PW"	name = "StylistPW"
							title = "Your password should contain maximum of 10 characters and must have atleast one uppercase letter, one special character, and one numeric character"
					>
					
			</label>
			
			<br/><br/>
			
			<label> Employee's ID # 
					<input type = "number" placeholder = "Enter your ID number"
							id = "ID"	name = "StylistID" 
					>
					
			</label>
			
			<br/><br/>
			
			<label> Employee's Phone # 
					<input type = "text" placeholder = "Enter your Phone Number"
							id = "phoneN"	name = "StylistphoneN" 
					>
					
			</label>
			
			<br/>
			<br/>
			<label> Employee's Email 
					<input type = "text" placeholder = "Enter your Email Address"
							id = "email"	name = "email"
							
					>
					
			</label>
			<br/>
			<br/>
			
			<label> <input type = "checkbox" id = "CheckBox" name = " Checkox " >
					Check the box to request an Email confirmation
			</label>
			
			<br/>
			<br/>
			
			Select a transaction: 
				<select name = "dropdown" id = "transaction" >
					<option> Choose one of the following actions </option>
					<option> Employee Account Information </option>
					<option> Book a Customer's Appointment </option>
					<option> Place a Customer's Order </option>
					<option> Update a Customer's Order </option>
					<option> Cancel a Customer's Appointment </option>
					<option> Cancel a Customer's Order </option>
					<option> Create a New Customer Account </option>
			</select>
			<br/>
			<br/>
				<p id = "sub"> 
					<input type = "submit" value = "Submit"   name = "Login" > 
					<input type = "reset" value = "Reset" />
				</p>
			</th>
		</table>
		
	</form>
	</div>
		<script >
				
		function required(){
		
			var FirstName = document.getElementById("Fname");
			var LastName = document.getElementById("Lname");
			var pw = document.getElementById("PW");
			var IDnum = document.getElementById("ID");
			var PhoneNum = document.getElementById("phoneN");
			var Email = document.getElementById("email");
			var Check = document.getElementById("CheckBox");
			var transc = document.getElementById("transaction");
			
			var FirstNameReg = /^[A-Za-z]+\s*[A-Za-z]*$/;
			var LastNameReg = /^[A-Za-z]+\s*[A-Za-z]*$/;
			var pwReg = /^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*]{0,10}$/;
			var IDnumReg = /^[0-9]{8}$/
			var PhoneNumReg = /^[0-9]{3}[-\s]?[0-9]{3}[-\s]?[0-9]{4}$/
			var EmailReg = /^[^!#$%&'*+-\/=?^_`{|].*[A-Za-z0-9!#$%&'*+-\/=?^_`{|]{1,64}[@]{1}[a-zA-Z0-9.-]+\.[a-zA-Z]{2,5}$/;
			
			//First name validation (empty and correct)
			if(FirstName.value.trim() == "" || FirstName.value == null || FirstName.value == undefined || FirstName.value.search(FirstNameReg) == -1){
				alert('Please enter your valid first name. \nYour first name cannot contain any numeric characters.');
				FirstName.style.borderColor = "red";
				return false;
			}
			else{
				FirstName.style.borderColor = "black";
			}

			//Last name validation (empty and correct)
			if(LastName.value.trim() == ""|| LastName.value == null || LastName.value == undefined || LastName.value.search(LastNameReg)== -1){
				alert('Please enter your valid last name. \nYour last name cannot contain any numeric characters.');
				LastName.style.borderColor = "red";
				return false;
			}
			else{
				LastName.style.borderColor = "black";
			}
			
			// password validation (just empty or not)
			if(pw.value.trim() == "" || pw.value==null || pw.value == undefined){
				alert('Please enter your password');
				pw.style.borderColor = "red";
				return false;
			}
			else{
				pw.style.borderColor = "black";
			}
			
			// Stylist ID number (empty and correct)
			if(IDnum.value.trim() == ""|| IDnum.value==null || IDnum.value == undefined || IDnum.value.search(IDnumReg)== -1){
				alert('Please enter your ID number. \nYour ID number should be 8 digits.');
				IDnum.style.borderColor = "red";
				return false;
			}
			else{
				IDnum.style.borderColor = "black";
			}
			
			// Phone 
			if(PhoneNum.value.trim() == ""|| PhoneNum.value==null || PhoneNum.value == undefined || PhoneNum.value.search(PhoneNumReg)== -1){
				alert('Please enter your phone number. \nYour phone number must contain 10 digits and can be separated by either space or hyphens.');
				PhoneNum.style.borderColor = "red";
				return false;
			}
			else{
				PhoneNum.style.borderColor = "black";
			}
			
			if(Check.checked == true ){
				if(Email.value.trim() == ""|| Email.value==null || Email.value == undefined){
					alert('Please enter your email address');
					Email.style.borderColor = "red";
					return false;
				}
				else{
					Email.style.borderColor = "black";
				}
			}
			
			if(transc.value == "Choose one of the following actions"){
				alert('Transaction is required. Choose one of the following actions');
				return false;
			}

			var checkNormal = /^[a-z]{0,10}$/; //only lower case letters NO Num, NO UCL, No SC
			var checkSC = /^(?=.*[!@#$%^&*])/;
			var checkNum = /^(?=.*[0-9])/;
			var checkUCL = /^(?=.*[A-Z])/;
			var maxLen = 10;
			
			if(pw.value.search(pwReg)== -1){
			console.log(pw.value);
				if(pw.value.length > maxLen ){
					alert('Conditions for password not met. \nThe length of your password cannot be more than 10 characters');
					return false;
				}
				if(pw.value.search(checkNormal) == 0){
					alert('Conditions for password not met. \nYou must have atleast one numeric character, one special character, and one Upper-case Letter in your password');
					pw.style.borderColor = "red";
					return false;
				}
				
				var passCheck = checkNum.test(pw.value);
				if(passCheck == false){
					alert('Conditions for password not met. \nYou must have atleast one numeric character in your password');
					pw.style.borderColor = "red";
					return false;
				}
				var passCheck = checkSC.test(pw.value);
				if(passCheck == false){
					alert('Conditions for password not met. \nYou must have atleast one special character in your password');
					pw.style.borderColor = "red";
					return false;
				}
				var passCheck = checkUCL.test(pw.value);
				if(passCheck == false){
					alert('Conditions for password not met. \nYou must have atleast one Uppercase letter in your password');
					pw.style.borderColor = "red";
					return false;
				}
				
			}
				pw.style.borderColor = "black";
		} 
		


	</script>
</body>
  
 </html>