<?php ob_start(); $statut='tout'; $nomPage='Suppression Facture'; require 'inc/checkConnexion6.php'; require 'inc/header.inc.php'; require 'php/suppressionFacture.inc.php'?>
        <main>
            <section class="inscription">
                <?php if(isset($_SESSION['message'])) echo $_SESSION['message']?>
                <header>
                    <h1>Voulez-vous vraiment supprimer cette facture <?php echo $facture->scan ?> ?</h1>
                </header>
                <section class="suppression">
                    <form method="post">
                        <button class="boutonSupprimer" id="supprimer" name="submit" type="submit">Supprimer</button>
                        <button class="boutonPublier" id="garder" name="noSubmit" type="submit">Annuler</button>
                    </form>
                </section>
            </section>
        </main>
<?php require 'inc/footer.inc.php'?>