<?php
session_start();
require "thConfig.php";
require "twitter/autoload.php";

use \Abraham\TwitterOAuth\TwitterOAuth;

if (!empty($_SESSION['tw_access_token'])) {
    echo "Tá Logado!";
    $con = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['tw_access_token']['oauth_token'], $_SESSION['tw_access_token']['oauth_token_secret']);
    $user = $con->get("account/verify_credentials");
    echo "Nome:" . $user->name;
    if (!empty($_POST['mensagem'])) {
        //fazer postagem
        $con->post('statuses/update', array(
            "status" => $_POST['mensagem']
        ));
        echo "Tweet publicado com sucesso!";
    }
} else {
    echo "<a href='login.php'>Login com Twitter</a>";
}
?>
<form method="POST">
    <input type="text" name="mensagem"/>
    <input type="submit" value="Postar"/>
</form>