<?php

// if the url field is empty, but the message field isn't
if(isset($_POST['url']) && $_POST['url'] == '' && $_POST['message'] != ''){

	// put your email address here
	$youremail = 'roxanne.groeneveld1@gmail.com';

	// prepare a "pretty" version of the message
	// Important: if you added any form fields to the HTML, you will need to add them here also
	$body = "This is a message submitted from the contact form on www.wheeliegoodcleaning.co.uk:
	Name:  $_POST[name]
	Address: $_POST[address]
  Postcode: $_POST[postcode]
	Phone Number: $_POST[phone]
	Number of bins: $_POST[number]
	Colour of bin(s): $_POST[colour]";

	// Use the submitters email if they supplied one
	// (and it isn't trying to hack your form).
	// Otherwise send from your email address.
	if( $_POST['email'] && !preg_match( "/[\r\n]/", $_POST['email']) ) {
	  $headers = "From: $_POST[email]";
	} else {
	  $headers = "From: $youremail";
	}

	// finally, send the message
	mail($youremail, 'Contact Form', $body, $headers );

}

// otherwise, let the spammer think that they got their message through

?>
<!DOCTYPE HTML>
<html>
<head>
<script>
function includeHTML() {
  var z, i, elmnt, file, xhttp;
  /*loop through a collection of all HTML elements:*/
  z = document.getElementsByTagName("*");
  for (i = 0; i < z.length; i++) {
    elmnt = z[i];
    /*search for elements with a certain atrribute:*/
    file = elmnt.getAttribute("include-file");
    if (file) {
      /*make an HTTP request using the attribute value as the file name:*/
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          if (this.status == 200) {elmnt.innerHTML = this.responseText;}
          if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
          /*remove the attribute, and call this function once more:*/
          elmnt.removeAttribute("include-file");
          includeHTML();
        }
      }
      xhttp.open("GET", file, true);
      xhttp.send();
      /*exit the function:*/
      return;
    }
  }
};
</script>
<div include-file="head-section.html"></div>
<title>Thanks!</title>
</head>
<body>
<div include-file="menu.html"></div>
<!-- Second Parallax Image with Logo Text -->
<div class="bgimg-2 display-container opacity-min">
  <div class="display-topmiddle" style="white-space:nowrap;">
  <img src="/images/hhclogo.png" alt="HHC Logo" class="logo" style="padding-top:20%;">
  </div>
</div>
<!-- Container (Thank You) -->
<div class="content container padding-32" id="">
    <h1>Thank you for contacting us..</h1>
    <p>We'll get back to you as soon as possible.</p>
    </br>
</div>
<!-- Footer -->
<div include-file="footer.html"></div>
 <script>
includeHTML();
</script>
</body>
</html>
