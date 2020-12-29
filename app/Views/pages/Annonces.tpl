	<article>
		<section id="cartes-section">
			<div id="recherche-annonce">


				<a href="#"><div id="bouton-rechercher" class="decrease"><i class="fas fa-search"></i> Rechercher</div></a>
			</div>

			{foreach $annonce as $a}
				<div class="carte grow">

					{if $a.A_U_mail eq $mail}
						<a id="lien-annonce-uti" href="Gestion/Annonce-{$a.A_idannonce}"><div class="annonce-uti">Votre annonce</div></a>
					{/if}

					<div class="annonce-image">
						<a href="Annonce-{$a.A_idannonce}"><img src="../../../images/annonces/{$a.P_nom}" class="img-responsive"></a>
					</div>
					<div class="annonce-description" >
						<span class="description-titre">{$a.A_titre}</span>
						<span class="description-divers"><i class="fas fa-chart-area"></i> {$a.A_superficie} m²</span>
						<span class="description-divers">{$a.A_cout_loyer}€/mois</span>
						<span class="description-divers">{$a.A_T_type}</span>
						<span class="description-divers"><i class="fas fa-fire-alt"></i> Chauffage&nbsp:&nbsp{$a.A_type_chauffage}</span>
						<span class="description-divers"><i class="fas fa-map-marker-alt"></i> {$a.A_ville}&nbsp({$a.A_CP})</span>
						<span class="description-plus"><a href="Annonce-{$a.A_idannonce}">En&nbspsavoir&nbspplus <i class="fas fa-info-circle"></i></a></span>
					</div>
				</div>
				{* {if $a@iteration >= 15}
					{break}
				{/if} *}

				{if $a@last}
				    <div style="margin-top:20px;"><em>{$a@total} annonces chargée(s).</em></div>
			  	{/if}
			{/foreach}
			<!--TODO charger plus d'annonces-->
			<a href="#"><div id="carte-deux" class="decrease">
					Charger plus d'annonces <i class="far fa-eye"></i>
				</div></a>

		</section>


	</article>