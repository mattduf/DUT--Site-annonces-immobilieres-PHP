
    <article>
        <form class="pure-form pure-form-aligned formulaire" method="post" name="signup">
            <h1 align="center">S'inscrire</h1>
            <fieldset>
                <div class="pure-control-group">
                    <label for="name">Nom <span class="rouge">*</span></label>
                    <input type="text" id="name" placeholder="Nom" name="name" required/>
                </div>
                <div class="pure-control-group">
                    <label for="firstname">Prénom <span class="rouge">*</span></label>
                    <input type="text" id="firstname" placeholder="Prénom" name="firstname" required/>
                </div>
                <div class="pure-control-group">
                    <label for="pseudo">Pseudo <span class="rouge">*</span></label>
                    <input type="text" id="pseudo" placeholder="Pseudo" name="pseudo" maxlength="19" required/>
                </div>
                <div class="pure-control-group">
                    <label for="email">E-mail <span class="rouge">*</span></label>
                    <input type="email" id="email" placeholder="Votre adresse e-mail" name="email" required/>
                </div>
                <div class="pure-control-group">
                    <label for="password">Mot de passe <span class="rouge">*</span></label>
                    <input type="password" id="password" placeholder="Mot de passe" name="password" required/>
                </div>
                <div class="pure-control-group">
                    <label for="confpassword">Confirmation <span class="rouge">*</span></label>
                    <input type="password" id="confpassword" placeholder="Confirmation" name="confpassword" required/>
                </div>
                <div class="pure-controls">
                    <button type="submit" class="pure-button pure-button-primary"><i class="fas fa-user-plus"></i> S'inscrire</button>
                </div>
            </fieldset>
        </form>
    </article>