<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
//use model


class Inscription extends Controller
{
	public function signup()
	{
		echo view('templates/header.tpl');
		echo view('templates/navbar.tpl');
		echo view('templates/signup-form.tpl');
		echo view('templates/footer.tpl');
	}

}