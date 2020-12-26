<?php
	use App\Models\Annonce_Model;
	$model = new Annonce_Model();
	$annonce = $model->getAnnonceAccueil();

    if(isset($_SESSION['mail'])){
        service('SmartyEngine')->assign('mail',$_SESSION['mail']);
    }
    else{
        service('SmartyEngine')->assign('mail','null');
    }

	service('SmartyEngine')->assign('annonce',$annonce);

	echo service('SmartyEngine')->view('../pages/Accueil.tpl');
?>