	<article>
		<section id="cartes-section">
			<!-- Section recherche d'annonces -->
			<div id="recherche-annonce">
				<form class="pure-form" method="post" name="searchAnonce">
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
						<option value="Provence-Alpes-Côte d'Azur">Provence-Alpes-Côte d'Azur</option>
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

					<label for="type-chauffage">Type de chauffage</label>
					<select id="type-chauffage" name="typechauffageselect" style="margin-bottom:2px; height:2.3em;">
						<option value="">Sélectionner</option>
						<option value="Collectif">Collectif</option>
						<option value="Individuel">Individuel</option>
					</select><br/>

					<label for="superficie">Superficie</label>
					<input type="number" id="superficie" placeholder="Superficie du logement" name="superficie"/>

					<label for="loyer-min">Loyer min.</label>
					<input style="width:50px;" type="number" id="loyer-min" placeholder="" name="loyer-min"/>

					<label for="loyer-max">Loyer max.</label>
					<input style="width:50px;" type="number" id="loyer-max" placeholder="" name="loyer-max"/>

					<button type="submit" name="button" id="bouton-rechercher" class="decrease pure-button pure-button-primary"><i class="fas fa-search"></i> Rechercher</button>
				</form>
			</div>
			<!-- Fin section recherche d'annonces -->

			<!-- Affichage des annonces -->
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
			<!-- Fin de l'affichage des annonces -->

			<!--TODO charger plus d'annonces-->
			<a href="#"><div id="carte-deux" class="decrease">
					Charger plus d'annonces <i class="far fa-eye"></i>
				</div></a>

		</section>
	</article>