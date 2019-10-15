<html>
<head>
    <meta charset="utf-8"/>
	<title>PHP form to email sample form</title>
<!-- define some style elements-->
<style>
label,a 
{
	font-family : cursive;
	font-size : 15px; 
}

</style>	
<!-- a helper script for vaidating the form-->

</head>
<title>
   Email Form - PHP
   
</title>

<body>

<!-- Start code for the form-->
<form method="post">
	<p>
		<label for='name'>Enter Name: </label><br>
		<input type="text" id="name" name="name">
	</p>
	<p>
		<label for='phone'>Phone Number: </label><br>
		<input type="text"id="phone" name="phone">
	</p>
	<p>
		<label for='email'>Email Address:</label><br>
		<input type="text" id="email" name="email">
	</p>
	<p>
		<label for='message'>Enter Message:</label> <br>
		<textarea name="message" id="msg"></textarea>
	</p>
	<button id="submit" name="submit">Submit</button>
	</form>
	 
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	
	

</body>
   
    <script>
        $("#submit").click(function(){
         
         var name= $("#name").val();
         var phone= $("#phone").val();
         var email= $("#email").val();
         var msg= $("#msg").val();
         
         if(name == '' || phone == ''|| email == ''|| msg == ''){
            swal({
              title: "Fields Empty!!",
              text: "Please check the missing field!!",
              icon: "warning",
              button: "Ok!",
            });
         }
         else{
             swal({
                  title: "Good job!!",
                  text: "Your request has been submitted!!",
                  icon: "success",
                  button: "Ok!",
                });
         }
         
        });
    </script>
</html>

<?php
if(isset($_POST['submit']))
{
$name = $_POST['name'];
$phone=$_POST['phone'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];

$email_from = $visitor_email;
$email_phone=$phone;
$email_subject = "New Form submission";
$email_body = "You have received a new message from the user<b><span style='color:red;font-size:18px;'> $name.</span></b>\n".'<br>'.
    "Here is the message:<b><span style='color:red;font-size:18px;'> $message.</b></span>\n\n".'<br>'.
     "phone no:<b><span style='color:red;font-size:18px;'> $phone.</b></span>\n".'<br>'.'<br>'.
$email_body= '<img src="https://ictcodes.net/logo.png" width="175" height="65" alt="logo" /><br/>';
      
$to = "remyanallat@gmail.com";//
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
$headers  .= "MIME-Version: 1.0 \r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
//Send the email!

mail($to,$email_subject,$email_body,$headers);

//done. redirect to thank-you page.


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}

// Subject of email sent to you.
$subject = 'Website Enquiry';

// Your email address. This is where the form information will be sent.
$emailadd = 'remyanallat@gmail.com';

$req = '0';
// Who should the confirmation email be from?

  $msg ='<span style="font-size:15px;">Hi </span>'.'<b style="font-size:18px;">'.$_POST['name'] .'</b>'. "<span style='font-size:15px;'>,</span><p style='font-size:15px;'> Thank you for your recent enquiry. A member of our 
team will respond to your message as soon as possible.</p>".'<br>'."<p style='font-size:15px;'>Regards</p>".'<br>'.

$msg.='<a href="https://ictcodes.net"><img src="https://ictcodes.net/logo.png" width="175" height="65" alt="logo" /></a><br/>';
$msg .='<span style="text-align: left; color: #000000; font-family: Arial; font-size: 10pt; font-style: normal; font-weight: normal;">Mobile : +919400544735 <font size="2" color="#B9B9B9">|</font> E-mail:info@ictcodes.net</span><font size="1" color="#BD1703"><br>';


$conf_subject = 'Your recent enquiry';
$conf_sender ="From: ictcodes Pvt. Ltd.<info@ictcodes.net> \r\n";
$conf_sender .= "MIME-Version: 1.0 \r\n";
$conf_sender .= "Content-type: text/html; charset=iso-8859-1 \r\n";
mail( $_POST['email'], $conf_subject,$msg, $conf_sender);

}
?>


