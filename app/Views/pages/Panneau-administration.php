<?php
    use App\Models\Uti_Model;
    use App\Models\Annonce_Model;

	if(!isset($_SESSION['mail'])){
		header('Location:Connexion');
		exit;
	}
	else{
        $model = new Uti_model();
        $utilisateur = $model->getAllUsers();

        $model2 = new Annonce_Model();
        $annonce = $model2->getAnnonceAdministration();
        $nbannonce = $model2->getNbAnnonce();

        service('SmartyEngine')->assign('utilisateur',$utilisateur);
        service('SmartyEngine')->assign('annonce',$annonce);
        service('SmartyEngine')->assign('nbannonce',$nbannonce);

        service('SmartyEngine')->assign('mail',$_SESSION['mail']);
        service('SmartyEngine')->assign('pseudo',$_SESSION['pseudo']);
        service('SmartyEngine')->assign('nom',$_SESSION['nom']);
        service('SmartyEngine')->assign('prenom',$_SESSION['prenom']);
		echo service('SmartyEngine')->view('../pages/Panneau-Administration.tpl');
	}
?>