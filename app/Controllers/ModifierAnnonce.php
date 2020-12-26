<?php


namespace App\Controllers;

use App\Models\Annonce_Model;
use CodeIgniter\Controller;
use App\Models\Uti_Model;

class ModifierAnnonce extends Controller
{
    public function edit ($page = 'Mes-annonces'){
        $session = \Config\Services::session();
        $model = new Annonce_Model();
        $utimodel = new Uti_Model();

        $verifUser =  $model->verifAnnonce($session->get('mail'),$page);
        if (!empty($verifUser)) {
            if (!empty($session->get('mail'))){
                $data = ['mail' => $session->get('mail'),
                    'pseudo' => $session->get('pseudo'),
                    'nom' => $session->get('nom'),
                    'prenom' => $session->get('prenom')
                ];
            }
            $data['title'] = ucfirst($page);
            echo view('templates/header.tpl',$data);

            if (!empty($session->get('mail'))){
                echo view('templates/navbar-connected.tpl',$data);
            }else {
                echo view('templates/navbar.tpl',$data);
            }
            if (!empty($session->getFlashdata('warning'))){
                echo $session->getFlashdata('warning');
            }

            $session->setFlashdata("id",$page);

            echo view('pages/Modifier-une-annonce.php',$data);

            echo view('templates/footer.tpl',$data);


        }else{
            $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Vous n\'êtes pas le propriétaire de cette annonce. </div>');
            return redirect()->to('/Mes-annonces');
        }

    }


}