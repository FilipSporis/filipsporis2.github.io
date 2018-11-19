<?php
require_once ('connect.php');
$calendarErr = $personErr = $firstNameErr = $lastNameErr = $emailErr = $phoneErr = $messageErr = "";
$calendar = $person = $firstName = $lastName = $email = $email = $phone = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["calendar"])) {
    $calendarErr = "* Date and time are required";
  } else {
    $calendar = test_input($_POST["calendar"]);
  }
  
  if (empty($_POST["person"])) {
    $personErr = "*";
  } else {
    $person = test_input($_POST["person"]);
  }
    
  if (empty($_POST["firstName"])) {
    $firstNameErr = "* First name is required";
  } else {
    $firstName = test_input($_POST["firstName"]);
  }

  if (empty($_POST["lastName"])) {
    $lastNameErr = "* Last name is required";
  } else {
    $lastName = test_input($_POST["lastName"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "* Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }

   if (empty($_POST["phone"])) {
    $phoneErr = "* Phone is required";
  } else {
    $phone = test_input($_POST["phone"]);
  }

   if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }

  	if ($calendarErr == '' and $personErr == '' and $firstNameErr == '' and $lastNameErr == '' and $emailErr == '' and $calendarErr == '' and $phoneErr == '' and $phoneErr == "" ) {
  	$CreateSql = "INSERT INTO `reservations` (calendar, person, firstName, lastName, email, phone, message) VALUES ('$calendar', '$person', '$firstName', '$lastName', '$email', '$phone', '$message')";
	$res = mysqli_query($connection, $CreateSql) or die(mysqli_error($connection));
	if($res){
		$smsg = "Thank you for your reservation!";
	}
	$calendar = $person = $firstName = $lastName = $email = $email = $phone = $message = "";
}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Reservations</title>

<!-- BOOTSTRAP -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!-- CSS -->

<link rel="stylesheet" type="text/css" href="Styles/style2.css">

</head>
<body>

<div class="container-fluid">
<div class="row justify-content-center">			
    <form method="post" class="form-horizontal col-md-6 col-md-offset-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>	
		<div class="img">
		<img src="Images/logo4.png">
		</div>
		<h2 style="text-align: center;">Reservations</h2>		
		<hr>		  					    
	    <div class="input-group mb-3">
	    	<label for="input1" class="col-sm-2 control-form-label">Date and time</label>
	    	<div class="col-sm-10">	
	    		<input type="datetime-local" name="calendar" class="form-control" value="<?= $calendar ?>">
	    	<span class="error"><?php echo $calendarErr;?></span>	
			</div>
		</div>
	    
	    <div class="input-group mb-3">
		    <label for="exampleFormControlSelect1" class="col-sm-2 control-form-label">Person</label>
			<div class="col-sm-10">    
			    <select class="form-control" name="person" id="exampleFormControlSelect1">
			      <option>1</option>
			      <option>2</option>
			      <option>3</option>
			      <option>4</option>
			      <option>5</option>
			    </select>
			    <span class="error"><?php echo $personErr;?></span>
	  		</div>
	  	</div>

		
		<div class="input-group mb-3">
		    <label for="input1" class="col-sm-2 control-form-label">First name</label>
		<div class="col-sm-10">
		    <input type="text" name="firstName"  class="form-control" id="input1" placeholder="First name" value="<?= $firstName ?>">
		    <span class="error"><?php echo $firstNameErr;?></span>
		</div>
		</div>

	    <div class="input-group mb-3">
	    	<label for="inputEmail3" class="col-sm-2 col-form-label">Last name</label>
	    <div class="col-sm-10">
	      <input type="text" name="lastName" class="form-control" id="inputEmail3" placeholder="Last name" value="<?= $lastName ?>">
	      <span class="error"><?php echo $lastNameErr;?></span>
	    </div>
	  	</div>

	 	<div class="input-group mb-3">
		  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
		  <input type="text" name="email" class="form-control">
		<div class="input-group-append">
		    <span class="input-group-text" id="basic-addon2">@gmail.com</span>
		    <span class="error"><?php echo $emailErr;?></span>
		</div>
		</div>

	 	<div class="input-group mb-3">
			<label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>  
		<div class="input-group-prepend">
		   <span class="input-group-text" id="basic-addon1">+385</span>
		  </div>
		  <input type="number" name="phone" class="form-control" aria-label="Username" aria-describedby="basic-addon1" value="<?= $phone ?>">
		  <span class="error"><?php echo $phoneErr;?></span>
		</div>

		<div class="input-group mb-3">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Message</label>  <div class="input-group-prepend">
		    <span class="input-group-text">Allergies, eating habits...</span>
		  </div>
		  <textarea class="form-control" name="message" aria-label="With textarea"></textarea>
		</div>
		<div class="button">
		<a class="btn btn-primary btn-lg" href="index.html" role="button">BACK</a>
		<button type="submit" class="btn btn-primary btn-lg">BOOK</button>
		</div>
	</form>	
</div>

</body>
</html>