<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Gestion accès espace membre
$routes->post('Inscription', 'AccesMembre::inscription');
$routes->post('Connexion', 'AccesMembre::connexion');
$routes->get('Deconnexion', 'AccesMembre::deconnexion');

//Gestion compte utilisateur
$routes->post('Mon-compte', 'Compte::modifierProfil');
$routes->post('supprimerCompte', 'Compte::supprimerCompte');

//Gestion annonces
$routes->post('Ajouter-une-annonce', 'Annonce::ajouterAnnonce');
$routes->get('Gestion/Annonce-(:num)', 'Annonce::avantModifierAnnonce/$1');
$routes->post('Gestion/Annonce-(:num)', 'Annonce::modifierAnnonce');
$routes->get('Supprimer/Annonce-(:num)','Annonce::supprimerAnnonce/$1');

//Administration
$routes->post('GestionUtilisateurs', 'Administration::GestionUtilisateurs');
$routes->post('GestionAnnonces', 'Administration::GestionAnnonces');
$routes->post('Supprimer-photos', 'Administration::supprimerPhotos');
$routes->post('Modifier-utilisateur', 'Administration::modifierUtilisateur');

//Affichage (à laisser à la fin → important !)
$routes->get('/', 'Home::views');
$routes->get('Contact-(:num)', 'Home::views/Contact');
$routes->post('Contact-(:num)', 'Annonce::contact');
$routes->post('Annonces', 'Annonce::seemore');
$routes->get('Annonce-(:num)', 'Home::affiche/$1');
$routes->get('(:any)', 'Home::views/$1');

$routes->setAutoRoute(false);



/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
