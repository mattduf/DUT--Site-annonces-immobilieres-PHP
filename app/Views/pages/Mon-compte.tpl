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

			<form class="pure-form pure-form-aligned formulaire" method="post" name="changeprofil">
				<div class="pure-control-group">
					<label >Mail :</label>
					<input type="text" placeholder="{$mail}" disabled/>
				</div>
					<div class="pure-control-group">
						<label for="name">Nom :</label>
						<input type="text" id="name" placeholder="{$nom}" name="name" />
					</div>
					<div class="pure-control-group">
						<label for="firstname">Prénom :</label>
						<input type="text" id="firstname" placeholder="{$prenom}" name="firstname" />
					</div>
					<div class="pure-control-group">
						<label for="pseudo">Pseudo :</label>
						<input type="text" id="pseudo" placeholder="{$pseudo}" name="pseudo" />
					</div>
				<div class="pure-control-group">
					<label for="oldpassword">Ancien Mot de passe :</label>
					<input type="password" id="oldpassword" placeholder="*********" name="oldpassword" />
				</div>
					<div class="pure-control-group">
						<label for="password">Mot de passe :</label>
						<input type="password" id="password" placeholder="*********" name="password" />
					</div>
					<div class="pure-control-group">
						<label for="confpassword">Confirmation :</label>
						<input type="password" id="confpassword" placeholder="*********" name="confpassword" />
					</div>
					<div class="pure-controls">
						<button type="submit" class="pure-button pure-button-primary">Modifier mes informations</button>
					</div>
			</form>

		</section>
	</div>