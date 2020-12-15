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
            $verifmail = $model->verifMail($mail);
            if (empty($verifmail)){
                $insert = $model->insertUti($mail,$mdp,$pseudo,$nom,$prenom);
                if ($this->request->getMethod() === 'post'&& $insert){
                    $session->setFlashdata('warning','');
                    return redirect()->to('Connexion');
                }else{
                    $session->setFlashdata('warning','');
                }
            }else{
                $session->setFlashdata('warning','');
            }
        }else{
            $session->setFlashdata('warning','');
        }
        return redirect()->to('Inscription');
	}

}