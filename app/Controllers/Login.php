<?php 
namespace App\Controllers;

use App\Models\Uti_Model;
use CodeIgniter\Controller;


class Login extends Controller
{
	public function signin()
	{
        $session = \Config\Services::session();
        $model = new Uti_Model();
        $mail = $this->request->getPost('email');
        $mdp = $this->request->getPost('password');
        $mdp = SHA1($mdp);
        $userexist = $model->userexist($mail,$mdp);

        if (empty($session->get('mail'))){
            $data = ['mail' => $session->get('mail'),
                'pseudo' => $session->get('pseudo'),
                'nom' => $session->get('nom'),
                'prenom' => $session->get('prenom')
            ];
        }

        if ($this->request->getMethod() === 'post' && !empty($userexist))
        {
            $info = $model->getUserInfo($mail);
            foreach ($info->fetch_all() as $item) {
                $setdata['mail'] = $item[0];
                $setdata['pseudo'] = $item[1];
                $setdata['nom'] = $item[2];
                $setdata['prenom'] = $item[3];
            }
            $session->set($setdata);
            $data = ['mail' => $session->get('mail'),
            'pseudo' => $session->get('pseudo'),
            'nom' => $session->get('nom'),
            'prenom' => $session->get('prenom')
            ];
            $session->setFlashdata('warning','<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> Connexion réussie !</div>');

        }
        else
        {
            $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Adresse mail ou mot de passe invalide.</div>');
        }

        $data['title'] = ucfirst('Connexion');

        if (!empty($session->get('mail'))){
            return redirect()->to('Mon-compte');
        }
        else
        {
            return redirect()->to('Connexion');
        }
	}
}