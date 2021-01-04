<head>
	<link rel="stylesheet" href="../../../css/mon-compte.css">
</head>
	<div id="aside-article">
		<aside>
			<ul id="menu">
				<li id="menu-pseudo">{$pseudo}</li>
				<li><a href="Mon-compte">Profil <i class="fas fa-user"></i></a></li>
				<li id="menu-actif"><a href="Mes-annonces">Mes annonces <i class="fas fa-tag"></i></a></li>
				<li><a href="Mes-messages">Mes messages <i class="fas fa-comments-dollar"></i></a></li>
			</ul>
		</aside>

		<section>
			<div id="section-liste-annonces">
				<h1 class="h1-custom"><span><i class="far fa-list-alt"></i> Liste de mes annonces</span></h1>
					<div id="cartes-section">

					{foreach $annonceUti as $a}
						{assign "bool" 0}
					<div class="carte grow">
						{if $a.A_etat eq "publiée"}
							<div class="entete-etat" style="background-color: rgba(24, 200, 49, 0.7);"><abbr title="L'annonce est publiée sur le site, elle est par conséquent accessible à tous les utilisateurs.">{$a.A_etat}</abbr> <i class="fas fa-info-circle"></i></div>
						{elseif $a.A_etat eq "brouillon"}
							<div class="entete-etat" style="background-color: rgba(24,138,200, 0.7);"><abbr title="L'annonce est encore en brouillon, elle n'est par conséquent pas visible.">{$a.A_etat}</abbr> <i class="fas fa-info-circle"></i></div>
						{elseif $a.A_etat eq "archivée"}
							<div class="entete-etat" style="background-color: rgba(200,191,24, 0.7);"><abbr title="L'annonce est archivée, elle n'est par conséquent plus accessible aux utilisateurs.">{$a.A_etat}</abbr> <i class="fas fa-info-circle"></i></div>
						{elseif $a.A_etat eq "bloquée"}
							<div class="entete-etat" style="background-color: rgba(200,24,24, 0.7);"><abbr title="L'annonce est bloquée, vous ne pouvez pas la modifier, ni la publier.">{$a.A_etat}</abbr> <i class="fas fa-info-circle"></i></div>
						{/if}

						{foreach $photo as $p}
								{if $bool eq 0}

									<!-- Image de l'annonce -->

									<div class="annonce-image">
										{if $p.P_A_idannonce eq $a.A_idannonce}
									<a href="Annonce-{$a.A_idannonce}"><img src="../../../images/annonces/{$p.P_nom}" class="img-responsive"></a>
									{assign "bool" 1}
								{/if}
							</div>
								{/if}
						{/foreach}
						<div class="annonce-description">
							<span class="description-titre">{$a.A_titre}</span>
							<span class="description-divers"><i class="fas fa-chart-area"></i> {$a.A_superficie} m²</span>
							<span class="description-divers">{$a.A_cout_loyer}€/mois</span>
							<span class="description-divers">{$a.A_T_type}</span>
							<span class="description-divers"><i class="fas fa-fire-alt"></i> Chauffage&nbsp:&nbsp{$a.A_type_chauffage}</span>
							<span class="description-divers"><i class="fas fa-map-marker-alt"></i> {$a.A_ville}&nbsp({$a.A_CP})</span></br/>
							<span class="description-plus"><a href="Gestion/Annonce-{$a.A_idannonce}">Gérer <i class="fas fa-cogs"></i></a></span>
							<span class="description-plus"><a href="Supprimer/Annonce-{$a.A_idannonce}">Supprimer l'annonce <i class="fas fa-trash-alt"></i></a></span>
						</div>
					</div>
					{/foreach}
					</div>
			<hr>
				<div id="section-suppr">
					<a href="/Ajouter-une-annonce"><button type="button" class="collapsible"><i class="far fa-plus-square"></i> Ajouter une annonce</button></a>
					
				</div>
			</div>

			
		</section>
	</div>