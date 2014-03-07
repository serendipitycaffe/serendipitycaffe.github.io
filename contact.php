<!doctype html>
<!-- The Time Machine GitHub pages theme was designed and developed by Jon Rohan, on Feb 7, 2012. -->
<!-- Follow him for fun. http://twitter.com/jonrohan. Tail his code on http://github.com/jonrohan -->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <link rel="stylesheet" href="stylesheets/stylesheet.css" media="screen"/>
  <link rel="stylesheet" href="stylesheets/pygment_trac.css"/>
  <link rel="stylesheet" href="stylesheets/contact.css"/>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="javascripts/script.js"></script>
  
  <?php

	//email and subject line
	$email_to = "updip.tech@gmail.com";
	$email_subject = "Attention: Serendipity Contact Form";

	//if user has clicked submit
	if(isset($_POST['submit'])) {
		if(isset($_POST['firstname']) || isset($_POST['lastname']) || isset($_POST['phone']) || isset($_POST['time']) || isset($_POST['message']) || isset($_POST['captcha'])) {
		
		$first_name = $_POST['firstname']; // required
	  	$last_name = $_POST['lastname']; // required
	  	$phone = $_POST['phone']; // required
   		$email_from = $_POST['email']; // not required
    	$time = $_POST['time']; // required
    	$client_message = $_POST['message']; // required
    	$captcha = $_POST['captcha']; //required
    
    	//validate input
    	$val_first_name = eregi('[^a-z]', $first_name);
		if($val_first_name == TRUE) {
			echo "Sorry, you must only enter letters for a name.";
		}
	
		$val_last_name = eregi('[^a-z]', $last_name);
		if($val_last_name == TRUE) {
			echo "Sorry, you must only enter letters for a name.";
		}
	
		$val_phone = eregi('[0-9]{3}-[0-9]{3}-[0-9]{4}', $phone);
		if($val_phone == FALSE) {
			echo "Sorry, please enter your phone number in the following format: 555-555-5555";
		}
	
		//if email provided, validate email
		if($email_from == '') {
			$val_email = FALSE;
		}
		else if($email_from != '') {
			$val_email = eregi('[a-z0-9][@]{1}[a-z0-9][.][a-z.]{2,}', $email_from);
			if($val_email == TRUE) {
				echo "Sorry, your email must be in the following format: myname@example.com";
			}
		}

		//add something to validate the time
	
		//do we need to validate the client message?
	
		$val_captcha = eregi('[^7]', $captcha);
		if($val_captcha == TRUE) {
			echo "Sorry, you have not entered the correct solution for the captcha.";
		}
		
		if($val_first_name == TRUE && $val_last_name == TRUE && $val_phone == TRUE && $val_email == FALSE && $val_captcha == TRUE) {
				
			$email_message = "Form details below.\n\n";
 			function clean_string($string) {
 			$bad = array("content-type","bcc:","to:","cc:","href");
 			return str_replace($bad,"",$string);
			}
			
 			$email_message .= "First Name: ".clean_string($first_name)."\n";
    		$email_message .= "Last Name: ".clean_string($last_name)."\n";
			$email_message .= "Telephone: ".clean_string($phone)."\n";
			$email_message .= "Email: ".clean_string($email_from)."\n";
			$email_message .= "Best Time To Contact: ".clean_string($time)."\n";
			$email_message .= "Message: ".clean_string($client_message)."\n";
 
			// create email headers
 			$headers = 'From: '.$email_from."\r\n".
 			'Reply-To: '.$email_from."\r\n" .
 			'X-Mailer: PHP/' . phpversion();
			
			//send form to email
 			if(mail($email_to, $email_subject, $email_message, $headers)) {
 				echo "Thank you for contacting us!  A representative will contact you shortly.";
 			}
			else {
				echo "Sorry, something went wrong.  Please try again.";
			}
	}	
	}
	
		else {
			echo "Sorry, you have not filled out all the required fields.";
		}
	}
	?>

  <title>Contact</title>
  <meta name="description" content="Where good things happen">

  <meta name="viewport" content="width=device-width,initial-scale=1">

</head>

<body>

  <div class="wrapper">
    <header id="header">
		<img src="images/dipsunsidewhitemid.png">
    </header>
    <div id="container">
    	<div id="location">
      		<p class="info"><span class="strong">Address:</span> 160 South Main Avenue, Warrenton, OR 97146<br />
      			<span class="strong">Phone:</span> (503)861-0222</p></div>
      	<div id="hours">
      		<p class="info"><span class="strong">Hours:</span> Open every day<br />
      			6:30 am - 3 pm</p></div>
      
      <div id="main" role="main">
        <div class="download-bar">
        <div class="inner">
          <div class="button"><a href="index.html">Home</a></div>
          <div class="button"><a href="menu.html">Menu</a></div>
          <div class="button"><a href="catering.html">Catering</a></div>
          <div class="button"><a href="contact.php">Contact</a></div>
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
                 
             <td><label for="firstname"><span class="strong">First Name*</span></label></td></tr>
             <tr><td><input type="text" name="firstname" placeholder="John" value="" size="30" /></td>
              </tr>
             <tr>
           	 <td><label for="lastname"><span class="strong">Last Name*</span></label></td></tr>
                <tr><td><input type="text" name="lastname" placeholder="Doe" value="" size="30" /></td>
              </tr>
                      
                <tr>
                <td><label for="phone"><span class="strong">Phone*</span></label></td></tr>
                <tr><td><input name="phone" type="text" placeholder="555-555-5555" value="" size="30" /></td>
                </tr>
                                
                <tr>
                <td><label for="email"><span class="strong">E-mail</span></label></td></tr>
               <tr><td><input name="email" type="email" placeholder="myname@example.com" value="" size="30" /></td>
               </tr>
                
                                
                <tr>
                 <td><label for="time"><span class="strong">Preferred Time To Contact*</span></label></td></tr>
                 <tr><td><input name="time" type="text" placeholder="Between 9am and 5pm" value="" size="30" /></td>
                 </tr>
                 
                 <tr>
                 	<td><label for="message"><span class="strong">Message:</span></label></td></tr>
                 	<tr><td><textarea name="message" placeholder="Enter your message here"></textarea></td>
                 </tr>
                                
                 <tr>
                 <td><label for="captcha"><span class="strong">Add these numbers:</span><br />5 + 2 =</label></td></tr>
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

<div id="gmap_canvas"></div>

	<!-- Source code from embed-google-map.com -->
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
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

      <p><a href="https://www.facebook.com/serendipitycaffe" class="avatar"><img src="images/facebook.png" width="48" height="48"/></a>Serendipity Caffe's <a href="https://www.facebook.com/serendipitycaffe">Facebook page</a></p>

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

  
</body>
</html>
