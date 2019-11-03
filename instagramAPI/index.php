<?php
session_start();
require './instagram/Instagram.php';
require 'inConfig.php';

if(!empty($_SESSION['in_access_token'])){
    $instagram->setAccessToken($_SESSION['in_access_token']);
    $r = $instagram->getUser();
    //print_r($r);
    echo "Meu Nome é: ".$r->data->full_name;
    //Pegar Fotos
    $r = $instagram->getUserMedia('self',4);
    //print_r($r);
    foreach($r->data as $foto){
        $link = $foto->link;
        $img = $foto->images->low_resolution->url;
        $legenda = $foto->caption->text;
        
        echo "<a href='".$link."'><img src='".$img."' /><br>".$legenda."</a><br/><br/>";
    }
}else{
    $loginUrl = $instagram->getLoginUrl();
    echo "<a href='".$loginUrl."'>Login com Instagram</a>";
}