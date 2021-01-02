<head>
	<link rel="stylesheet" href="../../../css/mon-compte.css">
</head>

	<div id="aside-article">
		<!-- Element aside avec le menu -->
		<aside>
			<ul id="menu">
				<li id="menu-pseudo">{$pseudo}</li>
				<li id="menu-actif"><a href="Mon-compte">Profil <i class="fas fa-user"></i></a></li>
				<li><a href="Mes-annonces">Mes annonces <i class="fas fa-tag"></i></a></li>
				<li><a href="Mes-messages">Mes messages <i class="fas fa-comments-dollar"></i></a></li>
			</ul>
		</aside>
		<!-- FIN Element aside avec le menu -->

		<!-- La section du profil -->
		<section>
			<h1 class="h1-custom"><span><i class="fas fa-edit"></i> Modifier mes informations personnelles</span></h1>

			<!-- Formulaire pour modifier les infos du compte -->
			<form class="pure-form pure-form-aligned formulaire" method="post" name="changeprofil">
				<div class="pure-control-group">
					<label>Mail</label>
					<input type="text" placeholder="{$mail}" disabled/>
				</div>
				<div class="pure-control-group">
					<label for="name">Nom</label>
					<input name="name" id="name" type="text" placeholder="{$nom}"/>
				</div>
				<div class="pure-control-group">
					<label for="firstname">Prénom</label>
					<input name="firstname" id="firstname" type="text" placeholder="{$prenom}"/>
				</div>
				<div class="pure-control-group">
					<label for="pseudo">Pseudo</label>
					<input name="pseudo" id="pseudo" type="text" placeholder="{$pseudo}" maxlength="19"/>
				</div>
				<div class="pure-control-group">
					<label for="oldpassword"><strong>Mot de passe actuel&nbsp<span class="rouge">*</strong></span></label>
					<input name="oldpassword" id="oldpassword" type="password" placeholder="*********" required/>
				</div>
				<div class="pure-control-group">
					<label for="password">Nouveau mot de passe</label>
					<input name="password" id="password" type="password" placeholder="*********"/>
				</div>
				<div class="pure-control-group">
					<label for="confpassword">Confirmation</label>
					<input name="confpassword" id="confpassword" type="password" placeholder="*********"/>
				</div>
				<div class="pure-controls">
					<button type="submit" class="pure-button pure-button-primary">Enregistrer les modifications</button>
				</div>
			</form>
			<!-- FIN Du formulaire pour modifier les infos du compte -->
			<hr>

			<!-- Formulaire pour supprimer le compte -->
			<form action="Delete" method="post">
				<div id="section-suppr">
					<button type="button" class="collapsible"><i class="fas fa-trash-alt"></i> Supprimer mon compte</button>
					<div class="content">
						<p>Voulez-vous vraiment supprimer votre compte ? Cela impliquera la suppression des données suivantes : <u>informations du compte</u>, <u>annonces publiées</u> et <u>messages&nbsppostés</u>.</p>

						<input id="coche-suppression" type="checkbox" name="coche-suppression">
						<label for="coche-suppression" id="coche-suppression-label"><strong>Je comprends et je souhaite poursuivre</strong></label><br/>
						<button name="deletebutton" type="submit" class="pure-button pure-button-primary btn-suppression">Supprimer</button>
					</div>
				</div>
			</form>
			<!-- FIN Du formulaire pour supprimer le compte -->
		</section>
		<!-- FIN De la section du profil -->
	</div>

	<!-- JavaScript -->
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