<head>
    <link rel="stylesheet" href="../../../css/annonce-individuelle.css">
</head>

<div id="aside-article">
    {foreach $annonce as $a}
    <aside>
        <div class="entete" id="proprietaire"><h1>Propriétaire</h1></div>
        <div class="info-proprietaire"><strong>{$a.U_pseudo}</strong></div>
        <div class="info-proprietaire">{$a.U_mail}</div>
        <a href=""><div class="info-proprietaire" id="envoyer-msg"><strong><i class="fas fa-comment"></i> CONTACTER</strong></div></a>
    </aside>

    <section>
        <div class="entete" id="annonce"><h1>{$a.A_titre}</h1></div>
        <div id="section-image">
            <table align="center">
                <tr>
                    {foreach $photos as $p}
                    <td><a href="../../../images/annonces/{$p.P_nom}" target="_blank"><img src="../../../images/annonces/{$p.P_nom}"></a></td>
                    {/foreach}
                </tr>
            </table>
        </div>
        <div class="section-infos">
            <h1>Caractéristiques du logement</h1>
            <table align="center">
                <tr>
                    <td><i class="fas fa-dollar-sign rouge"></i> Coût mensuel de location : {$a.A_cout_loyer}€/mois</td>
                    <td><i class="fas fa-dollar-sign rouge"></i> Coût éventuel des charges : {$a.A_cout_charges}€</td>
                </tr>
                <tr>
                    <td><i class="fas fa-home rouge"></i> Type de logement : {$a.T_description}</td>
                    <td><i class="fas fa-chart-area rouge"></i> Superficie : {$a.A_superficie} m²</td>
                </tr>
                <tr>
                    <td><i class="fas fa-fire-alt rouge"></i> Type de chauffage : {$a.A_type_chauffage}</td>
                    <td><i class="fas fa-burn rouge"></i> Mode d'énergie : {$a.E_description}</td>
                </tr>
                <tr>
                    <td colspan="2"><i class="fas fa-map-marker-alt rouge"></i> Localisation : {$a.A_adresse}, {$a.A_ville} ({$a.A_CP}), <em>{$a.A_region}</em></td>
                </tr>
            </table>
        </div>
        <div class="section-infos">
            <h1>Description</h1>
                <div style="text-align: justify;">{$a.A_description}</div>
        </div>
        <div class="section-infos">
            <h1>Localisation</h1>
            <div id="map-responsive"><iframe width="600" height="500" src="https://maps.google.com/maps?q={$a.A_adresse}%20{$a.A_CP}%20{$a.A_ville}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
        </div>
        <div id="date"><em>Publié le {$a.A_date_modifiee} - Annonce #{$a.A_idannonce}</em></div>
        {/foreach}
    </section>

    <a href="/Annonces"><div id="retour-annonces" class="decrease"><i class="fas fa-chevron-left"></i> Retour aux annonces</div></a>
</div>