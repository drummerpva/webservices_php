<?php
session_start();
require './Facebook/autoload.php';

$fb = new \Facebook\Facebook([
    "app_id"=>"2041139495937951",
    "app_secret"=>"5a5b8699054cd1d259228313e93d648c",
    "default_graph_version"=>"v3.2"
]);