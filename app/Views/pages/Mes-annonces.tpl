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
				<h1><i class="far fa-list-alt"></i> Liste de mes annonces</h1>
			</div>

			<div id="section-ajouter-annonce">
				<h1><i class="far fa-plus-square"></i> Ajouter une annonce</h1>
				<form class="pure-form pure-form-aligned formulaire" method="post" name="changeprofil">
					<div class="pure-control-group">
						<label for="title">Titre</label>
						<input type="text" id="title" placeholder="Titre de l'annonce" name="title" required/>
					</div>

					<div class="pure-control-group">
						<label for="cout-location">Coût mensuel de location</label>
						<input type="number" id="cout-location" placeholder="Coût mensuel de location" name="cout-location" required/>
					</div>

					<div class="pure-control-group">
						<label for="cout-charges">Coût éventuel des charges</label>
						<input type="number" id="cout-charges" placeholder="Coût des charges" name="cout-charges"/>
					</div>

					<div class="pure-control-group">
						<label for="type">Type</label>
						<select id="type" name="type-select">
						    <option value="T1">T1</option>
						    <option value="T2">T2</option>
						    <option value="T3">T3</option>
						    <option value="T4">T4</option>
						    <option value="T5">T5</option>
						    <option value="T6">T6</option>
						</select>
					</div>

					<div class="pure-control-group">
						<label for="superficie">Superficie</label>
						<input type="number" id="superficie" placeholder="Superficie du logement" name="superficie" required/>
					</div>

					<div class="pure-control-group">
						<label for="type-chauffage">Type de chauffage</label>
						<select id="type-chauffage" name="type-chauffage-select" onchange="showEnergie('hidden_div', this)">>
						    <option value="0">Collectif</option>
						    <option value="1">Individuel</option>
						</select>
					</div>

					<div class="pure-control-group" id="hidden_div">
						<label for="mode-energie">Mode d'énergie</label>
						<select id="mode-energie" name="mode-energie-select">
						    <option value="fioul">Fioul</option>
						    <option value="electrique">Électrique</option>
						    <option value="gaz">Gaz</option>
						</select>
					</div>

					<div class="pure-control-group">
						<label for="adresse">Localisation</label>
						<input type="text" id="adresse" placeholder="Adresse" name="adresse" style="margin-bottom:2px;" required/><br/>
						<label for=""></label>
						<input type="text" id="ville" placeholder="Ville" name="ville" style="margin-bottom:2px;" required/><br/>
						<label for=""></label>
						<input type="text" id="code-postal" placeholder="Code postal" name="code-postal" required/>
					</div>

					<div class="pure-control-group">
						<label for="date">Date de création</label>
						<input type="date" id="date" placeholder="Date de création de l'annonce" name="date" required/>
					</div>
					
					<div class="pure-control-group" id="ajout-description">
						<label for="description">Description</label><br/>
						<textarea id="description" name="description" rows="5" cols="40" maxlength="1000" placeholder="Description de l'annonce"></textarea>
					</div>

					<div class="pure-controls">
						<button type="submit" class="pure-button pure-button-primary">Enregistrer l'annonce</button>
					</div>
				</form>
			</div>
		</section>
	</div>

	<script>
		//JS pour faire apparaître le mode d'énergie si "Indivuel" est sélectionné
		//Source : https://www.tutorialspoint.com/how-can-i-show-a-hidden-div-when-a-select-option-is-selected-in-javascript
		function showEnergie(id, elementValue) {
	      document.getElementById(id).style.display = elementValue.value == 1 ? 'block' : 'none';
	   }

	   //JS pour compter le nb de caractères restant pour la description
	   //Source : 

	</script>