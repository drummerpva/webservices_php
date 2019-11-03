<?php
require './fb.php';
$helper = $fb->getRedirectLoginHelper();
//$helper = $fb->getPageTabHelper();
try{
    $_SESSION['fb_access_token'] = (string)$helper->getAccessToken();
} catch (\Facebook\Exceptions\FacebookResponseException $ex) {
    echo "Erro: ".$ex->getMessage();
    exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e){
    echo "Erro SDK: ".$e->getMessage();
    exit;
}
header("Location: ./");