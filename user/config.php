<?php
session_start();
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '950797206528-eu8nef1v85hc28do3ahp0o0nfpvfd1j5.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = 'B_ov_T1ZZHs6m1ye5Nx78zmJ'; //Google CLIENT SECRET
$redirectUrl = 'http://localhost/NIT-KET/user';  //return url (url to script)
$homeUrl = 'http://localhost/NIT-KET/user';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('Login to NIT-KET');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>