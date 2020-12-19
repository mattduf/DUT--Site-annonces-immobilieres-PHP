<head>
	<link rel="stylesheet" href="../../../css/mon-compte.css">
</head>
	<div id="aside-article">
		<aside>
			<ul id="menu">
				<li id="menu-pseudo">{$pseudo}</li>
				<li id="menu-actif"><a href="Mon-compte">Profil <i class="fas fa-user"></i></a></li>
				<li><a href="Mes-annonces">Mes annonces <i class="fas fa-tag"></i></a></li>
				<li><a href="Mes-messages">Mes messages <i class="fas fa-comments-dollar"></i></a></li>
			</ul>
		</aside>
		<section>
			<h1><i class="fas fa-edit"></i> Modifier mes informations personnelles</h1>
			<form class="pure-form pure-form-aligned formulaire" method="post" name="changeprofil">
				<div class="pure-control-group">
					<label>Mail</label>
					<input type="text" placeholder="{$mail}" disabled/>
				</div>
				<div class="pure-control-group">
					<label for="name">Nom</label>
					<input type="text" id="name" placeholder="{$nom}" name="name" />
				</div>
				<div class="pure-control-group">
					<label for="firstname">Prénom</label>
					<input type="text" id="firstname" placeholder="{$prenom}" name="firstname" />
				</div>
				<div class="pure-control-group">
					<label for="pseudo">Pseudo</label>
					<input type="text" id="pseudo" placeholder="{$pseudo}" name="pseudo" />
				</div>
				<div class="pure-control-group">
					<label for="oldpassword"><strong>Mot de passe actuel&nbsp<span class="rouge">*</strong></span></label>
					<input type="password" id="oldpassword" placeholder="*********" name="oldpassword" required/>
				</div>
				<div class="pure-control-group">
					<label for="password">Nouveau mot de passe</label>
					<input type="password" id="password" placeholder="*********" name="password" />
				</div>
				<div class="pure-control-group">
					<label for="confpassword">Confirmation</label>
					<input type="password" id="confpassword" placeholder="*********" name="confpassword" />
				</div>
				<div class="pure-controls">
					<button type="submit" class="pure-button pure-button-primary">Enregistrer les modifications</button>
				</div>
			</form>
			<hr>
			<form action="Delete" method="post">
			<div id="section-suppr">
				<button type="button" class="collapsible"><i class="fas fa-trash-alt"></i> Supprimer mon compte</button>
				<div class="content">
					<p>Voulez-vous vraiment supprimer votre compte ? Cela impliquera la suppression des données suivantes : <u>informations du compte</u>, <u>annonces publiées</u> et <u>messages&nbsppostés</u>.</p>

					<input id="coche-suppression" type="checkbox" name="coche-suppression">
					<label for="coche-suppression" id="coche-suppression-label"><strong>Je comprends et je souhaite poursuivre</strong></label><br/>

					<button type="submit" class="pure-button pure-button-primary btn-suppression">Supprimer</button>
				</div>
			</div>
			</form>

		</section>
	</div>

	<script>
		//JS pour onglets collapsibles
		//Source : https://www.w3schools.com/howto/howto_js_collapsible.asp
			var coll = document.getElementsByClassName("collapsible");
			var i;

			for (i = 0; i < coll.length; i++) {
			  coll[i].addEventListener("click", function() {
				this.classList.toggle("active");
				var content = this.nextElementSibling;
				if (content.style.maxHeight){
				  content.style.maxHeight = null;
				} else {
				  content.style.maxHeight = content.scrollHeight + "px";
				} 
			  });
			}
	</script>