<head>
	<link rel="stylesheet" href="../../../css/mon-compte.css">
	<link rel="stylesheet" href="../../../css/administration.css">
</head>
	<div id="aside-article" class="aside-article-gestion">
		<aside>
			<ul id="menu">
				<li id="menu-pseudo">ADMINISTRATION</li>
				<li><a href="/Panneau-Administration">Journaux <i class="fas fa-list"></i></a></li>
				<li id="menu-actif"><a href="/Gestion-site">Gestion <i class="fas fa-tools"></i></a></li>
			</ul>
		</aside>
		<section>
			<h1 class="h1-custom"><span>Gestion du site</span></h1>
				<ul><li class="liste-gestion">Gérer un utilisateur <a style="color:black; text-decoration:underline;" href="/Panneau-administration">(voir la liste des utilisateurs)</a></li></ul>
				<table id="table-gestion">
					<form action="GestionUtilisateurs" method="post">
						<tr>
							<td><label for="email">Adresse mail du compte sur lequel effectuer l'action&nbsp:</label></td>
							<td><input type="text" id="email" placeholder="Adresse mail" name="email" required/></td>
							<td>
								<button type="submit" name="button" value="modifier" class="pure-button pure-button-primary bouton-gestion" style="background-color:#cdad3a;">Modifier</button>
								<button type="submit" name="button" value="supprimer" class="pure-button pure-button-primary bouton-gestion" style="background-color:#c2262b;"><abbr title="Supprimer l'utilisateur ? Cela aura pour effet de :&#010- détruire son compte&#010- supprimer ses annonces">Supprimer</button>
								<button type="submit" name="button" value="bloquer" class="pure-button pure-button-primary bouton-gestion" style="background-color:#771212;"><abbr title="Bloquer l'utilisateur ? Cela aura pour effet de :&#010- l'empêcher de publier des annonces&#010- bloquer ses annonces et les rendre inaccessibles">Bloquer</abbr></button>
								<button type="submit" name="button" value="debloquer" class="pure-button pure-button-primary bouton-gestion" style="background-color:#29ac79;"><abbr title="Déloquer l'utilisateur ? Cela aura pour effet de :&#010- l'autoriser à publier des annonces&#010- réafficher ses annonces et les rendre accessibles">Débloquer</abbr></button>
							</td>
						</tr>
						<tr>
							<td colspan="3" style="padding-top:10px;">
								<label for="corpsmail"><strong>Envoyer un mail</strong></label><br/>
								<textarea id="corpsmail" name="corpsmail" placeholder="Cors du mail à envoyer" style="width:80%; min-width:400px; max-width:800px; min-height:150px; max-height:500px;"></textarea>
							</td>
						</tr>
							<td colspan="3"><button type="submit" name="button" value="envoyermail" class="pure-button pure-button-primary bouton-gestion" style="background-color:#29ac79; width:200px;">Envoyer l'e-mail</button></td>
						</tr>
					</form>
				</table>
				<hr/>
				<ul><li class="liste-gestion">Gérer une annonce <a style="color:black; text-decoration:underline;" href="/Panneau-administration">(voir la liste des annonces)</a></li></ul>
				<table id="table-gestion">
					<form action="GestionAnnonces" method="post">
						<tr>
							<td><label for="idannonce">ID de l'annonce sur laquelle effectuer l'action&nbsp:</label></td>
							<td><input type="number" id="idannonce" placeholder="ID de l'annonce" name="idannonce" required/></td>
							<td>
								<button type="submit" name="buttonAnnonce" value="modifierAnnonce" class="pure-button pure-button-primary bouton-gestion" style="background-color:#cdad3a;">Modifier</button>
								<button type="submit" name="buttonAnnonce" value="supprimerAnnonce" class="pure-button pure-button-primary bouton-gestion" style="background-color:#c2262b;"><abbr title="Supprimer l'annonce ?&#010Cela aura pour effet de la supprimer définitivement du site.">Supprimer</button>
								<button type="submit" name="buttonAnnonce" value="bloquerAnnonce" class="pure-button pure-button-primary bouton-gestion" style="background-color:#771212;"><abbr title="Bloquer l'annonce ?&#010Elle ne pourra pas être consultée par les autres utilisateurs.">Bloquer</button>
								<button type="submit" name="buttonAnnonce" value="debloquerAnnonce" class="pure-button pure-button-primary bouton-gestion" style="background-color:#29ac79;"><abbr title="Déloquer l'annonce ?&#010Elle pourra être consultée par les autres utilisateurs.">Débloquer</button>
							</td>
						</tr>
					</form>
				</table>
		</section>
	</div>