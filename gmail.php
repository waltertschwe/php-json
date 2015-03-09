<?php
require_once('vendor/autoload.php');
session_start();

$email = $_GET['email'];

if(empty($email)) {
    $email = "wschweitzer00@gmail.com";
}

$client_id = '745205624787-6cf8vp4krousol9rj5cfj76nnnrjtne8.apps.googleusercontent.com';
$client_secret = 'wve-UspV2W5SKBa2V_I9m2mB';
$redirect_uri = 'http://ec2-50-19-187-57.compute-1.amazonaws.com/box/gmail.php';

$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);

$client->addScope("https://www.googleapis.com/auth/gmail.compose");
$service = new Google_Service_Gmail($client);
$draft = new Google_Service_Gmail_Draft();

if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}
 
  // If Access Toket is not set, show the OAuth URL
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
   $client->setAccessToken($_SESSION['access_token']);
} else {
   $authUrl = $client->createAuthUrl();
}
 
$_SESSION['access_token'] = $client->getAccessToken();
 
$mail = new PHPMailer();
$mail->CharSet = "UTF-8";
$subject = "my subject";
$msg = "hey there!";
$from = "walter@fertilityauthority.com";
$fname = "Walter";
$mail->From = $from;
$mail->FromName = $fname;
$mail->AddAddress($email);
$mail->AddReplyTo($from,$fname);
$mail->Subject = $subject;
$mail->Body    = $msg;
$mail->AddAttachment('/tmp/test.pdf');
$mail->preSend();
$mime = $mail->getSentMIMEMessage(); 
$data = base64_encode($mime);
$data = str_replace(array('+','/','='),array('-','_',''),$data); // url safe
$m = new Google_Service_Gmail_Message();
$m->setRaw($data);

$draft->setMessage($m);
//$service->users_messages->send("me", $m);
$service->users_drafts->create("me", $draft);

echo "email sent to draft folder w/pdf attached.";

