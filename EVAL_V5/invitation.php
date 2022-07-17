<?php $statut='tout'; $nomPage='Invitation'; require 'inc/checkConnexion.php'; require 'inc/header.inc.php'; require 'php/invitation.inc.php'?>
        <main>
            <?php if(isset($_SESSION['message'])) echo $_SESSION['message']?>
            <form class="inscription" method="post">
                <section class="labelInscription">
                    <h1>Inviter un membre dans le groupe public "Maxim"</h1>
                    <label for="courriel">Entrez l'adresse email de la personne à inviter</label>
                    <input id="courriel" name="courriel" type="email" autofocus required placeholder="Le courriel">
                </section>
                <section class="posBouton">
                    <button class="boutonPublier" name="submit" type="submit">Envoyer</button>
                </section>
            </form>
        </main>
<?php require 'inc/footer.inc.php'?>