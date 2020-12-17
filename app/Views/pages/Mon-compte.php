<?php
	if(!isset($_SESSION['mail'])){
		header('Location:Connexion');
		exit;
	}
	else{
		echo service('SmartyEngine')->view('../pages/Mon-compte.tpl');
	}
?>