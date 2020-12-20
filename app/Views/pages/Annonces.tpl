	<article>
		<section id="cartes-section">
			<!-- TODO barre de recherche-->
			{foreach $annonce as $a}
				<div class="carte grow">
					<div class="annonce-image">
						<img src="../../../images/annonces/2.jpg" class="img-responsive">
					</div>
					<div class="annonce-description" >
						<span class="description-titre">{$a.A_titre}</span>
						<span class="description-divers"><i class="fas fa-chart-area"></i> {$a.A_superficie} m²</span>
						<span class="description-divers">{$a.A_cout_loyer}€/mois</span>
						<span class="description-divers"><i class="fas fa-fire-alt"></i> Chauffage&nbsp:&nbsp{$a.A_type_chauffage}</span>
						<span class="description-divers">{$a.A_ville}&nbsp({$a.A_CP})</span>
						<span class="description-plus"><a href="Annonces/{$a.A_idannonce}">En&nbspsavoir&nbspplus <i class="fas fa-info-circle"></i></a></span>
					</div>
				</div>
			{/foreach}
			<!--TODO charger plus d'annonces-->
			<a href="#"><div id="carte-deux" class="decrease">
					Charger plus d'annonces <i class="far fa-eye"></i>
				</div></a>

		</section>


	</article>