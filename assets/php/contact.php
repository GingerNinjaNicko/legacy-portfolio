<?php

// check POST request has been sent
if($_SERVER["REQUEST_METHOD"] == "POST"){
  // initialise error array & default response text
  $err = array();
  $resTxt = 'Nothing happened...';
  // ensure robot is upper case
  $_POST['robot'] = strtoupper($_POST['robot']);
  
  // check each item in POST request for blanks
  foreach($_POST as $key => $val){
    if(empty($val)){
      // add to error array and update error text
      array_push($err, $key);
      $resTxt = 'Complete all fields';
    }
  }
  
  // check no err yet & correct format
  if(empty($err) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    // add to error array and update error text
    array_push($err, 'email');
    $resTxt = 'Check email format';
  }
  
  // check no err yet & value not 'NO'
  if(empty($err) && $_POST['robot'] != 'NO'){
    // add to error array
    array_push($err, 'robot');
    // check for yes answers, update error text accordingly
    if($_POST['robot'] == 'YES')
      $resTxt = 'No robots please!';
    else
      $resTxt = 'Confirm human status';
  }
  
  // if no errors send email
  if(empty($err)){
    // set vars for email
    $toEmail  = "Nicko J. Ruddock <info@nickojruddock.com>";
    $subject  = "New message from " . $_POST['name'] . "using NickoJRuddock.com";
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
    if($sent) $resTxt = 'Email sent successfully';
      else    $resTxt = 'Something went wrong';
  };
};

// Compile response array & convert to JSON
$response = array(
  'resTxt' => $resTxt,
  'err' => $err
);
echo json_encode($response);