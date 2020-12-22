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
		$dossier = ROOTPATH."public/images/annonces/";

		$insert = $model->insertAnnonce($mail,$titre,$coutlocation,$coutcharges,$type,$superficie,$typechauffage,$modeenergie,$adresse,$ville,$codepostal,$description);
        
        //Upload image sur le serveur
        for ($i=1; $i<=5 ; $i++) { 
        	${"fichier".$i} = basename($_FILES["image"."$i"]["name"]);
        	${"image".$i} = 'image'.$i;
        	$idAnnonce = $model->getLastAnnonce($mail);

        	if(!empty(${"fichier".$i}))
			{
				$this->uploadImage(${"fichier".$i},${"image".$i},$dossier, $idAnnonce);
		    }
        }

        if ($this->request->getMethod() === 'post'&& $insert){
            $session->setFlashdata('warning','<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> L\'annonce a été ajoutée !</div>');
            return redirect()->to('Mes-annonces');
        }
        else{
            $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> L\'ajout de l\'annonce a échoué.</div>');
        }
	}

	public function uploadImage($fichier,$image,$dossier,$idAnnonce){
		$temp = explode(".", $_FILES[$image]["name"]);
		$newfilename = current($temp) . '-' . current($idAnnonce) . '.' . end($temp);

		if(move_uploaded_file($_FILES[$image]['tmp_name'], $dossier . $newfilename)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
	    {
	        echo 'Upload effectué avec succès !';
	    }
	    else //Sinon (la fonction renvoie FALSE).
	    {
	        echo 'Echec de l\'upload !';
	    }
	}
}