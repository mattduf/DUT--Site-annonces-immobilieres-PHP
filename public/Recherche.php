<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ImmoAnnonce</title>
        <link rel="icon" href="Images/../../../images/icone.png"/>
        <link rel="stylesheet" href="../../../css/main.css">
        <link rel="stylesheet" href="../../../css/carte.css">
        <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/forms.css">
        <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/buttons.css">
        <link rel="stylesheet" href="../../../css/fontawesome/css/all.css">
        <link rel="stylesheet" href="../../../css/navbar.css">
        <link rel="stylesheet" href="../../../css/footer.css">
    </head>

    <div class="topnav" id="myTopnav">
        <a href="/" id="logo-navbar"><img src="../../../images/logo.png"></a>
        <a href="/Annonces"><i class="fas fa-search"></i> Rechercher une annonce</a>
    </div>

    <body>
        <button onclick="topFunction()" id="myBtn" title="Retour en haut"><i class="fas fa-chevron-up"></i></button>
        <script src="../../../js/backToTop.js"></script>
        <article>
            <section id="cartes-section">
                <!-- Section recherche d'annonces -->
                <div id="recherche-annonce">
                    <form class="pure-form" method="post" action="Recherche.php" name="searchAnonce">
                        <label for="localisation">Localisation</label>
                        <input type="text" id="localisation" placeholder="Ville ou code postal" name="localisation" style="margin-bottom:2px;"/>

                        <select id="region" name="region" style="margin-bottom:2px; height:2.3em;">
                            <option value="">Sélectionner une région</option>
                            <option value="Auvergne-Rhône-Alpes">Auvergne-Rhône-Alpes</option>
                            <option value="Bourgogne-Franche-Comté">Bourgogne-Franche-Comté</option>
                            <option value="Bretagne">Bretagne</option>
                            <option value="Centre-Val de Loire">Centre-Val de Loire</option>
                            <option value="Corse">Corse</option>
                            <option value="Grand Est">Grand Est</option>
                            <option value="Hauts-de-France">Hauts-de-France</option>
                            <option value="Île-de-France">Île-de-France</option>
                            <option value="Normandie">Normandie</option>
                            <option value="Nouvelle-Aquitaine">Nouvelle-Aquitaine</option>
                            <option value="Occitanie">Occitanie</option>
                            <option value="Pays de la Loire">Pays de la Loire</option>
                            <option value="Provence-Alpes-Côte d\'Azur">Provence-Alpes-Côte d'Azur</option>
                        </select>

                        <label for="type">Type</label>
                        <select id="type" name="typeselect" style="margin-bottom:2px; height:2.3em;">
                            <option value="">Sélectionner</option>
                            <option value="T1">T1</option>
                            <option value="T2">T2</option>
                            <option value="T3">T3</option>
                            <option value="T4">T4</option>
                            <option value="T5">T5</option>
                            <option value="T6">T6</option>
                        </select>
                        <br class="br-deux"/>

                        <label for="type-chauffage">Type de chauffage</label>
                        <select id="type-chauffage" name="typechauffageselect" style="margin-bottom:2px; height:2.3em;">
                            <option value="">Sélectionner</option>
                            <option value="Collectif">Collectif</option>
                            <option value="Individuel">Individuel</option>
                        </select>
                        <br class="br-un"/>

                        <label for="superficie">Superficie</label>
                        <input type="number" min="0" id="superficie" placeholder="Superficie du logement" name="superficie"/>
                        <br class="br-deux"/>

                        <label for="loyer-min">Loyer min.</label>
                        <input style="width:50px;" type="number" min="0" id="loyer-min" placeholder="" name="loyer-min"/>

                        <label for="loyer-max">Loyer max.</label>
                        <input style="width:50px;" type="number" min="0" id="loyer-max" placeholder="" name="loyer-max"/>

                        <button type="submit" name="button" id="bouton-rechercher" class="decrease pure-button pure-button-primary"><i class="fas fa-search"></i> Rechercher</button>
                    </form>
                </div>
                <!-- Fin section recherche d'annonces -->

                <!-- Affichage des annonces -->
                    <?php
                        $bdd = mysqli_connect("127.0.0.1", "munoz", "munoz", "annonces");
                        //$mail = $_SESSION['mail'];

                        if(isset($_POST['localisation'])) {
                            $localisation = $_POST['localisation'];
                        }

                        if (empty($localisation)) {
                            $codepostal = '%';
                            $ville = '%';
                        } else if (is_numeric($localisation)) {
                            $codepostal = $localisation;
                            $ville = '%';
                        } else {
                            $ville = $localisation;
                            $codepostal = '%';
                        }

                        if(isset($_POST['region'])) {
                            $region = $_POST['region'];
                        }

                        if (empty($region)) {
                            $region = '%';
                        }

                        if(isset($_POST['typeselect'])) {
                            $type = $_POST['typeselect'];
                        }

                        if (empty($type)) {
                            $type = '%';
                        }

                        if(isset($_POST['superficie'])) {
                            $superficie = $_POST['superficie'];
                        }

                        if (empty($superficie)) {
                            $superficie = '%';
                        }

                        if(isset($_POST['typechauffageselect'])) {
                            $typechauffage = $_POST['typechauffageselect'];
                        }

                        if (empty($typechauffage)) {
                            $typechauffage = '%';
                        }

                        if(isset($_POST['loyer-min'])) {
                            $loyermin = $_POST['loyer-min'];
                        }

                        if (empty($loyermin)) {
                            $loyermin = 0;
                        }

                        if(isset($_POST['loyer-max'])) {
                            $loyermax = $_POST['loyer-max'];
                        }

                        if (empty($loyermax)) {
                            $loyermax = 9999999;
                        }

                        $select_annonce = "SELECT A_idannonce,A_titre,A_superficie,A_cout_loyer,A_T_type,A_U_mail,A_type_chauffage,A_ville,A_CP,P_nom FROM t_annonce INNER JOIN t_photo WHERE A_idannonce = P_A_idannonce AND P_nom LIKE '1-%' AND A_etat = 'publiée' AND A_ville LIKE '$ville' AND A_CP LIKE '$codepostal' AND A_region LIKE '$region' AND A_T_type LIKE '$type' AND A_type_chauffage LIKE '$typechauffage' AND A_superficie LIKE '$superficie' AND A_cout_loyer BETWEEN '$loyermin' AND '$loyermax' ORDER BY A_idannonce DESC";

                        $resultat = mysqli_query($bdd,$select_annonce);

                        if(mysqli_num_rows($resultat) == 0)
                        {
                            echo "Aucun résultat.";
                        }
                        else{
                            while ($data = mysqli_fetch_assoc($resultat)) {
                                echo '<div class="carte grow">';
                                echo '<div class="annonce-image"><a href="Annonce-'.$data["A_idannonce"].'"><img src="../../../images/annonces/'.$data["P_nom"].'" class="img-responsive"></a></div>';
                                    echo '<div class="annonce-description">';
                                        echo '<span class="description-titre">'.$data["A_titre"].'</span>';
                                        echo '<span class="description-divers"><i class="fas fa-chart-area"></i> '.$data["A_superficie"].' m²</span>';
                                        echo '<span class="description-divers">'.$data["A_cout_loyer"].'€/mois</span>';
                                        echo '<span class="description-divers">'.$data["A_T_type"].'</span>';
                                        echo '<span class="description-divers"><i class="fas fa-fire-alt"></i> Chauffage&nbsp:&nbsp'.$data["A_type_chauffage"].'</span>';
                                        echo '<span class="description-divers"><i class="fas fa-map-marker-alt"></i> '.$data["A_ville"].'&nbsp('.$data["A_CP"].')</span>';
                                        echo '<span class="description-plus"><a href="Annonce-'.$data["A_idannonce"].'">En&nbspsavoir&nbspplus <i class="fas fa-info-circle"></i></a></span>';
                                    echo '</div>';
                                echo '</div>';
                            }
                            $nbannonces = mysqli_num_rows($resultat);

                            echo '<div style="margin-top:20px;"><em>'.$nbannonces.' résultat(s).</em>';
                        }
                    ?>
            </section>
        </article>

        <footer>
            <div><strong>© Copyright ImmoAnnonce</strong><br/>Mattéo DUFOUR & Matteo MUNOZ</div>
        </footer>
    </body>
