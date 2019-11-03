<?php
require './fb.php';

if(!empty($_SESSION['fb_access_token'])){
    $res = $fb->get("/me?fields=email,name,id,picture",$_SESSION['fb_access_token']);
    $r = json_decode($res->getBody());
    
    echo "<img src='".$r->picture->data->url."' />";
    echo "Meu Nome: ".$r->name."<br>";
    echo "<hr/><a href='sair.php'>Sair</a>";
}else{
    header("Location: login.php");
}