<?php $statut='tout'; $nomPage='Création Groupe'; require 'inc/checkConnexion.php'; require 'inc/header.inc.php'; require 'php/creerGroupe.inc.php'?>
        <main>
            <?php if(isset($_SESSION['message'])) echo $_SESSION['message']?>
            <form class="inscription" method="post">
                <section class="labelInscription">
                    <h1>CRÉER UN GROUPE</h1>
                    <label for="nom">Nom*</label>
                    <input id="nom" name="nom" type="text" autofocus required placeholder="Le nom du groupe">
                    <label for="devise">Devise*</label>
                    <input id="devise" name="devise" type="text" required placeholder="La devise (€, $, £,...)">
                </section>
                <section class="posBouton2">
                    <button class="boutonPublier" type="submit" name="submit">Créer un groupe</button>
                </section>
            </form>
        </main>
<?php require 'inc/footer.inc.php'?>