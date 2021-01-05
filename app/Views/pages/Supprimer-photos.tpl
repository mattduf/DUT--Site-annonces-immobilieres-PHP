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
    <section>
        <form class="pure-form pure-form-aligned formulaire" method="post" style="max-width: 1000px;">
            <table style="margin: 0 auto;">
                <tr>
                    {foreach $photos as $p}
                        <td><input type="checkbox" name="deletePhotoAdmin[]" value="{$p.P_idphoto}"></td>
                        <td><a href="../../../images/annonces/{$p.P_nom}" target="_blank"><img src="../../../images/annonces/{$p.P_nom}" height="10%"></a></td>
                    {/foreach}
                    {if $p@total == 0}
                        <p>Cette annonce ne comporte aucune photo.</p>
                    {/if}
                </tr>
            </table>
            <div>
                <button type="submit" name="buttondeletephoto" value="delete" class="pure-button pure-button-primary btn-enregistrement" style="background-color:#c2262b;"><i class="fas fa-trash-alt"></i> Supprimer la/les photo(s) selectionée(s)</button>
            </div>
        </form>
    </section>
</div>