<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
Use App\Models\Uti_Model;


class Inscription extends Controller
{
    function Inscription(){
        parent::Controller();
    }
	public function signup()
	{
	    $session = \Config\Services::session();
	    $model = new Uti_Model();
	    $mail = $this->request->getPost('email');
	    $mdp = $this->request->getPost('password');
        $confmdp = $this->request->getPost('confpassword');
        $nom = $this->request->getPost('name');
        $prenom = $this->request->getPost('firstname');
        $pseudo = $this->request->getPost('pseudo');

        if ($mdp == $confmdp){
            $mdp=SHA1($mdp);
            $verifPseudo = $model->verifPseudo($pseudo);
            $verifMail = $model->verifMail($mail);

            if (!empty($verifPseudo)){
                $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Ce pseudo existe déjà.</div>');
            }
            else{
                if (empty($verifMail)){
                    $insert = $model->insertUti($mail,$mdp,$pseudo,$nom,$prenom);
                    
                    if ($this->request->getMethod() === 'post'&& $insert){
                        $session->setFlashdata('warning','<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> Inscription réussie !</div>');
                        return redirect()->to('Connexion');
                    }
                    else{
                        $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> L\'inscription a échoué.</div>');
                    }
                }
                else{
                    $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Cette adresse mail existe déjà.</div>');
                }
            }
        }
        else{
            $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Les mots de passe saisis ne correspondent pas.</div>');
        }

        return redirect()->to('Inscription');
	}

}