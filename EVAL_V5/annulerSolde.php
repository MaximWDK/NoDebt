<?php $statut='tout'; $nomPage='Annuler Solde'; require 'inc/checkConnexion3.php'; require 'php/annulerSolde.inc.php'; require 'inc/header.inc.php'?>
        <main>
            <section class="inscription">
                <?php if(isset($_SESSION['message'])) echo $_SESSION['message']?>
                <header>
                    <h1>Voulez-vous vraiment annuler le solde du groupe "<?php echo $groupe->nom ?>" ?</h1>
                </header>
                <section class="suppression">
                    <form method="post">
                        <button class="boutonSupprimer" name="submit" id="supprimer" type="submit">Oui</button>
                        <button class="boutonPublier" name="noSubmit" id="garder" type="submit">Non</button>
                    </form>
                </section>
            </section>
        </main>
<?php require 'inc/footer.inc.php'?>