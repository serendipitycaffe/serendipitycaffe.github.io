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
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <link rel="stylesheet" href="stylesheets/stylesheet.css" media="screen"/>
  <link rel="stylesheet" href="stylesheets/pygment_trac.css"/>
  <link rel="stylesheet" href="stylesheets/contact.css"/>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="javascripts/script.js"></script>

  <title>Contact</title>
  <meta name="description" content="Where good things happen">

  <meta name="viewport" content="width=device-width,initial-scale=1">

</head>

<body>

<?php echo "Hello"; ?>

 <!-- <div class="wrapper">
    <header id="header">
		<img src="images/dipsunsidewhitemid.png">
    </header>
    <div id="container">
    	<div id="location">
      		<p class="info"><span class="strong">Address:</span> 160 South Main Avenue, Warrenton, OR 97146<br />
      			<span class="strong">Phone:</span> (503) 861-0222</p></div>
      	<div id="hours">
      		<p class="info"><span class="strong">Hours:</span> Open every day<br />
      			6:30 am - 3 pm</p></div>
      
      <div id="main" role="main">
        <div class="download-bar">
        <div class="inner">
          <div class="button"><a href="index.html">Home</a></div>
          <div class="button"><a href="menu.html">Menu</a></div>
          <div class="button"><a href="catering.html">Catering</a></div>
          <div class="button"><a href="contact.html">Contact</a></div>
        </div>
        <span class="blc"></span><span class="trc"></span>
        </div>
        <article class="markdown-body">
          <h2>
<a name="serendipity-caffe" class="anchor" href="#serendipity-caffe"><span class="octicon octicon-link"></span></a>Serendipity Caffe: Contact Us</h2>

<div id="inputs">
	<form name="contact" method="post" action="contact.php">
	
 		<table class="contact">
          <tr>
                 
             <td><label for="firstname"><span class="strong">First Name
             	<span class="error">* <?php echo $firstNameErr;?></span>
             	</span></label></td></tr>
             <tr><td><input type="text" name="firstname" placeholder="John" value="" size="30" /></td>
              </tr>
             <tr>
           	 <td><label for="lastname"><span class="strong">Last Name
           	 	<span class="error">* <?php echo $lastNameErr;?></span>
           	 	</span></label></td></tr>
                <tr><td><input type="text" name="lastname" placeholder="Doe" value="" size="30" /></td>
              </tr>
                      
                <tr>
                <td><label for="phone"><span class="strong">Phone
                	<span class="error">* <?php echo $phoneErr;?></span>
                	</span></label></td></tr>
                <tr><td><input name="phone" type="text" placeholder="555-555-5555" value="" size="30" /></td>
                </tr>
                                
                <tr>
                <td><label for="email"><span class="strong">E-mail</span></label></td></tr>
               <tr><td><input name="email" type="email" placeholder="myname@example.com" value="" size="30" /></td>
               </tr>
                
                                
                <tr>
                 <td><label for="time"><span class="strong">Preferred Time To Contact
                 	<span class="error">* <?php echo $timeErr;?></span>
                 	</span></label></td></tr>
                 <tr><td><input name="time" type="text" placeholder="Between 9am and 5pm" value="" size="30" /></td>
                 </tr>
                 
                 <tr>
                 	<td><label for="message"><span class="strong">Message:
                 		<span class="error">* <?php echo $messageErr;?></span>
                 		</span></label></td></tr>
                 	<tr><td><textarea name="message" placeholder="Enter your message here"></textarea></td>
                 </tr>
                                
                 <tr>
                 <td><label for="captcha"><span class="strong">Add these numbers:
                 	<span class="error">* <?php echo $captchaErr;?></span>
                 	</span><br />5 + 2 =</label></td></tr>
                 <tr><td><input type="text" name="captcha" /></td>
                </tr>
                  <tr>
                 <tr><td colspan="2"><input type="submit" name="button" id="button" value="Submit" />
                  <input type="reset" name="button2" id="button2" value="Reset" />
                   </td>
                   </tr>
                  </table>	

                </form>
</div>

<div id="gmap_canvas"></div> -->

	<!-- Source code from embed-google-map.com -->
<!--	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<div id="map">
		
		<script type="text/javascript">
		function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(46.16418220000001,-123.9249031),mapTypeId: google.maps.MapTypeId.ROADMAP};
		map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
		marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(46.16418220000001, -123.9249031)});
		infowindow = new google.maps.InfoWindow({content:"<div style='position:relative;line-height:1.34;overflow:hidden;white-space:nowrap;display:block;'><div style='margin-bottom:2px;font-weight:500;'>Serendipity Caffe</div><span>160 South Main Avenue <br> 97146 Warrenton</span></div>" });
		google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
		</script>
		
	</div>
	
        </article>
      </div>
    </div>
    
    <footer>
      <div class="owner">

      <p><a href="https://www.facebook.com/serendipitycaffe" class="avatar"><img src="images/facebook.png" width="48" height="48"/></a>For special offers, <a href="https://www.facebook.com/serendipitycaffe">like us</a> on Facebook</p>

      </div>
      <div class="creds">
        <small>This page generated using <a href="http://pages.github.com/">GitHub Pages</a><br/>theme by <a href="https://twitter.com/jonrohan/">Jon Rohan</a></small>
      </div>
    </footer>
  </div>
  <div class="current-section">
    <a href="#top">Scroll to top</a>
    <a href="https://github.com/serendipitycaffe/serendipitycaffe.github.io/tarball/master" class="tar">tar</a><a href="https://github.com/serendipitycaffe/serendipitycaffe.github.io/zipball/master" class="zip">zip</a><a href="" class="code">source code</a>
    <p class="name"></p>
  </div>
-->
  
</body>
</html>