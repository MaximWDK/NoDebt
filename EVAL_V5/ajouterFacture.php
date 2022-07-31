<?php $statut='tout'; $nomPage='Ajouter Facture'; require 'inc/checkConnexion5.php'; require 'inc/header.inc.php'; require 'php/ajouterFacture.inc.php' ?>
        <main>
            <?php if(isset($_SESSION['message'])) echo $_SESSION['message']?>
            <form class="inscription" method="post" enctype="multipart/form-data">
                <section class="labelInscription">
                    <h1>AJOUTER UNE FACTURE</h1>
                    <label>Scan - Facture</label>
                    <input id="facture" name="facture" type="file" accept=".png, .jpg, .pdf">
                </section>
                <section class="posBouton">
                    <button class="boutonPublier" name="submit" type="submit">Valider</button>
                </section>
            </form>
        </main>
<?php require 'inc/footer.inc.php'?>