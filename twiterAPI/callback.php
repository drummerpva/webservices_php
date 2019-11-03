<?php
session_start();
require "thConfig.php";
require "twitter/autoload.php";
use \Abraham\TwitterOAuth\TwitterOAuth;

$reqToken = array(
    "oauth_token"=>$_SESSION['oauth_token'],
    "oauth_token_secret"=>$_SESSION['oauth_token_secret']
);
$con = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET,$reqToken['oauth_token'],$reqToken['oauth_token_secret']);

$_SESSION['tw_access_token'] = $con->oauth('oauth/access_token',array(
    "oauth_verifies"=>$_GET['oauth_verifier']
));
header("Location: ./");