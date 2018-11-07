<?php
require_once("includes/SQLiteMail.php");
require_once("includes/get_client_ip.php");
require_once("includes/sanitize.php");
require_once("templates/bottomSheetRender.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($_POST['name'] == '' || $_POST['email'] == '' || $_POST['subject'] == '' ||  $_POST['message'] == '')):
		header("location: index.php");
		exit;
endif;


if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

  $name = sanitize($_POST['name']);
  $name = (strlen($name) > 64) ? substr($name,0,61).'...' : $name;
  $email = sanitize($_POST['email']);
  $email = (strlen($email) > 64) ? substr($email,0,61).'...' : $email;
  $subject = sanitize($_POST['subject']);
  $subject = (strlen($subject) > 64) ? substr($subject,0,61).'...' : $subject;
  $message = sanitize($_POST['message']);
  $message = (strlen($message) > 4096) ? substr($message,0,4093).'...' : $message;
  $IP = get_client_ip();

  // Send contact information
  $result = addMail($name, $email, $subject, $message, $IP);
  if ($result){
		header("location: index.php");
		exit;
  }
}else{
		header("location: index.php");
		exit;
  }

?>