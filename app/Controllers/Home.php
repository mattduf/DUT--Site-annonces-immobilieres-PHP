<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('accueil');
	}

	public function views($page = 'accueil'){
		if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.tpl'))
	    {
	        // Whoops, we don't have a page for that!
	        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
	    }

	    echo view('templates/header.tpl');

	    echo view('templates/navbar.tpl');

	    echo view('pages/'.$page.'.tpl');

	    echo view('templates/footer.tpl');
	}

}