<?php
namespace App\Controllers;

use CodeIgniter\Controller;
Use App\Models\Uti_Model;

class AccesMembre extends Controller
{
    //Inscription sur le site
    public function inscription()
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
                        Administration::sendMail($mail, "De la part de l'administration d'ImmoAnnonce", "La création de votre compte sur ImmoAnnonce a réussi, bienvenue !");

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

    //Connexion à l'espace membre
    public function connexion()
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

    //Deconnexion de l'espace membre
    public function deconnexion(){
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to('/');

    }
}