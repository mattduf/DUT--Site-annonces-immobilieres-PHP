<head>
    <link rel="stylesheet" href="../../../css/ajouter-annonce.css">
</head>

<article>
    <h1 class="h1-custom"><span><i class="fas fa-envelope-open-text"></i> Envoyer un message</span></h1>
    <section>
        <div id="section-ajouter-annonce">
            <h2>Saisiser votre message</h2>
            <form class="pure-form pure-form-aligned formulaire" method="post" name="modifierAnnonce">

                <div class="pure-control-group" id="ajout-description">
                    <label style="width:auto;" for="description">Message </label><br/>
                <textarea id="message" name="message" rows="5" cols="40" maxlength="1100" required></textarea>
                </div>
                <div>
                    <button type="submit" name="button" value="send" class="pure-button pure-button-primary"><i class="fas fa-reply"></i> Envoyer</button>
                </div>
            </form>
        </div>
    </section>
</article>
