<?php 
namespace App\Controllers;

use App\Models\Uti_Model;
use CodeIgniter\Controller;
Use App\Models\Annonce_Model;
use CodeIgniter\Session\Session;

class Ajouter_une_annonce extends Controller
{
    public function addAnnonce()
	{
	    $session = \Config\Services::session();
        $model = new Annonce_Model();
        $modelUti = new Uti_Model();
        
        $mail = $session->get('mail'); //a voir
        $titre = $this->request->getPost('title');
        $coutlocation = $this->request->getPost('coutlocation');
        $coutcharges = $this->request->getPost('coutcharges');
        $type = $this->request->getPost('typeselect');
        $superficie = $this->request->getPost('superficie');
        $typechauffage = $this->request->getPost('typechauffageselect');
        $selectedbutton = $this->request->getPost('button');
        if($typechauffage === "Collectif")
        {
            $modeenergie = '4';
        }
        else
        {
            $modeenergie = $this->request->getPost('modeenergieselect');
        }

        $adresse = $this->request->getPost('adresse');
        $ville = $this->request->getPost('ville');
        $region = $this->request->getPost('region');
        $codepostal = $this->request->getPost('codepostal');
        $description = $this->request->getPost('description');
		$dossier = ROOTPATH."public/images/annonces/";
        $verifEtat = $modelUti->verifEtat($session->get('mail'));

        if(empty($verifEtat)) {
            if ($selectedbutton === "publiée") {
                $insert = $model->insertAnnonce($mail, $titre, $coutlocation, $coutcharges, $type, $superficie, $typechauffage, $modeenergie, $adresse, $ville, $region, $codepostal, $description, "publiée");
            } else {
                $insert = $model->insertAnnonce($mail, $titre, $coutlocation, $coutcharges, $type, $superficie, $typechauffage, $modeenergie, $adresse, $ville, $region, $codepostal, $description, "brouillon");
            }

            //Upload image sur le serveur
            for ($i = 1; $i <= 5; $i++) {
                ${"fichier" . $i} = basename($_FILES["image" . "$i"]["name"]);
                ${"image" . $i} = 'image' . $i;
                $idAnnonce = $model->getLastAnnonce($mail);

                if (!empty(${"fichier" . $i})) {
                    $this->uploadImage(${"image" . $i}, $dossier, $idAnnonce, $i);
                }
            }

            if ($this->request->getMethod() === 'post' && $insert) {
                $session->setFlashdata('warning', '<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> L\'annonce a été ajoutée !</div>');
                return redirect()->to('Mes-annonces');
            } else {
                $session->setFlashdata('warning', '<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> L\'ajout de l\'annonce a échoué.</div>');
            }
        }
        else{
            $session->setFlashdata('warning', '<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Vous êtes bloqué.</div>');
            return redirect()->to('Mes-annonces');
        }
	}

	public function uploadImage($image, $dossier, $idAnnonce, $i){
        $model = new Annonce_Model();
        $temp = explode(".", $_FILES[$image]["name"]);
		$newfilename = $i . '-' . current($temp) . '-' . current($idAnnonce) . '.' . end($temp);

		if(move_uploaded_file($_FILES[$image]['tmp_name'], $dossier . $newfilename)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
	    {
	        $model->insertImageAnnonce($newfilename,current($idAnnonce));
	    }
	    else //Sinon (la fonction renvoie FALSE).
	    {
	        echo 'Echec de l\'upload !';
	    }
	}

	public function deleteannonce($id){
        $session = \Config\Services::session();
        $model = new Annonce_Model();
        $utimodel = new Uti_Model();

       $verifUser =  $model->verifAnnonce($session->get('mail'),$id);
        if (!empty($verifUser)) {

            $utimodel->deletePhoto($id);
            $model->deleteOneAnnonce($session->get('mail'), $id);
            $session->setFlashdata('warning', '<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> L\'annonce a bien été supprimée !</div>');
            //TODO delete message
            return redirect()->to('/Mes-annonces');
        }else{
            $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Vous n\'êtes pas le propriétaire de cette annonce. </div>');
            return redirect()->to('/Mes-annonces');
        }
    }
}