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

	public function verifPseudo($pseudo){
	    return $this->asArray()->select('U_pseudo')->where(['U_pseudo' => $pseudo])->first();
	}

	public function userexist($mail,$mdp){
	    return $this->asArray()->select('U_mail')->where(['U_mail' => $mail])->where(['U_mdp' => $mdp])->first();
    }

    public function getUserInfo($mail){
	    $query = 'SELECT U_mail,U_pseudo,U_nom,U_prenom FROM '.$this->table .' WHERE U_mail = "'. $mail.'"';
        return $this->simpleQuery($query);

    }
    public function getPassword($mdp){
	    return $this->asArray()->where(['U_mdp' =>$mdp])->first();
    }
    public function UpdateInfoWithoutMdp($mail,$pseudo,$nom,$prenom){
        $query = 'UPDATE '.$this->table .' SET U_pseudo = "'.$pseudo.'", U_nom = "'.$nom.'", U_prenom = "'.$prenom.'" where U_mail = "'.$mail.'"';
        return $this->simpleQuery($query);
    }
    public function UpdateInfoWithMdp($mail,$pseudo,$nom,$prenom,$mdp){
        $query = 'UPDATE '.$this->table .' SET U_pseudo = "'.$pseudo.'", U_nom = "'.$nom.'", U_prenom = "'.$prenom.'", U_mdp = "'.$mdp.'" where U_mail = "'.$mail.'"';
        return $this->simpleQuery($query);
    }

    public function deleteAccount($mail){
        $this->where('U_mail',$mail);
        $this->delete();

    }
}
?>