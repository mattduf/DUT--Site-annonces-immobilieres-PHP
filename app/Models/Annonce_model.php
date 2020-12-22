<?php
namespace App\Models;

use CodeIgniter\Model;


class Annonce_Model extends Model
{
	protected $table = 't_annonce';
    protected $tablePhoto = 't_photo';

	public function getAnnonce(){ //TODO A completer (limiter à 15 + charger plus)
		$query = 'SELECT * FROM '.$this->table.' ORDER BY A_idannonce DESC';
        return $this->simpleQuery($query);
	}

	public function getAnnonceAccueil(){
		$query = 'SELECT * FROM '.$this->table.' ORDER BY A_idannonce DESC LIMIT 6';
        return $this->simpleQuery($query);
	}

    public function getAnnonceUtilisateur($mail){
        $query = 'SELECT * FROM '.$this->table.' WHERE A_U_mail = \''.$mail.'\' ORDER BY A_idannonce DESC';
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