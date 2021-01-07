<head>
    <link rel="stylesheet" href="../../../css/mon-compte.css">
    <link rel="stylesheet" href="../../../css/administration.css">
</head>
<div id="aside-article">
    <aside>
        <ul id="menu">
            <li id="menu-pseudo">ADMINISTRATION</li>
            <li><a href="/Panneau-Administration">Journaux <i class="fas fa-list"></i></a></li>
            <li id="menu-actif"><a href="/Gestion-site">Gestion <i class="fas fa-tools"></i></a></li>
        </ul>
    </aside>

    <!-- La section du profil -->
    <section>
        {foreach $utilisateur as $u}
            <h1 class="h1-custom"><span><i class="fas fa-edit"></i> Modifier l'utilisateur <em>{$u.U_pseudo}</em></span></h1>

        <!-- Formulaire pour modifier les infos du compte -->
        <form class="pure-form pure-form-aligned formulaire" method="post" name="buttonmodifieruti">
            <div class="pure-control-group">
                <label>Mail</label>
                <input name="mail" type="hidden" value="{$u.U_mail}" placeholder="{$u.U_mail}"/>
                <input type="text" value="{$u.U_mail}" placeholder="{$u.U_mail}" disabled/>
            </div>
            <div class="pure-control-group">
                <label for="name">Nom</label>
                <input name="name" id="name" type="text" value="{$u.U_nom}"/>
            </div>
            <div class="pure-control-group">
                <label for="firstname">Prénom</label>
                <input name="firstname" id="firstname" type="text" value="{$u.U_prenom}"/>
            </div>
            <div class="pure-control-group">
                <label for="pseudo">Pseudo</label>
                <input name="pseudo" id="pseudo" type="text" value="{$u.U_pseudo}" maxlength="19"/>
            </div>

            <div class="pure-controls">
                <button type="submit" name="buttonmodifieruti" class="pure-button pure-button-primary"><i class="fas fa-save"></i> Enregistrer les modifications</button>
            </div>
        </form>
        <!-- FIN Du formulaire pour modifier les infos du compte -->
        {/foreach}
        {if $u@total == 0}
            <p style="text-align:center;">Aucun utilisateur choisi.</p>
        {/if}
        <a href="/Gestion-site"><div class="decrease" style="background-color:#c2262b; background-color:rgb(0,120,231); max-width:150px; padding:7px; margin:20px auto 0; text-align:center;"><i class="fas fa-chevron-left"></i> Retour</div></a>
    </section>
    <!-- FIN De la section du profil -->
</div>