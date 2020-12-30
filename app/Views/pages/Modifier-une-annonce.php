<?php
$session = \Config\Services::session();

use App\Models\Annonce_model;
$model = new Annonce_model();
$id= $session->getFlashData("id");
$annonce = $model->getAnnonceEntiere($id);
$photos = $model->getPhotos($id);

service('SmartyEngine')->assign('annonce',$annonce);
service('SmartyEngine')->assign('photos',$photos);
echo service('SmartyEngine')->view('../pages/Modifier-une-annonce.tpl');
?>