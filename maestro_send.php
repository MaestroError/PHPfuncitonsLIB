<?php

// this is one page site which allows you send Bulk HTML messages to multiple e-mails
// all e-mails are sent via Bcc header, so all e-mails are hidden
// Messages are only on georgian language, but I am sure, You will handle this ;)

$msg = "";
$msg1 = "";
$msg2 = "";
$msg3 = "";



if (isset($_POST['password'])) {
  if ($_POST['password'] == "********") {

    if (isset($_POST['emails'])) {
      $emails = $_POST['emails'];
    } else {
      $msg3 = "გთხოვთ ჩაწეროთ ელ-ფოსტები";
    }


    // Create the email and send the message
    $recipients = array(
      $emails
      // more emails
    );


    if (isset($_POST['body'])) {
      $body = $_POST['body'];
    } else {
      $msg1 = "წერილის შინაარსი ცარიელია";
    }


    if (isset($_POST['sub'])) {
      $subject = $_POST['sub'];
    } else {
      $msg2 = "Subject აუცილებელია";
    }

    $mymail = "freewifi.ge@gmail.com";

    $email_to = "servicestellage@gmail.com"; // your email address

    $email_cc = implode(',', $recipients); // your email address

    $header = "From: $mymail <$mymail>\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.

    $header .= "Reply-To: $mymail <$mymail>\r\n";
    $header .= "Return-Path: $mymail <$mymail>\r\n";

    $header .= "Organization: FreeWiFi.ge\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: text/html; charset=UTF-8\r\n";
    $header .= "X-Priority: 3\r\n";
    $header .= "X-Mailer: PHP". phpversion() ."\r\n";

    $header .= 'Bcc: ' . $emails . "\r\n";


    if(!mail($email_to, $subject, $body, $header))
      http_response_code(500);

  } else {
    $msg = "დაამტკიცე რომ შენ, შენ ხარ!";
  }
}


?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title>Hello Maestro!</title> <!-- The title tag shows in email notifications, like Android 4.4. -->


    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  -->


<style>

</style>



</head>

<body style="padding-top: 100px; padding-left:200px; padding-right: 200px;">

    <form action="/maestro_send.php" class="" method="post">
  <div class="form-group">
    <label for="uname">Emails:</label>
    <input type="text" class="form-control" id="uname" placeholder="emails" name="emails">
    <div class="btn p-0 btn-danger m-3"><?php echo $msg3; ?></div>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Password" name="password">
    <div class="btn p-0 btn-danger m-3"><?php echo $msg; ?></div>
  </div>
  <div class="form-group">
    <label>subject:</label>
    <input type="text" class="form-control"bplaceholder="subject" name="sub">
    <div class="btn p-0 btn-danger m-3"><?php echo $msg2; ?></div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Body:</label>
    <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="8"></textarea>
    <div class="btn p-0 btn-danger m-3"><?php echo $msg1; ?></div>
  </div>
  <button type="submit" class="btn btn-primary">Send</button>
</form>

</body>
</html>
