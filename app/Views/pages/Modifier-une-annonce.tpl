<head>
    <link rel="stylesheet" href="../../../css/ajouter-annonce.css">
</head>

<article>
    <h1 class="h1-custom"><span><i class="fas fa-edit"></i> Modifier une annonce</span></h1>
    <section>
        {foreach $annonce as $a}
        <div id="section-ajouter-annonce">
            <h2>Informations générales</h2>
            <form class="pure-form pure-form-aligned formulaire" method="post" name="modifierAnnonce">
                <div class="pure-control-group">
                    <label for="état">État de l'annonce </label>
                    <select id="état" name="etat" required>
                        <option value="publiée">Publique</option>
                        <option value="brouillon">En cours de rédaction</option>
                    </select>
                </div>

                <div class="pure-control-group">
                    <label for="title">Titre</label>
                    <input type="text" id="title" value="{$a.A_titre}" name="title" required/>
                </div>

                <div class="pure-control-group">
                    <label for="cout-location">Coût mensuel de location</label>
                    <input type="number" min="0" id="cout-location" value="{$a.A_cout_loyer}" name="coutlocation" required/>
                </div>

                <div class="pure-control-group">
                    <label for="cout-charges">Coût éventuel des charges</label>
                    <input type="number" min="0" id="cout-charges" value="{$a.A_cout_charges}" name="coutcharges"/>
                </div>

                <div class="pure-control-group">
                    <label for="type">Type</label>
                    <select id="type" name="typeselect" required>
                        <option value="">---</option>
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
                    <input type="number" min="0" id="superficie" value="{$a.A_superficie}" name="superficie" required/>
                </div>

                <div class="pure-control-group">
                    <label for="type-chauffage">Type de chauffage</label>
                    <select id="type-chauffage" name="typechauffageselect" required onchange="showEnergie('hidden_div', this)">>
                        <option value="">---</option>
                        <option value="Collectif">Collectif</option>
                        <option value="Individuel">Individuel</option>
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
                    <input type="text" id="adresse" value="{$a.A_adresse}" name="adresse" style="margin-bottom:2px;" required/><br/>
                    <label for=""></label>
                    <input type="text" id="ville" value="{$a.A_ville}" name="ville" style="margin-bottom:2px;" required/><br/>
                    <label for=""></label>
                    <input type="text" id="code-postal" value="{$a.A_CP}" name="codepostal" required/>
                </div>

                <div class="pure-control-group">
                    <label for=""></label>
                    <select id="region" name="region" required>
                        <option value="">--Sélectionner une région--</option>
                        <option value="Auvergne-Rhône-Alpes">Auvergne-Rhône-Alpes</option>
                        <option value="Bourgogne-Franche-Comté">Bourgogne-Franche-Comté</option>
                        <option value="Bretagne">Bretagne</option>
                        <option value="Centre-Val de Loire">Centre-Val de Loire</option>
                        <option value="Corse">Corse</option>
                        <option value="Grand Est">Grand Est</option>
                        <option value="Hauts-de-France">Hauts-de-France</option>
                        <option value="Île-de-France">Île-de-France</option>
                        <option value="Normandie">Normandie</option>
                        <option value="Nouvelle-Aquitaine">Nouvelle-Aquitaine</option>
                        <option value="Occitanie">Occitanie</option>
                        <option value="Pays de la Loire">Pays de la Loire</option>
                        <option value="Provence-Alpes-Côte d'Azur">Provence-Alpes-Côte d'Azur</option>
                    </select>
                </div>

                <div class="pure-control-group" id="ajout-description">
                    <label style="width:auto;" for="description">Description <span id="lblRemainingCount"></span></label><br/>
                <textarea id="description" name="description" rows="5" cols="40" maxlength="1100" onkeypress="textareaLengthCheck(this)" required>{$a.A_description}</textarea>
                </div>
                <div>
                    <button type="submit" name="button" value="edit" class="pure-button pure-button-primary"><i class="fas fa-save"></i> Enregistrer les modifications</button>
                </div>
            </form>
            <hr>
            <h2>Photo(s) du logement (5 max.)</h2>
            <form class="pure-form pure-form-aligned formulaire" method="post" style="max-width: 1000px;">
                <table style="margin: 0 auto;">
                    <tr>
                        {foreach $photos as $p}
                            <td><input type="checkbox" name="deletePhoto[]" value="{$p.P_idphoto}"></td>
                            <td><a href="../../../images/annonces/{$p.P_nom}" target="_blank"><img src="../../../images/annonces/{$p.P_nom}" height="10%"></a></td>
                        {/foreach}
                    </tr>
                </table>
                <div>
                    <button type="submit" name="buttondeletephoto" value="delete" class="pure-button pure-button-primary btn-enregistrement" style="background-color:#c2262b;"><i class="fas fa-trash-alt"></i> Supprimer la/les photo(s) selectionée(s)</button>
                </div>
            {/foreach}
            </form>
            <form class="pure-form pure-form-aligned formulaire" method="post" enctype="multipart/form-data">
                <div class="pure-control-group">
                    <input type="file" name="image" id="image" accept="image/*" onchange="loadFile(event)"/>
                    <button type="submit" name="buttonaddphoto" value="add" class="pure-button pure-button-primary btn-enregistrement"><i class="far fa-plus-square"></i> Ajouter une photo</button>
                </div>
            </form>
        </div>
    </section>
</article>

<script>
    //JS pour faire apparaître le mode d'énergie si "Indivuel" est sélectionné
    //Source : https://www.tutorialspoint.com/how-can-i-show-a-hidden-div-when-a-select-option-is-selected-in-javascript
    function showEnergie(id, elementValue) {
        document.getElementById(id).style.display = elementValue.value == 'Individuel' ? 'block' : 'none';
    }

    //JS pour compter le nb de caractères restant pour la description
    //Source : https://stackoverflow.com/questions/34453095/javascript-display-remaining-characters-of-text-area/34453262#answer-34453257
    function textareaLengthCheck(el) {
        var textArea = el.value.length;
        var charactersLeft = 1099 - textArea;
        var count = document.getElementById('lblRemainingCount');
        count.innerHTML = "(" + charactersLeft + " / 1100)";
    }

    //JS pour afficher l'aperçu d'une image chargée
    //Source : https://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded
    var loadFile = function(event) {
        var imageoutput = document.getElementById('imageoutput');
        imageoutput.src = URL.createObjectURL(event.target.files[0]);
        imageoutput.onload = function() {
            URL.revokeObjectURL(imageoutput.src) // free memory
        }
    };
</script>