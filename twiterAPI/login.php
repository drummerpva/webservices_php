<?php
session_start();
require "thConfig.php";
require "twitter/autoload.php";
use \Abraham\TwitterOAuth\TwitterOAuth;
$con = new TwitterOAuth(CONSUMER_KEY,CONSUMER_SECRET);
$reqToken = $con->oauth("oauth/request_token",array(
    "oauth_callback"=>OAUTH_CALLBACK
));

$_SESSION['oauth_token'] = $reqToken['oauth_token'];
$_SESSION['oauth_token_secret'] = $reqToken['oauth_token_secret'];

$url = $con->url("oauth/authorize",array(
    "oauth_token"=>$reqToken['oauth_token']
));
header("Location: ".$url);
