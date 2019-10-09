<?php


// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$foname = strip_tags(htmlspecialchars($_POST['name']));
$foemail = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = $YourEmail; // This is where the form will send a message to.
$subject = "$YourWebSite Website Contact Form:  $foname";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $foname\n\nEmail: $foemail\n\nPhone: $phone\n\nMessage:\n$message";
$header = "From: noreply $foname <$foemail>\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.

$header .= "Reply-To: $foname <$foemail>\r\n";
$header .= "Return-Path: $foname <$foemail>\r\n";

$header .= "Organization: Digital-eds\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$header .= "X-Priority: 3\r\n";
$header .= "X-Mailer: PHP". phpversion() ."\r\n";

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
