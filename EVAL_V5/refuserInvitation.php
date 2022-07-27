<?php ob_start(); $statut='tout'; $nomPage='Suppression Groupe'; require 'inc/checkConnexion4.php'; require 'inc/header.inc.php'; require 'php/refuserInvitation.inc.php'?>
        <main>
            <section class="inscription">
                <?php if(isset($_SESSION['message'])) echo $_SESSION['message']?>
                <header>
                    <h1>Voulez-vous vraiment supprimer cette invitation ?</h1>
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