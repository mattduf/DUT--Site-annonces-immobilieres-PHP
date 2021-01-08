<?php
    $session = \Config\Services::session();

    use App\Models\Annonce_model;
    $model = new Annonce_model();


    $id= $session->getFlashData("id");
    $etat = mysqli_fetch_array($model->getEtatAnnonce($id));
    if ($etat['A_etat'] == "bloquée"){
        $session->setFlashdata('warning', '<div id="flashdata"  class="alerte alerte-echec" onclick="document.getElementById(\'flashdata\').style.display=\'none\';"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Consultation impossible car l\'annonce est bloquée. </div>');
        header('Location:/');
        exit();
    }
    $annonce = $model->getAnnonceEntiere($id);
    $photos = $model->getPhotos($id);

    service('SmartyEngine')->assign('annonce',$annonce);
    service('SmartyEngine')->assign('photos',$photos);
    echo service('SmartyEngine')->view('../pages/Annonce-seule.tpl');