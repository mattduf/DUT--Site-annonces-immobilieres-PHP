<?php
	use App\Models\Annonce_Model;

    //Récupère le mail de l'utilisateur connecté
    if(isset($_SESSION['mail'])) service('SmartyEngine')->assign('mail',$_SESSION['mail']);
    else service('SmartyEngine')->assign('mail','null');

    //Prépare les 6 dernières annonce publiées
	$model = new Annonce_Model();
	$annonce = $model->getAnnonceAccueil();

	//Récupère toute les photos
	$photo = $model->getAllphoto();
	service('SmartyEngine')->assign('photo',$photo);
    service('SmartyEngine')->assign('bool',0);
	service('SmartyEngine')->assign('annonce',$annonce);
	
	echo service('SmartyEngine')->view('../pages/accueil.tpl');