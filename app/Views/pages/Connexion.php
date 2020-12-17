<?php
	if(isset($_SESSION['mail'])){
		header('Location:Mon-compte');
		exit;
	}
	else{
		echo service('SmartyEngine')->view('../pages/Connexion.tpl');
	}
?>