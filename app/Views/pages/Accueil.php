<?php
	use App\Models\Annonce_Model;
	$model = new Annonce_Model();
	$annonce = $model->getAnnonceAccueil();

	service('SmartyEngine')->assign('annonce',$annonce);

	echo service('SmartyEngine')->view('../pages/Accueil.tpl');
?>