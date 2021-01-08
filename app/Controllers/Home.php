<?php namespace App\Controllers;
use App\Models\Uti_Model;

class Home extends BaseController
{
	//Accueil
    public function index()
	{
		return view('Accueil');
	}

	//Méthode organisant la structure d'une page
	public function views($page = 'Accueil'){
        $session = \Config\Services::session();
        $model = new Uti_model();

		if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.tpl'))
	    {
	        // Whoops, we don't have a page for that!
	        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
	    }

		//Récupère les informations de la session
		if (!empty($session->get('mail'))){
            $data = ['mail' => $session->get('mail'),
                'pseudo' => $session->get('pseudo'),
                'nom' => $session->get('nom'),
                'prenom' => $session->get('prenom')
            ];
        }
        $data['title'] = ucfirst($page);

		//Affiche le header du fichier html
	    echo view('templates/header.tpl',$data);

		//Affiche la navbar "connectée" si l'utilisateur est connecté
	    if (!empty($session->get('mail'))){
		    echo view('templates/navbar-connected.tpl',$data);
        }else {
            echo view('templates/navbar.tpl',$data);
        }

	    if (!empty($session->getFlashdata('warning'))){
	        echo $session->getFlashdata('warning');
        }

	    //Affiche le fichier PHP
	    echo view('pages/'.$page.'.php',$data);

        //Affiche le bouton pour accéder au panneau admin si l'utilisateur connecté est un admin
	    if (!empty($session->get('mail'))) {
            if ($model->getIsAdmin($_SESSION['mail'])['U_isAdmin'] == 1) {
                echo view('templates/admin.tpl', $data);
            }
        }

	    //Affiche le footer
	    echo view('templates/footer.tpl',$data);
	}

    //Méthode pour la structure des pages des annonces individuelles
	public function affiche($page = 'Annonces'){
        $session = \Config\Services::session();
        $model = new Uti_model();

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

        echo view('pages/Annonce-seule.php',$data);

        if (!empty($session->get('mail'))) {
            if ($model->getIsAdmin($_SESSION['mail'])['U_isAdmin'] == 1) {
                echo view('templates/admin.tpl', $data);
            }
        }

        echo view('templates/footer.tpl',$data);
    }
}
