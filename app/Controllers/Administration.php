<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Annonce_Model;
use App\Models\Uti_Model;

class Administration extends Controller
{
    //Méthode dédiée à la gestion d'un utilisateur
    public function GestionUtilisateurs(){
        $session = \Config\Services::session();
        $modelUti = new Uti_Model();
        $modelAnnonce = new Annonce_Model();

        $emailUti = $this->request->getPost('email');
        $selectedbutton = $this->request->getPost('button');
        $corpsmail = $this->request->getPost('corpsmail');
        $verifMail = $modelUti->verifMail($emailUti);

        //Si on clique sur l'un des boutons dédiés à la gestion d'un utilisateur
        if(isset($selectedbutton))
        {
            if (empty($verifMail)) //Message d'erreur si l'adresse mail saisie n'existe pas
            {
                $session->setFlashdata('warning', '<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> L\'adresse mail n\'existe pas.</div>');
                return redirect()->to('Gestion-site');
            }
            else if ($modelUti->getIsAdmin($emailUti)['U_isAdmin'] == 1) //Message d'erreur s'il s'agit d'un compte administrateur
            {
                $session->setFlashdata('warning', '<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Vous ne pouvez pas effectuer une action sur un compte administrateur.</div>');
                return redirect()->to('Gestion-site');
            }
            else
            {
                if ($selectedbutton === "supprimer") //Si on clique sur "Supprimer"
                {
                    //Supprime les messages, les annonces associés au mail, puis le compte
                    $modelUti->deleteMessage($emailUti);
                    $modelAnnonce->deleteAnnonce($emailUti);
                    $modelUti->deleteAccount($emailUti);

                    //Envoie un mail pour notifier la personne concernée
                    $this->sendMail($emailUti, "Une action a été effectuée sur votre compte - ImmoAnnonce", "Votre compte a été supprimé suite à une action de l'administration.");

                    //Message pour informer l'administrateur du succès de l'action
                    $session->setFlashdata('warning', '<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> Le compte a bien été supprimé.</div>');
                    return redirect()->to('Gestion-site');
                }
                else if ($selectedbutton === "modifier") //Si on clique sur "Modifier"
                {
                    $session->setFlashData("mailUti", $emailUti);
                    return redirect()->to('Modifier-utilisateur');
                }
                else if ($selectedbutton === "bloquer") //Si on clique sur "Bloquer"
                {
                    $modelUti->blockUser($emailUti); //Change "U_etat" en "bloqué"
                    $modelAnnonce->blockUserAnnonce($emailUti); //Change "A_etat" en "bloquée"

                    //Envoie un mail pour notifier la personne concernée
                    $this->sendMail($emailUti, "Une action a été effectuée sur votre compte - ImmoAnnonce", "Votre compte a été bloqué suite à une action de l'administration.");

                    //Message pour informer l'administrateur du succès de l'action
                    $session->setFlashdata('warning', '<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> L\'utilisateur et ses annonces ont été bloqués.</div>');
                    return redirect()->to('Gestion-site');
                }
                else if ($selectedbutton === "debloquer") //Si on clique sur "Débloquer"
                {
                    $modelUti->unblockUser($emailUti);  //Change "U_etat" en "actif"
                    $modelAnnonce->unblockUserAnnonce($emailUti); //Change "A_etat" en "publiée"

                    //Envoie un mail pour notifier la personne concernée
                    $this->sendMail($emailUti, "Une action a été effectuée sur votre compte - ImmoAnnonce", "Votre compte a été débloqué suite à une action de l'administration.");

                    //Message pour informer l'administrateur du succès de l'action
                    $session->setFlashdata('warning', '<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> L\'utilisateur et ses annonces ont été débloqués.</div>');
                    return redirect()->to('Gestion-site');
                }
                else if ($selectedbutton === "envoyermail")
                {
                    //Envoie un mail avec le corps récupéré du formulaire
                    $this->sendMail($emailUti, "De la part de l'administration d'ImmoAnnonce", $corpsmail);

                    //Message pour informer l'administrateur du succès de l'action
                    $session->setFlashdata('warning', '<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> Le mail a bien été envoyé.</div>');
                    return redirect()->to('Gestion-site');
                }
            }
        }
    }

