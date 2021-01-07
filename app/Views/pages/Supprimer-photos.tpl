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
        <form class="pure-form pure-form-aligned formulaire" method="post" style="max-width: 1000px; text-align:center;">
            <table style="text-align:center; margin:0 auto;">
                <tr>
                    {foreach $photos as $p}
                        <td><input type="checkbox" name="deletePhotoAdmin[]" value="{$p.P_idphoto}"></td>
                        <td><img src="../../../images/annonces/{$p.P_nom}" height="10%"></td>
                    {/foreach}
                    {if $p@total == 0}
                        <p>Cette annonce ne comporte aucune photo.</p>

                        </tr>
                    </table>
                    {else}
                        </tr>
                        </table>
                        <button type="submit" name="buttondeletephoto" value="delete" class="pure-button pure-button-primary btn-enregistrement" style="background-color:#c2262b; margin-top:20px;"><i class="fas fa-trash-alt"></i> Supprimer la/les photo(s) selectionée(s)</button>
                    {/if}
            <a href="/Gestion-site"><div class="decrease" style="background-color:#c2262b; background-color:rgb(0,120,231); max-width:150px; padding:7px; margin:20px auto 0;"><i class="fas fa-chevron-left"></i> Retour</div></a>
        </form>
    </section>
</div>