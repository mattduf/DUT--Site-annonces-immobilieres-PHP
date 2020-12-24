	<article>
		<h1 class="h1-custom"><span>Les dernières annonces publiées sur <em>ImmoAnnonce</em></span></h1>
		
		<section id="cartes-section">
			{foreach $annonce as $a}
			<div class="carte grow">
				<div class="annonce-image">
					<a href="Annonce-{$a.A_idannonce}"><img src="../../../images/annonces/{$a.P_nom}" class="img-responsive"></a>
				</div>
				<div class="annonce-description">
					<span class="description-titre">{$a.A_titre}</span>
					<span class="description-divers"><i class="fas fa-chart-area"></i> {$a.A_superficie} m²</span>
					<span class="description-divers">{$a.A_cout_loyer}€/mois</span>
					<span class="description-divers">{$a.A_T_type}</span>
					<span class="description-divers"><i class="fas fa-fire-alt"></i> Chauffage&nbsp:&nbsp{$a.A_type_chauffage}</span>
					<span class="description-divers"><i class="fas fa-map-marker-alt"></i> {$a.A_ville}&nbsp({$a.A_CP})</span>
					<span class="description-plus"><a href="Annonce-{$a.A_idannonce}">En&nbspsavoir&nbspplus <i class="fas fa-info-circle"></i></a></span>
				</div>
			</div>
			{/foreach}

			<a href="/Annonces"><div id="carte-deux" class="decrease">
				Parcourir toutes les annonces <i class="far fa-eye"></i>
			</div></a>
		</section>
	</article>