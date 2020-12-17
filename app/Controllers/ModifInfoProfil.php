<?php


namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Uti_Model;


class ModifInfoProfil extends Controller
{
    public function index(){
        $session = \Config\Services::session();
        $model = new Uti_Model();
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
            if (!empty($verifPseudo)){
                $session->setFlashdata('warning','Pseudo déja éxistant');
            }
        }
//TODO Update $session after updating the table
        if (!empty($mdp) || !empty($confmdp)){
            if ($mdp == $confmdp){
                $mdpSHA = SHA1($mdp);
                $updateWithMdp = $model->UpdateInfoWithMdp($session->get('mail'),$pseudo,$nom,$prenom,$mdpSHA);
                if ($this->request->getMethod() === 'post' && $updateWithMdp){
                    $session->setFlashdata('warning','Modification des informations réussie');
                }else{
                    $session->setFlashdata('warning','La modification des informations a échouée');
                }
            }else{
                $session->setFlashdata('warning','Les deux mot de passe ne sont pas identiques');
            }
        } else{
            $updateUtiWithoutMdp = $model->UpdateInfoWithoutMdp($session->get('mail'),$pseudo,$nom,$prenom);
            if ($this->request->getMethod() === 'post' && $updateUtiWithoutMdp){
                $session->setFlashdata('warning','Modification des informations réussie');

            }else{
                $session->setFlashdata('warning','La modification des informations a échouée');
            }
        }
        return redirect()->to('Mon-compte');

    }

}