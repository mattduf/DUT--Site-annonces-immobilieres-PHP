<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
//use model


class Login extends Controller
{
	public function signin()
	{
		echo view('templates/header.tpl');
		echo view('templates/navbar.tpl');
		echo view('templates/signin-form.tpl');
		echo view('templates/footer.tpl');
	}

}