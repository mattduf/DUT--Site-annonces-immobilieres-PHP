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
					<div class="carte grow">
						<div class="annonce-image">
							<img src="../../../images/annonces/2.jpg" class="img-responsive">
						</div>
						<div class="annonce-description">
							<span class="description-titre">{$a.A_titre}</span>
							<span class="description-divers"><i class="fas fa-chart-area"></i> {$a.A_superficie} m²</span>
							<span class="description-divers">{$a.A_cout_loyer}€/mois</span>
							<span class="description-divers">{$a.A_T_type}</span>
							<span class="description-divers"><i class="fas fa-fire-alt"></i> Chauffage&nbsp:&nbsp{$a.A_type_chauffage}</span>
							<span class="description-divers">{$a.A_ville}&nbsp({$a.A_CP})</span>
							<span class="description-plus"><a href="Annonces/{$a.A_idannonce}">En&nbspsavoir&nbspplus <i class="fas fa-info-circle"></i></a></span>
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