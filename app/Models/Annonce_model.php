<?php
namespace App\Models;

use CodeIgniter\Model;


class Annonce_Model extends Model
{
	protected $table = 't_annonce';

	public function getAnnonce(){ //TODO A completer (limiter à 15 + charger plus)
		$query = 'SELECT * FROM '.$this->table;
        return $this->simpleQuery($query);
	}

	public function getAnnonceAccueil(){
		$query = 'SELECT * FROM '.$this->table.' ORDER BY A_idannonce DESC LIMIT 6';
        return $this->simpleQuery($query);
	}
    public function deleteAnnonce($mail){
        $this->where('A_U_mail',$mail);
        $this->delete();
    }
}
?>