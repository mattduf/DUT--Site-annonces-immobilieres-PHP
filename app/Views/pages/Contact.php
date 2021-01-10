<?php
    $session = \Config\Services::session();

	use App\Models\Annonce_Model;

    echo service('SmartyEngine')->view('../pages/Contact.tpl');