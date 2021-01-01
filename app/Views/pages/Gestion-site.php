<?php
    use App\Models\Uti_Model;
    use App\Models\Annonce_Model;

	if(!isset($_SESSION['mail'])){
		header('Location:Connexion');
		exit;
	}
	else{
        service('SmartyEngine')->assign('mail',$_SESSION['mail']);
        service('SmartyEngine')->assign('pseudo',$_SESSION['pseudo']);
        service('SmartyEngine')->assign('nom',$_SESSION['nom']);
        service('SmartyEngine')->assign('prenom',$_SESSION['prenom']);
		echo service('SmartyEngine')->view('../pages/Gestion-site.tpl');
	}
?>