<?php
session_start();
require './instagram/Instagram.php';
require 'inConfig.php';

if(!empty($_GET['code'])){
    $code = $_GET['code'];
    $_SESSION['in_access_token'] = $instagram->getOAuthToken($code);
}
header("Location: ./");