<?php
    /* Si l'utilisateur n'est pas connecté, il est redirigé vers la page de connexion */
	if(!isset($_SESSION['mail'])){
		header('Location:Connexion');
		exit;
	}
	else{ /* Sinon on établit les informations de la session */
        service('SmartyEngine')->assign('mail',$_SESSION['mail']);
        service('SmartyEngine')->assign('pseudo',$_SESSION['pseudo']);
        service('SmartyEngine')->assign('nom',$_SESSION['nom']);
        service('SmartyEngine')->assign('prenom',$_SESSION['prenom']);

        echo service('SmartyEngine')->view('../pages/Mon-compte.tpl');
	}