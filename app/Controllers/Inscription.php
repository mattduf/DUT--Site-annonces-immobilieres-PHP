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
                $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR :</strong> ce pseudo existe déjà <i class="fas fa-exclamation-triangle"></i></div>');
            }
            else{
                if (empty($verifMail)){
                    $insert = $model->insertUti($mail,$mdp,$pseudo,$nom,$prenom);
                    
                    if ($this->request->getMethod() === 'post'&& $insert){
                        $session->setFlashdata('warning','<div class="alerte alerte-succes"><strong>SUCCÈS :</strong> inscription réussie <i class="fas fa-check"></i></div>');
                        return redirect()->to('Connexion');
                    }
                    else{
                        $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR :</strong> l\'inscription a échoué <i class="fas fa-exclamation-triangle"></i></div>');
                    }
                }
                else{
                    $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR :</strong> cette adresse mail existe déjà <i class="fas fa-exclamation-triangle"></i></div>');
                }
            }
        }
        else{
            $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR :</strong> les mots de passe saisis ne correspondent pas <i class="fas fa-exclamation-triangle"></i></div>');
        }

        return redirect()->to('Inscription');
	}

}