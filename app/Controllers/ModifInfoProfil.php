<?php


namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Uti_Model;


class ModifInfoProfil extends Controller
{
    public function index(){
        $session = \Config\Services::session();
        $model = new Uti_Model();
        $oldmdp = $this->request->getPost('oldpassword');
        $mdp = $this->request->getPost('password');
        $confmdp = $this->request->getPost('confpassword');
        $nom = $this->request->getPost('name');
        $prenom = $this->request->getPost('firstname');
        $pseudo = $this->request->getPost('pseudo');

        if (empty($nom)){
            $nom = $session->get('nom');
        }
        if (empty($prenom)){
            $prenom = $session->get('prenom');
        }
        if (empty($pseudo)){
            $pseudo = $session->get('pseudo');
        }else{
            $verifPseudo = $model->verifPseudo($pseudo);
            if (!empty($verifPseudo)) {
                $session->setFlashdata('warning', '<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Ce pseudo existe déjà.</div>');
                return redirect()->to('Mon-compte');
            }
        }
//TODO Update $session after updating the table
        if (!empty($mdp) || !empty($confmdp)){
            if ($mdp == $confmdp){
                $mdpSHA = SHA1($mdp);
                if ($model->getPassword(SHA1($oldmdp))){
                    $updateWithMdp = $model->UpdateInfoWithMdp($session->get('mail'),$pseudo,$nom,$prenom,$mdpSHA);

                    if ($this->request->getMethod() === 'post' && $updateWithMdp){
                        $session->setFlashdata('warning','<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> Les modifications ont bien été prises en compte !</div>');
                    }else{
                        $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> La modification des informations a échoué.</div>');
                    }
                }else{
                    $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> L\'ancien mot de passe est incorrect.</div>');
                }
            }else{
                $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Les deux mots de passe ne sont pas identiques.</div>');
            }
        } else{
            $updateUtiWithoutMdp = $model->UpdateInfoWithoutMdp($session->get('mail'),$pseudo,$nom,$prenom);
            if ($this->request->getMethod() === 'post' && $updateUtiWithoutMdp){
                $session->setFlashdata('warning','<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> Les modifications ont bien été prises en compte !</div>');

            }else{
                $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> La modification des informations a échoué.</div>');
            }
        }
        return redirect()->to('Mon-compte');

    }

}