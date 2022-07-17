<?php session_start(); require 'inc/checkConnexion2.php'; $nomPage='Récupération'; require 'inc/header.inc.php'?>
        <main>
            <form action="index.php" class="inscription" method="post">
                <section class="labelInscription">
                    <h1>MOT DE PASSE OUBLIÉ ?</h1>
                    <label for="courriel">Entrez votre adresse email</label>
                    <input id="courriel" name="courriel" type="email" autofocus required placeholder="Votre courriel">
                </section>
                <section class="posBouton">
                    <button class="boutonPublier" type="submit">Envoyer</button>
                </section>
            </form>
        </main>
<?php require 'inc/footer.inc.php'?>