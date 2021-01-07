<?php

namespace App\Controllers;

use App\Models\Annonce_Model;
use CodeIgniter\Controller;
use App\Models\Uti_Model;

class Compte extends Controller
{
    public function modifierProfil()
    {
        $session = \Config\Services::session();
        $model = new Uti_Model();
        $oldmdp = $this->request->getPost('oldpassword');
        $mdp = $this->request->getPost('password');
        $confmdp = $this->request->getPost('confpassword');
        $nom = $this->request->getPost('name');
        $prenom = $this->request->getPost('firstname');
        $pseudo = $this->request->getPost('pseudo');

        if (!empty($model->getPassword(SHA1($oldmdp)))) {

            if (empty($nom)) {
                $nom = $session->get('nom');
            }
            if (empty($prenom)) {
                $prenom = $session->get('prenom');
            }
            if (empty($pseudo)) {
                $pseudo = $session->get('pseudo');
            } else {
                $verifPseudo = $model->verifPseudo($pseudo);
                if (!empty($verifPseudo)) {
                    $session->setFlashdata('warning', '<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Ce pseudo existe déjà.</div>');
                    return redirect()->to('Mon-compte');
                }
            }

            if (!empty($mdp) || !empty($confmdp)) {
                if ($mdp == $confmdp) {
                    $mdpSHA = SHA1($mdp);
                    $updateWithMdp = $model->UpdateInfoWithMdp($session->get('mail'), $pseudo, $nom, $prenom, $mdpSHA);

                    $newdata = [
                        'mail'  => $session->get('mail'),
                        'pseudo' => $pseudo,
                        'nom' => $nom,
                        'prenom' => $prenom
                    ];

                    $session->set($newdata);

                    if ($this->request->getMethod() === 'post' && $updateWithMdp) {
                        $session->setFlashdata('warning', '<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> Les modifications ont bien été prises en compte !</div>');
                    } else {
                        $session->setFlashdata('warning', '<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> La modification des informations a échoué.</div>');
                    }
                } else {
                $session->setFlashdata('warning', '<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Les deux mots de passe ne sont pas identiques.</div>');
                }
        } else {
            $updateUtiWithoutMdp = $model->UpdateInfoWithoutMdp($session->get('mail'), $pseudo, $nom, $prenom);

                $newdata = [
                    'mail'  => $session->get('mail'),
                    'pseudo'  => $pseudo,
                    'nom' => $nom,
                    'prenom' => $prenom
                ];

                $session->set($newdata);
            if ($this->request->getMethod() === 'post' && $updateUtiWithoutMdp) {
                $session->setFlashdata('warning', '<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> Les modifications ont bien été prises en compte !</div>');

            } else {
                $session->setFlashdata('warning', '<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> La modification des informations a échoué.</div>');
            }
        }
    } else {
        $session->setFlashdata('warning', '<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> L\'ancien mot de passe est incorrect.</div>');
        }
        return redirect()->to('Mon-compte');

    }

    public function supprimerCompte(){
        $session = \Config\Services::session();
        $model = new Uti_Model();
        $modelAnnonce = new Annonce_Model();
        $check = $this->request->getVar('coche-suppression');
        
        if(isset($check)) {
            if($model->getIsAdmin($session->get('mail'))['U_isAdmin'] == 1)
            {
                $session->setFlashdata('warning', '<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Vous ne pouvez pas supprimer un compte administrateur.</div>');
                return redirect()->to('Mon-compte');
            }

            $model->deleteMessage($session->get('mail'));
            $modelAnnonce->deleteAnnonce($session->get('mail'));
            $model->deleteAccount($session->get('mail'));

            Administration::sendMail($session->get('mail'), "De la part de l'administration d'ImmoAnnonce", "Votre compte sur ImmoAnnonce a bien été supprimé.");

            return redirect()->to('Deconnexion');
        }
        else
        {
            $session->setFlashdata('warning', '<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Vous devez cocher la case pour confirmer la suppression.</div>');
            return redirect()->to('Mon-compte');
        }
    }
}