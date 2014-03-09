<?php

//email and subject line
$email_to = "updip.tech@gmail.com";
$email_subject = "Attention: Serendipity Contact Form";
	

// define variables and set to empty values
$firstNameErr = $lastNameErr = $phoneErr = $timeErr = $messageErr = $captchaErr = "";
$firstName = $lastName = $phone = $email = $time = $message = $captcha = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if (empty($_POST["firstname"])) {
    $firstNameErr = "First name is required";
  }
  else {
    $firstName = test_input($_POST["firstname"]);
	   // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name))
      {
      $firstNameErr = "Only letters and white space allowed";
      }
  }
	
  if (empty($_POST["lastname"])) {
  	$lastNameErr = "Last name is required";
  }
  else {
    $lastName = test_input($_POST["lastname"]);
  }
  
  if (empty($_POST["phone"])) {
  	$phoneErr = "Phone number is required";
  }
  else {
    $phone = test_input($_POST["phone"]);
  }
  
  $email = test_input($_POST["email"]); //not required
  
  if (empty($_POST["time"])) {
    $timeErr = "Best time to contact is required";
  }
  else {
  	$time = test_input($_POST["time"]);
  }
  
  if (empty($_POST["message"])) {
  	$messageErr = "Message is required";
  }
  else {
    $message = test_input($_POST["message"]);
  }
  
  if (empty($_POST["captcha"])) {
  	$captchaErr = "Captcha is required";
  }
  else {
    $captcha = test_input($_POST["captcha"]);
  }
  
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

	?>
	
<html>
	<body>
		Welcome, <?php echo $firstName; ?>
</html>