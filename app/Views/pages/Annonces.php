<?php
    use App\Models\Annonce_Model;

    /* Récupère le mail de l'utilisateur connecté pour afficher entete pour ses annonces */
    if(isset($_SESSION['mail'])){
        service('SmartyEngine')->assign('mail',$_SESSION['mail']);
    }
    else{
        service('SmartyEngine')->assign('mail','null');
    }

    /* Sollicite le modèle pour obtenir les annonces */
    $model = new Annonce_Model();
    $session = \Config\Services::session();
    $id = $session->get('page');
    $annonce = $model->getAnnonce($id);
    service('SmartyEngine')->assign('num',$id);



    $photo = $model->getAllphoto();
    service('SmartyEngine')->assign('photo',$photo);

    service('SmartyEngine')->assign('bool',0);


    service('SmartyEngine')->assign('annonce',$annonce);
    echo service('SmartyEngine')->view('../pages/Annonces.tpl');