<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
Use App\Models\Annonce_Model;


class Ajouter_une_annonce extends Controller
{
    public function addAnnonce()
	{
	    $session = \Config\Services::session();
        $model = new Annonce_Model();
        $mail = $session->get('mail'); //a voir
        $titre = $this->request->getPost('title');
        $coutlocation = $this->request->getPost('coutlocation');
        $coutcharges = $this->request->getPost('coutcharges');
        $type = $this->request->getPost('typeselect');
        $superficie = $this->request->getPost('superficie');
        $typechauffage = $this->request->getPost('typechauffageselect');
        if($typechauffage === "collectif")
        {
            $modeenergie ="NULL";
        }
        else
        {
            $modeenergie = $this->request->getPost('modeenergieselect');
        }

        $adresse = $this->request->getPost('adresse');
        $ville = $this->request->getPost('ville');
        $codepostal = $this->request->getPost('codepostal');
        $description = $this->request->getPost('description');

        $insert = $model->insertAnnonce($mail,$titre,$coutlocation,$coutcharges,$type,$superficie,$typechauffage,$modeenergie,$adresse,$ville,$codepostal,$description);

        if ($this->request->getMethod() === 'post'&& $insert){
            $session->setFlashdata('warning','<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> L\'annonce a été ajoutée !</div>');
            return redirect()->to('Mes-annonces');
        }
        else{
            $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> L\'ajout de l\'annonce a échoué.</div>');
        }
	}

}