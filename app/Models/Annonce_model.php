<?php
namespace App\Models;

use CodeIgniter\Model;


class Annonce_Model extends Model
{
	protected $table = 't_annonce';
    protected $tablePhoto = 't_photo';
    protected $tableType = 't_typemaison';
    protected $tableEnergie = 't_energie';
    protected $tableUti = 't_utilisateur';

    //[SELECT] Requête qui renvoie les informations de base d'une annonce, sans limite
    //Utilisation : page "Annonces" qui liste toutes les annonces
	public function getAnnonce(){ //TODO A completer (limiter à 15 + charger plus)
        $query = 'SELECT A_idannonce,A_titre,A_superficie,A_cout_loyer,A_T_type,A_U_mail,A_type_chauffage,A_ville,A_CP,P_nom FROM ' .$this->table.' INNER JOIN '.$this->tablePhoto.' WHERE A_idannonce = P_A_idannonce AND P_nom LIKE \'1-%\' AND A_etat != \'brouillon\' ORDER BY A_idannonce DESC';
        return $this->simpleQuery($query);
	}

    //[SELECT] Requête qui renvoie les informations de base d'une annonce, occurrences limitées à 6
    //Utilisation : page d'accueil qui liste les 6 dernières annonces publiées
	public function getAnnonceAccueil(){
		$query = 'SELECT A_idannonce,A_titre,A_superficie,A_cout_loyer,A_T_type,A_U_mail,A_type_chauffage,A_ville,A_CP,P_nom FROM '.$this->table.' INNER JOIN '.$this->tablePhoto.' WHERE A_idannonce = P_A_idannonce AND P_nom LIKE \'1-%\' AND A_etat != \'brouillon\' ORDER BY A_idannonce DESC LIMIT 6';
        return $this->simpleQuery($query);
	}

    //[SELECT] Requête qui renvoie les informations de base d'une annonce publiée par un utilisateur spécifique
    //Utilisation : page "Mes-annonces" qui liste les annonces d'un utilisateur
    public function getAnnonceUtilisateur($mail){
        $query = 'SELECT A_idannonce,A_titre,A_superficie,A_cout_loyer,A_T_type,A_type_chauffage,A_ville,A_CP,P_nom FROM '.$this->table.' INNER JOIN '.$this->tablePhoto.' WHERE A_idannonce = P_A_idannonce AND P_nom LIKE \'1-%\' AND A_U_mail = \''.$mail.'\' ORDER BY A_idannonce DESC';
        return $this->simpleQuery($query);
    }

    //[SELECT] Requête qui renvoie toutes les infos d'une annonce
    //Utilisation : page correspondant à une annonce en particulier
    public function getAnnonceEntiere($idannonce){
        $query = 'SELECT *, DATE_FORMAT(A_date_creation, \'%d-%m-%Y\') AS "A_date_modifiee" FROM '.$this->table.' a JOIN '.$this->tableType.' t ON a.A_T_type = t.T_type JOIN '.$this->tableEnergie.' e ON a.A_E_id_engie = e.E_id_engie JOIN '.$this->tableUti.' u ON a.A_U_mail = u.U_mail WHERE A_idannonce = \''.$idannonce.'\'';
        return $this->simpleQuery($query);
    }

    //[SELECT] Requête qui renvoie toutes les photos d'une annonce
    //Utilisation : page correspondant à une annonce en particulier
    public function getPhotos($idannonce){
        $query = 'SELECT P_nom FROM ' .$this->table.' INNER JOIN '.$this->tablePhoto.' WHERE A_idannonce = \''.$idannonce.'\' AND A_idannonce = P_A_idannonce ORDER BY A_idannonce DESC';
        return $this->simpleQuery($query);
    }

    //[SELECT] Requête qui renvoie l'id de la dernière annonce publiée par un utilisateur
    //Utilisée pour associer les photos à une annonce
    public function getLastAnnonce($mail){
        return $this->asArray()->select('A_idannonce')->where(['A_U_mail' => $mail])->orderBy('A_idannonce', 'DESC')->first();
    }

    //[DELETE] Requête qui supprime les annonces d'un utilisateur
    //Utilisation : losrqu'un utilisateur supprime son compte
    public function deleteAnnonce($mail){
        $this->where('A_U_mail',$mail);
        $this->delete();
    }

    //[DELETE] Requête qui supprime une seule annonce
    //Utilisation : losrqu'un utilisateur clique pour supprimer une annonce
    public function deleteOneAnnonce($mail,$id){
        $this->where('A_U_mail',$mail);
        $this->where('A_idannonce', $id);
        $this->delete();
    }

    //[INSERT INTO] Requête qui crée une annonce
    //Utilisation : page "Ajouter-une-annonce" avec un formulaire de création d'annonce
    public function insertAnnonce($mail,$titre,$coutlocation,$coutcharges,$type,$superficie,$typechauffage,$modeenergie,$adresse,$ville,$codepostal,$description,$etat){
    	$query = 'INSERT INTO '.$this->table. ' VALUES(\'\',"'.$titre.'","'.$coutlocation.'","'.$coutcharges.'","'.$typechauffage.'","'.$superficie.'","'.$description.'","'.$adresse.'","'.$ville.'","'.$codepostal.'",CURRENT_TIMESTAMP,"'.$etat.'","'.$mail.'","'.$modeenergie.'","'.$type.'")';
	    return $this->simpleQuery($query);
    }

    //[INSERT INTO] Requête qui insère une image dans la BDD
    //Utilisation : lorsqu'une annonce est créée et qu'au moins une image est ajoutée dans le formulaire
    public function insertImageAnnonce($nom,$idannonce){
        $query = 'INSERT INTO '.$this->tablePhoto. ' VALUES(\'\',\'\',"'.$nom.'","'.$idannonce.'")';
        return $this->simpleQuery($query);
    }
}
?>