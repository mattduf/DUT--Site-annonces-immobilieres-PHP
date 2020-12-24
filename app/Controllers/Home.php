<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('accueil');
	}

	public function views($page = 'accueil'){
        $session = \Config\Services::session();
		if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.tpl'))
	    {
	        // Whoops, we don't have a page for that!
	        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
	    }
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
	    echo view('pages/'.$page.'.php',$data);

	    echo view('templates/footer.tpl',$data);
	}

    public function affiche($page = 'Annonces'){
        $session = \Config\Services::session();
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

        echo view('templates/footer.tpl',$data);
    }
}
