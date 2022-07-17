<?php require 'php/inscription.inc.php'; require 'inc/checkConnexion2.php'; $nomPage='Inscription'; require 'inc/header.inc.php'?>
        <main>
            <?php if(isset($_SESSION['message'])) echo $_SESSION['message']?>
            <form class="inscription" method="post">
                <section class="labelInscription">
                    <h1>CREER UN COMPTE</h1>
                    <label for="nom">Nom*</label>
                    <input id="nom" name="nom" type="text" autofocus required placeholder="Votre nom">
                    <label for="prénom">Prénom*</label>
                    <input id="prénom" name="prenom" type="text" required placeholder="Votre prénom">
                    <label for="courriel">Courriel*</label>
                    <input id="courriel" name="courriel" type="email" placeholder="Votre courriel">
                    <label for="motPasse">Mot de passe*</label>
                    <input id="motPasse" name="motPasse" type="password" required placeholder="Votre mot de passe">
                    <label for="confirmerMotPasse">Confirmer le mot de passe*</label>
                    <input id="confirmerMotPasse" name="confirmerMotPasse" type="password" required placeholder="Confirmer mot de passe">
                </section>
                <section class="posBouton">
                    <button class="boutonPublier" type="submit" name="submit">S'inscrire</button>
                </section>
            </form>
        </main>
<?php require 'inc/footer.inc.php'?>