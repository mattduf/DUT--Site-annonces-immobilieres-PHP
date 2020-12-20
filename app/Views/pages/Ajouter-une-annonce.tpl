<head>
	<link rel="stylesheet" href="../../../css/ajouter-annonce.css">
</head>

	<article>
		<h1><i class="far fa-plus-square"></i> Ajouter une annonce</h1>
		<section>
		<div id="section-ajouter-annonce">
				
				<form class="pure-form pure-form-aligned formulaire" method="post" name="addAnonce">
					<div class="pure-control-group">
						<label for="title">Titre</label>
						<input type="text" id="title" placeholder="Titre de l'annonce" name="title" required/>
					</div>

					<div class="pure-control-group">
						<label for="cout-location">Coût mensuel de location</label>
						<input type="number" id="cout-location" placeholder="Coût mensuel de location" name="coutlocation" required/>
					</div>

					<div class="pure-control-group">
						<label for="cout-charges">Coût éventuel des charges</label>
						<input type="number" id="cout-charges" placeholder="Coût des charges" name="coutcharges"/>
					</div>

					<div class="pure-control-group">
						<label for="type">Type</label>
						<select id="type" name="typeselect">
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
						<select id="type-chauffage" name="typechauffageselect" onchange="showEnergie('hidden_div', this)">>
						    <option value="0">Collectif</option>
						    <option value="1">Individuel</option>
						</select>
					</div>

					<div class="pure-control-group" id="hidden_div">
						<label for="mode-energie">Mode d'énergie</label>
						<select id="mode-energie" name="modeenergieselect">
						    <option value="1">Fioul</option>
						    <option value="2">Électrique</option>
						    <option value="3">Gaz</option>
						</select>
					</div>

					<div class="pure-control-group">
						<label for="adresse">Localisation</label>
						<input type="text" id="adresse" placeholder="Adresse" name="adresse" style="margin-bottom:2px;" required/><br/>
						<label for=""></label>
						<input type="text" id="ville" placeholder="Ville" name="ville" style="margin-bottom:2px;" required/><br/>
						<label for=""></label>
						<input type="text" id="code-postal" placeholder="Code postal" name="codepostal" required/>
					</div>

					<div class="pure-control-group">
						<label for="date">Date de création</label>
						<input type="date" id="date" placeholder="Date de création de l'annonce" name="date"/>
					</div>
					
					<div class="pure-control-group" id="ajout-description">
						<label style="width:auto;" for="description">Description <span id="lblRemainingCount"></span></label><br/>
						<textarea id="description" name="description" rows="5" cols="40" maxlength="1000" placeholder="Description de l'annonce" onkeypress="textareaLengthCheck(this)"></textarea>
						
					</div>

					<div>
						<button type="submit" class="pure-button pure-button-primary btn-enregistrement">Enregistrer l'annonce (brouillon)</button>
						<button type="submit" class="pure-button pure-button-primary">Publier l'annonce</button>
					</div>
				</form>
			</div>
		</section>
		</article>
		
		<script>
		//JS pour faire apparaître le mode d'énergie si "Indivuel" est sélectionné
		//Source : https://www.tutorialspoint.com/how-can-i-show-a-hidden-div-when-a-select-option-is-selected-in-javascript
		function showEnergie(id, elementValue) {
	      document.getElementById(id).style.display = elementValue.value == 1 ? 'block' : 'none';
	   }

	   //JS pour compter le nb de caractères restant pour la description
	   //Source : https://stackoverflow.com/questions/34453095/javascript-display-remaining-characters-of-text-area/34453262#answer-34453257
		function textareaLengthCheck(el) {
		  var textArea = el.value.length;
		  var charactersLeft = 1000 - textArea;
		  var count = document.getElementById('lblRemainingCount');
		  count.innerHTML = "(" + charactersLeft + " / 1000)";
		}
		</script>