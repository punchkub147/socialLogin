<?php
include_once 'src/google/Google_Client.php';
include_once 'src/google/contrib/Google_Oauth2Service.php';


$clientId = '1052416524891-tecvnql8u2orup1e5our44cllifv6c85.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'aJdnyFJrkanEdF1W1utnCJko'; //Google client secret
$gRedirectURL = 'https://imsu.co/u/13570110/Google-Login/'; //Callback URL

$gClient = new Google_Client();
$gClient->setApplicationName('Google Login');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($gRedirectURL);
$gClient->setAccessType('online');
$gClient->setApprovalPrompt('auto') ;
$google_oauthV2 = new Google_Oauth2Service($gClient);
$gloginUrl = $gClient->createAuthUrl();
?>