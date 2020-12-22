<?php
namespace App\Models;

use CodeIgniter\Model;


class Annonce_Model extends Model
{
	protected $table = 't_annonce';
    protected $tablePhoto = 't_photo';

	public function getAnnonce(){ //TODO A completer (limiter à 15 + charger plus)
        $query = 'SELECT A_idannonce,A_titre,A_superficie,A_cout_loyer,A_T_type,A_type_chauffage,A_ville,A_CP,P_nom FROM '.$this->table.' INNER JOIN '.$this->tablePhoto.' WHERE A_idannonce = P_A_idannonce AND P_nom LIKE \'1-%\' ORDER BY A_idannonce DESC';
        return $this->simpleQuery($query);
	}

	public function getAnnonceAccueil(){
		$query = 'SELECT A_idannonce,A_titre,A_superficie,A_cout_loyer,A_T_type,A_type_chauffage,A_ville,A_CP,P_nom FROM '.$this->table.' INNER JOIN '.$this->tablePhoto.' WHERE A_idannonce = P_A_idannonce AND P_nom LIKE \'1-%\' ORDER BY A_idannonce DESC LIMIT 6';
        return $this->simpleQuery($query);
	}

    public function getAnnonceUtilisateur($mail){
        $query = 'SELECT A_idannonce,A_titre,A_superficie,A_cout_loyer,A_T_type,A_type_chauffage,A_ville,A_CP,P_nom FROM '.$this->table.' INNER JOIN '.$this->tablePhoto.' WHERE A_idannonce = P_A_idannonce AND P_nom LIKE \'1-%\' AND A_U_mail = \''.$mail.'\' ORDER BY A_idannonce DESC';
        return $this->simpleQuery($query);
    }

    public function getLastAnnonce($mail){
        return $this->asArray()->select('A_idannonce')->where(['A_U_mail' => $mail])->orderBy('A_idannonce', 'DESC')->first();
    }

    public function deleteAnnonce($mail){
        $this->where('A_U_mail',$mail);
        $this->delete();
    }

    public function insertAnnonce($mail,$titre,$coutlocation,$coutcharges,$type,$superficie,$typechauffage,$modeenergie,$adresse,$ville,$codepostal,$description){
    	$query = 'INSERT INTO '.$this->table. ' VALUES(\'\',"'.$titre.'","'.$coutlocation.'","'.$coutcharges.'","'.$typechauffage.'","'.$superficie.'","'.$description.'","'.$adresse.'","'.$ville.'","'.$codepostal.'",CURRENT_TIMESTAMP,\'brouillon\',"'.$mail.'","'.$modeenergie.'","'.$type.'")';
	    return $this->simpleQuery($query);
    }
    public function insertImageAnnonce($nom,$idannonce){
        $query = 'INSERT INTO '.$this->tablePhoto. ' VALUES(\'\',\'\',"'.$nom.'","'.$idannonce.'")';
        return $this->simpleQuery($query);
    }
}
?>