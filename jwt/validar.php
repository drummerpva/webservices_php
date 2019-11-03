<?php
require 'jwt.php';
$jwt = new jwt();
if(!empty($_GET['jwt'])){
    $token = $_GET['jwt'];
    $info = $jwt->validate($token);
    //echo $token;
    //exit;
    if($info){
        echo "Token Válido";
        echo "<p>Nome:".$info->nome.", ID: ".$info->id_user."</p>";
    }else{
        echo "Token inválido";
    }
}else{
    echo "Token não recebido";
}


