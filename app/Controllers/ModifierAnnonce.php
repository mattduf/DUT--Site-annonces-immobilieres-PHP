<?php


namespace App\Controllers;

use App\Models\Annonce_Model;
use CodeIgniter\Controller;
use App\Models\Uti_Model;

class ModifierAnnonce extends Controller
{
    public function edit ($page = 'Mes-annonces'){
        $session = \Config\Services::session();
        $model = new Annonce_Model();

        $verifUser =  $model->verifAnnonce($session->get('mail'),$page);

        $etat = mysqli_fetch_array($model->getEtatAnnonce($page));
        if ($etat['A_etat'] == "bloquée") { #TODO check etat annonce accueil consultation aussi
            $session->setFlashdata('warning', '<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Modification impossible car l\'annonce est bloquée. </div>');
            return redirect()->to('/Mes-annonces');
        }elseif(!empty($verifUser)) {
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

            echo view('pages/Modifier-une-annonce.php',$data);

            echo view('templates/footer.tpl',$data);

        }else{
            $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Vous n\'êtes pas le propriétaire de cette annonce. </div>');
            return redirect()->to('/Mes-annonces');
        }

    }

    public function updateAnnonce()
    {
        $session = \Config\Services::session();
        $annonceModel = new Annonce_Model();

        $id = $session->getFlashdata('id');

        if ($this->request->getPost('button')) {
            //Variable getPost qui récupère les saisi dans le formulaire
            $titre = $this->request->getPost('title');
            $coutlocation = $this->request->getPost('coutlocation');
            $coutcharges = $this->request->getPost('coutcharges');
            $type = $this->request->getPost('typeselect');
            $superficie = $this->request->getPost('superficie');
            $typeChauffage = $this->request->getPost('typechauffageselect');
            $modeEnergie = $this->request->getPost('modeenergieselect');
            $adresse = $this->request->getPost('adresse');
            $ville = $this->request->getPost('ville');
            $codepostal = $this->request->getPost('codepostal');
            $region = $this->request->getPost('region');
            $description = $this->request->getPost('description');
            $etat = $this->request->getPost('etat');


            $updateAnnonce = $annonceModel->updateAnnonce($id, $titre, $coutlocation, $coutcharges, $type, $superficie, $typeChauffage, $modeEnergie, $adresse, $ville, $region, $codepostal, $description, $etat);
            if ($this->request->getMethod() === 'post' && $updateAnnonce) {
                $session->setFlashdata('warning', '<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> Les modifications ont bien été prises en compte !</div>');
                return redirect()->to('/Mes-annonces');
            } else {
                $session->setFlashdata('warning', '<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> La modification des informations a échoué.</div>');
                return redirect()->to('/Mes-annonces');
            }

        }
        if($this->request->getPost('buttondeletephoto')){
            $idphoto = $this->request->getPost('deletePhoto[]');
            $nombrePhoto = mysqli_fetch_array($annonceModel->getHowManyPhotos($id));

            if ($nombrePhoto['nbrphoto'] == sizeof($idphoto)){
                $session->setFlashdata('warning', '<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Vous ne pouvez pas supprimer toutes vos photos.</div>');
                return redirect()->to('');
            }else{
                if ($nombrePhoto['nbrphoto']  == 1){
                    $session->setFlashdata('warning', '<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Vous ne pouvez pas supprimer l\'unique photo de l\'annnonce.</div>');
                    return redirect()->to('');
                }
                for ($i=0; $i < sizeof($idphoto) ; $i++) {
                    $annonceModel->deletePhoto($idphoto[$i]);
                }
                $session->setFlashdata('warning', '<div class="alerte alerte-succes"><strong>SUCCÈS </strong><i class="fas fa-check"></i> La suppression a bien été prise en compte !</div>');
                return redirect()->to('');
            }


        }
        if($this->request->getPost('buttonaddphoto')) {
            $nombrePhoto = mysqli_fetch_array($annonceModel->getHowManyPhotos($id));
            //$posPhoto = $annonceModel->getPosPhotos($id);
            if ($nombrePhoto['nbrphoto'] >= 5){
                $session->setFlashdata('warning', '<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> Vous ne pouvez pas ajouter plus de photos à cette annonce (maximum 5).</div>');
                return redirect()->to('');
            }else{
                $fichier = basename($_FILES["image"]["name"]);
                $image = 'image';

                $rand = rand(1,50);
                $dossier = ROOTPATH."public/images/annonces/";

                if (!empty($fichier)) {
                    $temp = explode(".", $_FILES[$image]["name"]);
                    $newfilename = $rand . '-' . current($temp) . '-' . $id . '.' . end($temp);

                    if(move_uploaded_file($_FILES[$image]['tmp_name'], $dossier . $newfilename)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                    {
                        $annonceModel->insertImageAnnonce($newfilename,$id);
                    }
                    else //Sinon (la fonction renvoie FALSE).
                    {
                        $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> L\'ajout de l\'image a échoué.</div>');
                        return redirect()->to('');
                    }
                }else{
                    $session->setFlashdata('warning','<div class="alerte alerte-echec"><strong>ERREUR </strong><i class="fas fa-exclamation-triangle"></i> L\'ajout de l\'image a échoué.</div>');
                    return redirect()->to('');
                }
            }

        }

        return redirect()->to('');
    }

}