<?php
namespace App\Models;

use CodeIgniter\Model;


class Uti_Model extends Model
{
	protected $table = 't_utilisateur';

	public function insertUti($mail,$mdp,$pseudo,$nom,$prenom,$isadmin = 0){
		$query = 'INSERT INTO '.$this->table. ' VALUES ("'.$mail.'","'.$mdp.'","'.$pseudo.'","'.$nom.'","'.$prenom.'","'.$isadmin.'")';
	    return $this->simpleQuery($query);
	}
	public function verifMail($mail){
	    return $this->asArray()->select('U_mail')->where(['U_mail' => $mail])->first();
	}
}
?>