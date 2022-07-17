<?php $statut='tout'; $nomPage='Suppression Groupe'; require 'inc/checkConnexion.php'; require 'inc/header.inc.php'; require 'php/suppressionGroupe.inc.php'?>
        <main>
            <section class="inscription">
                <?php if(isset($_SESSION['message'])) echo $_SESSION['message']?>
                <header>
                    <h1>Voulez-vous vraiment supprimer ce groupe ?</h1>
                </header>
                <section class="suppression">
                    <form method="post">
                        <button class="boutonSupprimer" name="submit" id="supprimer" type="submit">Supprimer</button>
                        <button class="boutonPublier" name="noSubmit" id="garder" type="submit">Annuler</button>
                    </form>
                </section>
            </section>
        </main>
<?php require 'inc/footer.inc.php'?>