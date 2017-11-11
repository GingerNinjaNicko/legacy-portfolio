<?php
<<<<<<< HEAD
// define success & error responses
$errTxt = "No POST data recieved";
$sucTxt = "Email sent successfully";

// start error checking
if(isset($_POST) && !empty($_POST['name'])){
  // set vars for email
  $toEmail  = "Nicko J. Ruddock <info@nickojruddock.com>";
  $subject  = "New message from " . $_POST['name'];
  $header   = "From: info@nickojruddock.com\r\n" .
              "Return-Path: info@nickojruddock.com\r\n" .
              "MIME-Type: 1.0\r\n" .
              "Content-Type: text/plain; charset=utf-8\r\n" .
              "X-Sender: info@nickojruddock.com\r\n" .
              "X-Mailer: PHP/" . phpversion();
  // construct email body
  $msg  = <<<MSG
You have been sent a new email from NickoJRuddock.com

Name: {$_POST['name']}
Email: {$_POST['email']}

Message: 
{$_POST['msg']}
MSG;
  
  // send email
  $sent = mail($toEmail, $subject, $msg, $header);
  // check email sent correctly
  if($sent) echo $sucTxt;
  
} else {
  // handle any errors
  echo $errTxt;
=======
if(isset($_POST) && !empty($_POST))
{
  echo $_POST;
>>>>>>> fee4631c409904298fdd9c6d992f9d6c09de3385
}