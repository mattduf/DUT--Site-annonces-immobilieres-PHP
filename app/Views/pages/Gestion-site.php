<?php
    use App\Models\Uti_Model;
    use App\Models\Annonce_Model;

    $model = new Uti_model();
    $session = \Config\Services::session();
	if(!isset($_SESSION['mail'])){
		header('Location:Connexion');
		exit;
	}elseif ( $model->getIsAdmin($_SESSION['mail'])['U_isAdmin'] != 1){
        header('Location:/');
        $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Vous n\'avez pas la permission.</div>');
        exit;
    }
	else{
        service('SmartyEngine')->assign('mail',$_SESSION['mail']);
        service('SmartyEngine')->assign('pseudo',$_SESSION['pseudo']);
        service('SmartyEngine')->assign('nom',$_SESSION['nom']);
        service('SmartyEngine')->assign('prenom',$_SESSION['prenom']);
		echo service('SmartyEngine')->view('../pages/Gestion-site.tpl');
	}