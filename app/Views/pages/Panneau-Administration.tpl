<head>
	<link rel="stylesheet" href="../../../css/mon-compte.css">
	<link rel="stylesheet" href="../../../css/administration.css">
</head>
	<div id="aside-article">
		<aside>
			<ul id="menu">
				<li id="menu-pseudo">ADMINISTRATION</li>
				<li id="menu-actif"><a href="/Panneau-Administration">Journaux <i class="fas fa-list"></i></a></li>
				<li><a href="/Gestion-site">Gestion <i class="fas fa-tools"></i></a></li>
			</ul>
		</aside>
		<section>
			<h1 class="h1-custom"><span>Liste des comptes créés sur ImmoAnnonce</span></h1>
			<div class="cadre-journaux">
				<table class="table-journaux">
					<thead>
						<tr>
							<th>créé le</th>
							<th>mail</th>
							<th>pseudo</th>
							<th>nom</th>
							<th>prénom</th>
							<th>état</th>
						</tr>
					{foreach $utilisateur as $u}
					<tbody>
					{if $u.U_etat eq "bloqué"}
					<tr style="background-color:rgba(255,0,0,0.5);">
						{else}
					<tr>
						{/if}
							<td>{$u.U_date_modifiee}</td>
							<td>{$u.U_mail}</td>
							<td>{$u.U_pseudo}</td>
							<td>{$u.U_nom}</td>
							<td>{$u.U_prenom}</td>
						<td>{$u.U_etat}</td>
						</tr>
					</tbody>
					{/foreach}
					<tfoot>
						<tr>
							<td colspan="6"><strong><em>{$u@total} occurrence(s).</em></strong></td>
						</tr>
					</tfoot>
				</table>
			</div>

			<h1 class="h1-custom"><span>Liste des annonces créées sur ImmoAnnonce</span></h1>
			<div class="cadre-journaux">
				<table class="table-journaux">
					<thead>
						<tr>
							<th>créée le</th>
							<th>id</th>
							<th>titre</th>
							<th>état</th>
							<th>créée par</th>
						</tr>
					{foreach $annonce as $a}
					<tbody>
					{if $a.A_etat eq "bloquée"}
						<tr style="background-color:rgba(255,0,0,0.5);">
					{else}
						<tr>
					{/if}
							<td>{$a.A_date_modifiee}</td>
							<td>{$a.A_idannonce}</td>
							<td><a href="Annonce-{$a.A_idannonce}">{$a.A_titre}</a></td>
							<td>{$a.A_etat}</td>
							<td>{$a.A_U_mail}</td>
						</tr>
					</tbody>
					{/foreach}
					<tfoot>
						<tr>
							<td colspan="5"><strong><em>{$a@total} occurrence(s).</em></strong></td>
						</tr>
					</tfoot>
				</table>
			</div>

			<h1 class="h1-custom"><span>Nombre d'annonces créées par utilisateur</span></h1>
			<div class="cadre-journaux">
				<table class="table-journaux">
					<thead>
					<tr>
						<th>mail</th>
						<th>nb annonces</th>
					</tr>
					{foreach $nbannonce as $nb}
					<tbody>
					<tr>
						<td>{$nb.A_U_mail}</td>
						<td>{$nb.nb_annonces}</td>
					</tr>
					</tbody>
					{/foreach}
					<tfoot>
					<tr>
						<td colspan="3"><strong><em>{$nb@total} occurrence(s).</em></strong></td>
					</tr>
					</tfoot>
				</table>
			</div>
		</section>
	</div>