<?php
require 'jwt.php';
$jwt = new jwt();
$token = $jwt->create(array("id_user"=>123,"nome"=>"Douglas Poma"));
echo "TOKEN: ".$token;