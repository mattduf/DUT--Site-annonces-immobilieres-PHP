<?php
namespace App\Models;

use CodeIgniter\Model;


class Annonce_Model extends Model
{
	protected $table = 't_annonce';

	public function getAnnonce(){
		$query = 'SELECT A_titre,A_cout_loyer,A_superficie,A_ville FROM '.$this->table;
        return $this->simpleQuery($query);
	}

}
?>