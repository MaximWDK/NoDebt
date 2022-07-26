<?php $statut='tout'; $nomPage='Éditer Groupe'; require 'inc/checkConnexion3.php'; require 'inc/header.inc.php'; require 'php/editerGroupe.inc.php' ?>
        <main>
            <?php if(isset($_SESSION['message'])) echo $_SESSION['message']?>
            <form class="inscription" method="post">
                <section class="labelInscription">
                    <h1>MODIFIER LE GROUPE</h1>
                    <label for="nom">Nom*</label>
                    <input id="nom" name="nom" type="text" autofocus required placeholder="Le nom du groupe">
                    <label for="devise">Devise*</label>
                    <input id="devise" name="devise" type="text" required placeholder="La devise (€, $, £,...)">
                    <section class="posBouton2">
                        <button class="boutonPublier"  name="submit" type="submit">Modifier le groupe</button>
                    </section>
                </section>
            </form>
        </main>
<?php require 'inc/footer.inc.php'?>