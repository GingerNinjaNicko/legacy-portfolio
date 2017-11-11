<?php

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
  // check email sent correctly & set var
  if($sent) $resTxt = "Email sent successfully";
  
} else {
  // handle any errors
  $resTxt = "No POST data recieved";
}

$err = array(
  'email' => true,
  'msg' => 'no email'
);

$response = array(
  'resTxt' => $resTxt,
  'err' => $err
);

echo json_encode($response);