    //Méthode dédiée à la gestion d'une annonce
    public function GestionAnnonces(){
        $session = \Config\Services::session();
        $modelAnnonce = new Annonce_Model();
        $modelUti = new Uti_Model();

        $idAnnonce = $this->request->getPost('idannonce');
        $selectedbuttonAnnonce = $this->request->getPost('buttonAnnonce');
        $verifID = $modelAnnonce->verifIDAnnonce($idAnnonce);

        //Si on clique sur l'un des boutons dédiés à la gestion d'une annonce
        if(isset($selectedbuttonAnnonce))
        {
            if (empty($verifID)) //Message d'erreur si l'annonce n'existe pas
            {
                $session->setFlashdata('warning', '<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> L\'annonce n\'existe pas.</div>');
                return redirect()->to('Gestion-site');
            }
            else
            {
                if ($selectedbuttonAnnonce === "supprimerAnnonce") //Si on clique sur "Supprimer"
                {
                    $modelAnnonce->deleteOneAnnonceID($idAnnonce); //Supprime l'annonce
                    $modelUti->deletePhoto($idAnnonce);
                    $emailUti = $modelAnnonce->getMailAnnonce($idAnnonce);

                    //Envoie un mail pour notifier la personne concernée
                    $this->sendMail($emailUti, "Une action a été effectuée sur l'une de vos annonces - ImmoAnnonce", "Votre annonce n°$idAnnonce a été supprimée suite à une action de l'administration.");

                    //Message pour informer l'administrateur du succès de l'action
                    $session->setFlashdata('warning', '<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> L\'annonce a bien été supprimée.'.var_dump($emailUti).'</div>');
                    return redirect()->to('Gestion-site');
                }
                else if ($selectedbuttonAnnonce === "modifierAnnonce") //Si on clique sur "Modifier"
                {
                    //TODO modifier une annonce (admin)

                    $session->setFlashData("id", $idAnnonce);
                    return redirect()->to('Supprimer-photos');
                }
                else if ($selectedbuttonAnnonce === "bloquerAnnonce") //Si on clique sur "Bloquer"
                {
                    $modelAnnonce->blockAnnonce($idAnnonce); //Change "A_etat" en "bloquée"
                    $emailUti = $modelAnnonce->getMailAnnonce($idAnnonce);

                    //Envoie un mail pour notifier la personne concernée
                    $this->sendMail($emailUti, "Une action a été effectuée sur l'une de vos annonces - ImmoAnnonce", "Votre annonce n°$idAnnonce a été bloquée suite à une action de l'administration.");

                    //Message pour informer l'administrateur du succès de l'action
                    $session->setFlashdata('warning', '<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> L\'annonce a été bloquée.</div>');
                    return redirect()->to('Gestion-site');
                }
                else if ($selectedbuttonAnnonce === "debloquerAnnonce") //Si on clique sur "Débloquer"
                {
                    $modelAnnonce->unblockAnnonce($idAnnonce); //Change "A_etat" en "publiée"
                    $emailUti = $modelAnnonce->getMailAnnonce($idAnnonce);

                    //Envoie un mail pour notifier la personne concernée
                    $this->sendMail($emailUti, "Une action a été effectuée sur l'une de vos annonces - ImmoAnnonce", "Votre annonce n°$idAnnonce a été débloquée suite à une action de l'administration.");

                    //Message pour informer l'administrateur du succès de l'action
                    $session->setFlashdata('warning', '<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> L\'annonce a été débloquée.</div>');
                    return redirect()->to('Gestion-site');
                }
            }
        }
    }

    public function supprimerPhotos(){
        $session = \Config\Services::session();
        $annonceModel = new Annonce_Model();

        if($this->request->getPost('buttondeletephoto')){
            $idphoto = $this->request->getPost('deletePhotoAdmin[]');

            for ($i=0; $i < sizeof($idphoto) ; $i++) {
                $annonceModel->deletePhoto($idphoto[$i]);
            }
            $session->setFlashdata('warning', '<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> La suppression a bien été prise en compte.</div>');
            return redirect()->to('Gestion-site');
        }
    }

    public function modifierUtilisateur(){
        $session = \Config\Services::session();
        $modelUti = new Uti_Model();
        $mail = $this->request->getPost('mail');
        $nom = $this->request->getPost('name');
        $prenom = $this->request->getPost('firstname');
        $pseudo = $this->request->getPost('pseudo');

        $verifPseudo = $modelUti->verifPseudo($pseudo);

        if (!empty($verifPseudo)){
            $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Ce pseudo existe déjà.</div>');
            return redirect()->to('Gestion-site');
        }
        else {
            $requete = $modelUti->updateInfoWithoutMdp($mail, $pseudo, $nom, $prenom);

            if ($this->request->getMethod() === 'post' && $requete) {
                $session->setFlashdata('warning', '<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> Les modifications ont bien été prises en compte.</div>');
                $this->sendMail($mail, "Une action a été effectuée sur votre compte - ImmoAnnonce", "Votre compte a été modifié suite à une action de l'administration.");
                return redirect()->to('Gestion-site');
            } else {
                $session->setFlashdata('warning', '<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-check"></i> La modification a échoué.</div>');
                return redirect()->to('Gestion-site');
            }
        }
    }

    //Méthode dédiée à l'envoi de mails
    public static function sendMail($emailUti,$sujetmail,$corpsmail){
        $email = \Config\Services::email();

        $email->setFrom('fr.immoannonce@gmail.com', 'Immo Annonce'); //Expéditeur
        $email->setTo($emailUti); //Destinataire

        $email->setSubject($sujetmail); //Sujet
        $email->setMessage('<div>Bonjour,</div><br/><p style="width:100%; color:red;">'.$corpsmail.'</p><br/><p>Bonne continuation,<br/>ImmoAnnonce</p>'); //Corps

        $email->send(); //Envoi du mail
    }
}