<?php require 'php/connexion.inc.php'; $statut='partie'; $nomPage='Connexion'; require 'inc/header.inc.php'?>
        <main>
            <?php if(isset($_SESSION['message'])) echo $_SESSION['message']?>
            <form class="inscription" method="POST">
                <section class="labelInscription">
                    <h1>SE CONNECTER</h1>
                    <label for="courriel">Courriel*</label>
                    <input id="courriel" name="courriel" type="email" autofocus required placeholder="Votre courriel">
                    <label for="motPasse">Mot de passe*</label>
                    <input id="motPasse" name="motPasse" type="password" required placeholder="Votre mot de passe">
                </section>
                <section class="posBouton">
                    <button class="boutonPublier" type="submit" name="submit">Connexion</button>
                </section>
                <section class="exception">
                    <p>Pas de compte ? <a href="inscription.php">S'inscrire</a></p>
                    <p>Mot de passe oublié ? <a href="mdpOublie.php">Cliquez ici</a></p>
                </section>
            </form>
        </main>
<?php require 'inc/footer.inc.php'?>