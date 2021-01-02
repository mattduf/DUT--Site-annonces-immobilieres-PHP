<?php
    /* Si l'utilisateur n'est pas connecté, il est redirigé vers la page de connexion */
	if(!isset($_SESSION['mail'])){
		header('Location:Connexion');
		exit;
	}
	else{
		echo service('SmartyEngine')->view('../pages/Mes-messages.tpl');
	}