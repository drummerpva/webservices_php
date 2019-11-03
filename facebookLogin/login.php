<?php
require './fb.php';
$helper = $fb->getRedirectLoginHelper();
$permissoes = array("email");

$loginUrl = $helper->getLoginUrl("http://localhost/callback.php",$permissoes);

?>
<a href="<?php echo htmlspecialchars($loginUrl); ?>">Fazer login com Facebook</a>