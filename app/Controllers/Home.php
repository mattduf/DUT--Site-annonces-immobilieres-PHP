<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		echo view('templates/header.tpl');
		echo view('templates/navbar.tpl');
		echo view('templates/footer.tpl');
	}

}