<?php


namespace App\Controllers;


use CodeIgniter\Controller;

class Deconnexion extends Controller
{
    public function deconnexion(){
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to('/');

    }

}