<?php

// check POST request has been sent
if($_SERVER["REQUEST_METHOD"] == "POST"){
  // initialise error array & default response text
  $err = array();
  $resTxt = array();
  // ensure robot is upper case
  $_POST['robot'] = strtoupper($_POST['robot']);
  
  // check each item in POST request for blanks
  foreach($_POST as $key => $val){
    if(empty($val)){
      // add to error array and update error text
      $err[$key] = true;
      array_push($resTxt, 'Complete all fields');
    }
  }
  
  // check email in correct format
  if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    // add to error array and update error text
    $err['email'] = true;
    array_push($resTxt, 'Check email format');
  }
  
  // check robot value not 'NO'
  if($_POST['robot'] != 'NO'){
    // add to error array
    $err['robot'] = true;
    // check for yes answers, update error text accordingly
    if($_POST['robot'] == 'YES')
      array_push($resTxt, 'No robots please!');
    else
      array_push($resTxt, 'Confirm human status');
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
    if($sent) array_push($resTxt, 'Email sent successfully');
      else    array_push($resTxt, 'Something went wrong');
  };
};

// Compile response array & convert to JSON
$response = array(
  'resTxt' => $resTxt,
  'err' => $err
);
echo json_encode($response);