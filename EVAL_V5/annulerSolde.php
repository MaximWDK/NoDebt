<?php $statut='tout'; $nomPage='Annuler Solde'; require 'inc/checkConnexion.php'; require 'inc/header.inc.php'?>
        <main>
            <section class="inscription">
                <header>
                    <h1>Voulez-vous vraiment annuler le solde du groupe ?</h1>
                </header>
                <section class="suppression">
                    <form action="groupe.php">
                        <button class="boutonSupprimer" id="supprimer" type="submit">Oui</button>
                        <button class="boutonPublier" id="garder" type="submit">Non</button>
                    </form>
                </section>
            </section>
        </main>
<?php require 'inc/footer.inc.php'?>