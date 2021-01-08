<?php
    $session = \Config\Services::session();

    use App\Models\Uti_Model;
    use App\Models\Annonce_model;
    $model = new Annonce_model();
    $modelUti = new Uti_model();

    if(!isset($_SESSION['mail'])){
        header('Location:Connexion');
        exit;
    }elseif ( $modelUti->getIsAdmin($_SESSION['mail'])['U_isAdmin'] != 1){
        header('Location:/');
        $session->setFlashdata('warning','<div id="flashdata" class="alerte alerte-echec" onclick="document.getElementById(\'flashdata\').style.display=\'none\';"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Vous n\'avez pas la permission.</div>');
        exit;
    }
    else {
        $id = $session->getFlashData("id");
        $photos = $model->getPhotos($id);

        service('SmartyEngine')->assign('photos', $photos);
        echo service('SmartyEngine')->view('../pages/Supprimer-photos.tpl');
    }