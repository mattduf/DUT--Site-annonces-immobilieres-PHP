<?php
namespace App\Models;

use CodeIgniter\Model;


class Uti_Model extends Model
{
	protected $table = 't_utilisateur';
    protected $message = 't_message';

    //[INSERT INTO] Requête qui crée un utilisateur
    //Utilisation : page "Inscription" avec un formulaire de création de compte
	public function insertUti($mail,$mdp,$pseudo,$nom,$prenom,$isadmin = 0){
		$query = 'INSERT INTO '.$this->table. ' VALUES ("'.$mail.'","'.$mdp.'","'.$pseudo.'","'.$nom.'","'.$prenom.'", \'actif\',CURRENT_TIMESTAMP,"'.$isadmin.'")';
	    return $this->simpleQuery($query);
	}

    //[SELECT] Requête qui renvoie le mail d'un utilisateur
    //Utilisation : page "Inscription", on vérifie que l'adresse mail n'existe pas
	public function verifMail($mail){
	    return $this->asArray()->select('U_mail')->where(['U_mail' => $mail])->first();
	}

    //[SELECT] Requête qui renvoie l'état'
    //Utilisation : page "Ajouter-une-annonce"
    public function verifEtat($mail){
        return $this->asArray()->select('U_etat')->where(['U_mail' => $mail])->where(['U_etat' => "bloqué"])->first();
    }

    //[SELECT] Requête qui renvoie le pseudo d'un utilisateur
    //Utilisation : page "Inscription", on vérifie que le pseudo n'existe pas
	public function verifPseudo($pseudo){
	    return $this->asArray()->select('U_pseudo')->where(['U_pseudo' => $pseudo])->first();
	}

    //[SELECT] Requête qui renvoie le mail et le mot de passe d'un utilisateur
    //Utilisation : page "Connexion", on vérifie que l'adresse mail et le mdp correspondent
	public function userexist($mail,$mdp){
	    return $this->asArray()->select('U_mail')->where(['U_mail' => $mail])->where(['U_mdp' => $mdp])->first();
    }

    //[SELECT] Requête qui renvoie les informations d'un utilisateur
    //Utilisation : page "Connexion", on crée la session avec les données de l'utilisateur
    public function getUserInfo($mail){
	    $query = 'SELECT U_mail,U_pseudo,U_nom,U_prenom FROM '.$this->table .' WHERE U_mail = "'. $mail.'"';
        return $this->simpleQuery($query);
    }

    //[SELECT] Requête qui renvoie les infos de tous les utilisateurs
    //Utilisation : page "Panneau-Administration" qui liste tous les utilisateurs
    public function getAllUsers(){
        $query = 'SELECT U_mail,U_pseudo,U_nom,U_prenom,U_etat,DATE_FORMAT(U_date_creation, \'%d-%m-%Y\') AS "U_date_modifiee" FROM '.$this->table.' ORDER BY U_date_creation DESC';
        return $this->simpleQuery($query);
    }

    //[SELECT] Requête qui renvoie le mdp d'un utilisateur
    //Utilisation : lorsqu'un utilisateur modifie son compte
    public function getPassword($mdp){
	    return $this->asArray()->where(['U_mdp' =>$mdp])->first();
    }

    //[SELECT] Requête qui renvoie le statut admin de l'utilisateur
    //Utilisation : Pour vérifier si l'utilisateur est un admin
    public function getIsAdmin($mail){
        return $this->asArray()->select('U_isAdmin')->where(['U_mail' => $mail])->first();
    }

    //[UPDATE] Requête qui modifie les informations d'un utilisateur
    //Utilisation : si le mdp reste inchangé
    public function UpdateInfoWithoutMdp($mail,$pseudo,$nom,$prenom){
        $query = 'UPDATE '.$this->table .' SET U_pseudo = "'.$pseudo.'", U_nom = "'.$nom.'", U_prenom = "'.$prenom.'" where U_mail = "'.$mail.'"';
        return $this->simpleQuery($query);
    }

    //[UPDATE] Requête qui modifie les informations d'un utilisateur
    //Utilisation : si le mdp est également changé
    public function UpdateInfoWithMdp($mail,$pseudo,$nom,$prenom,$mdp){
        $query = 'UPDATE '.$this->table .' SET U_pseudo = "'.$pseudo.'", U_nom = "'.$nom.'", U_prenom = "'.$prenom.'", U_mdp = "'.$mdp.'" where U_mail = "'.$mail.'"';
        return $this->simpleQuery($query);
    }

    //[UPDATE] Requête qui bloque un compte
    //Utilisation : administration
    public function blockUser($mail){
        $query = 'UPDATE '.$this->table .' SET U_etat = "bloqué" WHERE U_mail = "'.$mail.'"';
        return $this->simpleQuery($query);
    }

    //[UPDATE] Requête qui débloque un compte
    //Utilisation : administration
    public function unblockUser($mail){
        $query = 'UPDATE '.$this->table .' SET U_etat = "actif" WHERE U_mail = "'.$mail.'"';
        return $this->simpleQuery($query);
    }

    //[DELETE] Requête qui supprime le compte d'un utilisateur
    //Utilisation : page "Mon-compte"
    public function deleteAccount($mail){
        $this->where('U_mail',$mail);
        $this->delete();
    }

    public function deletePhoto($id){
	    $query = 'DELETE FROM t_photo WHERE P_A_idannonce = "'.$id.'"';
	    return $this->simpleQuery($query);
    }

    //TODO A déplacer
    public function deleteMessage($mail){
	    $query = 'DELETE FROM '.$this->message.' WHERE M_U_mail = "'.$mail.'"';
        return $this->simpleQuery($query);
       // $this->where('M_U_mail',$mail);
        //$this->delete();
    }
}
?>