<!DOCTYPE html>
 
<html lang = "en">

<head> 
	<title> Dunder Mifflin </title>
	<meta charset = "utf-8"/> 
	<style>

	.button {
	  border: none;
	  padding: 15px 32px;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 16px;
	  font-family: "Georgia", Times, serif;
	  margin: 4px 2px;
	  cursor: pointer;
	  border-radius: 15px;
	  border-inline: solid;
	}
	</style>	
	<link rel="stylesheet" href="stylesheet2.css" type="text/css"/>

</head>
 
<body>

	<div class = "box" position = "absolute">
	<form method = "post" >
		<table id = "form">
			<th id="th1">
				<br>
			<div class = "title"> <img src = "logo.jpeg"/> <h2> Dunder Mifflin Paper Company </h2></div>
			
			<br/>
				<p id = "sub"> 
					<button type = 'button' class = "button" onclick = "document.location.href = 'EmployeeLogin.php'" name = 'employee' method = 'post'
					onMouseOver = "this.style.backgroundColor = 'gray'" onMouseOut = "this.style.backgroundColor = 'white'" > Employee </button>

					<button type = 'button' class = "button" onclick = "document.location.href = 'Dmifflin.php'" name = 'customer' method = 'post'
					onMouseOver = "this.style.backgroundColor = 'gray'" onMouseOut = "this.style.backgroundColor = 'white'" > Customer </button>
				</p>
			</th>
		</table>
		
	</form>
	</div>
	
</body>
  
 </html>