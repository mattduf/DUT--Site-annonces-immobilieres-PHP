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
        
        
        /* UPLOAD IMAGE NE MARCHE PAS
        $target_dir = "../../public/image/annonces/";
		$target_file = $target_dir . basename($_FILES["image1"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["image1"]["tmp_name"]);
		  if($check !== false) {
		    echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file)) {
		    echo "The file ". htmlspecialchars( basename( $_FILES["image1"]["name"])). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}
		*/





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