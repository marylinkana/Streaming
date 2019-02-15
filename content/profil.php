    <form class="form-signin" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Mon profil</h1>
        <label for="login" class="sr-only">Changer de login</label>
        <input type="text" name='login' id="login" class="form-control" placeholder="Changer Login" required autofocus>
        <label for="mdp_user" class="sr-only">Changer de mot de pasase</label>
        <input type="password" id="mdp_user" name='mdp_user' class="form-control" placeholder="Changer mdp" required>
        <div class="checkbox mb-3">
            <label>
                              <select name="tps_abo">
                        <option value="0"></option>
                        <option value="172800">2 jour</option>
                        <option value="259200">3 jours</option>
                        <option value="432000">5 jours</option>
                    </select>
        </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Valider</button>
    </form>
