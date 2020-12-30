<?php 
namespace App\Controllers;

use App\Models\Uti_Model;
use CodeIgniter\Controller;
Use App\Models\Annonce_Model;

class Recherche extends Controller
{
    public function searchAnnonce()
	{
        $model = new Annonce_Model();

        $localisation = $this->request->getPost('localisation');
        if(empty($localisation))
        {
            $codepostal = '\'%\'';
            $ville = '\'%\'';
        }
        else if(is_numeric($localisation))
        {
            $codepostal = $localisation;
            $ville = '\'%\'';
        }
        else{
            $ville = $localisation;
            $codepostal = '\'%\'';
        }

        $region = $this->request->getPost('region');
        if(empty($region))
        {
            $region =  '\'%\'';
        }

        $type = $this->request->getPost('typeselect');
        if(empty($type))
        {
            $type =  '\'%\'';
        }

        $superficie = $this->request->getPost('superficie');
        if(empty($superficie))
        {
            $superficie =  '\'%\'';
        }

        $typechauffage = $this->request->getPost('typechauffageselect');
        if(empty($typechauffage))
        {
            $typechauffage =  '\'%\'';
        }

        $loyermin = $this->request->getPost('loyer-min');
        if(empty($loyermin))
        {
            $loyermin =  0;
        }

        $loyermax = $this->request->getPost('loyer-max');
        if(empty($loyermax))
        {
            $loyermax =  9999999;
        }

        $select = $model->searchAnnonce($ville,$codepostal,$region,$type,$typechauffage,$superficie,$loyermin,$loyermax);
    }
}